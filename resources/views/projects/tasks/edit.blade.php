<x-app-layout>
    <x-slot name="header">{{ isset($task) ? 'Edit Task' : 'Create Task' }}: {{ $project->name }}</x-slot>

    <div class="py-12 max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 rounded-lg shadow">
            <form action="{{ isset($task) ? route('projects.tasks.update', [$project, $task]) : route('projects.tasks.store', $project) }}" method="POST">
                @csrf
                @if(isset($task)) @method('PUT') @endif

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Title</label>
                    <input type="text" name="title" value="{{ old('title', $task->title ?? '') }}" class="w-full border rounded px-3 py-2 @error('title') border-red-500 @enderror" required>
                    @error('title') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Description</label>
                    <textarea name="description" class="w-full border rounded px-3 py-2 @error('description') border-red-500 @enderror">{{ old('description', $task->description ?? '') }}</textarea>
                    @error('description') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Status</label>
                    <select name="status" class="w-full border rounded px-3 py-2 @error('status') border-red-500 @enderror" required>
                        @foreach(\App\Models\Task::STATUSES as $status)
                        <option value="{{ $status }}" {{ old('status', $task->status ?? 'To Do') === $status ? 'selected' : '' }}>{{ $status }}</option>
                        @endforeach
                    </select>
                    @error('status') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Due Date</label>
                    <input type="date" name="due_date" value="{{ old('due_date', $task->due_date ?? '') }}" class="w-full border rounded px-3 py-2 @error('due_date') border-red-500 @enderror">
                    @error('due_date') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save Task</button>
                <a href="{{ route('projects.tasks.index', $project) }}" class="ml-2 text-gray-600 hover:underline">Cancel</a>
            </form>
        </div>
    </div>
</x-app-layout>