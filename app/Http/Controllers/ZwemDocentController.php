<?php

namespace App\Http\Controllers;

use App\Models\ZwemLes;
use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\Zwem_Docent;
use App\Models\Leerling;

class ZwemDocentController extends Controller
{

    public function index()
    {
        $zwemlessen = ZwemLes::all();

        return view('zwemdocenten.index', compact('zwemlessen'));
    }

    public function create()
    {
        return view('zwemdocenten.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'naam' => 'required|string|max:255',
            'beschrijving' => 'required|string',
            'duurtijd' => 'required|integer',
            'tijdstip' => 'required|date_format:Y-m-d\TH:i',
        ]);

        ZwemLes::create([
            'naam' => $request->naam,
            'beschrijving' => $request->beschrijving,
            'duurtijd' => $request->duurtijd,
            'tijdstip' => $request->tijdstip,
        ]);

        return redirect()->route('zwemlessen.index')->with('success', 'Zwemles succesvol aangemaakt!');
    }

    public function show(ZwemLes $zwemles)
    {
        return view('zwemdocenten.show', compact('zwemles'));
    }

    public function edit(ZwemLes $zwemles)
    {
        return view('zwemdocenten.edit', compact('zwemles'));
    }

    public function update(Request $request, ZwemLes $zwemles)
    {
        $request->validate([
            'naam' => 'required|string|max:255',
            'beschrijving' => 'required|string',
            'duurtijd' => 'required|integer',
            'tijdstip' => 'required|date_format:Y-m-d\TH:i',
        ]);

        $zwemles->update([
            'naam' => $request->naam,
            'beschrijving' => $request->beschrijving,
            'duurtijd' => $request->duurtijd,
            'tijdstip' => $request->tijdstip,
        ]);

        return redirect()->route('zwemlessen.index')->with('success', 'Zwemles succesvol geupdate!');
    }
    public function destroy(ZwemLes $zwemles)
    {
        $zwemles->delete();
        return redirect()->route('zwemlessen.index')->with('success', 'Zwemles succesvol verwijderd!');
    }

    //Feedback pagina
    public function editFeedback(Feedback $feedback)
    {
        return view('zwemdocenten.editFeedback', compact('feedback'));
    }

    public function updateFeedback(Request $request, Feedback $feedback)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $feedback->update([
            'content' => $request->content,
        ]);

        return redirect()->route('leerlingen.index')->with('success', 'Feedback succesvol geupdate!');
    }

    public function destroyFeedback(Feedback $feedback)
    {
        $feedback->delete();
        return redirect()->route('leerlingen.index')->with('success', 'Feedback succesvol verwijderd!');
    }


    public function feedbackCreate()
    {
        $zwemDocenten = Zwem_Docent::all();
        $leerlingen = Leerling::all();
        return view('zwemdocenten.createFeedback', compact('zwemDocenten', 'leerlingen'));
    }

    public function storeFeedback(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
            'leerling_id' => 'required|exists:leerlingen,leerling_id',
        ]);

        Feedback::create([
            'content' => $request->content,
            'aanmaakdatum' => now(),
            // 'zwem_docent_id' => $request->zwem_docent_id,
            'leerling_id' => $request->leerling_id,
        ]);

        return redirect()->route('leerlingen.index')->with('success', 'Feedback succesvol aangemaakt!');
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
