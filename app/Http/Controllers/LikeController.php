<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function toggleLike(Request $request)
    {
        $user = Auth::user();

        $ayatId = $request->input('ayat_id');
        $suratId = $request->input('surat_id');
        $action = $request->input('action');

        if ($action === 'like') {
            $existingLike = Like::where('user_id', $user->id)
                                ->where('idSurat', $suratId)
                                ->where('idAyat', $ayatId)
                                ->first();

            if (!$existingLike) {
                Like::create([
                    'user_id' => $user->id,
                    'idSurat' => $suratId,
                    'idAyat' => $ayatId
                ]);
            }

            return response()->json(['liked' => true]);
        }

        if ($action === 'unlike') {
            Like::where('user_id', $user->id)
                ->where('idSurat', $suratId)
                ->where('idAyat', $ayatId)
                ->delete();

            return response()->json(['liked' => false]);
        }

        return response()->json(['message' => 'Aksi tidak valid.'], 400);
    }

    public function getLikedAyat()
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json([]);
        }

        $likedAyat = Like::where('user_id', $user->id)->get(['idSurat', 'idAyat']);
        return response()->json($likedAyat);
    }
}
