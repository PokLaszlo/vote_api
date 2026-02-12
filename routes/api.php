<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\api\MeetingController;
use App\Http\Controllers\api\VoteController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/meetings', [MeetingController::class, 'index']);
    Route::get('/meetings/{id}', [MeetingController::class, 'show']);
    Route::post('/votes', [VoteController::class, 'castVote']);
    
    // Admin funkciók
    Route::middleware('admin')->group(function () {
        Route::patch('/agenda-items/{id}/status', [MeetingController::class, 'updateStatus']);
        Route::post('/meetings', [MeetingController::class, 'store']);
    });
});