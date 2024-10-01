<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\OudersController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ZwemDocentController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/', function () {
    return view('index');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/ouder', [OudersController::class, 'index'])->name('ouders.index');
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});


Route::middleware(['auth', 'role:ouder'])->group(function () {});

Route::middleware(['auth', 'role:ouder'])->group(function () {
    // Add any additional routes for 'ouder' role here
});


Route::get('/zwemlessen', [ZwemDocentController::class, 'index'])->name('zwemlessen.index');
Route::get('/zwemlessen/create', [ZwemDocentController::class, 'create'])->name('zwemlessen.create');
Route::post('/zwemlessen', [ZwemDocentController::class, 'store'])->name('zwemlessen.store');
Route::get('/zwemlessen/{zwemles}', [ZwemDocentController::class, 'show'])->name('zwemlessen.show');
Route::get('/zwemlessen/{zwemles}/edit', [ZwemDocentController::class, 'edit'])->name('zwemlessen.edit');
Route::put('/zwemlessen/{zwemles}', [ZwemDocentController::class, 'update'])->name('zwemlessen.update');
Route::delete('/zwemlessen/{zwemles}', [ZwemDocentController::class, 'destroy'])->name('zwemlessen.destroy');

// Route::get('/index', function () {
//     return view('index');
// });


Route::get('/feedback', [ZwemDocentController::class, 'feedbackIndex'])->name('feedback.index');
Route::get('/feedback/create', [ZwemDocentController::class, 'feedbackCreate'])->name('feedback.create');
Route::post('/feedback', [ZwemDocentController::class, 'storeFeedback'])->name('feedback.store');

Route::get('/feedback/{feedback}', [ZwemDocentController::class, 'showFeedback'])->name('feedback.show');
Route::get('/feedback/{feedback}/edit', [ZwemDocentController::class, 'editFeedback'])->name('feedback.edit');
Route::delete('/feedback/{feedback}', [ZwemDocentController::class, 'destroyFeedback'])->name('feedback.destroy');

require __DIR__ . '/auth.php';
