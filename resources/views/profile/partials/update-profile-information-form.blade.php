<section>
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-5">
        @csrf
        @method('patch')

        {{-- Nom --}}
        <div>
            <label for="name" class="block text-sm font-medium text-gray-300 mb-2">
                Nom complet
            </label>
            <input id="name" name="name" type="text"
                   value="{{ old('name', $user->name) }}" required autofocus
                   class="w-full px-4 py-3 rounded-xl bg-gray-800 border border-gray-700
                          text-white placeholder-gray-500 focus:outline-none focus:border-violet-500
                          focus:ring-1 focus:ring-violet-500 transition text-sm"/>
            <x-input-error class="mt-1 text-red-400 text-xs" :messages="$errors->get('name')" />
        </div>

        {{-- Email --}}
        <div>
            <label for="email" class="block text-sm font-medium text-gray-300 mb-2">
                Adresse email
            </label>
            <input id="email" name="email" type="email"
                   value="{{ old('email', $user->email) }}" required
                   class="w-full px-4 py-3 rounded-xl bg-gray-800 border border-gray-700
                          text-white placeholder-gray-500 focus:outline-none focus:border-violet-500
                          focus:ring-1 focus:ring-violet-500 transition text-sm"/>
            <x-input-error class="mt-1 text-red-400 text-xs" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-3 p-3 rounded-xl bg-yellow-950 border border-yellow-800">
                    <p class="text-xs text-yellow-400">
                        Ton adresse email n'est pas vérifiée.
                        <button form="send-verification"
                                class="underline font-medium hover:text-yellow-300 transition">
                            Renvoyer l'email de vérification
                        </button>
                    </p>
                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-xs text-green-400 font-medium">
                            Un nouveau lien de vérification a été envoyé.
                        </p>
                    @endif
                </div>
            @endif
        </div>

        {{-- Submit --}}
        <div class="flex items-center gap-4">
            <button type="submit"
                    class="px-6 py-2.5 rounded-xl bg-violet-700 hover:bg-violet-600
                           font-semibold text-white text-sm transition shadow-lg shadow-violet-900/40">
                Sauvegarder
            </button>
            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }"
                   x-show="show"
                   x-transition
                   x-init="setTimeout(() => show = false, 2000)"
                   class="text-sm text-green-400 font-medium">
                    Profil mis à jour !
                </p>
            @endif
        </div>

    </form>
</section>