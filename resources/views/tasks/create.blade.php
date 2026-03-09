@extends('layouts.app')

@section('content')

<div class="dashboard-background">
    <div class="dashboard-container">
        <h2 class="dashboard-title">Create New Task</h2>

        @if ($errors->any())
            <div class="success-msg" style="background:#ff6b6b;">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('tasks.store') }}" class="user-card">
            @csrf

            <!-- Title -->
            <div class="mb-4">
                <label class="text-white font-medium" for="title">Title</label>
                <input list="taskOptions" id="title" name="title" value="{{ old('title') }}" required
                    placeholder="Select or type a task"
                    class="task-input">
                <datalist id="taskOptions">
                    <option value="Football Training">
                    <option value="Basketball Practice">
                    <option value="Swimming Session">
                    <option value="Tennis Coaching">
                    <option value="Running / Jogging">
                    <option value="Yoga / Stretching">
                </datalist>
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label class="text-white font-medium" for="description">Description</label>
                <textarea id="description" name="description" rows="4" placeholder="Enter task details"
                    class="task-input">{{ old('description') }}</textarea>
            </div>

            <!-- Status -->
            <div class="mb-4">
                <label class="text-white font-medium" for="status">Status</label>
                <select id="status" name="status" required class="task-input">
                    <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="in_progress" {{ old('status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>

            <!-- Due Date -->
            <div class="mb-4">
                <label class="text-white font-medium" for="due_date">Due Date</label>
                <input type="date" id="due_date" name="due_date" value="{{ old('due_date') }}" required
                    class="task-input">
            </div>

            <button type="submit" class="btn-delete mt-2">Create Task</button>
        </form>
    </div>
</div>

@endsection