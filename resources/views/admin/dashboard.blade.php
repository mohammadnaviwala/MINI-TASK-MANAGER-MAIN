@extends('layouts.app')

@section('content')

<div class="dashboard-background">

    <div class="dashboard-container">

        <h1 class="dashboard-title">Admin Dashboard</h1>

        @if(session('success'))
            <p class="success-msg">{{ session('success') }}</p>
        @endif

        <div class="users-grid">
            @foreach($users as $user)
            <div class="user-card">
                <div class="user-header">
                    <h3>{{ $user->name }}</h3>
                    <span class="user-email">{{ $user->email }}</span>
                </div>

                <!-- Delete User -->
                <form action="{{ route('admin.user.delete', $user->id) }}" method="POST" class="delete-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-delete" onclick="return confirm('Delete this user?')">
                        Delete User
                    </button>
                </form>

                <h4>Tasks:</h4>
                @if($user->tasks->count() > 0)
                    <ul class="tasks-list">
                        @foreach($user->tasks as $task)
                        <li>
                            <span class="task-title">{{ $task->title }}</span>
                            <span class="task-status {{ strtolower($task->status) }}">{{ $task->status }}</span>

                            <!-- Delete Task -->
                            <form action="{{ route('admin.task.delete', $task->id) }}" method="POST" class="delete-task-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-task-delete" onclick="return confirm('Delete this task?')">
                                    Delete
                                </button>
                            </form>
                        </li>
                        @endforeach
                    </ul>
                @else
                    <p class="no-tasks">No tasks assigned.</p>
                @endif
            </div>
            @endforeach
        </div>
    </div>

    <!-- Floating circles -->
    <div class="circle circle1"></div>
    <div class="circle circle2"></div>
    <div class="circle circle3"></div>
</div>

@endsection