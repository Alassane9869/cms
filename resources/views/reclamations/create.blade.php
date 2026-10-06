<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between gap-3">
            <div class="flex items-center gap-2.5 sm:gap-3 min-w-0">
                <div class="w-8 h-8 rounded-lg bg-[#0B3B60] text-white flex items-center justify-center text-xs shrink-0 shadow-xs">
                    <i class="fas fa-file-circle-plus"></i>
                </div>
                <div class="min-w-0">
                    <h1 class="text-sm sm:text-base font-extrabold text-[#0B3B60] tracking-tight truncate leading-tight">
                        Déposer une Réclamation Officielle
                    </h1>
                    <p class="text-[10px] sm:text-[11px] text-slate-400 font-medium truncate">
                        Guichet unique d'instruction & transmission &bull; Caisse Malienne de Sécurité Sociale
                    </p>
                </div>
            </div>

            <a href="{{ route('dashboard') }}" 
               class="shrink-0 inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-semibold transition">
                <i class="fas fa-arrow-left text-[10px]"></i>
                <span class="hidden sm:inline">Retour Mon Espace</span>
                <span class="sm:hidden">Retour</span>
            </a>
        </div>
    </x-slot>

    <div class="max-w-4xl mx-auto space-y-6">

        <!-- 1. Bannière d'en-tête officielle avec ruban tricolore -->
        <div class="banner-cmss-official rounded-2xl sm:rounded-3xl shadow-md relative overflow-hidden border border-[#0B3B60]/30"
             style="background-color: #0B3B60 !important; background-image: linear-gradient(135deg, #07233B 0%, #0B3B60 55%, #125386 100%) !important; color: #ffffff !important;">
            <!-- Ruban Tricolore National du Mali -->
            <div class="h-1.5 w-full flex">
                <div class="flex-1 bg-[#1EB53A]"></div>
                <div class="flex-1 bg-[#FCD116]"></div>
                <div class="flex-1 bg-[#CE1126]"></div>
            </div>

            <div class="p-5 sm:p-7 relative z-10">
                <div class="flex flex-wrap items-center gap-2 mb-2">
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-white/15 backdrop-blur-md text-[10px] sm:text-[11px] font-semibold text-white border border-white/20">
                        <i class="fas fa-shield-halved text-amber-300"></i> Procédure d'instruction officielle CMSS
                    </span>
                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-emerald-500/20 text-emerald-300 border border-emerald-400/30 text-[10px] font-bold">
                        <i class="fas fa-certificate"></i> Délivrance Immédiate de Récépissé PDF
                    </span>
                </div>

                <h2 class="text-lg sm:text-2xl font-black tracking-tight text-white mt-2">
                    Transmettre une Réclamation ou Requête Administrative
                </h2>
                <p class="mt-1.5 text-xs sm:text-sm text-blue-100/90 max-w-2xl leading-relaxed">
                    Ce guichet officiel permet à tout fonctionnaire, militaire, retraité ou ayant droit de signaler un dysfonctionnement, un retard de paiement ou une contestation de droits sociaux.
                </p>

                <!-- Récapitulatif de l'identité du demandeur enregistré -->
                <div class="mt-4 pt-4 border-t border-white/10 grid grid-cols-1 sm:grid-cols-3 gap-2.5 text-xs text-blue-100">
                    <div class="flex items-center gap-2 bg-black/20 backdrop-blur-xs px-3 py-1.5 rounded-lg border border-white/10">
                        <i class="fas fa-user-check text-amber-300 text-xs"></i>
                        <span class="truncate">Assuré : <strong class="text-white">{{ auth()->user()->name }}</strong></span>
                    </div>
                    <div class="flex items-center gap-2 bg-black/20 backdrop-blur-xs px-3 py-1.5 rounded-lg border border-white/10">
                        <i class="fas fa-envelope text-white/70 text-xs"></i>
                        <span class="truncate">{{ auth()->user()->email }}</span>
                    </div>
                    <div class="flex items-center gap-2 bg-black/20 backdrop-blur-xs px-3 py-1.5 rounded-lg border border-white/10">
                        <i class="fas fa-clock text-emerald-300 text-xs"></i>
                        <span>Délai de traitement : <strong class="text-white">48h à 72h</strong></span>
                    </div>
                </div>
            </div>

            <div class="absolute -right-10 -bottom-10 w-48 h-48 bg-white/5 rounded-full pointer-events-none"></div>
        </div>

        <!-- 2. Formulaire Principal Détaillé -->
        <div class="bg-white rounded-2xl sm:rounded-3xl border border-slate-200/90 shadow-xs overflow-hidden">
            <div class="p-5 sm:p-8">

                @if($errors->any())
                    <div class="mb-6 p-4 rounded-2xl bg-rose-50 border border-rose-200 text-rose-900 shadow-xs animate-shake">
                        <div class="flex items-center gap-2.5 font-bold text-sm mb-2 text-rose-800">
                            <i class="fas fa-triangle-exclamation text-rose-600"></i>
                            <span>Veuillez corriger les informations suivantes :</span>
                        </div>
                        <ul class="list-disc list-inside text-xs space-y-1 text-rose-700">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('reclamations.store') }}" method="POST" class="space-y-6 sm:space-y-8">
                    @csrf

                    <!-- Section 1 : Domaine d'intervention / Catégorie -->
                    <div>
                        <div class="flex items-center justify-between gap-2 mb-2">
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-700">
                                <span class="inline-flex items-center justify-center w-5 h-5 rounded-full bg-[#0B3B60] text-white text-[10px] mr-1.5">1</span>
                                Domaine de prestation concerné <span class="text-rose-500">*</span>
                            </label>
                            <span class="text-[11px] text-slate-400">Orientation vers la direction compétente</span>
                        </div>

                        <div class="relative">
                            <select name="categorie_id" id="categorie_id"
                                    class="w-full py-3 pl-4 pr-10 rounded-xl border border-slate-300 text-xs sm:text-sm text-slate-800 bg-slate-50/50 hover:bg-white focus:bg-white focus:ring-2 focus:ring-[#0B3B60] focus:border-[#0B3B60] outline-none transition appearance-none font-medium">
                                <option value="">-- Sélectionnez le domaine d'intervention (Pensions, AMO, Prestations...) --</option>
                                @foreach($categories as $categorie)
                                    <option value="{{ $categorie->id }}" {{ old('categorie_id', request('categorie_id')) == $categorie->id ? 'selected' : '' }}>
                                        📁 {{ $categorie->nom }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3.5 text-slate-400">
                                <i class="fas fa-chevron-down text-xs"></i>
                            </div>
                        </div>
                        <p class="mt-1.5 text-[11px] text-slate-500 leading-relaxed">
                            <i class="fas fa-info-circle text-[#0B3B60] mr-1"></i>
                            Votre dossier sera immédiatement assigné au département technique en charge (Pensions de retraite, Prestations sanitaires AMO ou Allocations familiales).
                        </p>
                    </div>

                    <!-- Section 2 : Degré d'urgence (Priorité) -->
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                            <span class="inline-flex items-center justify-center w-5 h-5 rounded-full bg-[#0B3B60] text-white text-[10px] mr-1.5">2</span>
                            Degré d'urgence de la situation <span class="text-rose-500">*</span>
                        </label>

                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                            <!-- Faible -->
                            <label class="cursor-pointer">
                                <input type="radio" name="priorite" value="faible" class="peer sr-only" {{ old('priorite') == 'faible' ? 'checked' : '' }}>
                                <div class="p-3.5 rounded-xl border-2 border-slate-200 bg-white hover:border-slate-300 peer-checked:border-slate-500 peer-checked:bg-slate-50 transition h-full flex flex-col justify-between">
                                    <div class="flex items-center justify-between">
                                        <span class="text-xs font-bold text-slate-800 flex items-center gap-1.5">
                                            <span class="w-2 h-2 rounded-full bg-slate-400"></span> Faible
                                        </span>
                                        <i class="fas fa-circle-info text-slate-400 text-xs"></i>
                                    </div>
                                    <p class="text-[11px] text-slate-500 mt-2 leading-relaxed">
                                        Simple renseignement ou mise à jour administrative générale.
                                    </p>
                                </div>
                            </label>

                            <!-- Normale (par défaut) -->
                            <label class="cursor-pointer">
                                <input type="radio" name="priorite" value="normale" class="peer sr-only" {{ old('priorite', 'normale') == 'normale' ? 'checked' : '' }}>
                                <div class="p-3.5 rounded-xl border-2 border-slate-200 bg-white hover:border-blue-300 peer-checked:border-[#0B3B60] peer-checked:bg-blue-50/50 transition h-full flex flex-col justify-between">
                                    <div class="flex items-center justify-between">
                                        <span class="text-xs font-bold text-[#0B3B60] flex items-center gap-1.5">
                                            <span class="w-2 h-2 rounded-full bg-blue-600"></span> Normale
                                        </span>
                                        <span class="px-1.5 py-0.5 rounded text-[9px] font-bold bg-blue-100 text-[#0B3B60]">Standard</span>
                                    </div>
                                    <p class="text-[11px] text-slate-600 mt-2 leading-relaxed">
                                        Délai réglementaire de 48h à 72h ouvrées garanti.
                                    </p>
                                </div>
                            </label>

                            <!-- Urgente -->
                            <label class="cursor-pointer">
                                <input type="radio" name="priorite" value="urgente" class="peer sr-only" {{ old('priorite') == 'urgente' ? 'checked' : '' }}>
                                <div class="p-3.5 rounded-xl border-2 border-slate-200 bg-white hover:border-rose-300 peer-checked:border-rose-600 peer-checked:bg-rose-50/50 transition h-full flex flex-col justify-between">
                                    <div class="flex items-center justify-between">
                                        <span class="text-xs font-bold text-rose-700 flex items-center gap-1.5">
                                            <span class="w-2 h-2 rounded-full bg-rose-600"></span> Urgente
                                        </span>
                                        <i class="fas fa-triangle-exclamation text-rose-600 text-xs"></i>
                                    </div>
                                    <p class="text-[11px] text-rose-600/90 mt-2 leading-relaxed">
                                        Hospitalisation en cours, rupture de droits vitaux ou contentieux grave.
                                    </p>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Section 3 : Objet clair du dossier -->
                    <div>
                        <div class="flex items-center justify-between gap-2 mb-2">
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-700">
                                <span class="inline-flex items-center justify-center w-5 h-5 rounded-full bg-[#0B3B60] text-white text-[10px] mr-1.5">3</span>
                                Objet précis de la réclamation <span class="text-rose-500">*</span>
                            </label>
                            <span class="text-[11px] text-slate-400">Court et descriptif</span>
                        </div>

                        <input type="text" name="objet" value="{{ old('objet') }}" required
                               class="w-full py-3 px-4 rounded-xl border border-slate-300 text-xs sm:text-sm text-slate-800 placeholder-slate-400 focus:ring-2 focus:ring-[#0B3B60] focus:border-[#0B3B60] outline-none transition bg-white font-medium"
                               placeholder="Ex : Retard paiement pension 3ème trimestre 2026 - Réf pension N° 78421">
                        <p class="mt-1.5 text-[11px] text-slate-500">
                            Indiquez en une ligne le motif principal et si possible votre numéro de dossier / pension.
                        </p>
                    </div>

                    <!-- Section 4 : Exposé circonstancié des faits -->
                    <div>
                        <div class="flex items-center justify-between gap-2 mb-2">
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-700">
                                <span class="inline-flex items-center justify-center w-5 h-5 rounded-full bg-[#0B3B60] text-white text-[10px] mr-1.5">4</span>
                                Exposé détaillé des faits & Références <span class="text-rose-500">*</span>
                            </label>
                            <span class="text-[11px] text-slate-400">Description exhaustive</span>
                        </div>

                        <textarea name="description" rows="6" required
                                  class="w-full py-3 px-4 rounded-xl border border-slate-300 text-xs sm:text-sm text-slate-800 placeholder-slate-400 focus:ring-2 focus:ring-[#0B3B60] focus:border-[#0B3B60] outline-none transition bg-white leading-relaxed font-normal"
                                  placeholder="Veuillez décrire votre situation avec le plus de précisions possible :
- Votre numéro matricule de solde ou numéro de pension
- Le centre de rattachement CMSS (Bamako Direction Générale, Agence Régionale de Ségou, Sikasso, Kayes...)
- La date ou période de début de l'anomalie
- Les démarches déjà entreprises au guichet">{{ old('description') }}</textarea>

                        <div class="mt-2 p-3 rounded-xl bg-blue-50/70 border border-blue-100 flex items-start gap-2.5 text-xs text-blue-900">
                            <i class="fas fa-lightbulb text-amber-500 mt-0.5 shrink-0"></i>
                            <div class="leading-relaxed text-[11px]">
                                <strong>Conseil d'instruction :</strong> Plus vous donnez de références précises (numéro de liquidation, matricule ou numéro de carte AMO), plus nos agents peuvent résoudre votre requête rapidement sans vous demander de pièces complémentaires.
                            </div>
                        </div>
                    </div>

                    <!-- Section 5 : Engagement & Bouton de Soumission -->
                    <div class="pt-4 border-t border-slate-200 space-y-4">
                        <div class="flex items-start gap-3 p-3.5 rounded-xl bg-slate-50 border border-slate-200/80">
                            <input type="checkbox" id="certifie" required checked
                                   class="mt-0.5 rounded border-slate-300 text-[#0B3B60] focus:ring-[#0B3B60]">
                            <label for="certifie" class="text-xs text-slate-700 leading-relaxed cursor-pointer">
                                Je certifie sur l'honneur l'exactitude des informations fournies. Je prends acte qu'un Récépissé Officiel certifié me sera délivré immédiatement avec un numéro de référence unique opposable à l'administration.
                            </label>
                        </div>

                        <div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-3 pt-2">
                            <a href="{{ route('dashboard') }}" 
                               class="py-3 px-5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold text-center transition active:scale-98">
                                <i class="fas fa-times mr-1"></i> Annuler & Revenir à Mon Espace
                            </a>

                            <button type="submit"
                                    class="py-3.5 px-7 rounded-xl bg-gradient-to-r from-[#0B3B60] to-[#125386] hover:from-[#07233B] hover:to-[#0B3B60] text-white text-xs sm:text-sm font-bold uppercase tracking-wider shadow-md active:scale-98 transition flex items-center justify-center gap-2">
                                <i class="fas fa-paper-plane text-amber-300"></i>
                                <span>Transmettre officiellement ma Réclamation</span>
                            </button>
                        </div>
                    </div>

                </form>

            </div>
        </div>

        <!-- 3. Cartes d'accompagnement & assistance -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div class="p-4 sm:p-5 rounded-2xl bg-white border border-slate-200/90 shadow-xs flex items-center gap-3.5">
                <div class="w-11 h-11 rounded-xl bg-blue-50 text-[#0B3B60] flex items-center justify-center text-lg shrink-0">
                    <i class="fas fa-file-shield"></i>
                </div>
                <div>
                    <h4 class="text-xs font-bold text-slate-900">Récépissé Numérique Certifié</h4>
                    <p class="text-[11px] text-slate-500 mt-0.5">Téléchargeable en PDF officiel immédiatement après enregistrement.</p>
                </div>
            </div>

            <div class="p-4 sm:p-5 rounded-2xl bg-white border border-slate-200/90 shadow-xs flex items-center gap-3.5">
                <div class="w-11 h-11 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-lg shrink-0">
                    <i class="fas fa-headset"></i>
                </div>
                <div>
                    <h4 class="text-xs font-bold text-slate-900">Besoin d'aide ?</h4>
                    <p class="text-[11px] text-slate-500 mt-0.5">Contactez le guichet CMSS au <a href="tel:+22320224500" class="font-bold text-[#0B3B60] underline">+223 20 22 45 00</a>.</p>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>