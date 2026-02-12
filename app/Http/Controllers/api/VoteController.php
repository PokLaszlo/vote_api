<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Vote;

class VoteController extends Controller
{
    public function castVote(Request $request) {
    $validated = $request->validate([
        'resolution_id' => 'required|exists:resolutions,id',
        'vote' => 'required|in:yes,no,abstain'
    ]);

    $existingVote = Vote::where('user_id', Auth::id())
            ->where('resolution_id', $request->resolution_id)
            ->first();

        if ($existingVote) {
            return response()->json(['message' => 'Már szavazott ezen a ponton!'], 403);
        }

    $vote = Vote::updateOrCreate(
        ['user_id' => auth()->id(), 'resolution_id' => $validated['resolution_id']],
        ['vote' => $validated['vote']]
    );

    return response()->json(['message' => 'Sikeres szavazat!', 'vote' => $vote]);
}
}