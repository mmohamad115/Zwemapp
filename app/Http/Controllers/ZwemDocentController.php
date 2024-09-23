<?php

namespace App\Http\Controllers;


use App\Models\Zwem_Docent;
use Illuminate\Http\Request;

class ZwemDocentController extends Controller
{
    public function index()
    {
        $zwemDocenten = Zwem_Docent::all();
        return view('zwemdocenten.index', compact('zwemDocenten'));
    }
 
    public function create()
    {
        return view('zwemdocenten.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'voornaam' => 'required|string|max:255',
            'achternaam' => 'required|string|max:255',
            'email' => 'required|email|unique:zwem_docenten,email',
            'wachtwoord' => 'required|string|min:6'
        ]);

        Zwem_Docent::create([
            'voornaam' => $request->voornaam,
            'achternaam' => $request->achternaam,
            'email' => $request->email,
            'wachtwoord' => bcrypt($request->wachtwoord),
        ]);

        return redirect()->route('zwemdocenten.index')->with('success', 'Zwemdocent created successfully!');
    }

    public function show(Zwem_Docent $zwemDocent)
    {
        return view('zwemdocenten.show', compact('zwemDocent'));
    }

    public function edit(Zwem_Docent $zwemDocent)
    {
        return view('zwemdocenten.edit', compact('zwemDocent'));
    }

    public function update(Request $request, Zwem_Docent $zwemDocent)
    {
        $request->validate([
            'voornaam' => 'required|string|max:255',
            'achternaam' => 'required|string|max:255',
            'email' => 'required|email|unique:zwem_docenten,email,' . $zwemDocent->id,
            'wachtwoord' => 'nullable|string|min:6'
        ]);

        $zwemDocent->update([
            'voornaam' => $request->voornaam,
            'achternaam' => $request->achternaam,
            'email' => $request->email,
            'wachtwoord' => $request->wachtwoord ? bcrypt($request->wachtwoord) : $zwemDocent->wachtwoord,
        ]);

        return redirect()->route('zwemdocenten.index')->with('success', 'Zwemdocent updated successfully!');
    }

    public function destroy(Zwem_Docent $zwemDocent)
    {
        $zwemDocent->delete();
        return redirect()->route('zwemdocenten.index')->with('success', 'Zwemdocent deleted successfully!');
    }
}
