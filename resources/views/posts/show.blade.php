<x-app-layout>
    <x-slot name="header">Post généré</x-slot>

    <div class="max-w-3xl mx-auto">

        {{-- Success message --}}
        @if(session('success'))
            <div class="mb-6 px-4 py-3 rounded-xl bg-green-950 border border-green-800 text-green-400 text-sm">
                ✅ {{ session('success') }}
            </div>
        @endif

        {{-- Infos du post --}}
        <div class="flex flex-wrap gap-3 mb-6">
            <span class="px-3 py-1 rounded-full bg-violet-950 border border-violet-800 text-violet-400 text-xs font-medium">
                {{ $post->ton }}
            </span>
            <span class="px-3 py-1 rounded-full bg-gray-800 border border-gray-700 text-gray-400 text-xs font-medium">
                🎯 {{ $post->audience }}
            </span>
            <span class="px-3 py-1 rounded-full bg-gray-800 border border-gray-700 text-gray-400 text-xs font-medium">
                📌 {{ $post->sujet }}
            </span>
            <span class="px-3 py-1 rounded-full bg-gray-800 border border-gray-700 text-gray-400 text-xs font-medium">
                🕐 {{ $post->created_at->diffForHumans() }}
            </span>
        </div>

        {{-- Contenu généré --}}
        <div class="bg-gray-900 border border-gray-800 rounded-2xl p-8 mb-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-bold text-white">Ton post LinkedIn</h3>
                <button onclick="copyPost()"
                        class="flex items-center gap-2 px-4 py-2 rounded-xl bg-violet-950 border border-violet-800
                               text-violet-400 hover:bg-violet-900 text-xs font-medium transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                    </svg>
                    Copier
                </button>
            </div>

            {{-- Texte du post --}}
            <div id="post-content"
                 class="text-gray-200 text-sm leading-relaxed whitespace-pre-line bg-gray-800 rounded-xl p-6 border border-gray-700">
                {{ $post->contenu }}
            </div>
        </div>

        {{-- Actions --}}
        <div class="flex flex-wrap gap-4">
            <a href="{{ route('posts.generate') }}"
               class="flex-1 text-center py-3 rounded-xl bg-violet-700 hover:bg-violet-600
                      font-semibold text-white text-sm transition shadow-lg shadow-violet-900/40">
                ✨ Générer un nouveau post
            </a>
            <a href="{{ route('dashboard') }}"
               class="flex-1 text-center py-3 rounded-xl border border-gray-700 hover:border-violet-500
                      text-gray-300 hover:text-white font-semibold text-sm transition">
                ← Retour au dashboard
            </a>
        </div>

    </div>

    {{-- Script copier --}}
    <script>
        function copyPost() {
            const text = document.getElementById('post-content').innerText;
            navigator.clipboard.writeText(text).then(() => {
                alert('Post copié dans le presse-papiers !');
            });
        }
    </script>

</x-app-layout>