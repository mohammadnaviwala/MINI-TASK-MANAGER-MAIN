@extends('layouts.app')

@section('content')
<div class="dashboard-background">
    <div class="circle circle1"></div>
    <div class="circle circle2"></div>
    <div class="circle circle3"></div>

    <div class="dashboard-container">
        <div class="user-card">
            <h2 class="dashboard-title">Edit Task</h2>

            @if ($errors->any())
                <div class="success-msg" style="background:#f87171;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('tasks.update', $task->id) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" value="{{ $task->title }}" class="task-input" required>
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="task-input">{{ $task->description }}</textarea>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="task-input" required>
                        <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="inprogress" {{ $task->status == 'inprogress' ? 'selected' : '' }}>In Progress</option>
                        <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Due Date</label>
                    <input type="date" name="due_date" value="{{ $task->due_date->format('Y-m-d') }}" class="task-input" required>
                </div>

                <button type="submit" class="btn-gradient">Update Task</button>
            </form>
        </div>
    </div>
</div>
@endsection