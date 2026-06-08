<x-app-layout>
    <x-slot name="header">Dashboard</x-slot>

    {{-- Stats cards --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

        {{-- Crédits --}}
        <div class="group bg-gray-900 border border-gray-800 hover:border-violet-600 rounded-2xl p-6
                    transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-violet-900/20">
            <div class="flex items-center justify-between mb-4">
                <span class="text-xs font-semibold text-gray-500 uppercase tracking-widest">Crédits restants</span>
                <div class="w-9 h-9 rounded-xl bg-violet-950 border border-violet-800 flex items-center justify-center">
                    <svg class="w-4 h-4 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
            <p class="text-4xl font-bold text-white mb-1">{{ Auth::user()->credits }}</p>
            <p class="text-xs text-gray-500">crédits disponibles</p>
        </div>

        {{-- Posts générés --}}
        <div class="group bg-gray-900 border border-gray-800 hover:border-violet-600 rounded-2xl p-6
                    transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-violet-900/20">
            <div class="flex items-center justify-between mb-4">
                <span class="text-xs font-semibold text-gray-500 uppercase tracking-widest">Posts générés</span>
                <div class="w-9 h-9 rounded-xl bg-violet-950 border border-violet-800 flex items-center justify-center">
                    <svg class="w-4 h-4 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                </div>
            </div>
            <p class="text-4xl font-bold text-white mb-1">{{ Auth::user()->posts()->count() }}</p>
            <p class="text-xs text-gray-500">posts créés</p>
        </div>

  {{-- Compte --}}
<a href="{{ route('profile.edit') }}"
   class="group bg-gray-900 border border-gray-800 hover:border-violet-600 rounded-2xl p-6
          transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-violet-900/20 block">
    <div class="flex items-center justify-between mb-4">
        <span class="text-xs font-semibold text-gray-500 uppercase tracking-widest">Compte</span>
        <div class="w-9 h-9 rounded-xl bg-violet-950 border border-violet-800 flex items-center justify-center">
            <svg class="w-4 h-4 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
            </svg>
        </div>
    </div>
    <p class="text-lg font-bold text-white mb-1 truncate group-hover:text-violet-400 transition">
        {{ Auth::user()->name }}
    </p>
    <p class="text-xs text-gray-500">{{ Auth::user()->email }}</p>
</a>

    </div>

    {{-- Actions rapides --}}
    <div class="mb-8">
        <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-widest mb-4">Actions rapides</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

            <a href="{{ route('posts.generate') }}" class="flex items-center gap-4 bg-gray-900 border border-gray-800 hover:border-violet-600
                               rounded-2xl p-5 transition-all duration-300 hover:-translate-y-1 hover:shadow-lg
                               hover:shadow-violet-900/20 group">
                <div class="w-10 h-10 rounded-xl bg-violet-950 border border-violet-800 flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                </div>
                <div>
                    <p class="font-semibold text-white text-sm group-hover:text-violet-400 transition">Générer un post</p>
                    <p class="text-xs text-gray-500">Rédiger un nouveau post LinkedIn</p>
                </div>
            </a>

            <a href="{{ route('posts.hook') }}" class="flex items-center gap-4 bg-gray-900 border border-gray-800 hover:border-violet-600
                               rounded-2xl p-5 transition-all duration-300 hover:-translate-y-1 hover:shadow-lg
                               hover:shadow-violet-900/20 group">
                <div class="w-10 h-10 rounded-xl bg-violet-950 border border-violet-800 flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <div>
                    <p class="font-semibold text-white text-sm group-hover:text-violet-400 transition">Créer un hook</p>
                    <p class="text-xs text-gray-500">Générer une accroche percutante</p>
                </div>
            </a>

            <a href="{{ route('posts.rewrite') }}" class="flex items-center gap-4 bg-gray-900 border border-gray-800 hover:border-violet-600
                               rounded-2xl p-5 transition-all duration-300 hover:-translate-y-1 hover:shadow-lg
                               hover:shadow-violet-900/20 group">
                <div class="w-10 h-10 rounded-xl bg-violet-950 border border-violet-800 flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                    </svg>
                </div>
                <div>
                    <p class="font-semibold text-white text-sm group-hover:text-violet-400 transition">Réécrire un post</p>
                    <p class="text-xs text-gray-500">Améliorer un contenu existant</p>
                </div>
            </a>

        </div>
    </div>

    {{-- Derniers posts --}}
    <div>
        <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-widest mb-4">Derniers posts générés</h3>
        <div class="bg-gray-900 border border-gray-800 rounded-2xl p-6">
            @if(Auth::user()->posts()->count() > 0)
                <div class="space-y-4">
                    @foreach(Auth::user()->posts()->latest()->take(5)->get() as $post)
                        <div class="flex items-start justify-between gap-4 p-4 bg-gray-800 rounded-xl border border-gray-700">
                            <div class="flex-1 min-w-0">
                                <p class="text-sm text-white font-medium truncate">{{ $post->sujet }}</p>
                                <p class="text-xs text-gray-500 mt-1">{{ $post->type_generation }} · {{ $post->created_at->diffForHumans() }}</p>
                            </div>
                            <span class="text-xs px-3 py-1 rounded-full bg-violet-950 border border-violet-800 text-violet-400 shrink-0">
                                {{ $post->ton }}
                            </span>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12">
                    <div class="w-12 h-12 rounded-xl bg-violet-950 border border-violet-800 flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                    </div>
                    <p class="text-gray-400 text-sm font-medium">Aucun post généré pour l'instant</p>
                    <p class="text-gray-600 text-xs mt-1">Génère ton premier post LinkedIn avec l'IA</p>
                </div>
            @endif
        </div>
    </div>

</x-app-layout>