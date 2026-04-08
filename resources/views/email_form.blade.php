<x-layout title="Email Manager">
    <div class="max-w-2xl mx-auto p-6 bg-white/5 backdrop-blur-md rounded-xl mt-12">
        <h1 class="text-2xl font-bold text-white mb-4">Email List</h1>

        {{-- Flash messages --}}
        @if (session('success'))
            <div class="p-3 mb-4 text-sm text-green-100 bg-green-600 rounded">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="p-3 mb-4 text-sm text-red-100 bg-red-600 rounded">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Add email form --}}
        <form method="POST" action="{{ route('emails.store') }}" class="flex gap-2">
            @csrf
            <input name="email" type="email" placeholder="Enter email"
                   class="flex-1 rounded-lg px-4 py-2 bg-slate-900/50 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500"
                   required>
            <button type="submit"
                    class="px-4 py-2 bg-indigo-600 hover:bg-indigo-500 rounded-lg text-white font-semibold">
                Add
            </button>
        </form>

        {{-- List of saved emails (max 5) --}}
        <div class="mt-6">
            <h2 class="text-lg font-medium text-white mb-2">
                Saved Emails ({{ count($emails) }}/5)
            </h2>

            @if ($emails->isEmpty())
                <p class="text-slate-400">No emails saved yet.</p>
            @else
                <ul class="space-y-2">
                    @foreach ($emails as $email)
                        <li class="flex items-center justify-between bg-white/5 p-2 rounded">
                            <span class="text-slate-200">{{ $email }}</span>

                            {{-- Delete button (per‑email) --}}
                            <form method="POST"
                                  action="{{ route('emails.destroy', ['email' => $email]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="text-red-400 hover:text-red-200 transition">
                                    ✕
                                </button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</x-layout>
