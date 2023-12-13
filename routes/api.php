<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FormController;
use App\Http\Controllers\Api\MatchController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\WeekController;
use App\Http\Controllers\Api\InvitationController;
use App\Http\Controllers\Api\QuestionTypeController;
use App\Http\Controllers\Api\TeamController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->get('/authenticate', function () {
    return true;
});

Route::middleware('is_admin')->get('/authenticate-admin', function () {
    return true;
});

Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout']);

Route::get('/forms', [FormController::class, 'index']);
Route::get('/form', [FormController::class, 'show']);
Route::post('/form', [FormController::class, 'create']);

Route::get('/matches', [MatchController::class, 'index']);

Route::get('/weeks', [WeekController::class, 'index']);

Route::get('/is-admin', [UserController::class, 'isAdmin']);
Route::post('/register', [UserController::class, 'register']);

Route::post('/invitation', [InvitationController::class, 'create']);

Route::get('/teams', [TeamController::class, 'index']);

Route::get('/question-types', [QuestionTypeController::class, 'index']);