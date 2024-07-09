<?php

use App\Http\Controllers\LoginController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('office');
});

Route::get('/office', function () {
    return view('office');
});

Route::get('/login',[LoginController::class, 'message']);
Route::post('/act/login', [LoginController::class, 'message']);


