<x-layout title="All Users">
    <div class="max-w-5xl mx-auto p-6 bg-white/5 backdrop-blur-md rounded-xl mt-12">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold text-white">User Directory</h1>
            <a href="{{ route('users.create') }}" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-500 rounded text-white">
                + New User
            </a>
        </div>

        @if (session('success'))
            <div class="p-3 mb-4 text-sm text-green-100 bg-green-600 rounded">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full text-left table-auto">
            <thead class="text-slate-300">
                <tr>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Age</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody class="text-slate-200">
                @forelse ($users as $user)
                    <tr class="border-t border-slate-700/30">
                        <td class="px-4 py-2">
                            {{ $user->first_name ?? '' }} {{ $user->middle_name ? $user->middle_name.' ' : '' }} {{ $user->last_name ?? '' }}
                            @if($user->nickname)
                                ({{ $user->nickname }})
                            @endif
                        </td>
                        <td class="px-4 py-2">{{ $user->email }}</td>
                        <td class="px-4 py-2">{{ $user->age ?? '-' }}</td>
                        <td class="px-4 py-2 space-x-2">
                            <a href="{{ route('users.edit', $user) }}" class="text-indigo-300 hover:text-indigo-100">Edit</a>
                            <form method="POST" action="{{ route('users.destroy', $user) }}" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-400 hover:text-red-200" onclick="return confirm('Delete this user?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="p-4 text-center text-slate-400">No users yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layout>
