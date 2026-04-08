<header class="sticky top-4 z-50 px-4">
    <nav class="max-w-7xl mx-auto glass rounded-2xl px-6 py-4 flex items-center justify-between shadow-2xl">
        <div class="flex items-center space-x-2">
            <div class="w-8 h-8 bg-gradient-to-tr from-indigo-500 to-purple-500 rounded-lg flex items-center justify-center font-bold text-white">L</div>
            <span class="text-xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-white to-gray-400">Laravel App</span>
        </div>
        
        <div class="hidden md:flex items-center space-x-1">
            @php
                $links = [
                    '/' => 'Home',
                    '/about' => 'About',
                    '/contact' => 'Contact',
                    '/services' => 'Services',
                    '/showcases' => 'Showcases',
                    '/blog' => 'Blog',
                    '/register' => 'Register',
                    '/dashboard' => 'Dashboard',
                ];
            @endphp

            @foreach($links as $url => $label)
                <a href="{{ $url }}" 
                   class="px-4 py-2 rounded-xl text-sm font-medium transition-all duration-300 hover:bg-white/10 hover:text-indigo-400 {{ request()->is(trim($url, '/')) || (request()->is('/') && $url == '/') ? 'bg-white/10 text-indigo-400' : 'text-gray-300' }}">
                    {{ $label }}
                </a>
            @endforeach
        </div>

        <button class="md:hidden glass p-2 rounded-lg text-gray-300">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
        </button>
    </nav>
</header>
