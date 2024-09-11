<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;

Route::redirect('/', '/login');
Route::get('/tasks', function () {
    if (Auth::check()) {
        return "You're logged as " . Auth::user()->email;
    } else {
        return 'You\'re not logged in';
    }
});
Route::view('/login', 'page.login');
Route::post('/login', LoginController::class);
