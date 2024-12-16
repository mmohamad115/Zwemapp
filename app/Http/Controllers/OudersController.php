<?php

namespace App\Http\Controllers;

use App\Models\Leerling;
use App\Models\Ouder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OudersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        if ($user->role !== 'ouder') {
            Auth::logout();
            return redirect()->route('login')->with('error', 'Access denied.');
        }

        $ouder = Ouder::where('user_id', $user->id)->first();

        $leerlingen = Leerling::with(['groep', 'feedback.zwemDocent'])->where('ouder_id', $ouder->ouder_id)->get();

        return view('ouders.index', compact(['leerlingen', 'ouder']));
    }
}
