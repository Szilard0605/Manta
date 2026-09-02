@extends('layouts.app')
@section('title', $task->title)

@section('content')
@auth
<div class="flex justify-center items-center flex-col mb-2 text-[4vh]">
    <h1>{{$task->title}}</h1>
</div>
<div class="flex justify-center items-center text-[2.5vh] mb-4">
    <table class="border min-w-250">
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

<div class="flex justify-center items-center flex-col mb-3 mt-2 text-[2.5vh] text-center">
    <form method="POST" action="{{ route('tasks.comment', $task) }}">
        <textarea id="task_comment" name="task_comment" class="p-3 w-[80vh] min-h-[25vh] m-2 border border-default-medium"></textarea>
        <br>
        <button type="submit" class="bg-blue-500 text-white p-2 rounded">Elküld</button>
    </form>
</div>

<hr>

<div class="flex justify-center items-center text-[2.5vh] mb-4 mt-4 flex-col">
    @foreach ($comments as $comment)
    <table class="border min-w-200">
        <tr class="border">
            <td class="p-2 text-center border">#{{ $loop->iteration }}</td>
            <td class="p-2">{{ $comment->user->name }}</td>
            <td class="p-2 text-right">{{ $comment->created_at }}</td>
        </tr>
        <tr class="border">
            <td colspan="3" class="border h-50 align-top p-2">
                {{ $comment->content }}
            </td>
        </tr>
        <tr>
            <td colspan="3" class="p-2">
            <button type="button" class="bg-blue-500 text-white p-2 rounded" onclick="document.getElementById('reply-form-{{ $comment->id }}').style.display = 'block';">Válasz</button>
            <form id="reply-form-{{ $comment->id }}" method="POST" action="{{ route('tasks.comment.reply', ['task' => $task, 'comment' => $comment]) }}" style="display: none;">
                @csrf
                <textarea id="reply_comment" name="reply_comment" class="p-3 w-[80vh] min-h-[10vh] m-2 border border-default-medium"></textarea>
                <br>
                <button type="submit" class="bg-blue-500 text-white p-2 rounded">Válasz</button>
            </form>
            </td>
        </tr>
    </table>
    @endforeach
</div>
@endauth
@endsection
