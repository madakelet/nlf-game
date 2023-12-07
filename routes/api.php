<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FormController;
use App\Http\Controllers\Api\MatchController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\WeekController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->get('/authenticate', function () {
    return true;
});

Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout']);

Route::get('/forms', [FormController::class, 'index']);

Route::get('/matches', [MatchController::class, 'index']);

Route::get('/weeks', [WeekController::class, 'index']);