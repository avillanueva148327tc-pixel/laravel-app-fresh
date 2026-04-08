<x-layout title="Laravel Fundamentals">
    <div class="max-w-4xl mx-auto space-y-12 py-12">
        <!-- Hero Section -->
        <div class="text-center space-y-4">
            <h1 class="text-5xl font-extrabold text-white tracking-tight">The PHP Framework for Web Artisans</h1>
            <p class="text-xl text-indigo-300">Laravel is a web application framework with expressive, elegant syntax.</p>
        </div>

        <!-- Fundamentals Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="glass p-8 rounded-3xl space-y-4">
                <div class="w-12 h-12 bg-indigo-500/20 rounded-2xl flex items-center justify-center text-indigo-400 font-bold text-xl">M</div>
                <h2 class="text-2xl font-bold text-white">Model (Eloquent)</h2>
                <p class="text-gray-400 leading-relaxed">Eloquent ORM is an advanced implementation of the active record pattern, providing a beautiful way to interact with your database. Each database table has a corresponding "Model" used to interact with that table.</p>
            </div>

            <div class="glass p-8 rounded-3xl space-y-4">
                <div class="w-12 h-12 bg-purple-500/20 rounded-2xl flex items-center justify-center text-purple-400 font-bold text-xl">V</div>
                <h2 class="text-2xl font-bold text-white">View (Blade)</h2>
                <p class="text-gray-400 leading-relaxed">Blade is the powerful templating engine included with Laravel. It allows you to use plain PHP in your templates without the mess, and compiles into plain PHP code and caches it for performance.</p>
            </div>

            <div class="glass p-8 rounded-3xl space-y-4">
                <div class="w-12 h-12 bg-pink-500/20 rounded-2xl flex items-center justify-center text-pink-400 font-bold text-xl">C</div>
                <h2 class="text-2xl font-bold text-white">Controller</h2>
                <p class="text-gray-400 leading-relaxed">Controllers can group related request handling logic into a single class. They are the "brains" of your application, directing traffic between Models and Views.</p>
            </div>

            <div class="glass p-8 rounded-3xl space-y-4">
                <div class="w-12 h-12 bg-blue-500/20 rounded-2xl flex items-center justify-center text-blue-400 font-bold text-xl">R</div>
                <h2 class="text-2xl font-bold text-white">Routing</h2>
                <p class="text-gray-400 leading-relaxed">Laravel routing is simple and expressive. Routes are defined in your web.php file and map URLs to specific controller actions or closures.</p>
            </div>
        </div>

        <div class="text-center pt-8">
            <a href="/register" class="bg-white/10 hover:bg-white/20 text-white px-8 py-4 rounded-2xl border border-white/10 transition-all font-bold">
                Get Started with CRUD
            </a>
        </div>
    </div>
</x-layout>