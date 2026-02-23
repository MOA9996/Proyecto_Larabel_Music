<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Album;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function store(Request $request, $albumId)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $request->validate([
            'score' => 'required|integer|min:1|max:5',
        ]);

        $userId = auth()->id();

        $rating = Rating::where('user_id', $userId)
            ->where('album_id', $albumId)
            ->first();

        if ($rating) {
            $rating->update(['score' => $request->score]);
        } else {
            Rating::create([
                'user_id' => $userId,
                'album_id' => $albumId,
                'score'   => $request->score,
            ]);
        }

        $album = Album::findOrFail($albumId);
        $album->updateAverageRating();

        return redirect()->route('albums.show', $albumId)
            ->with('success', 'Valoración guardada correctamente.');
    }
}
