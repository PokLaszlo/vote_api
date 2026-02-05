<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\AgendaItemController;
use App\Http\Controllers\api\MeetingController;
use App\Http\Controllers\api\ResolutionController;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\api\VoteController;
use App\Http\Controllers\api\AuthenticationController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [AuthenticationController::class, 'register']);
Route::post('/login', [AuthenticationController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthenticationController::class, 'logout']);
    Route::get('/me', fn () => auth()->user());

    /*Meetings (Közgyűlések)*/

    Route::get('/meetings', [MeetingController::class, 'index']);
    Route::post('/meetings', [MeetingController::class, 'store']);
    Route::get('/meetings/{meeting}', [MeetingController::class, 'show']);
    Route::put('/meetings/{meeting}', [MeetingController::class, 'update']);
    Route::delete('/meetings/{meeting}', [MeetingController::class, 'destroy']);

    // Jegyzőkönyv
    Route::get('/meetings/{meeting}/report', [MeetingController::class, 'report']);
    Route::get('/meetings/{meeting}/pdf', [MeetingController::class, 'pdf']);

    /* Agenda Items (Napirendi pontok) */
    Route::post('/agenda-items', [AgendaItemController::class, 'store']);
    Route::put('/agenda-items/{agendaItem}', [AgendaItemController::class, 'update']);
    Route::delete('/agenda-items/{agendaItem}', [AgendaItemController::class, 'destroy']);

    //Resolutions (Határozatok)
    
    Route::get('/resolutions', [ResolutionController::class, 'index']);
    Route::post('/resolutions', [ResolutionController::class, 'store']);
    Route::get('/resolutions/{resolution}', [ResolutionController::class, 'show']);
    Route::put('/resolutions/{resolution}', [ResolutionController::class, 'update']);
    Route::delete('/resolutions/{resolution}', [ResolutionController::class, 'destroy']);

    //Voting (Szavazás)
    Route::post('/resolutions/{resolution}/vote',[VoteController::class, 'store']);

    //Users (Felhasználók)
    Route::get('/users', [UserController::class, 'index']);
    Route::post('/users', [UserController::class, 'store']);
    Route::get('/users/{user}', [UserController::class, 'show']);
    Route::put('/users/{user}', [UserController::class, 'update']);
    Route::delete('/users/{user}', [UserController::class, 'destroy']);
});
