<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;


/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::group(['middleware' => 'auth:sanctum'], function(){
    Route::apiResource('requests', TicketController::class)->parameters(['requests' => 'id']);
});

Route::post("login",[UserController::class,'index']);
