<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/{any}', function () {
    return view('app');
})->where('any', '^(?!api\/)[\/\w\.\,-]*');

Auth::routes();