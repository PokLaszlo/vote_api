<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\AgendaItemController;
use App\Http\Controllers\api\MeetingController;
use App\Http\Controllers\api\ResolutionController;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\api\VoteController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

// LOGIN ÚTVONAL
Route::post('/login', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        return response()->json(['message' => 'Hibás belépési adatok.'], 401);
    }

    return response()->json([
        'token' => $user->createToken('api-token')->plainTextToken,
        'user' => $user->load('role')
    ]);
});

// VÉDETT ÚTVONALAK
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user()->load('role');
    });

    Route::apiResource('meetings', MeetingController::class);
    Route::apiResource('agenda-items', AgendaItemController::class)->except(['index','show']);
    Route::apiResource('resolutions', ResolutionController::class)->only(['store','show', 'update']);

    Route::post('/resolutions/{resolution}/vote', [VoteController::class, 'store']);
    Route::get('/resolutions/{resolution}/result', [VoteController::class, 'result']);

    Route::apiResource('users', UserController::class)->only(['index','show']);
    Route::get('/meetings/{meeting}/report', [MeetingController::class, 'report']);
});