@forelse($books as $book)
    <tr class="hover:bg-white/[0.02] transition">
        <td class="px-6 py-5">
            <div class="flex items-center gap-4">
                <div class="w-12 h-16 rounded-lg bg-white/5 border border-white/10 overflow-hidden flex-shrink-0">
                    @if($book->cover_image)
                        <img src="{{ asset('storage/' . $book->cover_image) }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-white/20">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                    @endif
                </div>
                <div>
                    <div class="text-white font-semibold">{{ $book->title }}</div>
                    <div class="text-white/40 text-sm italic">{{ $book->author }}</div>
                </div>
            </div>
        </td>
        <td class="px-6 py-5">
            <span class="px-3 py-1 bg-indigo-500/10 border border-indigo-500/30 text-indigo-300 text-xs rounded-full">
                {{ $book->genre }}
            </span>
        </td>
        <td class="px-6 py-5">
            <span class="text-white font-medium">${{ number_format($book->price, 2) }}</span>
        </td>
        <td class="px-6 py-5">
            @if($book->is_available)
                <span class="flex items-center gap-2 text-emerald-400 text-sm">
                    <span class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse"></span>
                    Available
                </span>
            @else
                <span class="flex items-center gap-2 text-rose-400 text-sm opacity-60">
                    <span class="w-2 h-2 bg-rose-400 rounded-full"></span>
                    Out of Stock
                </span>
            @endif
        </td>
        <td class="px-6 py-5 text-right space-x-2">
            <a href="{{ route('books.show', $book) }}" class="p-2 text-white/40 hover:text-white transition inline-block" title="View Details">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
            </a>
            <a href="{{ route('books.edit', $book) }}" class="p-2 text-white/40 hover:text-indigo-400 transition inline-block" title="Edit">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
            </a>
            <form action="{{ route('books.destroy', $book) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this book permanently?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="p-2 text-white/40 hover:text-rose-400 transition" title="Delete">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </button>
            </form>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="5" class="px-6 py-20 text-center">
            <div class="flex flex-col items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white/10 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
                <p class="text-white/40 text-lg">No books found matching your criteria</p>
                <a href="{{ route('books.create') }}" class="text-indigo-400 hover:underline mt-2">Start by adding a new book</a>
            </div>
        </td>
    </tr>
@endforelse
