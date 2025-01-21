<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratController;

Route::get('/', function () {
    return view('homepage');
})->name('homepage.page');

Route::get('/quran', [SuratController::class, 'index'])->name('quran.page');

Route::get('/quran/{idSurat}', [SuratController::class, 'show'])->name('quran.show.page');