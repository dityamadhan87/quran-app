<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratController;

Route::get('/', function () {
    return view('homepage');
})->name('homepage');

Route::get('/quran', [SuratController::class, 'index'])->name('quran.page');

Route::get('/quran/{idSurat}', [SuratController::class, 'show'])->name('surat_quran.page');

// Route::get('/register', function () {
//     return view('register');
// })->name('register.page');

// Route::get('/login', function () {
//     return view('login');
// })->name('login.page');

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';