<x-layout title="User Dashboard">
    <div class="max-w-6xl mx-auto p-8 glass rounded-3xl mt-12 shadow-2xl relative overflow-hidden">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-white tracking-tight">Registered Users</h1>
                <p class="text-indigo-300 text-sm mt-1">Manage your community member data.</p>
            </div>
            <a href="/register" class="bg-indigo-600 hover:bg-indigo-500 text-white px-6 py-3 rounded-2xl text-sm font-bold transition-all duration-300 shadow-lg shadow-indigo-500/25 transform hover:-translate-y-1">
                + Add User
            </a>
        </div>

        @if (session('success'))
            <div class="p-4 mb-8 text-sm text-green-200 bg-green-500/20 border border-green-500/50 rounded-2xl backdrop-blur-md flex items-center">
                <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto rounded-2xl border border-white/5">
            <table class="w-full text-sm text-left text-gray-300">
                <thead class="text-xs uppercase bg-white/5 text-gray-400 font-bold overflow-hidden">
                    <tr>
                        <th class="px-6 py-5">Member</th>
                        <th class="px-6 py-5">Nickname</th>
                        <th class="px-6 py-5">Email Address</th>
                        <th class="px-6 py-5">Age</th>
                        <th class="px-6 py-5">Contact</th>
                        <th class="px-6 py-5 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5 bg-white/2">
                    @forelse ($users as $user)
                        <tr class="hover:bg-white/5 transition-colors group">
                            <td class="px-6 py-5">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-indigo-500 to-purple-500 flex items-center justify-center text-white font-bold text-xs">
                                        {{ strtoupper(substr($user->first_name, 0, 1)) }}{{ strtoupper(substr($user->last_name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <div class="font-bold text-white group-hover:text-indigo-300 transition-colors">{{ $user->first_name }} {{ $user->last_name }}</div>
                                        <div class="text-[10px] text-gray-500 uppercase tracking-tighter">Joined {{ $user->created_at->diffForHumans() }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-5 font-medium">{{ $user->nickname ?? '---' }}</td>
                            <td class="px-6 py-5 font-medium text-gray-400">{{ $user->email }}</td>
                            <td class="px-6 py-5 font-medium">{{ $user->age }}</td>
                            <td class="px-6 py-5 font-medium text-gray-400">{{ $user->contact_number }}</td>
                            <td class="px-6 py-5 text-center">
                                <div class="flex justify-center space-x-3">
                                    <form action="{{ route('users.destroy', $user) }}" method="POST" onsubmit="return confirm('Securely delete this user?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-xs font-bold uppercase tracking-widest text-red-400/70 hover:text-red-400 transition-colors p-2 hover:bg-red-500/10 rounded-xl">
                                            Remove
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-20 text-center">
                                <div class="flex flex-col items-center">
                                    <svg class="w-12 h-12 text-gray-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                                    <p class="text-gray-500 font-medium italic">Your community is empty. Start adding members!</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layout>
