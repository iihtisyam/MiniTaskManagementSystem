<x-app-layout>
    <x-slot name="header">Tasks: {{ $project->name }}</x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">{{ session('success') }}</div>
            @endif

            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
                <a href="{{ route('projects.index') }}" class="text-gray-600 hover:underline">← Back to Projects</a>

                <!-- Filter Form -->
                <form action="{{ route('projects.tasks.index', $project) }}" method="GET" class="flex gap-2">
                    <select name="status" class="border rounded px-3 py-2">
                        <option value="">All Statuses</option>
                        @foreach(\App\Models\Task::STATUSES as $status)
                        <option value="{{ $status }}" {{ request('status') == $status ? 'selected' : '' }}>{{ $status }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-800">Filter</button>
                </form>

                <a href="{{ route('projects.tasks.create', $project) }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ New Task</a>
            </div>

            @if($tasks->isEmpty())
            <p class="text-gray-500">No tasks found.</p>
            @else
            <div class="bg-white shadow rounded-lg divide-y">
                @foreach($tasks as $task)
                <div class="p-4 flex justify-between items-center">
                    <div>
                        <h4 class="font-medium">{{ $task->title }}</h4>
                        @if($task->description) <p class="text-sm text-gray-500">{{ Str::limit($task->description, 80) }}</p> @endif
                        <p class="text-xs text-gray-400 mt-1">Due: {{ $task->due_date ?? 'Not set' }}</p>
                    </div>
                    <div class="flex items-center gap-4">
                        <span class="px-2 py-1 text-xs rounded-full font-medium
                                    @if($task->status === 'To Do') bg-yellow-100 text-yellow-800
                                    @elseif($task->status === 'In Progress') bg-blue-100 text-blue-800
                                    @else bg-green-100 text-green-800 @endif">
                            {{ $task->status }}
                        </span>
                        <div class="flex gap-2">
                            <a href="{{ route('projects.tasks.edit', [$project, $task]) }}" class="text-yellow-600 hover:underline">Edit</a>
                            <form action="{{ route('projects.tasks.destroy', [$project, $task]) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" onclick="return confirm('Delete this task?')" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="mt-4">{{ $tasks->links() }}</div>
            @endif
        </div>
    </div>
</x-app-layout>