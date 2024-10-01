<?php

namespace App\Http\Controllers;

use App\Models\ZwemLes;
use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\Zwem_Docent;

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

        return redirect()->route('zwemlessen.index')->with('success', 'Zwemles created successfully!');
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

        return redirect()->route('zwemlessen.index')->with('success', 'Zwemles updated successfully!');
    }
    public function destroy(ZwemLes $zwemles)
    {      
        $zwemles->delete();
        return redirect()->route('zwemlessen.index')->with('success', 'Zwemles deleted successfully!');
    }

    public function feedbackIndex()
    {
        $feedback = Feedback::all();
        return view('zwemdocenten.feedback', compact('feedback'));
    }

    public function feedbackCreate()
    {
        $zwemDocenten = Zwem_Docent::all();
        return view('zwemdocenten.createFeedback', compact('zwemDocenten')); 
    }

    public function storeFeedback(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
            // 'zwem_docent_id' => 'required|exists:zwem_docenten,zwem_docent_id',
        ]);

        Feedback::create([
            'content' => $request->content,
            'aanmaakdatum' => now(),
            // 'zwem_docent_id' => $request->zwem_docent_id,
            // 'leerling_id' => $request->leerling_id,
        ]);

        return redirect()->route('feedback.index')->with('success', 'Feedback submitted successfully!');
    }
}
