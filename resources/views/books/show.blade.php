<x-layout title="{{ $book->title }}">
    <div class="max-w-5xl mx-auto">
        <div class="mb-8 flex items-center justify-between">
            <div class="flex items-center gap-4">
                <a href="{{ route('books.index') }}" class="p-2 bg-white/5 hover:bg-white/10 rounded-full transition border border-white/10 group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white/40 group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>
                <h1 class="text-3xl font-bold text-white tracking-tight">Book Details</h1>
            </div>
            <div class="flex gap-2">
                <a href="{{ route('books.edit', $book) }}" class="px-5 py-2.5 bg-white/5 hover:bg-white/10 text-white rounded-xl transition border border-white/10 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    Edit
                </a>
                <form action="{{ route('books.destroy', $book) }}" method="POST" onsubmit="return confirm('Really delete this book?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-5 py-2.5 bg-rose-500/10 hover:bg-rose-500/20 text-rose-400 rounded-xl transition border border-rose-500/20 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        Delete
                    </button>
                </form>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Cover & Status -->
            <div class="space-y-6">
                <div class="aspect-[3/4] rounded-2xl glass border border-white/10 overflow-hidden shadow-2xl relative group">
                    @if($book->cover_image)
                        <img src="{{ asset('storage/' . $book->cover_image) }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex flex-col items-center justify-center text-white/10 space-y-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                            <span class="text-sm font-medium uppercase tracking-widest text-white/20">No Cover Available</span>
                        </div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 to-transparent opacity-0 group-hover:opacity-100 transition duration-500"></div>
                </div>

                <div class="bg-white/5 p-6 rounded-2xl glass border border-white/10 space-y-4">
                    <div class="flex justify-between items-center">
                        <span class="text-white/40 text-sm">Price</span>
                        <span class="text-2xl font-bold text-white">${{ number_format($book->price, 2) }}</span>
                    </div>
                    <div class="flex justify-between items-center pt-4 border-t border-white/10">
                        <span class="text-white/40 text-sm">Status</span>
                        @if($book->is_available)
                            <span class="px-3 py-1 bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 text-xs font-bold rounded-full uppercase tracking-wider">Available</span>
                        @else
                            <span class="px-3 py-1 bg-rose-500/10 border border-rose-500/30 text-rose-400 text-xs font-bold rounded-full uppercase tracking-wider">Out of Stock</span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-8">
                <div class="bg-white/5 p-8 rounded-2xl glass border border-white/10">
                    <div class="mb-6">
                        <span class="px-3 py-1 bg-indigo-500/10 border border-indigo-500/30 text-indigo-300 text-xs font-bold rounded-full uppercase tracking-widest mb-4 inline-block">
                            {{ $book->genre }}
                        </span>
                        <h2 class="text-4xl font-extrabold text-white leading-tight">{{ $book->title }}</h2>
                        <p class="text-xl text-indigo-200/60 mt-2 font-medium italic">by {{ $book->author }}</p>
                    </div>

                    <div class="prose prose-invert max-w-none">
                        <h3 class="text-white/40 text-sm font-bold uppercase tracking-widest mb-3">Synopsis</h3>
                        <p class="text-slate-300 leading-relaxed text-lg">
                            {{ $book->description }}
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
                    <div class="bg-white/5 p-5 rounded-2xl glass border border-white/10">
                        <span class="text-white/20 text-xs font-bold uppercase tracking-widest block mb-1">Publisher</span>
                        <span class="text-white font-semibold">{{ $book->publisher }}</span>
                    </div>
                    <div class="bg-white/5 p-5 rounded-2xl glass border border-white/10">
                        <span class="text-white/20 text-xs font-bold uppercase tracking-widest block mb-1">Published In</span>
                        <span class="text-white font-semibold">{{ $book->published_year }}</span>
                    </div>
                    <div class="bg-white/5 p-5 rounded-2xl glass border border-white/10">
                        <span class="text-white/20 text-xs font-bold uppercase tracking-widest block mb-1">ISBN</span>
                        <span class="text-white font-semibold">{{ $book->isbn }}</span>
                    </div>
                    <div class="bg-white/5 p-5 rounded-2xl glass border border-white/10">
                        <span class="text-white/20 text-xs font-bold uppercase tracking-widest block mb-1">Total Pages</span>
                        <span class="text-white font-semibold">{{ $book->pages }} pages</span>
                    </div>
                    <div class="bg-white/5 p-5 rounded-2xl glass border border-white/10">
                        <span class="text-white/20 text-xs font-bold uppercase tracking-widest block mb-1">Language</span>
                        <span class="text-white font-semibold">{{ $book->language }}</span>
                    </div>
                    <div class="bg-white/5 p-5 rounded-2xl glass border border-white/10">
                        <span class="text-white/20 text-xs font-bold uppercase tracking-widest block mb-1">ID Ref</span>
                        <span class="text-white font-semibold">#{{ str_pad($book->id, 5, '0', STR_PAD_LEFT) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
