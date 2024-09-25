<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ZwemDocentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/zwemlessen', [ZwemDocentController::class, 'index'])->name('zwemlessen.index');
Route::get('/zwemlessen/create', [ZwemDocentController::class, 'create'])->name('zwemlessen.create');
Route::post('/zwemlessen', [ZwemDocentController::class, 'store'])->name('zwemlessen.store');
Route::get('/zwemlessen/{zwemles}', [ZwemDocentController::class, 'show'])->name('zwemlessen.show');
Route::get('/zwemlessen/{zwemles}/edit', [ZwemDocentController::class, 'edit'])->name('zwemlessen.edit');
Route::put('/zwemlessen/{zwemles}', [ZwemDocentController::class, 'update'])->name('zwemlessen.update');
Route::delete('/zwemlessen/{zwemles}', [ZwemDocentController::class, 'destroy'])->name('zwemlessen.destroy');

require __DIR__ . '/auth.php';
