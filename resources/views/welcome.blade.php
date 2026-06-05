<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LinkBoost AI — Génère des posts LinkedIn avec l'IA</title>
    <meta name="description" content="LinkBoost AI génère des posts LinkedIn percutants, des hooks accrocheurs et réécrit ton contenu grâce à l'intelligence artificielle.">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-950 text-white">

    {{-- NAVBAR --}}
    <nav class="fixed top-0 left-0 right-0 z-50 flex items-center justify-between px-10 py-4 bg-gray-950/80 backdrop-blur border-b border-violet-900/40">
        <h1 class="text-xl font-bold tracking-tight">
            Link<span class="text-violet-500">Boost</span> AI
        </h1>
        <div class="hidden md:flex items-center gap-8">
            <a href="#features" class="text-sm text-gray-400 hover:text-white transition">Fonctionnalités</a>
            <a href="#pricing" class="text-sm text-gray-400 hover:text-white transition">Tarifs</a>
            <a href="#faq" class="text-sm text-gray-400 hover:text-white transition">FAQ</a>
        </div>
        <div class="flex items-center gap-3">
            @auth
                <a href="{{ url('/dashboard') }}"
                   class="px-5 py-2 rounded-lg bg-violet-700 hover:bg-violet-600 text-sm font-semibold transition">
                    Dashboard
                </a>
            @else
                <a href="{{ route('login') }}"
                   class="px-5 py-2 rounded-lg text-sm font-medium text-gray-300 hover:text-white border border-gray-700 hover:border-violet-600 transition">
                    Se connecter
                </a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                       class="px-5 py-2 rounded-lg bg-violet-700 hover:bg-violet-600 text-sm font-semibold transition">
                        Commencer gratuitement
                    </a>
                @endif
            @endauth
        </div>
    </nav>

    {{-- HERO --}}
    <section class="flex flex-col items-center justify-center text-center px-6 pt-48 pb-32">
        <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-violet-700/50 bg-violet-950/40 text-violet-400 text-xs font-semibold tracking-widest uppercase mb-8">
            Propulsé par l'IA
        </div>

        <h2 class="text-5xl md:text-6xl font-extrabold leading-tight mb-6 max-w-4xl">
            Génère des posts LinkedIn
            <span class="text-violet-500">percutants</span>
            en quelques secondes
        </h2>

        <p class="text-gray-400 text-lg max-w-2xl mb-10 leading-relaxed">
            LinkBoost AI rédige tes posts, crée des hooks accrocheurs et améliore
            ton contenu grâce à l'intelligence artificielle. Plus jamais la page blanche.
        </p>

        <div class="flex flex-wrap gap-4 justify-center mb-16">
            @auth
                <a href="{{ url('/dashboard') }}"
                   class="px-8 py-3.5 rounded-xl bg-violet-700 hover:bg-violet-600 font-semibold text-base transition shadow-lg shadow-violet-900/40">
                    Accéder au dashboard →
                </a>
            @else
                <a href="{{ route('register') }}"
                   class="px-8 py-3.5 rounded-xl bg-violet-700 hover:bg-violet-600 font-semibold text-base transition shadow-lg shadow-violet-900/40">
                    Commencer gratuitement →
                </a>
                <a href="{{ route('login') }}"
                   class="px-8 py-3.5 rounded-xl border border-gray-700 hover:border-violet-500 text-gray-300 hover:text-white font-semibold text-base transition">
                    Se connecter
                </a>
            @endauth
        </div>

        {{-- Stats --}}
        <div class="grid grid-cols-3 gap-8 max-w-lg">
            <div class="text-center">
                <p class="text-3xl font-extrabold text-white">10</p>
                <p class="text-xs text-gray-500 mt-1">Crédits offerts</p>
            </div>
            <div class="text-center border-x border-gray-800">
                <p class="text-3xl font-extrabold text-white">3</p>
                <p class="text-xs text-gray-500 mt-1">Outils IA</p>
            </div>
            <div class="text-center">
                <p class="text-3xl font-extrabold text-white">100%</p>
                <p class="text-xs text-gray-500 mt-1">LinkedIn optimisé</p>
            </div>
        </div>
    </section>

    {{-- FEATURES --}}
    <section id="features" class="px-6 pb-32 max-w-5xl mx-auto">
        <div class="text-center mb-16">
            <span class="text-xs font-semibold text-violet-400 uppercase tracking-widest">Fonctionnalités</span>
            <h3 class="text-3xl font-bold mt-3 text-white">
                Tout ce dont tu as besoin pour
                <span class="text-violet-500">dominer LinkedIn</span>
            </h3>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="group bg-gray-900 border border-gray-800 hover:border-violet-600 rounded-2xl p-8
                        transition-all duration-300 hover:-translate-y-2 hover:shadow-xl hover:shadow-violet-900/30">
                <div class="w-12 h-12 rounded-xl bg-violet-950 border border-violet-800 flex items-center justify-center mb-5">
                    <svg class="w-6 h-6 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                </div>
                <h4 class="font-bold text-lg mb-2 group-hover:text-violet-400 transition">Générer un post</h4>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Donne un sujet, un ton et une audience. L'IA rédige ton post LinkedIn optimisé en quelques secondes.
                </p>
            </div>

            <div class="group bg-gray-900 border border-gray-800 hover:border-violet-600 rounded-2xl p-8
                        transition-all duration-300 hover:-translate-y-2 hover:shadow-xl hover:shadow-violet-900/30">
                <div class="w-12 h-12 rounded-xl bg-violet-950 border border-violet-800 flex items-center justify-center mb-5">
                    <svg class="w-6 h-6 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <h4 class="font-bold text-lg mb-2 group-hover:text-violet-400 transition">Créer un hook</h4>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Génère des premières lignes accrocheuses qui captivent ton audience et donnent envie de lire la suite.
                </p>
            </div>

            <div class="group bg-gray-900 border border-gray-800 hover:border-violet-600 rounded-2xl p-8
                        transition-all duration-300 hover:-translate-y-2 hover:shadow-xl hover:shadow-violet-900/30">
                <div class="w-12 h-12 rounded-xl bg-violet-950 border border-violet-800 flex items-center justify-center mb-5">
                    <svg class="w-6 h-6 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                    </svg>
                </div>
                <h4 class="font-bold text-lg mb-2 group-hover:text-violet-400 transition">Réécrire un post</h4>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Colle ton contenu existant et laisse l'IA l'améliorer pour maximiser ton impact sur LinkedIn.
                </p>
            </div>
        </div>
    </section>

    {{-- PRICING --}}
    <section id="pricing" class="px-6 pb-32 max-w-4xl mx-auto">
        <div class="text-center mb-16">
            <span class="text-xs font-semibold text-violet-400 uppercase tracking-widest">Tarifs</span>
            <h3 class="text-3xl font-bold mt-3 text-white">
                Simple et <span class="text-violet-500">transparent</span>
            </h3>
            <p class="text-gray-400 text-sm mt-3">Commence gratuitement. Upgrade quand tu es prêt.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            {{-- Plan Gratuit --}}
            <div class="bg-gray-900 border border-gray-800 rounded-2xl p-8">
                <div class="mb-6">
                    <h4 class="text-lg font-bold text-white mb-1">Gratuit</h4>
                    <p class="text-gray-400 text-sm">Pour commencer et tester</p>
                </div>
                <div class="mb-8">
                    <span class="text-5xl font-extrabold text-white">0</span>
                    <span class="text-gray-400 text-sm ml-1">FCFA / mois</span>
                </div>
                <ul class="space-y-3 mb-8">
                    <li class="flex items-center gap-3 text-sm text-gray-300">
                        <svg class="w-4 h-4 text-violet-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        10 crédits offerts à l'inscription
                    </li>
                    <li class="flex items-center gap-3 text-sm text-gray-300">
                        <svg class="w-4 h-4 text-violet-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Génération de posts LinkedIn
                    </li>
                    <li class="flex items-center gap-3 text-sm text-gray-300">
                        <svg class="w-4 h-4 text-violet-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Génération de hooks
                    </li>
                    <li class="flex items-center gap-3 text-sm text-gray-300">
                        <svg class="w-4 h-4 text-violet-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Historique des posts
                    </li>
                </ul>
                <a href="{{ route('register') }}"
                   class="block text-center py-3 rounded-xl border border-violet-700 hover:border-violet-500
                          text-violet-400 hover:text-white font-semibold text-sm transition">
                    Commencer gratuitement
                </a>
            </div>

            {{-- Plan Pro --}}
            <div class="bg-gray-900 border border-violet-600 rounded-2xl p-8 relative">
                <div class="absolute -top-3 left-1/2 -translate-x-1/2">
                    <span class="px-4 py-1 rounded-full bg-violet-700 text-white text-xs font-bold">
                        Populaire
                    </span>
                </div>
                <div class="mb-6">
                    <h4 class="text-lg font-bold text-white mb-1">Pro</h4>
                    <p class="text-gray-400 text-sm">Pour les créateurs sérieux</p>
                </div>
                <div class="mb-8">
                    <span class="text-5xl font-extrabold text-white">4 900</span>
                    <span class="text-gray-400 text-sm ml-1">FCFA / mois</span>
                </div>
                <ul class="space-y-3 mb-8">
                    <li class="flex items-center gap-3 text-sm text-gray-300">
                        <svg class="w-4 h-4 text-violet-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        100 crédits par mois
                    </li>
                    <li class="flex items-center gap-3 text-sm text-gray-300">
                        <svg class="w-4 h-4 text-violet-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Toutes les fonctionnalités Gratuit
                    </li>
                    <li class="flex items-center gap-3 text-sm text-gray-300">
                        <svg class="w-4 h-4 text-violet-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Réécriture de posts illimitée
                    </li>
                    <li class="flex items-center gap-3 text-sm text-gray-300">
                        <svg class="w-4 h-4 text-violet-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Support prioritaire
                    </li>
                </ul>
                <a href="{{ route('register') }}"
                   class="block text-center py-3 rounded-xl bg-violet-700 hover:bg-violet-600
                          text-white font-semibold text-sm transition shadow-lg shadow-violet-900/40">
                    Choisir Pro →
                </a>
            </div>

        </div>
    </section>

    {{-- FAQ --}}
    <section id="faq" class="px-6 pb-32 max-w-3xl mx-auto">
        <div class="text-center mb-16">
            <span class="text-xs font-semibold text-violet-400 uppercase tracking-widest">FAQ</span>
            <h3 class="text-3xl font-bold mt-3 text-white">
                Questions <span class="text-violet-500">fréquentes</span>
            </h3>
        </div>

        <div class="space-y-4">
            <div class="bg-gray-900 border border-gray-800 rounded-2xl p-6">
                <h4 class="font-semibold text-white mb-2">C'est quoi un crédit ?</h4>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Un crédit correspond à une génération. Chaque post, hook ou réécriture générée consomme 1 crédit.
                </p>
            </div>
            <div class="bg-gray-900 border border-gray-800 rounded-2xl p-6">
                <h4 class="font-semibold text-white mb-2">Les posts générés sont-ils uniques ?</h4>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Oui. Chaque post est généré à partir de tes paramètres (sujet, ton, audience) et est unique à chaque génération.
                </p>
            </div>
            <div class="bg-gray-900 border border-gray-800 rounded-2xl p-6">
                <h4 class="font-semibold text-white mb-2">Puis-je modifier le post généré ?</h4>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Absolument. Le post généré est une base de travail. Tu peux le copier et le modifier à ta guise avant de le publier.
                </p>
            </div>
            <div class="bg-gray-900 border border-gray-800 rounded-2xl p-6">
                <h4 class="font-semibold text-white mb-2">Mes données sont-elles sécurisées ?</h4>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Oui. Tes posts sont sauvegardés dans ton espace personnel et ne sont accessibles qu'à toi.
                </p>
            </div>
        </div>
    </section>

    {{-- CTA FINAL --}}
    <section class="px-6 pb-32 max-w-3xl mx-auto text-center">
        <div class="bg-gray-900 border border-violet-800 rounded-3xl p-12">
            <h3 class="text-3xl font-extrabold text-white mb-4">
                Prêt à booster ta présence
                <span class="text-violet-500">LinkedIn ?</span>
            </h3>
            <p class="text-gray-400 text-base mb-8 leading-relaxed">
                Rejoins LinkBoost AI et génère ton premier post en moins de 30 secondes.
                10 crédits offerts à l'inscription.
            </p>
            @auth
                <a href="{{ url('/dashboard') }}"
                   class="inline-block px-10 py-4 rounded-xl bg-violet-700 hover:bg-violet-600
                          font-bold text-white text-base transition shadow-lg shadow-violet-900/40">
                    Accéder au dashboard →
                </a>
            @else
                <a href="{{ route('register') }}"
                   class="inline-block px-10 py-4 rounded-xl bg-violet-700 hover:bg-violet-600
                          font-bold text-white text-base transition shadow-lg shadow-violet-900/40">
                    Commencer gratuitement →
                </a>
            @endauth
        </div>
    </section>

    {{-- FOOTER --}}
    <footer class="border-t border-gray-800 px-10 py-8">
        <div class="max-w-5xl mx-auto flex flex-col md:flex-row items-center justify-between gap-4">
            <h1 class="text-lg font-bold">
                Link<span class="text-violet-500">Boost</span> AI
            </h1>
            <div class="flex gap-6">
                <a href="#features" class="text-xs text-gray-500 hover:text-gray-300 transition">Fonctionnalités</a>
                <a href="#pricing" class="text-xs text-gray-500 hover:text-gray-300 transition">Tarifs</a>
                <a href="#faq" class="text-xs text-gray-500 hover:text-gray-300 transition">FAQ</a>
            </div>
            <p class="text-xs text-gray-600">© {{ date('Y') }} LinkBoost AI · Tous droits réservés</p>
        </div>
    </footer>

</body>
</html>