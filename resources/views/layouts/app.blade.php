<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'LinkBoost AI') }}</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-950 text-white">
        <div class="min-h-screen flex">

            {{-- Sidebar --}}
            <aside class="w-64 bg-gray-900 border-r border-violet-800 flex flex-col">
                {{-- Logo --}}
                <div class="px-6 py-6 border-b border-violet-800">
                    <h1 class="text-xl font-bold text-white">
                        Link<span class="text-violet-500">Boost</span> AI
                    </h1>
                    <p class="text-xs text-gray-400 mt-1">Générateur de posts LinkedIn</p>
                </div>

                {{-- Navigation --}}
                <nav class="flex-1 px-4 py-6 space-y-2">
                    <a href="{{ route('dashboard') }}"
                       class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm font-medium
                              {{ request()->routeIs('dashboard') ? 'bg-violet-700 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                         Dashboard
                    </a>
                   <a href="{{ route('posts.generate') }}"
                    class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm font-medium
                            {{ request()->routeIs('posts.generate') ? 'bg-violet-700 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                         Générer un post
                    </a>
                   <a href="{{ route('posts.hook') }}"
                    class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm font-medium
                            {{ request()->routeIs('posts.hook') ? 'bg-violet-700 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                         Générer un hook
                    </a>

                    <a href="{{ route('posts.rewrite') }}"
                    class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm font-medium
                            {{ request()->routeIs('posts.rewrite') ? 'bg-violet-700 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                         Réécrire un post
                    </a>
                   <a href="{{ route('posts.index') }}"
                    class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm font-medium
                            {{ request()->routeIs('posts.index') ? 'bg-violet-700 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                         Historique
                    </a>
                </nav>

                {{-- User + Logout --}}
                <div class="px-4 py-4 border-t border-violet-800">
                    <p class="text-xs text-gray-400 mb-1">{{ Auth::user()->name }}</p>
                  <a href="{{ route('credits.index') }}"
                    class="text-xs font-semibold mb-3 flex items-center gap-1
                            {{ request()->routeIs('credits.index') ? 'text-white' : 'text-violet-400 hover:text-violet-300' }} transition">
                        💎 {{ Auth::user()->credits }} crédits
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                class="w-full text-left text-xs text-gray-400 hover:text-red-400 transition">
                            → Se déconnecter
                        </button>
                    </form>
                </div>
            </aside>

            {{-- Main content --}}
            <div class="flex-1 flex flex-col">
                {{-- Top bar --}}
                <header class="bg-gray-900 border-b border-violet-800 px-8 py-4 flex justify-between items-center">
                    @isset($header)
                        <div class="text-white font-semibold text-lg">{{ $header }}</div>
                    @endisset
                    <a href="{{ url('/') }}" class="text-sm text-gray-400 hover:text-white transition">
                        ← Retour au site
                    </a>
                </header>

                {{-- Page content --}}
                <main class="flex-1 p-8">
                    {{ $slot }}
                </main>
            </div>

        </div>
    </body>
</html>