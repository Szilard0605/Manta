<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;

Route::get('/', [TasksController::class, 'ListUsersTasks'] );

Route::get('/newtask', function () {
    return view('newtask');
});
