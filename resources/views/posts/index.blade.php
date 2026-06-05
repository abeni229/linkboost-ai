<x-app-layout>
    <x-slot name="header">Historique des posts</x-slot>

    <div class="max-w-4xl mx-auto">

        {{-- Header --}}
        <div class="flex items-center justify-between mb-8">
            <div>
                <p class="text-gray-400 text-sm">
                    {{ Auth::user()->posts()->count() }} post(s) généré(s)
                </p>
            </div>
            <a href="{{ route('posts.generate') }}"
               class="px-5 py-2.5 rounded-xl bg-violet-700 hover:bg-violet-600
                      font-semibold text-white text-sm transition shadow-lg shadow-violet-900/40">
                ✨ Nouveau post
            </a>
        </div>

        {{-- Liste des posts --}}
        @if($posts->count() > 0)
            <div class="space-y-4">
                @foreach($posts as $post)
                    <div class="group bg-gray-900 border border-gray-800 hover:border-violet-600
                                rounded-2xl p-6 transition-all duration-300">

                        <div class="flex items-start justify-between gap-4">
                            <div class="flex-1 min-w-0">

                                {{-- Badges --}}
                                <div class="flex flex-wrap gap-2 mb-3">
                                    <span class="px-2.5 py-1 rounded-full bg-violet-950 border border-violet-800
                                                 text-violet-400 text-xs font-medium">
                                        {{ $post->ton }}
                                    </span>
                                    <span class="px-2.5 py-1 rounded-full bg-gray-800 border border-gray-700
                                                 text-gray-400 text-xs font-medium">
                                        🎯 {{ $post->audience }}
                                    </span>
                                    <span class="px-2.5 py-1 rounded-full bg-gray-800 border border-gray-700
                                                 text-gray-400 text-xs font-medium">
                                        🕐 {{ $post->created_at->diffForHumans() }}
                                    </span>
                                </div>

                                {{-- Sujet --}}
                                <h4 class="text-white font-semibold text-base mb-2">
                                    {{ $post->sujet }}
                                </h4>

                                {{-- Aperçu contenu --}}
                                <p class="text-gray-400 text-sm leading-relaxed line-clamp-2">
                                    {{ $post->contenu }}
                                </p>

                            </div>

                            {{-- Actions --}}
                            <div class="flex flex-col gap-2 shrink-0">
                                <a href="{{ route('posts.show', $post->id) }}"
                                   class="px-4 py-2 rounded-xl bg-violet-950 border border-violet-800
                                          text-violet-400 hover:bg-violet-900 text-xs font-medium
                                          transition text-center">
                                    Voir
                                </a>
                                <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            onclick="return confirm('Supprimer ce post ?')"
                                            class="w-full px-4 py-2 rounded-xl bg-gray-800 border border-gray-700
                                                   text-red-400 hover:bg-red-950 hover:border-red-800
                                                   text-xs font-medium transition">
                                        Supprimer
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Pagination --}}
            <div class="mt-8">
                {{ $posts->links() }}
            </div>

        @else
            <div class="bg-gray-900 border border-gray-800 rounded-2xl p-12 text-center">
                <div class="w-12 h-12 rounded-xl bg-violet-950 border border-violet-800
                            flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                </div>
                <p class="text-gray-400 text-sm font-medium">Aucun post généré pour l'instant</p>
                <p class="text-gray-600 text-xs mt-1 mb-6">Génère ton premier post LinkedIn avec l'IA</p>
                <a href="{{ route('posts.generate') }}"
                   class="px-6 py-2.5 rounded-xl bg-violet-700 hover:bg-violet-600
                          font-semibold text-white text-sm transition">
                    ✨ Générer mon premier post
                </a>
            </div>
        @endif

    </div>

</x-app-layout>