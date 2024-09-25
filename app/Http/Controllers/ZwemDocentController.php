<?php

namespace App\Http\Controllers;

use App\Models\Zwemles;
use Illuminate\Http\Request;

class ZwemDocentController extends Controller
{

    public function index()
    {
        $zwemlessen = ZwemLes::all();
        return view('zwemlessen.index', compact('zwemlessen'));
    }

    public function create()
    {
        return view('zwemlessen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'naam' => 'required|string|max:255',
            'beschrijving' => 'required|string',
            'duurtijd' => 'required|integer',
            'tijdstip' => 'required|date_format:H:i',
        ]);

        $zwemles = ZwemLes::create([
            'naam' => $request->naam,
            'beschrijving' => $request->beschrijving,
            'duurtijd' => $request->duurtijd,
            'tijdstip' => $request->tijdstip,
        ]);

        return redirect()->route('zwemlessen.index')->with('success', 'Zwemles created successfully!');
    }

    public function show(Zwemles $zwemles)
    {
        return view('zwemlessen.show', compact('zwemles'));
    }

    public function edit(Zwemles $zwemles)
    {
        return view('zwemlessen.edit', compact('zwemles'));
    }

    public function update(Request $request, Zwemles $zwemles)
    {
        $request->validate([
            'naam' => 'required|string|max:255',
            'beschrijving' => 'required|string',
            'duurtijd' => 'required|integer',
            'tijdstip' => 'required|date_format:H:i',
        ]);

        $zwemles->update($request->validated());

        return redirect()->route('zwemlessen.index')->with('success', 'Zwemles updated successfully!');
    }

    public function destroy(Zwemles $zwemles)
    {
        $zwemles->delete();
        return redirect()->route('zwemlessen.index')->with('success', 'Zwemles deleted successfully!');
    }
}
