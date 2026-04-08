<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 leading-tight tracking-tight">Dashboard</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <!-- Total Projects -->
                <div class="bg-gradient-to-br from-indigo-500 to-purple-600 p-6 rounded-2xl shadow-lg transform transition-all duration-300 hover:-translate-y-1 hover:shadow-xl text-white">
                    <div class="text-indigo-100 font-medium tracking-wide text-sm uppercase mb-2">Total Projects</div>
                    <div class="text-4xl font-extrabold">{{ $totalProjects }}</div>
                </div>
                <!-- Total Tasks -->
                <div class="bg-gradient-to-br from-blue-500 to-cyan-500 p-6 rounded-2xl shadow-lg transform transition-all duration-300 hover:-translate-y-1 hover:shadow-xl text-white">
                    <div class="text-blue-100 font-medium tracking-wide text-sm uppercase mb-2">Total Tasks</div>
                    <div class="text-4xl font-extrabold">{{ $totalTasks }}</div>
                </div>
                <!-- To Do -->
                <div class="bg-gradient-to-br from-amber-400 to-orange-500 p-6 rounded-2xl shadow-lg transform transition-all duration-300 hover:-translate-y-1 hover:shadow-xl text-white">
                    <div class="text-amber-100 font-medium tracking-wide text-sm uppercase mb-2">To Do</div>
                    <div class="text-4xl font-extrabold">{{ $tasksByStatus['To Do'] ?? 0 }}</div>
                </div>
                <!-- In Progress / Done -->
                <div class="bg-gradient-to-br from-emerald-400 to-teal-500 p-6 rounded-2xl shadow-lg transform transition-all duration-300 hover:-translate-y-1 hover:shadow-xl text-white">
                    <div class="text-emerald-100 font-medium tracking-wide text-sm uppercase mb-2">In Progress / Done</div>
                    <div class="flex items-baseline gap-2">
                        <span class="text-4xl font-extrabold">{{ $tasksByStatus['In Progress'] ?? 0 }}</span>
                        <span class="text-xl font-medium text-emerald-100">/ {{ $tasksByStatus['Done'] ?? 0 }}</span>
                    </div>
                </div>
            </div>

            <div class="mt-10 flex justify-center">
                <a href="{{ route('projects.index') }}" class="group relative inline-flex items-center justify-center px-8 py-3 text-lg font-medium text-white bg-indigo-600 rounded-full overflow-hidden transition-all duration-300 hover:bg-indigo-700 hover:shadow-lg hover:shadow-indigo-500/30 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <span class="relative z-10 flex items-center gap-2">
                        View My Projects
                        <svg class="w-5 h-5 transform transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </span>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>