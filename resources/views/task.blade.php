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

<div class="flex flex-col items-center mt-4 mb-20">

    @foreach ($comments as $comment)

        <div
            id="comment-{{ $comment->id }}"
            class="min-w-200 mb-4 scroll-mt-20">

            <div class="grid grid-cols-4 border">

                <div class="border-r p-2 text-center">
                    #{{ $loop->iteration }}, {{ $comment->id }}
                </div>

                <div class="p-2">
                    {{ $comment->user->name }}
                </div>
                @if ($comment->replyTo)
                    <div class="border-x p-2 text-center">
                            Válasz:
                            <a
                                href="#comment-{{ $comment->replyTo->id }}"
                                class="text-blue-600 hover:underline"
                            >
                                {{ $comment->replyTo->user->name }}
                                #{{ $comment->replyTo->id }}
                            </a>
                        
                    </div>
                @endif
                <div class="p-2 text-right">
                    {{ $comment->created_at }}
                </div>

            </div>

            <div class="min-h-[12vh] border-x p-2">
                {{ $comment->content }}
            </div>


            <div class="border-x border-b p-2">

                <button
                    type="button"
                    id="reply-button-{{ $comment->id }}"
                    class="rounded bg-blue-500 px-3 py-2 text-[2vh] text-white hover:bg-blue-600"
                    onclick="toggleReplyForm({{ $comment->id }})">
                    Válasz
                </button>


                <form
                    id="reply-form-{{ $comment->id }}"
                    method="POST"
                    action="{{ route('tasks.comment.reply', [
                        'task' => $task,
                        'comment' => $comment
                    ]) }}"
                    class="hidden mt-2">
                    @csrf

                    <hr class="mb-2">

                    <textarea
                        id="reply-comment-{{ $comment->id }}"
                        name="reply_comment"
                        class="m-2 min-h-[10vh] w-[80vh] border p-3"
                        placeholder="Írd ide a válaszod..."
                    ></textarea>

                    <div class="text-center">
                        <button
                            type="submit"
                            class="rounded bg-blue-500 px-3 py-2 text-[2vh] text-white hover:bg-blue-600">
                            Elküld
                        </button>
                    </div>
                </form>

            </div>

        </div>

    @endforeach

</div>


<script>
    function toggleReplyForm(commentId) {
        const form = document.getElementById('reply-form-' + commentId);

        form.classList.toggle('hidden');
    }
</script>
@endauth
@endsection
