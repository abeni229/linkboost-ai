<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'LinkBoost AI') }}</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-950 text-white">
        <div class="min-h-screen flex">

            {{-- Overlay mobile --}}
            <div id="sidebar-overlay"
                 class="fixed inset-0 bg-black/60 z-20 hidden lg:hidden"
                 onclick="toggleSidebar()">
            </div>

            {{-- Sidebar --}}
            <aside id="sidebar"
                   class="fixed top-0 left-0 h-full w-64 bg-gray-900 border-r border-violet-800
                          flex flex-col z-30 transform -translate-x-full lg:translate-x-0
                          transition-transform duration-300 ease-in-out">

                {{-- Logo --}}
                <div class="px-6 py-6 border-b border-violet-800 flex items-center justify-between">
                    <div>
                        <h1 class="text-xl font-bold text-white">
                            Link<span class="text-violet-500">Boost</span> AI
                        </h1>
                        <p class="text-xs text-gray-400 mt-1">Générateur de posts LinkedIn</p>
                    </div>
                    <button onclick="toggleSidebar()"
                            class="lg:hidden text-gray-400 hover:text-white transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

                {{-- Navigation --}}
                <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
                    <a href="{{ route('dashboard') }}"
                       class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition
                              {{ request()->routeIs('dashboard') ? 'bg-violet-700 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                        <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        Dashboard
                    </a>
                    <a href="{{ route('posts.generate') }}"
                       class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition
                              {{ request()->routeIs('posts.generate') ? 'bg-violet-700 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                        <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                        Générer un post
                    </a>
                    <a href="{{ route('posts.hook') }}"
                       class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition
                              {{ request()->routeIs('posts.hook') ? 'bg-violet-700 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                        <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                        Générer un hook
                    </a>
                    <a href="{{ route('posts.rewrite') }}"
                       class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition
                              {{ request()->routeIs('posts.rewrite') ? 'bg-violet-700 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                        <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                        </svg>
                        Réécrire un post
                    </a>
                    <a href="{{ route('posts.index') }}"
                       class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition
                              {{ request()->routeIs('posts.index') ? 'bg-violet-700 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                        <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                        </svg>
                        Historique
                    </a>
                </nav>

                {{-- User + Logout --}}
                <div class="px-4 py-4 border-t border-violet-800">
                    <a href="{{ route('profile.edit') }}"
                       class="flex items-center gap-3 mb-3 hover:opacity-80 transition">
                        <div class="w-8 h-8 rounded-lg bg-violet-950 border border-violet-800
                                    flex items-center justify-center shrink-0">
                            <span class="text-xs font-bold text-violet-400">
                                {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                            </span>
                        </div>
                        <div class="min-w-0">
                            <p class="text-xs font-medium text-white truncate">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-gray-500 truncate">{{ Auth::user()->email }}</p>
                        </div>
                    </a>
                    <a href="{{ route('credits.index') }}"
                       class="flex items-center gap-2 text-xs font-semibold mb-3
                              {{ request()->routeIs('credits.index') ? 'text-white' : 'text-violet-400 hover:text-violet-300' }} transition">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        {{ Auth::user()->credits }} crédits
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                class="flex items-center gap-2 text-xs text-gray-400 hover:text-red-400 transition">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                            </svg>
                            Se déconnecter
                        </button>
                    </form>
                </div>
            </aside>

            {{-- Main content --}}
            <div class="flex-1 flex flex-col lg:ml-64">

                {{-- Top bar --}}
                <header class="bg-gray-900 border-b border-violet-800 px-6 py-4
                               flex justify-between items-center sticky top-0 z-10">
                    <div class="flex items-center gap-4">
                        {{-- Burger menu mobile --}}
                        <button onclick="toggleSidebar()"
                                class="lg:hidden text-gray-400 hover:text-white transition">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                            </svg>
                        </button>
                        @isset($header)
                            <div class="text-white font-semibold text-lg">{{ $header }}</div>
                        @endisset
                    </div>
                    <a href="{{ url('/') }}" class="text-sm text-gray-400 hover:text-white transition hidden sm:block">
                        ← Retour au site
                    </a>
                </header>

                {{-- Page content --}}
                <main class="flex-1 p-4 sm:p-6 lg:p-8">
                    {{ $slot }}
                </main>
            </div>

        </div>

        <script>
            function toggleSidebar() {
                const sidebar = document.getElementById('sidebar');
                const overlay = document.getElementById('sidebar-overlay');
                sidebar.classList.toggle('-translate-x-full');
                overlay.classList.toggle('hidden');
            }
        </script>

    </body>
</html>