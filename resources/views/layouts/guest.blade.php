<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>LinkBoost AI</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-950 text-white min-h-screen">

    {{-- NAVBAR --}}
    <nav class="fixed top-0 left-0 right-0 z-50 flex items-center justify-between px-10 py-4 bg-gray-950/80 backdrop-blur border-b border-violet-900/40">
        <a href="{{ url('/') }}" class="text-xl font-bold tracking-tight">
            Link<span class="text-violet-500">Boost</span> AI
        </a>
        <div class="flex items-center gap-3">
            <a href="{{ route('login') }}"
               class="px-5 py-2 rounded-lg text-sm font-medium text-gray-300 hover:text-white border border-gray-700 hover:border-violet-600 transition">
                Se connecter
            </a>
            @if (Route::has('register'))
                <a href="{{ route('register') }}"
                   class="px-5 py-2 rounded-lg bg-violet-700 hover:bg-violet-600 text-sm font-semibold transition">
                    S'inscrire gratuitement
                </a>
            @endif
        </div>
    </nav>

    {{-- MAIN --}}
    <div class="min-h-screen flex items-center justify-center px-4 pt-24 pb-12">
        <div class="w-full max-w-md">

            {{-- Logo centré --}}
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold">
                    Link<span class="text-violet-500">Boost</span> AI
                </h1>
                <p class="text-gray-400 text-sm mt-2">
                    Génère des posts LinkedIn grâce à l'IA
                </p>
            </div>

            {{-- Card formulaire --}}
            <div class="bg-gray-900 border border-gray-800 rounded-2xl p-8 shadow-xl shadow-violet-900/10">
                {{ $slot }}
            </div>

            {{-- Footer --}}
            <p class="text-center text-gray-600 text-xs mt-6">
                © {{ date('Y') }} LinkBoost AI · Tous droits réservés
            </p>

        </div>
    </div>

</body>
</html>