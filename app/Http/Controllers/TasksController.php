<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;
use App\Models\User;
use App\Models\Comment;
class TasksController extends Controller
{
    public function CreateTask(Request $request)
    {
        $title = $request->task_title;
        $description = $request->task_description;

        $task = Task::create([
            'title' => $request->input('task_title'),
            'description' => $request->input('task_description'),
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('tasks.show', $task);
    }

    public function ShowTask(Task $task)
    {
        return view('task', [
            'task' => $task,
            'comments' => $task->comments()->with('user')->with('replyTo')->get(),
        ]);
    }

    public function ListTasks()
    {
        $tasks = Task::all();
        return view('tasks', compact('tasks'));
    }

    public function AddComment(Request $request, Task $task)
    {
        $request->validate([
            'task_comment' => 'required|string',
        ]);

        $comment = Comment::create([
            'content' => $request->input('task_comment'),
            'user_id' => Auth::id(),
            'task_id' => $task->id
        ]);

        return redirect()->route('tasks.show', $task);
    }

    public function ReplyToComment(Request $request, Task $task, Comment $comment)
    {
        $request->validate([
            'reply_comment' => 'required|string',
        ]);

        $reply = Comment::create([
            'content' => $request->input('reply_comment'),
            'user_id' => Auth::id(),
            'task_id' => $task->id,
            'reply_to' => $comment->id
        ]);

        return redirect()->route('tasks.show', $task);
    }

    public function DeleteComment(Task $task, Comment $comment)
    {
        // Check if the authenticated user is the owner of the comment
        if (Auth::id() === $comment->user_id) {
            $comment->delete();
        }

        return redirect()->route('tasks.show', $task);
    }
}
