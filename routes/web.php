<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;

Route::get('/', [TasksController::class, 'ListTasks'] );

Route::get('/create_task', function () 
{
        return view('create_task');
})->middleware('auth');

Route::post('/create_task', [TasksController::class, "CreateTask"])->middleware('auth');;

Route::get('/task/{task}', [TasksController::class, "ShowTask"])->name('tasks.show')->middleware('auth');;

Route::view('/login', 'login')
    ->middleware('guest')
    ->name('login');

Route::post('/login', LoginController::class)
    ->middleware('guest');

Route::post('/logout', LogoutController::class)
    ->middleware('auth')
    ->name('logout');