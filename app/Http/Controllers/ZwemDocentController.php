<?php

namespace App\Http\Controllers;

use App\Models\ZwemLes;
use Illuminate\Http\Request;

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
            'tijdstip' => 'required|date_format:H:i',
        ]);

        ZwemLes::create([
            'naam' => $request->naam,
            'beschrijving' => $request->beschrijving,
            'duurtijd' => $request->duurtijd,
            'tijdstip' => $request->tijdstip,
        ]);

        return redirect()->route('zwemdoce.index')->with('success', 'Zwemles created successfully!');
    }

    public function show(ZwemLes $zwemles)
    {
        return view('zwemdoce.show', compact('zwemles'));
    }

    public function edit(ZwemLes $zwemles)
    {
        return view('zwemdoce.edit', compact('zwemles'));
    }

    public function update(Request $request, ZwemLes $zwemles)
    {
        $request->validate([
            'naam' => 'required|string|max:255',
            'beschrijving' => 'required|string',
            'duurtijd' => 'required|integer',
            'tijdstip' => 'required|date_format:H:i',
        ]);

        $zwemles->update([
            'naam' => $request->naam,
            'beschrijving' => $request->beschrijving,
            'duurtijd' => $request->duurtijd,
            'tijdstip' => $request->tijdstip,
        ]);

        return redirect()->route('zwemdoce.index')->with('success', 'Zwemles updated successfully!');
    }
    public function destroy(ZwemLes $zwemles)
    {      
        $zwemles->delete();
        return redirect()->route('zwemdoce.index')->with('success', 'Zwemles deleted successfully!');
    }
}
