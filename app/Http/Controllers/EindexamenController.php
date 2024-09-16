<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Eindexamen;

class EindexamenController extends Controller
{
    public function index()
    {
        $eindexamen = Eindexamen::all();
        return response()->json($eindexamen);
    }

    public function create() {}

    public function store(Request $request)
    {
        $validated = $request->validate([
            'examen_naam' => 'required|string|max:255',
            'beschrijving' => 'required|string',
            'duur' => 'required|integer',
            'tijdstip' => 'required|date',
        ]);

        $eindexamen = Eindexamen::create($validated);

        return response()->json($eindexamen, 201);
    }

    public function destroy($id)
    {
        $eindexamen = Eindexamen::findOrFail($id);
        $eindexamen->delete();

        return response()->json(null, 204);
    }
}
