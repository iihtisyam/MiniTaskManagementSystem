<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 leading-tight tracking-tight">My Projects</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
            <div class="bg-emerald-100 border-l-4 border-emerald-500 text-emerald-700 p-4 rounded shadow-sm mb-6 animate-fade-in-up">
                <div class="flex items-center">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <span>{{ session('success') }}</span>
                </div>
            </div>
            @endif

            <div class="flex justify-between items-center mb-8">
                <h3 class="text-xl font-semibold text-gray-800">All Projects</h3>
                <a href="{{ route('projects.create') }}" class="group inline-flex items-center gap-2 bg-indigo-600 text-white px-5 py-2.5 rounded-full hover:bg-indigo-700 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-0.5">
                    <svg class="w-5 h-5 transition-transform group-hover:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    <span>New Project</span>
                </a>
            </div>

            @if($projects->isEmpty())
            <div class="bg-white rounded-2xl shadow-sm p-12 text-center border border-gray-100 overflow-hidden">
                <svg class="w-20 h-20 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                <h3 class="text-xl font-medium text-gray-600 mb-2">No projects yet</h3>
                <p class="text-gray-500 mb-6 max-w-sm mx-auto">Get started by creating your first project to organize your tasks efficiently.</p>
                <a href="{{ route('projects.create') }}" class="inline-block bg-indigo-50 text-indigo-700 px-6 py-2 rounded-full font-medium hover:bg-indigo-100 transition-colors">Create First Project</a>
            </div>
            @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($projects as $project)
                <div class="bg-white rounded-2xl shadow border border-gray-100 p-6 flex flex-col h-full transform transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:border-indigo-100 group relative overflow-hidden">
                    <!-- Subtle top gradient -->
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-indigo-500 to-purple-500 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                    <div class="flex-grow">
                        <div class="flex justify-between items-start mb-4">
                            <a href="{{ route('projects.tasks.index', $project) }}" class="text-xl font-bold text-gray-800 hover:text-indigo-600 transition-colors line-clamp-2 pr-6">
                                {{ $project->name }}
                            </a>
                            
                            <div class="relative group/menu">
                                <button class="text-gray-400 hover:text-gray-600 focus:outline-none p-1 rounded-full hover:bg-gray-100 transition-colors">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path></svg>
                                </button>
                                <!-- Basic Dropdown (Hover based) -->
                                <div class="absolute right-0 w-40 mt-0 py-2 bg-white rounded-xl shadow-xl border border-gray-100 opacity-0 invisible group-hover/menu:opacity-100 group-hover/menu:visible transition-all duration-200 z-50 transform origin-top-right group-hover/menu:translate-y-2 translate-y-0">
                                    <a href="{{ route('projects.edit', $project) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                        Edit
                                    </a>
                                    <form action="{{ route('projects.destroy', $project) }}" method="POST" class="block w-full">
                                        @csrf @method('DELETE')
                                        <button type="submit" onclick="return confirm('Delete this project and all its tasks?')" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 flex items-center gap-2">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center text-sm text-gray-500 mb-6 bg-gray-50 inline-flex px-3 py-1 rounded-full">
                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            Created {{ $project->created_at->format('M d, Y') }}
                        </div>
                    </div>

                    <div class="mt-auto pt-4 border-t border-gray-100">
                        <a href="{{ route('projects.tasks.index', $project) }}" class="text-indigo-600 text-sm font-medium hover:text-indigo-800 flex items-center group-hover:underline">
                            View Tasks
                            <svg class="w-4 h-4 ml-1 transform transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</x-app-layout>