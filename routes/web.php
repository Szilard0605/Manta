<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;

Route::get('/', [TasksController::class, 'ListUsersTasks'] );

Route::get('/newtask', function () 
{
    if(Auth::check())
    {
        return view('newtask');
    }
    else
    {
        return redirect('/login');
    }
});

Route::view('/login', 'login')
    ->middleware('guest')
    ->name('login');

Route::post('/login', LoginController::class)
    ->middleware('guest');

Route::post('/logout', LogoutController::class)
    ->middleware('auth')
    ->name('logout');