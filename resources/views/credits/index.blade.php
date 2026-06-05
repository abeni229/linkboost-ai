<x-app-layout>
    <x-slot name="header">Mes Crédits</x-slot>

    <div class="max-w-3xl mx-auto">

        {{-- Solde actuel --}}
        <div class="bg-gray-900 border border-violet-800 rounded-2xl p-8 mb-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-widest mb-2">
                        Solde actuel
                    </p>
                    <p class="text-6xl font-bold text-white mb-1">
                        {{ $user->credits }}
                    </p>
                    <p class="text-gray-400 text-sm">crédits disponibles</p>
                </div>
                <div class="w-20 h-20 rounded-2xl bg-violet-950 border border-violet-800
                            flex items-center justify-center">
                    <svg class="w-10 h-10 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>

            {{-- Barre de progression --}}
            <div class="mt-6">
                <div class="flex justify-between text-xs text-gray-500 mb-2">
                    <span>0 crédit</span>
                    <span>10 crédits</span>
                </div>
                <div class="w-full bg-gray-800 rounded-full h-2">
                    <div class="bg-violet-600 h-2 rounded-full transition-all duration-500"
                         style="width: {{ min(($user->credits / 10) * 100, 100) }}%">
                    </div>
                </div>
            </div>

            {{-- Alerte solde faible --}}
            @if($user->credits <= 3)
                <div class="mt-4 flex items-center gap-3 px-4 py-3 rounded-xl
                            bg-red-950 border border-red-800">
                    <svg class="w-4 h-4 text-red-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                    <p class="text-xs text-red-400 font-medium">
                        Attention ! Il te reste seulement <span class="font-bold">{{ $user->credits }} crédits</span>.
                    </p>
                </div>
            @endif
        </div>

        {{-- Comment utiliser les crédits --}}
        <div class="bg-gray-900 border border-gray-800 rounded-2xl p-6 mb-6">
            <h3 class="text-base font-bold text-white mb-4">Comment sont utilisés tes crédits ?</h3>
            <div class="space-y-3">
                <div class="flex items-center justify-between py-3 border-b border-gray-800">
                    <div class="flex items-center gap-3">
                        <span class="text-lg">✍️</span>
                        <span class="text-sm text-gray-300">Générer un post LinkedIn</span>
                    </div>
                    <span class="px-3 py-1 rounded-full bg-violet-950 border border-violet-800
                                 text-violet-400 text-xs font-bold">1 crédit</span>
                </div>
                <div class="flex items-center justify-between py-3 border-b border-gray-800">
                    <div class="flex items-center gap-3">
                        <span class="text-lg">🪝</span>
                        <span class="text-sm text-gray-300">Générer un hook</span>
                    </div>
                    <span class="px-3 py-1 rounded-full bg-violet-950 border border-violet-800
                                 text-violet-400 text-xs font-bold">1 crédit</span>
                </div>
                <div class="flex items-center justify-between py-3">
                    <div class="flex items-center gap-3">
                        <span class="text-lg">🔁</span>
                        <span class="text-sm text-gray-300">Réécrire un post</span>
                    </div>
                    <span class="px-3 py-1 rounded-full bg-violet-950 border border-violet-800
                                 text-violet-400 text-xs font-bold">1 crédit</span>
                </div>
            </div>
        </div>

        {{-- Dernières utilisations --}}
        <div class="bg-gray-900 border border-gray-800 rounded-2xl p-6">
            <h3 class="text-base font-bold text-white mb-4">Dernières utilisations</h3>
            @if($posts->count() > 0)
                <div class="space-y-3">
                    @foreach($posts as $post)
                        <div class="flex items-center justify-between py-3 border-b border-gray-800 last:border-0">
                            <div class="flex items-center gap-3">
                                <span class="text-lg">
                                    @if($post->type_generation == 'hook') 🪝
                                    @elseif($post->type_generation == 'rewrite') 🔁
                                    @else ✍️
                                    @endif
                                </span>
                                <div>
                                    <p class="text-sm text-gray-300 truncate max-w-xs">{{ $post->sujet }}</p>
                                    <p class="text-xs text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                            <span class="text-xs text-red-400 font-medium">-1 crédit</span>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500 text-sm text-center py-4">Aucune utilisation pour l'instant.</p>
            @endif
        </div>

    </div>

</x-app-layout>