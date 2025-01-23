<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratController;

Route::get('/', function () {
    return view('homepage');
})->name('homepage.page');

Route::get('/quran', [SuratController::class, 'index'])->name('quran.page');

Route::get('/quran/{idSurat}', [SuratController::class, 'show'])->name('surat_quran.page');

Route::get('/register', function () {
    return view('register');
})->name('register.page');

Route::get('/login', function () {
    return view('login');
})->name('login.page');