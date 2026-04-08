<div class="bg-white border-b border-gray-100 md:hidden flex justify-between items-center p-4">
    <!-- Logo / Title -->
    <div class="text-lg font-bold">
        <span class="text-blue-600">Task</span>Manager
    </div>

    <!-- Mobile Hamburger and Dropdown (Simplified for now) -->
    <div x-data="{ open: false }">
        <button @click="open = !open" class="text-gray-500 hover:text-gray-700 focus:outline-none">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>

        <!-- Mobile Menu Dropdown -->
        <div x-show="open" @click.away="open = false" class="absolute top-16 right-4 w-48 bg-white rounded-md shadow-lg py-1 z-50">
            <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard</a>
            <a href="{{ route('projects.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Projects</a>
            <a href="{{ route('users.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Users</a>
            <div class="border-t border-gray-100"></div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                    Log Out
                </button>
            </form>
        </div>
    </div>
</div>
