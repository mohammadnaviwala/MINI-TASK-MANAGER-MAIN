<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class UserDashboardController extends Controller
{
    public function index(Request $request)
    {
        $query = auth()->user()->tasks()->latest();

        // Search by title
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by due date
        if ($request->filled('due_date')) {
            $query->whereDate('due_date', $request->due_date);
        }

        $tasks = $query->paginate(10)->withQueryString();

        return view('dashboard', compact('tasks'));
    }
}