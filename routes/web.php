<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SlikController; 

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
   });
   //add the following lines
   Route::get('sliks', [SlikController::class, 'index']);
   Route::post('slik', [SlikController::class, 'store']);
   Route::post('slik/delete', [SlikController::class, 'delete']);
   Route::post('slik/complete', [SlikController::class, 'complete']);