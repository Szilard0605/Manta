@extends('layouts.app')
@section('title', 'Feladat')

@section('content')
@auth
<div class="flex justify-center items-center flex-col mb-2 text-[4vh]">
    <h1>{{$task->title}}<h1>
</div>
<div class="flex justify-center items-center text-[2.5vh]">
    <table class="border min-w-200">
        <tr class="border">
            <td class="border p-2 text-center">{{$task->id}}</td>
            <td class="p-2">{{$task->user->name}}</td>
            <td class="p-2 text-right">{{$task->created_at}}</td>
        </tr>
        <tr class="border">
            <td colspan="3" class="border h-50 align-top p-2">
                {{$task->description}}
            </td>
        </tr>
    </table>
    
</div>
@endauth
@endsection
