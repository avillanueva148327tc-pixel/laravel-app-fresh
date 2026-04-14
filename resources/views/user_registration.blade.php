<x-layout title="Join Us">
    <div class="max-w-4xl mx-auto p-8 md:p-12 glass rounded-[2rem] mt-12 shadow-2xl relative overflow-hidden animate-in fade-in zoom-in duration-500">
        <div class="absolute top-0 right-0 -mt-10 -mr-10 w-64 h-64 bg-indigo-500/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 -mb-10 -ml-10 w-64 h-64 bg-purple-500/10 rounded-full blur-3xl"></div>
        
        <div class="mb-10 text-center md:text-left">
            <h1 class="text-4xl font-extrabold text-white tracking-tight leading-none mb-3">Create an Account</h1>
            <p class="text-gray-400 text-lg">Every great journey begins with a single step. Join our community today.</p>
        </div>

        @if ($errors->any())
            <div class="p-5 mb-8 text-sm text-red-200 bg-red-500/10 border border-red-500/30 rounded-2xl backdrop-blur-xl animate-bounce-subtle">
                <div class="flex items-center mb-3 font-bold text-red-400">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                    Oops! Please check your details:
                </div>
                <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-4 gap-y-1 text-xs opacity-90">
                    @foreach ($errors->all() as $err)
                        <li class="flex items-center"><span class="w-1 h-1 bg-red-400 rounded-full mr-2"></span>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('users.store') }}" class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
            @csrf

            <!-- Form Group Wrapper for Staggered Animation -->
            <div class="space-y-6 md:contents">
                <!-- First Name -->
                <div class="space-y-2 group">
                    <label class="text-xs font-bold text-gray-500 uppercase tracking-widest ml-1 transition-colors group-focus-within:text-indigo-400">First Name</label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 group-focus-within:text-indigo-400 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        </span>
                        <input name="first_name" type="text" placeholder="John" value="{{ old('first_name') }}"
                               class="w-full rounded-2xl py-4 pl-12 pr-4 bg-white/5 border {{ $errors->has('first_name') ? 'border-red-500/50' : 'border-white/10' }} text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:bg-white/10 transition-all">
                    </div>
                </div>

                <!-- Last Name -->
                <div class="space-y-2 group">
                    <label class="text-xs font-bold text-gray-500 uppercase tracking-widest ml-1 transition-colors group-focus-within:text-indigo-400">Last Name</label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 group-focus-within:text-indigo-400 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        </span>
                        <input name="last_name" type="text" placeholder="Doe" value="{{ old('last_name') }}"
                               class="w-full rounded-2xl py-4 pl-12 pr-4 bg-white/5 border {{ $errors->has('last_name') ? 'border-red-500/50' : 'border-white/10' }} text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:bg-white/10 transition-all">
                    </div>
                </div>

                <!-- Email Address -->
                <div class="space-y-2 md:col-span-2 group">
                    <label class="text-xs font-bold text-gray-500 uppercase tracking-widest ml-1 transition-colors group-focus-within:text-indigo-400">Email Address</label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 group-focus-within:text-indigo-400 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </span>
                        <input name="email" type="email" placeholder="john@example.com" value="{{ old('email') }}"
                               class="w-full rounded-2xl py-4 pl-12 pr-4 bg-white/5 border {{ $errors->has('email') ? 'border-red-500/50' : 'border-white/10' }} text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:bg-white/10 transition-all">
                    </div>
                </div>

                <!-- Age -->
                <div class="space-y-2 group">
                    <label class="text-xs font-bold text-gray-500 uppercase tracking-widest ml-1 transition-colors group-focus-within:text-indigo-400">Age (Required)</label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 group-focus-within:text-indigo-400 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </span>
                        <input name="age" type="number" placeholder="25" value="{{ old('age') }}" required
                               class="w-full rounded-2xl py-4 pl-12 pr-4 bg-white/5 border {{ $errors->has('age') ? 'border-red-500/50' : 'border-white/10' }} text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:bg-white/10 transition-all">
                    </div>
                </div>

                <!-- Contact Number -->
                <div class="space-y-2 group">
                    <label class="text-xs font-bold text-gray-500 uppercase tracking-widest ml-1 transition-colors group-focus-within:text-indigo-400">Contact Number (Required)</label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 group-focus-within:text-indigo-400 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        </span>
                        <input name="contact_number" type="text" placeholder="+1 (555) 000-0000" value="{{ old('contact_number') }}" required
                               class="w-full rounded-2xl py-4 pl-12 pr-4 bg-white/5 border {{ $errors->has('contact_number') ? 'border-red-500/50' : 'border-white/10' }} text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:bg-white/10 transition-all">
                    </div>
                </div>

                <!-- Address -->
                <div class="space-y-2 md:col-span-2 group">
                    <label class="text-xs font-bold text-gray-500 uppercase tracking-widest ml-1 transition-colors group-focus-within:text-indigo-400">Address (Required)</label>
                    <div class="relative">
                        <span class="absolute left-4 top-6 text-gray-500 group-focus-within:text-indigo-400 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </span>
                        <textarea name="address" rows="2" placeholder="123 Legend St, Cyber City" required
                               class="w-full rounded-2xl py-4 pl-12 pr-4 bg-white/5 border {{ $errors->has('address') ? 'border-red-500/50' : 'border-white/10' }} text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:bg-white/10 transition-all">{{ old('address') }}</textarea>
                    </div>
                </div>

                <!-- Password -->
                <div class="space-y-2 group">
                    <label class="text-xs font-bold text-gray-500 uppercase tracking-widest ml-1 transition-colors group-focus-within:text-indigo-400">Password (Min 8 chars)</label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 group-focus-within:text-indigo-400 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        </span>
                        <input name="password" type="password" placeholder="••••••••" required
                               class="w-full rounded-2xl py-4 pl-12 pr-4 bg-white/5 border {{ $errors->has('password') ? 'border-red-500/50' : 'border-white/10' }} text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:bg-white/10 transition-all">
                    </div>
                </div>

                <!-- Confirm Password -->
                <div class="space-y-2 group">
                    <label class="text-xs font-bold text-gray-500 uppercase tracking-widest ml-1 transition-colors group-focus-within:text-indigo-400">Confirm Password</label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 group-focus-within:text-indigo-400 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        </span>
                        <input name="password_confirmation" type="password" placeholder="••••••••" required
                               class="w-full rounded-2xl py-4 pl-12 pr-4 bg-white/5 border border-white/10 text-white placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:bg-white/10 transition-all">
                    </div>
                </div>
            </div>

            <button type="submit"
                    class="md:col-span-2 mt-6 relative group overflow-hidden bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 text-white font-black py-5 px-10 rounded-2xl shadow-2xl shadow-indigo-500/40 transition-all duration-500 transform hover:-translate-y-1 active:scale-[0.95]">
                <span class="relative z-10 flex items-center justify-center text-lg uppercase tracking-widest">
                    Create My Account
                    <svg class="w-6 h-6 ml-3 group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                </span>
                <div class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
            </button>
        </form>
    </div>

    <style>
        @keyframes bounce-subtle {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
        }
        .animate-bounce-subtle {
            animation: bounce-subtle 3s infinite ease-in-out;
        }
    </style>
</x-layout>
