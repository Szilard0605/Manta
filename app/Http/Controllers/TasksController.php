<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;

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

        return redirect('/task/' . $task->id);
    }

    public function ShowTask(Task $task)
    {
        return view('task', [
            'task' => $task
        ]);
    }

    public function ListTasks()
    {
        $tasks = Task::all();
        return view('tasks', compact('tasks'));
    }
}
