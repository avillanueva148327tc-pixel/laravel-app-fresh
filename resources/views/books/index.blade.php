<x-layout title="Book Management System">
    <div class="space-y-6">
        <!-- Header -->
        <div class="flex justify-between items-center bg-white/5 p-6 rounded-2xl glass border border-white/10">
            <div>
                <h1 class="text-3xl font-bold text-white tracking-tight">Library Collection</h1>
                <p class="text-blue-200/60 mt-1">Manage and organize your book catalog</p>
            </div>
            <a href="{{ route('books.create') }}" class="px-5 py-2.5 bg-indigo-600 hover:bg-indigo-500 text-white rounded-xl transition duration-200 flex items-center gap-2 shadow-lg shadow-indigo-500/20">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                Add New Book
            </a>
        </div>

        <!-- Search & Filter -->
        <div class="bg-white/5 p-6 rounded-2xl glass border border-white/10">
            <form action="{{ route('books.index') }}" method="GET" class="flex flex-col md:flex-row gap-4">
                <div class="flex-grow relative">
                    <input type="text" name="search" value="{{ request('search') }}" 
                        placeholder="Search by title or author..." 
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-2.5 pl-10 text-white placeholder-white/40 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 absolute left-3 top-3 text-white/40" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <div class="w-full md:w-48">
                    <select name="genre" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-2.5 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500/50 transition">
                        <option value="" class="bg-slate-900">All Genres</option>
                        @foreach($genres as $genre)
                            <option value="{{ $genre }}" {{ request('genre') == $genre ? 'selected' : '' }} class="bg-slate-900">{{ $genre }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="px-6 py-2.5 bg-white/10 hover:bg-white/20 text-white rounded-xl transition font-medium border border-white/10">
                    Apply Filters
                </button>
                @if(request()->has('search') || request()->has('genre'))
                    <a href="{{ route('books.index') }}" class="px-6 py-2.5 text-white/60 hover:text-white transition flex items-center justify-center">
                        Clear
                    </a>
                @endif
            </form>
        </div>

        @if(session('success'))
            <div class="bg-emerald-500/20 border border-emerald-500/40 text-emerald-300 px-4 py-3 rounded-xl glass animate-pulse">
                {{ session('success') }}
            </div>
        @endif

        <!-- Book Table -->
        <div class="rounded-2xl glass border border-white/10 overflow-hidden">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-white/5 border-b border-white/10">
                        <th class="px-6 py-4 text-sm font-semibold text-white/60 uppercase tracking-widest">Book Details</th>
                        <th class="px-6 py-4 text-sm font-semibold text-white/60 uppercase tracking-widest">Genre</th>
                        <th class="px-6 py-4 text-sm font-semibold text-white/60 uppercase tracking-widest">Price</th>
                        <th class="px-6 py-4 text-sm font-semibold text-white/60 uppercase tracking-widest">Availability</th>
                        <th class="px-6 py-4 text-sm font-semibold text-white/60 uppercase tracking-widest text-right">Actions</th>
                    </tr>
                </thead>
                <tbody id="books-table-body" class="divide-y divide-white/5">
                    @include('books.partials.table', ['books' => $books])
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div id="pagination-links" class="mt-4">
            {{ $books->links() }}
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.querySelector('input[name="search"]');
            const genreSelect = document.querySelector('select[name="genre"]');
            const tableBody = document.getElementById('books-table-body');
            const paginationContainer = document.getElementById('pagination-links');

            let timeout = null;

            function performSearch() {
                const search = searchInput.value;
                const genre = genreSelect.value;
                const url = new URL(window.location.href);
                
                url.searchParams.set('search', search);
                url.searchParams.set('genre', genre);
                
                // Update URL in browser without reloading
                window.history.pushState({}, '', url);

                fetch(url, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.text())
                .then(html => {
                    tableBody.innerHTML = html;
                    // Note: In a full app, you might want to refresh pagination too.
                    // For now, focus on the "Live" feel of the search results.
                })
                .catch(error => console.error('Error fetching search results:', error));
            }

            searchInput.addEventListener('input', function() {
                clearTimeout(timeout);
                timeout = setTimeout(performSearch, 300); // Debounce search
            });

            genreSelect.addEventListener('change', performSearch);
        });
    </script>
</x-layout>
