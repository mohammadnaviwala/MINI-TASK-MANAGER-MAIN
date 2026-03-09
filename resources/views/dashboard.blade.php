@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

@section('content')

<div class="dashboard-background">

    <!-- Floating Circles -->
    <div class="circle circle1"></div>
    <div class="circle circle2"></div>
    <div class="circle circle3"></div>

    <div class="dashboard-container">

        <h1 class="dashboard-title">Your Tasks</h1>

        <!-- Filter + Search -->
        <form method="GET" action="{{ route('dashboard') }}" class="filter-form">

            <!-- Search -->
            <input 
                type="text"
                name="search"
                placeholder="Search by title..."
                value="{{ request('search') }}"
                class="task-input">

            <!-- Status Filter -->
            <select name="status" class="task-input">
                <option value="">All Status</option>
                <option value="pending" {{ request('status')=='pending'?'selected':'' }}>Pending</option>
                <option value="in_progress" {{ request('status')=='in_progress'?'selected':'' }}>In Progress</option>
                <option value="completed" {{ request('status')=='completed'?'selected':'' }}>Completed</option>
            </select>

            <!-- Due Date Filter -->
            <input 
                type="date"
                name="due_date"
                value="{{ request('due_date') }}"
                class="task-input">

            <button class="btn-delete">Filter</button>

            <a href="{{ route('dashboard') }}" class="btn-delete">Reset</a>

        </form>

        <!-- Add Task -->
        <a href="{{ route('tasks.create') }}" class="btn-gradient mb-6">Add New Task</a>

        @if($tasks->count())

            <div class="tasks-grid">
                @foreach($tasks as $task)

                    <div class="user-card">

                        <div class="user-header">
                            <h3 class="task-title">{{ $task->title }}</h3>
                            <p class="task-due">Due: {{ $task->due_date->format('Y-m-d') }}</p>
                        </div>

                        <span class="task-status {{ strtolower($task->status) }}">
                            {{ $task->status }}
                        </span>

                        <div class="mt-4 flex gap-3">

                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn-edit">
                                Edit
                            </a>

                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn-delete"
                                    onclick="return confirm('Delete this task?')">
                                    Delete
                                </button>
                            </form>

                        </div>

                    </div>

                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-6">
                {{ $tasks->links() }}
            </div>

        @else

            <p class="no-tasks">
                No tasks found. Create your first task!
            </p>

        @endif

    </div>

</div>

@endsection
<script>
    // Auto-refresh CSRF token every 10 minutes (600000 ms)
    setInterval(function() {
        fetch("{{ route('refresh-csrf') }}")
            .then(response => response.json())
            .then(data => {
                if(data.token) {
                    // Update all CSRF tokens in forms
                    document.querySelectorAll('input[name="_token"]').forEach(function(input){
                        input.value = data.token;
                    });
                    // Optional: update X-CSRF-TOKEN header if using AJAX
                    if(window.axios) {
                        axios.defaults.headers.common['X-CSRF-TOKEN'] = data.token;
                    }
                }
            })
            .catch(err => console.error('CSRF refresh failed', err));
    }, 600000); // 10 minutes
</script>