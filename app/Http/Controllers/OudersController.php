<?php

namespace App\Http\Controllers;

use App\Models\Leerling;
use App\Models\Ouder;
use Illuminate\Http\Request;

class OudersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Haal de huidige ingelogde ouder op
        $ouder = Ouder::where('user_id', auth()->id())->first();

        // Haal alle leerlingen op die bij deze ouder horen, inclusief hun groep
        $leerlingen = Leerling::with(['groep', 'feedback.zwemDocent'])->where('ouder_id', $ouder->ouder_id)->get();

        // dd($leerlingen); 

        return view('ouders.index', compact(['leerlingen', 'ouder']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ouders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Ouder $ouder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ouder $ouder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ouder $ouder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ouder $ouder)
    {
        //
    }
}
