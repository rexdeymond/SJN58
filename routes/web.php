<?php

use App\Models\Member;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('office');
});

Route::get('/office', function () {
    return view('office', [ 'member' => Member all('sj24000001')]);
});

Route::get('/login',[LoginController::class, 'message']);
Route::post('/act/login', [LoginController::class, 'message']);


