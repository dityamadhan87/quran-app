<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Bookmark;
use App\Models\BookmarkAyat;

class BookmarkController extends Controller
{
    public function simpanBookmark(Request $request){
        $user = Auth::user();

        $judulBookmark = $request->nama_koleksi;

        $bookmark = Bookmark::create([
            'user_id' => $user->id,
            'koleksi_id' => null,
            'nama_koleksi' => $judulBookmark
        ]);

        // Pastikan koleksi_id yang dikembalikan berasal dari objek yang baru saja dibuat
        return response()->json([
            'message' => 'Bookmark berhasil ditambahkan',
            'data' => [
                'koleksi_id' => $bookmark->koleksi_id,
                'judulBookmark' => $bookmark->nama_koleksi
            ]
        ]);
    }

    public function simpanAyatBookmark(Request $request){
        $user = Auth::user();

        $idAyat = $request->idAyat;
        $idSurat = $request->idSurat;
        $koleksi = $request->koleksi_id;

        foreach ($koleksi as $koleksi_id) {
            BookmarkAyat::create([
                'user_id' => $user->id,
                'koleksi_id' => $koleksi_id,
                'idAyat' => $idAyat,
                'idSurat' => $idSurat
            ]);
        }

        return response()->json([
            'message' => 'Ayat berhasil ditambahkan ke koleksi',
        ]);
    }

    public function getAyatBookmark(Request $request){
        $user = Auth::user();

        $idAyat = $request->idAyat;
        $idSurat = $request->idSurat;

        if (!$user) {
            return response()->json([]);
        }

        $bookmarkAyat = BookmarkAyat::where('idAyat', $idAyat)
            ->where('idSurat', $idSurat)
            ->where('user_id', $user->id)
            ->get(['koleksi_id']);

        return response()->json(['data' => $bookmarkAyat]);
    }

    public function getListBookmark(){
        $user = Auth::user();

        if (!$user) {
            return response()->json([]);
        }

        $listBookmark = Bookmark::where('user_id', $user->id)->get(['koleksi_id', 'nama_koleksi']);
        return response()->json(['data' => $listBookmark]);
    }
}
