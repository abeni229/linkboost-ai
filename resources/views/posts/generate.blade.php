<x-app-layout>
    <x-slot name="header">Générer un post</x-slot>

    <div class="max-w-2xl mx-auto">

        {{-- Error API --}}
        @if($errors->has('api'))
            <div class="mb-6 px-4 py-3 rounded-xl bg-red-950 border border-red-800 text-red-400 text-sm">
                ⚠️ {{ $errors->first('api') }}
            </div>
        @endif

        {{-- Success --}}
        @if(session('success'))
            <div class="mb-6 px-4 py-3 rounded-xl bg-green-950 border border-green-800 text-green-400 text-sm">
                ✅ {{ session('success') }}
            </div>
        @endif

        {{-- Card formulaire --}}
        <div class="bg-gray-900 border border-gray-800 rounded-2xl p-8">

            <div class="mb-8">
                <h3 class="text-xl font-bold text-white">Nouveau post LinkedIn</h3>
                <p class="text-gray-400 text-sm mt-1">
                    Remplis les champs ci-dessous et laisse l'IA rédiger ton post.
                </p>
            </div>

            <form method="POST" action="{{ route('posts.store') }}" class="space-y-6">
                @csrf

                {{-- Sujet --}}
                        <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">
                    Sujet du post <span class="text-violet-400">*</span>
                </label>
                <input type="text" name="sujet" id="sujet-input"
                    value="{{ old('sujet') }}"
                    maxlength="255"
                    placeholder="Ex: Comment j'ai appris Laravel en 30 jours"
                    class="w-full px-4 py-3 rounded-xl bg-gray-800 border border-gray-700
                            text-white placeholder-gray-500 focus:outline-none focus:border-violet-500
                            focus:ring-1 focus:ring-violet-500 transition text-sm"/>
                <div class="flex justify-between mt-1">
                    <x-input-error :messages="$errors->get('sujet')" class="text-red-400 text-xs"/>
                    <span id="sujet-counter" class="text-xs text-gray-500 ml-auto">0 / 255</span>
                </div>
            </div>

                {{-- Ton --}}
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">
                        Ton du post <span class="text-violet-400">*</span>
                    </label>
                    <select name="ton"
                            class="w-full px-4 py-3 rounded-xl bg-gray-800 border border-gray-700
                                   text-white focus:outline-none focus:border-violet-500
                                   focus:ring-1 focus:ring-violet-500 transition text-sm">
                        <option value="">-- Choisir un ton --</option>
           <option value="professionnel"  {{ old('ton') == 'professionnel'  ? 'selected' : '' }}>Professionnel</option>
            <option value="inspirant"      {{ old('ton') == 'inspirant'      ? 'selected' : '' }}>Inspirant</option>
            <option value="educatif"       {{ old('ton') == 'educatif'       ? 'selected' : '' }}>Educatif</option>
            <option value="storytelling"   {{ old('ton') == 'storytelling'   ? 'selected' : '' }}>Storytelling</option>
            <option value="humoristique"   {{ old('ton') == 'humoristique'   ? 'selected' : '' }}>Humoristique</option>
            <option value="direct"         {{ old('ton') == 'direct'         ? 'selected' : '' }}>Direct</option>
                    </select>
                    @error('ton')
                        <p class="mt-1 text-red-400 text-xs">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Audience --}}
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">
                        Audience cible <span class="text-violet-400">*</span>
                    </label>
                    <input type="text" name="audience"
                           value="{{ old('audience') }}"
                           placeholder="Ex: Développeurs web, freelances, entrepreneurs"
                           class="w-full px-4 py-3 rounded-xl bg-gray-800 border border-gray-700
                                  text-white placeholder-gray-500 focus:outline-none focus:border-violet-500
                                  focus:ring-1 focus:ring-violet-500 transition text-sm"/>
                    @error('audience')
                        <p class="mt-1 text-red-400 text-xs">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Crédits --}}
                <div class="flex items-center gap-3 px-4 py-3 rounded-xl bg-violet-950/40 border border-violet-800/40">
                    <svg class="w-4 h-4 text-violet-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <p class="text-xs text-violet-300">
                        Cette génération utilisera <span class="font-semibold">1 crédit</span>.
                        Il te reste <span class="font-semibold text-violet-400">{{ Auth::user()->credits }} crédits</span>.
                    </p>
                </div>

                {{-- Submit --}}
                <button type="submit" id="submit-btn"
                    class="w-full py-3.5 rounded-xl bg-violet-700 hover:bg-violet-600 font-semibold
                        text-white text-sm transition shadow-lg shadow-violet-900/40">
                <span id="btn-text">Générer mon post LinkedIn</span>
                <span id="btn-loading" class="hidden">
                    <svg class="animate-spin inline w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                    </svg>
                    Génération en cours...
                </span>
            </button>

            </form>
        </div>
    </div>
<script>
    // Compteur de caractères
    const sujetInput = document.getElementById('sujet-input');
    const sujetCounter = document.getElementById('sujet-counter');
    sujetInput.addEventListener('input', function() {
        sujetCounter.textContent = this.value.length + ' / 255';
        sujetCounter.classList.toggle('text-red-400', this.value.length > 230);
        sujetCounter.classList.toggle('text-gray-500', this.value.length <= 230);
    });

    // Indicateur de chargement
    document.querySelector('form').addEventListener('submit', function() {
        document.getElementById('btn-text').classList.add('hidden');
        document.getElementById('btn-loading').classList.remove('hidden');
        document.getElementById('submit-btn').disabled = true;
        document.getElementById('submit-btn').classList.add('opacity-75', 'cursor-not-allowed');
    });
</script>
</x-app-layout>