<x-app-layout>
    <x-slot name="header">Mon Profil</x-slot>

    <div class="max-w-3xl mx-auto space-y-6">

        {{-- Carte info utilisateur --}}
        <div class="bg-gray-900 border border-gray-800 rounded-2xl p-8">
            <div class="flex items-center gap-6 mb-8">
                <div class="w-20 h-20 rounded-2xl bg-violet-950 border border-violet-800
                            flex items-center justify-center shrink-0">
                    <span class="text-3xl font-extrabold text-violet-400 font-sans">
                        {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                    </span>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-white">{{ Auth::user()->name }}</h3>
                    <p class="text-gray-400 text-sm mt-1">{{ Auth::user()->email }}</p>
                    <div class="flex items-center gap-2 mt-2">
                        <span class="px-3 py-1 rounded-full bg-violet-950 border border-violet-800
                                     text-violet-400 text-xs font-semibold">
                            {{ Auth::user()->credits }} crédits
                        </span>
                        <span class="px-3 py-1 rounded-full bg-gray-800 border border-gray-700
                                     text-gray-400 text-xs font-semibold">
                            {{ Auth::user()->posts()->count() }} posts générés
                        </span>
                    </div>
                </div>
            </div>

            {{-- Modifier les infos --}}
            <div class="border-t border-gray-800 pt-6">
                <h4 class="text-sm font-semibold text-gray-400 uppercase tracking-widest mb-6">
                    Informations personnelles
                </h4>
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        {{-- Modifier mot de passe --}}
        <div class="bg-gray-900 border border-gray-800 rounded-2xl p-8">
            <h4 class="text-sm font-semibold text-gray-400 uppercase tracking-widest mb-6">
                Sécurité
            </h4>
            @include('profile.partials.update-password-form')
        </div>

        {{-- Supprimer le compte --}}
        <div class="bg-gray-900 border border-red-900/40 rounded-2xl p-8">
            <h4 class="text-sm font-semibold text-red-400 uppercase tracking-widest mb-6">
                Zone dangereuse
            </h4>
            @include('profile.partials.delete-user-form')
        </div>

    </div>

</x-app-layout>