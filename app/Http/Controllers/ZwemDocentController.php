<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFeedbackRequest;
use App\Http\Requests\StoreZwemDocentRequest;
use App\Models\Eindexamen;
use App\Models\Zwem_Docent;
use App\Models\Zwemles;
use Illuminate\Http\Request;

use App\Models\Feedback;
use App\Models\Leerling;
use Illuminate\Support\Facades\Auth;


class ZwemDocentController extends Controller
{

    public function index(Request $request)
    {
        $user = auth()->user();

        if ($user->role !== 'zwem_docent') {
            Auth::logout();
            return redirect()->route('login')->with('error', 'Access denied.');
        }

        $zwemdocent = Zwem_Docent::where('user_id', $user->id)->first();

        $zwemlessen = Zwemles::all();

        $search = $request->input('search');

        $zwemlessen = Zwemles::when($search, function ($query, $search) {
            return $query->where('naam', 'LIKE', "%{$search}%");
        })->get();

        return view('zwemdocenten.index', compact(['zwemlessen', 'zwemdocent']));
    }

    public function create()
    {
        $leerlingen = Leerling::all();
        return view('zwemdocenten.create', compact('leerlingen'));
    }

    public function store(StoreZwemDocentRequest $request)
    {
        $validated = $request->validated();
    
        $zwemles = Zwemles::create([
            'naam' => $validated['naam'],
            'beschrijving' => $validated['beschrijving'],
            'duurtijd' => $validated['duurtijd'],
            'datum' => $validated['datum'],
            'tijd' => $validated['tijd'],
        ]);
    
        if ($request->has('leerlingen')) {
            $zwemles->groepen()->attach($request->input('leerlingen'));
        }
    
        return redirect()->route('zwemlessen.index')->with('success', 'Zwemles succesvol aangemaakt!');
    }

    public function show(Zwemles $zwemles)
    {
        return view('zwemdocenten.show', compact('zwemles'));
    }

    public function edit(Zwemles $zwemles)
    {
        $leerlingen = Leerling::all();
        return view('zwemdocenten.edit', compact('zwemles', 'leerlingen'));
    }

    public function update(StoreZwemDocentRequest $request, Zwemles $zwemles)
    {
        $zwemles->update($request->validated());

        if ($request->has('leerlingen')) {
            $zwemles->groepen()->sync($request->input('leerlingen'));
        } else {
            $zwemles->groepen()->detach();
        }

        return redirect()->route('zwemlessen.show', compact('zwemles'))->with('success', 'Zwemles succesvol geupdate!');
    }
    public function destroy(Zwemles $zwemles)
    {
        $zwemles->delete();
        return redirect()->route('zwemlessen.index')->with('success', 'Zwemles succesvol verwijderd!');
    }

    //Feedback pagina
    public function feedbackCreate(int $leerling_id)
    {
        $zwemdocent = Zwem_Docent::where('user_id', Auth::id())->first();
        $leerlingen = Leerling::all();
        return view('zwemdocenten.createFeedback', compact('zwemdocent', 'leerlingen', 'leerling_id'));
    }

    public function storeFeedback(StoreFeedbackRequest $request)
    {
        Feedback::create(array_merge(
            $request->validated(),
            ['aanmaakdatum' => now()->toDateString()]
        ));

        return redirect()->route('leerlingen.index')->with('success', 'Feedback succesvol aangemaakt!');
    }

    public function editFeedback(Feedback $feedback, int $leerling_id)
    {
        $zwemdocent = Zwem_Docent::where('user_id', Auth::id())->first();

        return view('zwemdocenten.editFeedback', compact('feedback', 'leerling_id', 'zwemdocent'));
    }

    public function updateFeedback(StoreFeedbackRequest $request, Feedback $feedback)
    {

        $feedback->update($request->validated());

        return redirect()->route('leerlingen.index')->with('success', 'Feedback succesvol geupdate!');
    }

    public function destroyFeedback(Feedback $feedback)
    {
        $leerling = Leerling::find($feedback->leerling_id);
        $feedback->delete();
        // return view('zwemdocenten.showleerling', compact('feedback', 'leerling'))->with('success', 'Feedback succesvol verwijderd!');
        return redirect()->route('leerlingen.show', compact('leerling'))->with('success', 'Feedback is verwijderd');
    }

    //Leerlingen pagina
    public function leerlingen(Request $request)
    {
        $leerlingen = Leerling::all();
        $totalLessons = ZwemLes::count();

        $search = $request->input('search');

        $leerlingen = Leerling::when($search, function ($query, $search) {
            return $query->where('voornaam', 'LIKE', "%{$search}%")
                ->orWhere('achternaam', 'LIKE', "%{$search}%");
        })->get();

        return view('zwemdocenten.leerlingen', compact('leerlingen', 'totalLessons'));
    }

    public function showLeerling(Leerling $leerling)
    {
        $totalLessons = ZwemLes::count();
        $eindexamens = $leerling->eindexamens;

        return view('zwemdocenten.showleerling', compact('leerling', 'totalLessons', 'eindexamens'));
    }
    public function destroyLeerling(Leerling $leerling)
    {
        $leerling->delete();
        return redirect()->route('leerlingen.index')->with('success', 'Leerling succesvol verwijderd!');
    }

    public function updateLeerling(Request $request, Leerling $leerling)
    {
        $request->validate([
            'lessons_completed' => 'required|integer|min:0|max:' . ZwemLes::count(),
        ]);

        $leerling->update([
            'lessons_completed' => $request->input('lessons_completed'),
        ]);

        return redirect()->route('leerlingen.index')->with('success', 'Voortgang bijgewerkt.');
    }

    //eindexamen pagina
    public function examen(Request $request)
    {
        $eindexamen = Eindexamen::all();

        $search = $request->input('search');

        $eindexamen = Eindexamen::when($search, function ($query, $search) {
            return $query->where('examen_naam', 'LIKE', "%{$search}%")
                ->orWhere('beschrijving', 'LIKE', "%{$search}%");
        })->get();

        return view('zwemdocenten.examen', compact('eindexamen'));
    }

    public function showExamen(Eindexamen $eindexamen)
    {
        $leerlingen = Leerling::all();
        return view('zwemdocenten.showexamen', compact('eindexamen', 'leerlingen'));
    }

    public function LeerlingMetExamen(Request $request, Eindexamen $eindexamen)
    {
        $request->validate([
            'leerling_id' => 'required|exists:leerlingen,leerling_id',
        ]);

        if ($eindexamen->leerlingen()->where('eindexamen_leerling.leerling_id', $request->input('leerling_id'))->exists()) {
            return redirect()->route('eindexamen.show', $eindexamen)->with('error', 'Deze leerling is al gekoppeld aan dit eindexamen.');
        }

        $eindexamen->leerlingen()->attach($request->input('leerling_id'));

        return redirect()->route('eindexamen.show', $eindexamen)->with('success', 'Leerling succesvol gekoppeld aan het eindexamen!');
    }

    public function VerwijderLeerlingExamen(Eindexamen $eindexamen, Leerling $leerling)
    {
        $eindexamen->leerlingen()->detach($leerling->leerling_id);

        return redirect()->route('eindexamen.show', $eindexamen)->with('success', 'Leerling succesvol verwijderd van het eindexamen!');
    }
}
