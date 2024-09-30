<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\OudersController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/ouder', [OudersController::class, 'index'])->name('ouders.index');
});

Route::middleware(['auth', 'role:ouder'])->group(function () {
    
});


// Route::get('/index', function () {
//     return view('index');
// });


require __DIR__ . '/auth.php';
