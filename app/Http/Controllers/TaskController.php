<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function index()
    {

        $tasks = Task::where('assigned_to', Auth::id())->get();
        return response()->json($tasks);
    }

    public function store(Request $request)
    {
      
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'description' => 'nullable|string',
            'completed' => 'boolean',
            'assigned_to' => 'nullable|exists:users,id' 
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $task = new Task([
            'title' => $request->title,
            'description' => $request->description,
            'completed' => $request->completed ?? false,
            'user_id' => Auth::id(),
            'assigned_to' => $request->assigned_to
        ]);

        $task->save();

        return response()->json(['message' => 'Task created successfully', 'task' => $task]);
    }

    public function update(Request $request, Task $task)
    {
        if ($task->user_id !== Auth::id() && $task->assigned_to !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'description' => 'nullable|string',
            'completed' => 'boolean',
            'assigned_to' => 'nullable|exists:users,id'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $task->title = $request->title;
        $task->description = $request->description;
        $task->completed = $request->completed ?? false;
        $task->assigned_to = $request->assigned_to;
        $task->save();

        return response()->json(['message' => 'Task updated successfully', 'task' => $task]);
    }

    public function destroy(Task $task)
    {
        if ($task->user_id !== Auth::id() && $task->assigned_to !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $task->delete();
        return response()->json(['message' => 'Task deleted successfully']);
    }

    public function allTasks()
    {
        $tasks = Task::orderBy('created_at', 'desc')->get();
        return response()->json(['tasks' => $tasks]);
    }
}
