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

    public function index()
    {
        $user = auth()->user();

        if ($user->role !== 'zwem_docent') {
            Auth::logout();
            return redirect()->route('login')->with('error', 'Access denied.');
        }

        $zwemdocent = Zwem_Docent::where('user_id', $user->id)->first();

        // Get zwemlessen connected to the logged-in zwemdocent
        $zwemlessen = Zwemles::all();
        // $zwemlessen = Zwemles::with('groepen.zwemles')->where('zwem_docent_id', $zwemdocent->zwem_docent_id)->get();
        // $zwemlessen = Zwemles::whereHas('groepen', function($query) use ($zwemdocent) {
        //     $query->where('zwem_docent_id', $zwemdocent->zwem_docent_id);
        // })->with('groepen')->get();

        // dd($zwemlessen);

        return view('zwemdocenten.index', compact(['zwemlessen', 'zwemdocent']));
    }

    public function create()
    { 
        return view('zwemdocenten.create');
    }

    public function store(StoreZwemDocentRequest $request)
    {
        Zwemles::create($request->validated());

        return redirect()->route('zwemlessen.index')->with('success', 'Zwemles succesvol aangemaakt!');
    }

    public function show(Zwemles $zwemles)
    {
        return view('zwemdocenten.show', compact('zwemles'));
    }

    public function edit(Zwemles $zwemles)
    {
        return view('zwemdocenten.edit', compact('zwemles'));
    }

    public function update(StoreZwemDocentRequest $request, Zwemles $zwemles)
    {
        $zwemles->update($request->validated());

        return redirect()->route('zwemlessen.index')->with('success', 'Zwemles succesvol geupdate!');
    }
    public function destroy(Zwemles $zwemles)
    {      
        $zwemles->delete();
        return redirect()->route('zwemlessen.index')->with('success', 'Zwemles succesvol verwijderd!');
    }

    //Feedback pagina
    public function feedbackCreate()
    {
        $zwemDocenten = Zwem_Docent::all();
        $leerlingen = Leerling::all();
        return view('zwemdocenten.createFeedback', compact('zwemDocenten', 'leerlingen'));
    }

    public function storeFeedback(StoreFeedbackRequest $request)
    {
        Feedback::create(array_merge(
            $request->validated(),
            ['aanmaakdatum' => now()->toDateString()]
        )); 

        return redirect()->route('leerlingen.index')->with('success', 'Feedback succesvol aangemaakt!');
    }

    public function editFeedback(Feedback $feedback)
    {
        return view('zwemdocenten.editFeedback', compact('feedback'));
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
    public function leerlingen()
    {
        $leerlingen = Leerling::all();

        return view('zwemdocenten.leerlingen', compact('leerlingen'));
    }

    public function showLeerling(Leerling $leerling)
    {
        return view('zwemdocenten.showLeerling', compact('leerling'));
    }
    public function destroyLeerling(Leerling $leerling)
    {
        $leerling->delete();
        return redirect()->route('leerlingen.index')->with('success', 'Leerling succesvol verwijderd!');
    }
}
