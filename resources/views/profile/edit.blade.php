<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-2.5 sm:gap-3">
            <div class="w-8 h-8 rounded-lg bg-[#0B3B60] text-white flex items-center justify-center text-xs shrink-0 shadow-xs">
                <i class="fas fa-user-gear"></i>
            </div>
            <div class="min-w-0">
                <h1 class="text-sm sm:text-base font-extrabold text-[#0B3B60] tracking-tight truncate leading-tight">
                    Mon Profil Assuré
                </h1>
                <p class="text-[10px] sm:text-[11px] text-slate-400 font-medium truncate">
                    Paramètres personnels et sécurité de mon compte
                </p>
            </div>
        </div>
    </x-slot>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">

        <!-- Carte Profil (Colonne 1) -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-2xl border border-slate-200/90 shadow-xs overflow-hidden">
                <!-- Bannière Décorative avec Ruban Tricolore -->
                <div class="h-20 bg-gradient-to-r from-[#07233B] via-[#0B3B60] to-[#125386] relative">
                    <div class="h-1 w-full flex">
                        <div class="flex-1 bg-[#1EB53A]"></div>
                        <div class="flex-1 bg-[#FCD116]"></div>
                        <div class="flex-1 bg-[#CE1126]"></div>
                    </div>
                </div>

                <!-- Avatar & Identité -->
                <div class="px-5 pb-6 text-center -mt-10 relative z-10">
                    <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-[#0B3B60] to-[#1e5888] text-white flex items-center justify-center mx-auto text-2xl font-black border-4 border-white shadow-md">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>

                    <h2 class="text-base sm:text-lg font-bold text-slate-900 mt-3 leading-snug">
                        {{ auth()->user()->name }}
                    </h2>
                    <p class="text-xs text-slate-500 truncate mt-0.5">{{ auth()->user()->email }}</p>

                    <div class="mt-3 flex items-center justify-center gap-1.5">
                        @if(auth()->user()->isAdmin())
                            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[11px] font-bold bg-indigo-50 text-indigo-700 border border-indigo-200">
                                <i class="fas fa-shield-halved text-[9px]"></i> Administrateur CMSS
                            </span>
                        @elseif(auth()->user()->isAgent())
                            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[11px] font-bold bg-blue-50 text-blue-700 border border-blue-200">
                                <i class="fas fa-user-tie text-[9px]"></i> Agent Instructeur
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[11px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                <i class="fas fa-user-check text-[9px]"></i> Assuré Social CMSS
                            </span>
                        @endif
                    </div>

                    <!-- Fiche Coordonnées -->
                    <div class="mt-5 pt-5 border-t border-slate-100 text-left space-y-2.5 text-xs">
                        <div class="flex items-center justify-between text-slate-600">
                            <span class="text-slate-400 flex items-center gap-1.5"><i class="fas fa-phone text-[11px]"></i> Téléphone :</span>
                            <span class="font-semibold text-slate-800">{{ auth()->user()->telephone ?? 'Non renseigné' }}</span>
                        </div>
                        @if(auth()->user()->service)
                        <div class="flex items-center justify-between text-slate-600">
                            <span class="text-slate-400 flex items-center gap-1.5"><i class="fas fa-building text-[11px]"></i> Service :</span>
                            <span class="font-semibold text-slate-800">{{ auth()->user()->service }}</span>
                        </div>
                        @endif
                        <div class="flex items-center justify-between text-slate-600">
                            <span class="text-slate-400 flex items-center gap-1.5"><i class="fas fa-calendar-alt text-[11px]"></i> Membre depuis :</span>
                            <span class="font-semibold text-slate-800">{{ auth()->user()->created_at->format('d/m/Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Formulaires (Colonne 2 & 3) -->
        <div class="lg:col-span-2 space-y-6">

            <!-- Modifier Informations Personnelles -->
            <div class="bg-white rounded-2xl border border-slate-200/90 shadow-xs p-5 sm:p-6">
                <div class="flex items-center gap-2.5 pb-4 mb-4 border-b border-slate-100">
                    <div class="w-8 h-8 rounded-lg bg-blue-50 text-[#0B3B60] flex items-center justify-center text-xs shrink-0">
                        <i class="fas fa-user-pen"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-[#0B3B60] text-sm">Informations Personnelles</h3>
                        <p class="text-[11px] text-slate-500">Mettez à jour vos coordonnées officielles pour les notifications</p>
                    </div>
                </div>

                @if(session('status') === 'profile-updated')
                    <div class="mb-4 p-3.5 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs flex items-center gap-2 animate-fade-in">
                        <i class="fas fa-check-circle text-emerald-600 text-sm"></i>
                        <span class="font-semibold">Vos informations personnelles ont été mises à jour avec succès !</span>
                    </div>
                @endif

                @if($errors->any())
                    <div class="mb-4 p-3.5 rounded-xl bg-rose-50 border border-rose-200 text-rose-800 text-xs">
                        <ul class="list-disc pl-4 space-y-1">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('profile.update') }}" class="space-y-4">
                    @csrf
                    @method('patch')

                    <div>
                        <label for="name" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            Nom & Prénom(s) <span class="text-rose-600">*</span>
                        </label>
                        <input id="name" type="text" name="name" value="{{ old('name', auth()->user()->name) }}" required
                               class="w-full rounded-xl border border-slate-300 text-sm py-2.5 px-3.5 focus:border-[#0B3B60] focus:ring focus:ring-[#0B3B60]/10 transition" />
                    </div>

                    <div>
                        <label for="email" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            Adresse E-mail Officielle <span class="text-rose-600">*</span>
                        </label>
                        <input id="email" type="email" name="email" value="{{ old('email', auth()->user()->email) }}" required
                               class="w-full rounded-xl border border-slate-300 text-sm py-2.5 px-3.5 focus:border-[#0B3B60] focus:ring focus:ring-[#0B3B60]/10 transition" />
                    </div>

                    <div class="pt-2 flex justify-end">
                        <button type="submit" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-xl bg-[#0B3B60] hover:bg-[#07233B] text-white font-bold text-xs uppercase tracking-wider transition active:scale-98 shadow-sm">
                            <i class="fas fa-save"></i>
                            <span>Enregistrer les modifications</span>
                        </button>
                    </div>
                </form>
            </div>

            <!-- Modifier Mot de Passe -->
            <div class="bg-white rounded-2xl border border-slate-200/90 shadow-xs p-5 sm:p-6">
                <div class="flex items-center gap-2.5 pb-4 mb-4 border-b border-slate-100">
                    <div class="w-8 h-8 rounded-lg bg-amber-50 text-amber-700 flex items-center justify-center text-xs shrink-0">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-900 text-sm">Sécurité & Mot de Passe</h3>
                        <p class="text-[11px] text-slate-500">Choisissez un mot de passe robuste d'au moins 8 caractères</p>
                    </div>
                </div>

                @if(session('status') === 'password-updated')
                    <div class="mb-4 p-3.5 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs flex items-center gap-2 animate-fade-in">
                        <i class="fas fa-check-circle text-emerald-600 text-sm"></i>
                        <span class="font-semibold">Votre mot de passe a été modifié avec succès !</span>
                    </div>
                @endif

                <form method="POST" action="{{ route('password.update') }}" class="space-y-4">
                    @csrf
                    @method('put')

                    <div>
                        <label for="current_password" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            Mot de passe actuel <span class="text-rose-600">*</span>
                        </label>
                        <input id="current_password" type="password" name="current_password" required
                               class="w-full rounded-xl border border-slate-300 text-sm py-2.5 px-3.5 focus:border-[#0B3B60] focus:ring focus:ring-[#0B3B60]/10 transition"
                               placeholder="Saisissez votre mot de passe actuel" />
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="password" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                Nouveau mot de passe <span class="text-rose-600">*</span>
                            </label>
                            <input id="password" type="password" name="password" required
                                   class="w-full rounded-xl border border-slate-300 text-sm py-2.5 px-3.5 focus:border-[#0B3B60] focus:ring focus:ring-[#0B3B60]/10 transition"
                                   placeholder="Min. 8 caractères" />
                        </div>

                        <div>
                            <label for="password_confirmation" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                Confirmer le mot de passe <span class="text-rose-600">*</span>
                            </label>
                            <input id="password_confirmation" type="password" name="password_confirmation" required
                                   class="w-full rounded-xl border border-slate-300 text-sm py-2.5 px-3.5 focus:border-[#0B3B60] focus:ring focus:ring-[#0B3B60]/10 transition"
                                   placeholder="Retapez le mot de passe" />
                        </div>
                    </div>

                    <div class="pt-2 flex justify-end">
                        <button type="submit" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs uppercase tracking-wider transition active:scale-98 shadow-sm">
                            <i class="fas fa-key"></i>
                            <span>Mettre à jour le mot de passe</span>
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>