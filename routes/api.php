<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\api\MeetingController;
use App\Http\Controllers\api\VoteController;
use App\Http\Controllers\api\AgendaItemController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/meetings', [MeetingController::class, 'index']);
    Route::get('/meetings/{id}', [MeetingController::class, 'show']);
    Route::post('/votes', [VoteController::class, 'castVote']);
    Route::get('/agenda-items', [AgendaItemController::class, 'index']);

    // Admin funkciók
    Route::middleware('admin')->group(function () {
        Route::put('/agenda-items/{id}/status', [MeetingController::class, 'updateStatus']);
        Route::post('/meetings', [MeetingController::class, 'store']);
        Route::post('/agenda-items', [AgendaItemController::class, 'store']);
        Route::put('/agenda-items/{agendaItem}', [AgendaItemController::class, 'update']);
        Route::delete('/agenda-items/{agendaItem}', [AgendaItemController::class, 'destroy']);
    });
});