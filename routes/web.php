<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\OudersController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ZwemDocentController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/login', function () {
    return view('login');
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
Route::get('/leerlingen', [ZwemDocentController::class, 'leerlingen'])->name('leerlingen.index');
// Route::get('/zwemdocenten/leerlingen', [ZwemDocentController::class, 'leerlingen'])->name('zwemdocenten.leerlingen');
Route::get('/leerlingen/{leerling}', [ZwemDocentController::class, 'showLeerling'])->name('leerlingen.show');
Route::delete('/leerlingen/{leerling}', [ZwemDocentController::class, 'destroyLeerling'])->name('leerlingen.destroy');

Route::post('/feedback', [ZwemDocentController::class, 'storeFeedback'])->name('feedback.store');
Route::get('/feedback/create', [ZwemDocentController::class, 'feedbackCreate'])->name('feedback.create');
Route::put('/feedback/{feedback}', [ZwemDocentController::class, 'updateFeedback'])->name('feedback.update');
Route::delete('/feedback/{feedback}', [ZwemDocentController::class, 'destroyFeedback'])->name('feedback.destroy');

Route::get('/feedback/{feedback}/edit', [ZwemDocentController::class, 'editFeedback'])->name('feedback.edit');

Route::put('/leerlingen/{leerling}', [ZwemDocentController::class, 'updateLeerling'])->name('leerlingen.update');

require __DIR__ . '/auth.php';
