<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFeedbackRequest;
use App\Http\Requests\StoreZwemDocentRequest;
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
        $zwemles = Zwemles::create($request->validated());

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

        return redirect()->route('zwemlessen.index')->with('success', 'Zwemles succesvol geupdate!');
    }
    public function destroy(Zwemles $zwemles)
    {
        $zwemles->delete();
        return redirect()->route('zwemlessen.index')->with('success', 'Zwemles succesvol verwijderd!');
    }

    //Feedback pagina
    public function feedbackCreate(int $leerling_id)
    {
        $zwemDocenten = Zwem_Docent::all();
        $leerlingen = Leerling::all();
        return view('zwemdocenten.createFeedback', compact('zwemDocenten', 'leerlingen', 'leerling_id'));
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
        return view('zwemdocenten.editFeedback', compact('feedback', 'leerling_id'));
    }

    public function updateFeedback(StoreFeedbackRequest $request, Feedback $feedback)
    {

        $feedback->update($request->validated());

        return redirect()->route('leerlingen.index')->with('success', 'Feedback succesvol geupdate!');
    }

    public function destroyFeedback(Feedback $feedback)
    {
        $feedback->delete();
        return redirect()->route('leerlingen.index')->with('success', 'Feedback succesvol verwijderd!');
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

        return view('zwemdocenten.showleerling', compact('leerling', 'totalLessons'));
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
}
