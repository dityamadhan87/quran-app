<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\Ayat;

class SuratController extends Controller
{
    public function index()
    {
        $surats = Surat::all();
        return view('quran', compact('surats'));
    }

    public function show($idSurat){
        $surats = Surat::all();
        $ayat = Ayat::where('idSurat', $idSurat)->get();
        return view('surat_quran', compact('surats', 'ayat', 'idSurat'));
    }
}