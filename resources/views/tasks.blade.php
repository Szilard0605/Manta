
@extends('layouts.app')
@section('title', 'Home Page')
@section('content')

@auth
    <div class="flex justify-center flex-col items-center">
        <form method="POST" action="/logout" class="inline">
            @csrf
            <button type="submit" class="btn btn-ghost btn-sm">Logout</button>
        </form>
        
        <div class="border p-4 m-2">    
        <table class="border m-0">
        <thead>
            <th class="p-1 border">Létrehozó</th>
            <th class="p-1 border">Feladat címe</th>
            <th class="p-1 border">Létrehozva</th>
            <th class="p-1 border">Utolsó módosítás</th>
        </thead>
        @foreach ($tasks as $task)
        <tr class="border m-2">
            <td class="p-1 border">
                {{ $task->user->name }}
            </td>
            <td class="p-1 border">   
                {{ $task->title }}
            </td>
            <td class="p-1 border">
                {{ $task->created_at }}
            </td>
            <td class="p-1 border">
                {{ $task->updated_at }}
            </td>
            <td class="p-1 boder">
                <a href="{{ route('tasks.show', $task) }}">
                    Megtekint
                </a>
            </td>
        </tr>
        @endforeach
        </table>
        </div>
    </div>
@endauth

@guest
    <div class="flex justify-center flex-col items-center">
        <h1>You're not logged in!</h1>
        <form method="GET" action="/login" class="inline">
            @csrf
            <button type="submit" class="btn btn-ghost btn-sm">Login</button>
        </form>
        <p>To access the content of this page, please log in first.</p>
    </div>
@endguest

@endsection