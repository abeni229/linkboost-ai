<section>

    <p class="text-sm text-gray-400 leading-relaxed mb-6">
        Une fois ton compte supprimé, toutes tes données seront définitivement perdues.
        Cette action est irréversible.
    </p>

    <button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="px-6 py-2.5 rounded-xl bg-red-950 border border-red-800 hover:bg-red-900
               text-red-400 hover:text-red-300 font-semibold text-sm transition">
        Supprimer mon compte
    </button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}"
              class="p-8 bg-gray-900 rounded-2xl">
            @csrf
            @method('delete')

            <h2 class="text-lg font-bold text-white mb-2">
                Supprimer ton compte ?
            </h2>
            <p class="text-sm text-gray-400 leading-relaxed mb-6">
                Tous tes posts, crédits et données seront définitivement supprimés.
                Entre ton mot de passe pour confirmer.
            </p>

            <div class="mb-6">
                <label for="password"
                       class="block text-sm font-medium text-gray-300 mb-2">
                    Mot de passe
                </label>
                <input id="password" name="password" type="password"
                       placeholder="Ton mot de passe"
                       class="w-full px-4 py-3 rounded-xl bg-gray-800 border border-gray-700
                              text-white placeholder-gray-500 focus:outline-none focus:border-red-500
                              focus:ring-1 focus:ring-red-500 transition text-sm"/>
                <x-input-error :messages="$errors->userDeletion->get('password')"
                               class="mt-1 text-red-400 text-xs"/>
            </div>

            <div class="flex justify-end gap-3">
                <button type="button"
                        x-on:click="$dispatch('close')"
                        class="px-5 py-2.5 rounded-xl border border-gray-700 hover:border-gray-500
                               text-gray-400 hover:text-white font-semibold text-sm transition">
                    Annuler
                </button>
                <button type="submit"
                        class="px-5 py-2.5 rounded-xl bg-red-950 border border-red-800
                               hover:bg-red-900 text-red-400 hover:text-red-300
                               font-semibold text-sm transition">
                    Confirmer la suppression
                </button>
            </div>

        </form>
    </x-modal>

</section>