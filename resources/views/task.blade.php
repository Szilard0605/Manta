@extends('layouts.app')
@section('title', 'Home Page')
@section('content')

@auth
    <div class="mt-10">
    <h1>Létrehozó: {{$task->user->name}}</h1>
    <h1>{{$task->title}}</h1>
    <h1>{{$task->description}}</h1>
    <h1>{{$task->user_id}}</h1>  
    </div>
@endauth