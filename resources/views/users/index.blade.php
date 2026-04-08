<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-bold text-gray-800">User Management</h3>
                <a href="{{ route('users.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-sm">
                    Create New User
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200">
                <div class="p-0 text-gray-900">
                    @if (session('success'))
                        <div class="p-4 mb-0 text-sm text-green-800 rounded-none bg-green-50 border-b border-green-200" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="p-4 mb-0 text-sm text-red-800 rounded-none bg-red-50 border-b border-red-200" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b border-gray-200">
                                <tr>
                                    <th scope="col" class="px-6 py-4 font-semibold text-gray-900">Name</th>
                                    <th scope="col" class="px-6 py-4 font-semibold text-gray-900">Email</th>
                                    <th scope="col" class="px-6 py-4 font-semibold text-gray-900">Created At</th>
                                    <th scope="col" class="px-6 py-4 font-semibold text-gray-900 text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $user)
                                <tr class="bg-white border-b hover:bg-gray-50 transition-colors duration-150">
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $user->name }}
                                        @if(Auth::id() === $user->id)
                                            <span class="ml-2 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                              You
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">{{ $user->email }}</td>
                                    <td class="px-6 py-4">{{ $user->created_at->format('M d, Y') }}</td>
                                    <td class="px-6 py-4 text-right space-x-2 flex justify-end">
                                        <a href="{{ route('users.edit', $user) }}" class="font-medium text-blue-600 hover:text-blue-900 bg-blue-50 px-3 py-1 rounded-md transition-colors duration-150 inline-block">Edit</a>
                                        
                                        @if(Auth::id() !== $user->id)
                                        <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="font-medium text-red-600 hover:text-red-900 bg-red-50 px-3 py-1 rounded-md transition-colors duration-150">Delete</button>
                                        </form>
                                        @else
                                        <span class="font-medium text-gray-400 bg-gray-50 px-3 py-1 rounded-md inline-block cursor-not-allowed">Delete</span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-8 text-center text-gray-500">
                                        No users found.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                @if($users->hasPages())
                    <div class="px-6 py-4 border-t border-gray-200">
                        {{ $users->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
