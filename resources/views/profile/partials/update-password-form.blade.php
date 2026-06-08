<section>
    <form method="post" action="{{ route('password.update') }}" class="space-y-5">
        @csrf
        @method('put')

        {{-- Mot de passe actuel --}}
        <div>
            <label for="update_password_current_password"
                   class="block text-sm font-medium text-gray-300 mb-2">
                Mot de passe actuel
            </label>
            <input id="update_password_current_password"
                   name="current_password" type="password"
                   autocomplete="current-password"
                   class="w-full px-4 py-3 rounded-xl bg-gray-800 border border-gray-700
                          text-white placeholder-gray-500 focus:outline-none focus:border-violet-500
                          focus:ring-1 focus:ring-violet-500 transition text-sm"/>
            <x-input-error :messages="$errors->updatePassword->get('current_password')"
                           class="mt-1 text-red-400 text-xs"/>
        </div>

        {{-- Nouveau mot de passe --}}
        <div>
            <label for="update_password_password"
                   class="block text-sm font-medium text-gray-300 mb-2">
                Nouveau mot de passe
            </label>
            <input id="update_password_password"
                   name="password" type="password"
                   autocomplete="new-password"
                   class="w-full px-4 py-3 rounded-xl bg-gray-800 border border-gray-700
                          text-white placeholder-gray-500 focus:outline-none focus:border-violet-500
                          focus:ring-1 focus:ring-violet-500 transition text-sm"/>
            <x-input-error :messages="$errors->updatePassword->get('password')"
                           class="mt-1 text-red-400 text-xs"/>
        </div>

        {{-- Confirmer mot de passe --}}
        <div>
            <label for="update_password_password_confirmation"
                   class="block text-sm font-medium text-gray-300 mb-2">
                Confirmer le nouveau mot de passe
            </label>
            <input id="update_password_password_confirmation"
                   name="password_confirmation" type="password"
                   autocomplete="new-password"
                   class="w-full px-4 py-3 rounded-xl bg-gray-800 border border-gray-700
                          text-white placeholder-gray-500 focus:outline-none focus:border-violet-500
                          focus:ring-1 focus:ring-violet-500 transition text-sm"/>
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')"
                           class="mt-1 text-red-400 text-xs"/>
        </div>

        {{-- Submit --}}
        <div class="flex items-center gap-4">
            <button type="submit"
                    class="px-6 py-2.5 rounded-xl bg-violet-700 hover:bg-violet-600
                           font-semibold text-white text-sm transition shadow-lg shadow-violet-900/40">
                Mettre à jour
            </button>
            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }"
                   x-show="show"
                   x-transition
                   x-init="setTimeout(() => show = false, 2000)"
                   class="text-sm text-green-400 font-medium">
                    Mot de passe mis à jour !
                </p>
            @endif
        </div>

    </form>
</section>