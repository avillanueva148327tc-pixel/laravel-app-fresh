<x-layout title="Add New Book">
    <div class="max-w-4xl mx-auto">
        <div class="mb-8 flex items-center gap-4">
            <a href="{{ route('books.index') }}" class="p-2 bg-white/5 hover:bg-white/10 rounded-full transition border border-white/10 group">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white/40 group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <div>
                <h1 class="text-3xl font-bold text-white tracking-tight">Add New Book</h1>
                <p class="text-blue-200/60 mt-1">Fill in the details to expand your collection</p>
            </div>
        </div>

        @if($errors->any())
            <div class="mb-6 p-4 bg-rose-500/10 border border-rose-500/30 rounded-xl glass">
                <div class="text-rose-400 font-semibold mb-2">Please correct the following errors:</div>
                <ul class="list-disc list-inside text-rose-300/80 text-sm space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            
            <div class="bg-white/5 p-8 rounded-2xl glass border border-white/10 space-y-8">
                <!-- Core Information -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label for="title" class="text-sm font-semibold text-white/60 tracking-wider uppercase">Book Title</label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}" required
                            class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500/50 transition">
                    </div>
                    <div class="space-y-2">
                        <label for="author" class="text-sm font-semibold text-white/60 tracking-wider uppercase">Author Name</label>
                        <input type="text" name="author" id="author" value="{{ old('author') }}" required
                            class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500/50 transition">
                    </div>
                </div>

                <div class="space-y-2">
                    <label for="description" class="text-sm font-semibold text-white/60 tracking-wider uppercase">Description / Summary</label>
                    <textarea name="description" id="description" rows="4" required
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500/50 transition">{{ old('description') }}</textarea>
                </div>

                <!-- Classification -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="space-y-2">
                        <label for="genre" class="text-sm font-semibold text-white/60 tracking-wider uppercase">Genre</label>
                        <select name="genre" id="genre" required
                            class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500/50 transition">
                            <option value="" class="bg-slate-900">Select Genre</option>
                            @foreach(['Cybersec', 'Programming', 'IT Management', 'IT Architecture', 'DevOps', 'SRE', 'Cloud', 'Fiction', 'Non-Fiction', 'Sci-Fi', 'Fantasy', 'Mystery', 'Biography', 'History', 'Self-Help', 'Thriller', 'Academic'] as $genre)
                                <option value="{{ $genre }}" {{ old('genre') == $genre ? 'selected' : '' }} class="bg-slate-900">{{ $genre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="space-y-2">
                        <label for="language" class="text-sm font-semibold text-white/60 tracking-wider uppercase">Language</label>
                        <input type="text" name="language" id="language" value="{{ old('language', 'English') }}" required
                            class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500/50 transition">
                    </div>
                    <div class="space-y-2">
                        <label for="isbn" class="text-sm font-semibold text-white/60 tracking-wider uppercase">ISBN Code</label>
                        <input type="text" name="isbn" id="isbn" value="{{ old('isbn') }}" required
                            class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500/50 transition">
                    </div>
                </div>

                <!-- Technical Details -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                    <div class="space-y-2">
                        <label for="pages" class="text-sm font-semibold text-white/60 tracking-wider uppercase">Pages</label>
                        <input type="number" name="pages" id="pages" value="{{ old('pages') }}" required
                            class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500/50 transition">
                    </div>
                    <div class="space-y-2">
                        <label for="published_year" class="text-sm font-semibold text-white/60 tracking-wider uppercase">Year</label>
                        <input type="number" name="published_year" id="published_year" value="{{ old('published_year', date('Y')) }}" required
                            class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500/50 transition">
                    </div>
                    <div class="space-y-2">
                        <label for="price" class="text-sm font-semibold text-white/60 tracking-wider uppercase">Price ($)</label>
                        <input type="number" step="0.01" name="price" id="price" value="{{ old('price') }}" required
                            class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500/50 transition">
                    </div>
                    <div class="space-y-2">
                        <label for="publisher" class="text-sm font-semibold text-white/60 tracking-wider uppercase">Publisher</label>
                        <input type="text" name="publisher" id="publisher" value="{{ old('publisher') }}" required
                            class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500/50 transition">
                    </div>
                </div>

                <!-- Media & Status -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                    <div class="space-y-2">
                        <label for="cover_image" class="text-sm font-semibold text-white/60 tracking-wider uppercase">Cover Image</label>
                        <div class="mt-1 flex items-center gap-4">
                            <input type="file" name="cover_image" id="cover_image" accept="image/*"
                                class="block w-full text-sm text-white/40
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-full file:border-0
                                file:text-sm file:font-semibold
                                file:bg-indigo-500/10 file:text-indigo-400
                                hover:file:bg-indigo-500/20 transition cursor-pointer">
                        </div>
                    </div>
                    <div class="flex items-center gap-3 bg-white/5 p-4 rounded-xl border border-white/10">
                        <input type="checkbox" name="is_available" id="is_available" value="1" {{ old('is_available', true) ? 'checked' : '' }}
                            class="w-5 h-5 rounded border-white/10 bg-white/5 text-indigo-500 focus:ring-indigo-500/50 transition cursor-pointer">
                        <label for="is_available" class="text-white font-medium cursor-pointer">Available for Purchase</label>
                    </div>
                </div>

                <div class="pt-6 border-t border-white/10">
                    <button type="submit" class="w-full md:w-auto px-10 py-4 bg-indigo-600 hover:bg-indigo-500 text-white font-bold rounded-xl transition duration-200 shadow-xl shadow-indigo-500/20">
                        Register Book
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-layout>
