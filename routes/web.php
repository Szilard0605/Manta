<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\GroupsController;


// index
Route::get('/', [TasksController::class, 'ListTasks'] );


// Authentication
Route::view('/login', 'login')
    ->middleware('guest')
    ->name('login');

Route::post('/login', LoginController::class)
    ->middleware('guest');

Route::post('/logout', LogoutController::class)
    ->middleware('auth')
    ->name('logout');

Route::get('/create_task', function () 
{
        return view('create_task');
})->middleware('auth');

// task creation and management routes
Route::post('/create_task', [TasksController::class, "CreateTask"])->middleware('auth');;
Route::get('/task/{task}', [TasksController::class, "ShowTask"])->name('tasks.show')->middleware('auth');
Route::post('/task/{task}/comment', [TasksController::class, "AddComment"])->name('tasks.comment')->middleware('auth');
Route::post('/task/{task}/comment/{comment}/reply', [TasksController::class, "ReplyToComment"])->name('tasks.comment.reply')->middleware('auth');
Route::post('/task/{task}/comment/{comment}/delete', [TasksController::class, "DeleteComment"])->name('tasks.comment.delete')->middleware('auth');

// group management routes
Route::get('/groups', [GroupsController::class, 'ListGroups'])->middleware('auth')->name('groups');
Route::post('/groups/create', [GroupsController::class, 'CreateGroup'])->middleware('auth')->name('groups.create');
Route::delete('/groups/{group}', [GroupsController::class, 'DeleteGroup'])->middleware('auth')->name('groups.delete');
Route::get('/groups/{group}/edit', [GroupsController::class, 'EditGroup'])->middleware('auth')->name('groups.edit');