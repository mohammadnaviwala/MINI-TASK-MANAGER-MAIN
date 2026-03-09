<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    // Show create form
    public function create()
    {
        return view('tasks.create');
    }

    // Store new task
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,in_progress,completed',
            'due_date' => 'required|date',
        ]);

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'due_date' => $request->due_date,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('dashboard')
            ->with('success', 'Task created successfully!');
    }

    // Show edit form
    public function edit($id)
    {
        $user = Auth::user();

        // Redirect to dashboard if user is not logged in
        if (!$user) {
            return redirect()->route('dashboard')
                ->with('error', 'Please login first.');
        }

        // Get the task if it belongs to the user, else redirect
        $task = Task::where('id', $id)
            ->where('user_id', $user->id)
            ->first();

        if (!$task) {
            return redirect()->route('dashboard')
                ->with('error', 'Task not found or access denied.');
        }

        return view('tasks.edit', compact('task'));
    }

    // Update task
    public function update(Request $request, $id)
    {
        $user = Auth::user();

        $task = Task::where('id', $id)
            ->where('user_id', $user->id)
            ->firstOrFail();

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,in_progress,completed',
            'due_date' => 'required|date',
        ]);

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'due_date' => $request->due_date,
        ]);

        return redirect()->route('dashboard')
            ->with('success', 'Task updated successfully!');
    }

    // Delete task
    public function destroy($id)
    {
        $user = Auth::user();

        $task = Task::where('id', $id)
            ->where('user_id', $user->id)
            ->firstOrFail();

        $task->delete();

        return redirect()->route('dashboard')
            ->with('success', 'Task deleted successfully!');
    }
}