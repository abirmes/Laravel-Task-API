<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with('user')->get();
        return response()->json($tasks);
    }

    public function store(Request $request)
    {
        try {
            $fields = $request->validate([
                'title' => 'required|string|max:500|unique:tasks,title',
                'description' => 'nullable|string',
                'status' => 'required|in:pending,in_progress,completed',
                'due_date' => 'required|date|after:now',
            ]);
            $validated['user_id'] = auth()->id();
            $task = Task::create($validated);
            return response()->json([
                'message' => 'project submitted successfully',
                'task' => $task
            ]);
        } catch (Exception $e) {
            return [
                'message' => 'erreur' . $e->getMessage()

            ];
        }
    }


    public function update(Request $request, $id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json(['error' => 'Task not found'], 404);
        }

        if ($task->user_id != auth()->user()->id) {
            return [
                'message' => 'not Authaurized'
            ];
        }
        if ($task->status === 'completed') {
            return [
                'message' => 'this task is completed, cannot be modified'
            ];
        }

        $fields = $request->validate([
            'title' => 'required|string|max:500|unique:tasks,title',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,in_progress,completed',
            'due_date' => 'required|date|after:now',
        ]);
        $task->update($fields);
        return response()->json([
            'message' => 'updated succefully',
            'task' => $task
        ]);
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);


        if ($task->user_id != auth()->id()) {
            return response()->json([
                'message' => 'you cant delete tasks that are not yours'
            ]);
        }

        $task->delete();

        return response()->json([
            'message' => 'Task deleted successfully'
        ], 200);
    }
}
