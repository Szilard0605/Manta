
@extends('layouts.app')
@section('title', 'Feladatok')
@section('content')

@auth
    <div class="flex justify-center flex-col items-center">

        @if(count($tasks) === 0)
            <h1>Nincs megjeleníthető feladat.</h1>
        @else
        <div class="p-4 m-2">    
        <table class="min-w-300">
        <thead>
            <th class="p-1 border">Létrehozó</th>
            <th class="p-1 border">Feladat címe</th>
            <th class="p-1 border">Létrehozva</th>
            <th class="p-1 border">Utolsó módosítás</th>
        </thead>
        @foreach ($tasks as $task)
        <tr class="border m-2">
            <td class="p-1 border text-center">
                {{ $task->user->name }}
            </td>
            <td class="p-1 boder text-[#0000EE] ">
                <a href="{{ route('tasks.show', $task) }}">   
                    {{ $task->title }}
                </a>
            </td>
            <td class="p-1 border text-center">
                {{ $task->created_at }}
            </td>
            <td class="p-1 border text-center">
                {{ $task->updated_at }}
            </td>
        </tr>
        @endforeach
        </table>
        @endif
        </div>
    </div>
@endauth

@endsection