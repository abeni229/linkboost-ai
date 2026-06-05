<x-guest-layout>

    <h2 class="text-xl font-bold text-white mb-6">Créer un compte</h2>

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        {{-- Nom --}}
        <div>
            <label for="name" class="block text-sm font-medium text-gray-300 mb-1">
                Nom complet
            </label>
            <input id="name" type="text" name="name"
                   value="{{ old('name') }}" required autofocus
                   class="w-full px-4 py-2.5 rounded-xl bg-gray-800 border border-gray-700
                          text-white placeholder-gray-500 focus:outline-none focus:border-violet-500
                          focus:ring-1 focus:ring-violet-500 transition text-sm"/>
            <x-input-error :messages="$errors->get('name')" class="mt-1 text-red-400 text-xs"/>
        </div>

        {{-- Email --}}
        <div>
            <label for="email" class="block text-sm font-medium text-gray-300 mb-1">
                Adresse email
            </label>
            <input id="email" type="email" name="email"
                   value="{{ old('email') }}" required
                   class="w-full px-4 py-2.5 rounded-xl bg-gray-800 border border-gray-700
                          text-white placeholder-gray-500 focus:outline-none focus:border-violet-500
                          focus:ring-1 focus:ring-violet-500 transition text-sm"/>
            <x-input-error :messages="$errors->get('email')" class="mt-1 text-red-400 text-xs"/>
        </div>

        {{-- Password --}}
        <div>
            <label for="password" class="block text-sm font-medium text-gray-300 mb-1">
                Mot de passe
            </label>
            <input id="password" type="password" name="password" required
                   class="w-full px-4 py-2.5 rounded-xl bg-gray-800 border border-gray-700
                          text-white placeholder-gray-500 focus:outline-none focus:border-violet-500
                          focus:ring-1 focus:ring-violet-500 transition text-sm"/>
            <x-input-error :messages="$errors->get('password')" class="mt-1 text-red-400 text-xs"/>
        </div>

        {{-- Confirm Password --}}
        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-300 mb-1">
                Confirmer le mot de passe
            </label>
            <input id="password_confirmation" type="password"
                   name="password_confirmation" required
                   class="w-full px-4 py-2.5 rounded-xl bg-gray-800 border border-gray-700
                          text-white placeholder-gray-500 focus:outline-none focus:border-violet-500
                          focus:ring-1 focus:ring-violet-500 transition text-sm"/>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-red-400 text-xs"/>
        </div>

        {{-- Bonus crédits offerts --}}
        <div class="flex items-center gap-3 px-4 py-3 rounded-xl bg-violet-950/40 border border-violet-800/40">
            <svg class="w-5 h-5 text-violet-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <p class="text-xs text-violet-300">
                <span class="font-semibold">10 crédits offerts</span> à l'inscription pour générer tes premiers posts.
            </p>
        </div>

        {{-- Submit --}}
        <button type="submit"
                class="w-full py-3 rounded-xl bg-violet-700 hover:bg-violet-600 font-semibold
                       text-white text-sm transition shadow-lg shadow-violet-900/40">
            Créer mon compte →
        </button>

        {{-- Login link --}}
        <p class="text-center text-sm text-gray-500">
            Déjà un compte ?
            <a href="{{ route('login') }}" class="text-violet-400 hover:text-violet-300 transition font-medium">
                Se connecter
            </a>
        </p>

    </form>
</x-guest-layout>