<x-guest-layout>

    <h2 class="text-xl font-bold text-white mb-6">Connexion</h2>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        {{-- Email --}}
        <div>
            <label for="email" class="block text-sm font-medium text-gray-300 mb-1">
                Adresse email
            </label>
            <input id="email" type="email" name="email"
                   value="{{ old('email') }}" required autofocus
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

        {{-- Remember me + Forgot --}}
        <div class="flex items-center justify-between">
            <label class="flex items-center gap-2 text-sm text-gray-400 cursor-pointer">
                <input type="checkbox" name="remember"
                       class="rounded border-gray-600 bg-gray-800 text-violet-600
                              focus:ring-violet-500"/>
                Se souvenir de moi
            </label>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}"
                   class="text-sm text-violet-400 hover:text-violet-300 transition">
                    Mot de passe oublié ?
                </a>
            @endif
        </div>

        {{-- Submit --}}
        <button type="submit"
                class="w-full py-3 rounded-xl bg-violet-700 hover:bg-violet-600 font-semibold
                       text-white text-sm transition shadow-lg shadow-violet-900/40">
            Se connecter →
        </button>

        {{-- Register link --}}
        <p class="text-center text-sm text-gray-500">
            Pas encore de compte ?
            <a href="{{ route('register') }}" class="text-violet-400 hover:text-violet-300 transition font-medium">
                S'inscrire gratuitement
            </a>
        </p>

    </form>
</x-guest-layout>