<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-2.5 sm:gap-3">
            <div class="w-8 h-8 rounded-lg bg-[#0B3B60] text-white flex items-center justify-center text-xs shrink-0 shadow-xs">
                <i class="fas fa-id-card-clip"></i>
            </div>
            <div class="min-w-0">
                <h1 class="text-sm sm:text-base font-extrabold text-[#0B3B60] tracking-tight truncate leading-tight">
                    Espace Assuré Social
                </h1>
                <p class="text-[10px] sm:text-[11px] text-slate-400 font-medium truncate">
                    Caisse Malienne de Sécurité Sociale
                </p>
            </div>
        </div>
    </x-slot>

    <!-- Bannière d'accueil personnalisé de l'assuré avec bordure tricolore nationale -->
    <div class="mb-6 sm:mb-8 rounded-2xl sm:rounded-3xl bg-gradient-to-br from-[#07233B] via-[#0B3B60] to-[#125386] text-white shadow-md relative overflow-hidden border border-[#0B3B60]/30">
        <!-- Ruban Tricolore National du Mali -->
        <div class="h-1.5 w-full flex">
            <div class="flex-1 bg-[#1EB53A]"></div>
            <div class="flex-1 bg-[#FCD116]"></div>
            <div class="flex-1 bg-[#CE1126]"></div>
        </div>

        <div class="p-5 sm:p-8 relative z-10">
            <div class="max-w-3xl">
                <!-- Badges d'état & institution -->
                <div class="flex flex-wrap items-center gap-2 mb-3">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-white/15 backdrop-blur-md text-[11px] font-semibold text-white border border-white/20">
                        <i class="fas fa-shield-alt text-amber-300"></i> CMSS &bull; Protection Sociale & Retraite
                    </span>
                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-emerald-500/20 text-emerald-300 border border-emerald-400/30 text-[10px] font-bold">
                        <i class="fas fa-check-circle"></i> Compte Assuré Actif
                    </span>
                </div>

                <!-- Salutation personnalisée -->
                <h1 class="text-xl sm:text-3xl font-black tracking-tight leading-tight">
                    Bonjour, {{ $user->name }}
                </h1>
                <p class="mt-2 text-xs sm:text-sm text-blue-100 font-normal leading-relaxed max-w-2xl">
                    Bienvenue sur votre portail officiel sécurisé. Vous pouvez enregistrer directement vos réclamations (Pensions civiles et militaires, prestations familiales, AMO), suivre l'instruction de vos requêtes en temps réel et télécharger vos récépissés officiels cachetés.
                </p>

                <!-- Puces d'informations utilisateur -->
                <div class="mt-4 sm:mt-5 flex flex-wrap items-center gap-2 sm:gap-3 text-xs text-blue-100">
                    <div class="flex items-center gap-1.5 bg-black/25 backdrop-blur-xs px-3 py-1.5 rounded-lg border border-white/10">
                        <i class="fas fa-envelope text-white/70 text-[11px]"></i>
                        <span class="truncate max-w-[200px] sm:max-w-none">{{ $user->email }}</span>
                    </div>

                    @if($user->telephone)
                    <div class="flex items-center gap-1.5 bg-black/25 backdrop-blur-xs px-3 py-1.5 rounded-lg border border-white/10">
                        <i class="fas fa-phone text-white/70 text-[11px]"></i>
                        <span>{{ $user->telephone }}</span>
                    </div>
                    @endif

                    <div class="flex items-center gap-1.5 bg-black/25 backdrop-blur-xs px-3 py-1.5 rounded-lg border border-white/10">
                        <i class="fas fa-calendar-alt text-white/70 text-[11px]"></i>
                        <span>Inscrit le {{ $user->created_at->format('d/m/Y') }}</span>
                    </div>
                </div>

                <!-- Boutons d'action rapide dans la bannière -->
                <div class="mt-5 sm:mt-6 flex flex-col sm:flex-row items-stretch sm:items-center gap-2.5 sm:gap-3">
                    <a href="#nouvelle-reclamation" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-xl bg-amber-400 hover:bg-amber-300 text-slate-950 font-bold text-xs uppercase tracking-wider shadow-md active:scale-98 transition">
                        <i class="fas fa-plus-circle text-sm"></i>
                        <span>Déposer une Réclamation</span>
                    </a>
                    <a href="#mes-reclamations" class="inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl bg-white/10 hover:bg-white/20 text-white font-semibold text-xs tracking-wide backdrop-blur-xs border border-white/20 active:scale-98 transition">
                        <i class="fas fa-folder-open text-xs text-amber-300"></i>
                        <span>Mes dossiers ({{ $totalDeposees }})</span>
                    </a>
                    <a href="{{ route('guide.reclamation') }}" class="inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl bg-white/10 hover:bg-white/20 text-white font-semibold text-xs tracking-wide backdrop-blur-xs border border-white/20 active:scale-98 transition">
                        <i class="fas fa-book-open text-xs text-sky-300"></i>
                        <span>Guide & Droits</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Décorations graphiques en arrière-plan -->
        <div class="absolute -right-16 -bottom-16 w-64 h-64 bg-white/5 rounded-full pointer-events-none"></div>
        <div class="absolute right-8 top-8 opacity-10 hidden lg:block pointer-events-none">
            <img src="{{ asset('images/logo.jpg') }}" alt="CMSS" class="w-40 h-40 object-contain rounded-2xl">
        </div>
    </div>

    <!-- Indicateurs / Statistiques personnelles de l'usager -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-5 mb-6 sm:mb-8">
        <!-- Total Déposées -->
        <div class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200/80 shadow-xs hover:shadow-md transition">
            <div class="flex items-center justify-between gap-2">
                <p class="text-[11px] sm:text-xs font-bold text-slate-500 uppercase tracking-wider">Total Déposées</p>
                <div class="w-9 h-9 sm:w-11 sm:h-11 rounded-xl bg-blue-50 text-[#0B3B60] flex items-center justify-center text-base sm:text-lg shrink-0">
                    <i class="fas fa-folder-closed"></i>
                </div>
            </div>
            <p class="text-2xl sm:text-3xl font-black text-slate-900 mt-2">{{ $totalDeposees }}</p>
            <p class="text-[11px] text-slate-400 mt-1 flex items-center gap-1">
                <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span> Dossiers enregistrés
            </p>
        </div>

        <!-- En Attente -->
        <div class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200/80 shadow-xs hover:shadow-md transition">
            <div class="flex items-center justify-between gap-2">
                <p class="text-[11px] sm:text-xs font-bold text-amber-600 uppercase tracking-wider">En Attente</p>
                <div class="w-9 h-9 sm:w-11 sm:h-11 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center text-base sm:text-lg shrink-0">
                    <i class="fas fa-hourglass-half"></i>
                </div>
            </div>
            <p class="text-2xl sm:text-3xl font-black text-amber-600 mt-2">{{ $enAttente }}</p>
            <p class="text-[11px] text-slate-400 mt-1 flex items-center gap-1">
                <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span> En attente d'instruction
            </p>
        </div>

        <!-- En Cours -->
        <div class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200/80 shadow-xs hover:shadow-md transition">
            <div class="flex items-center justify-between gap-2">
                <p class="text-[11px] sm:text-xs font-bold text-sky-600 uppercase tracking-wider">En Cours</p>
                <div class="w-9 h-9 sm:w-11 sm:h-11 rounded-xl bg-sky-50 text-sky-600 flex items-center justify-center text-base sm:text-lg shrink-0">
                    <i class="fas fa-spinner fa-spin-pulse"></i>
                </div>
            </div>
            <p class="text-2xl sm:text-3xl font-black text-sky-600 mt-2">{{ $enCours }}</p>
            <p class="text-[11px] text-slate-400 mt-1 flex items-center gap-1">
                <span class="w-1.5 h-1.5 rounded-full bg-sky-500"></span> Examen technique actif
            </p>
        </div>

        <!-- Traitées / Résolues -->
        <div class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200/80 shadow-xs hover:shadow-md transition">
            <div class="flex items-center justify-between gap-2">
                <p class="text-[11px] sm:text-xs font-bold text-emerald-600 uppercase tracking-wider">Résolues</p>
                <div class="w-9 h-9 sm:w-11 sm:h-11 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-base sm:text-lg shrink-0">
                    <i class="fas fa-check-circle"></i>
                </div>
            </div>
            <p class="text-2xl sm:text-3xl font-black text-emerald-600 mt-2">{{ $traitees }}</p>
            <p class="text-[11px] text-slate-400 mt-1 flex items-center gap-1">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Traitement abouti
            </p>
        </div>
    </div>

    <!-- Section principale à 2 colonnes : Formulaire (gauche) & Historique (droite) -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 sm:gap-8 mb-8">

        <!-- Formulaire de dépôt de nouvelle réclamation (Colonne 1) -->
        <div id="nouvelle-reclamation" class="lg:col-span-1">
            <div class="bg-white rounded-2xl border border-slate-200 shadow-xs overflow-hidden lg:sticky lg:top-20">
                <!-- En-tête de la carte formulaire -->
                <div class="p-4 sm:p-5 border-b border-slate-100 bg-slate-50/70 flex items-center justify-between gap-2">
                    <div class="flex items-center gap-2.5">
                        <div class="w-8 h-8 rounded-lg bg-[#0B3B60] text-white flex items-center justify-center text-xs shrink-0">
                            <i class="fas fa-paper-plane"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-[#0B3B60] text-sm leading-tight">Nouvelle Réclamation</h3>
                            <p class="text-[11px] text-slate-500">Transmission directe aux services CMSS</p>
                        </div>
                    </div>
                    <span class="text-[10px] font-bold text-emerald-700 bg-emerald-100 px-2 py-0.5 rounded-full shrink-0">
                        Délai 48h-72h
                    </span>
                </div>

                <form method="POST" action="{{ route('reclamations.store') }}" class="p-4 sm:p-5 space-y-4">
                    @csrf

                    <!-- Rappel d'identité de l'assuré -->
                    <div class="p-3 rounded-xl bg-slate-50 border border-slate-200 text-xs text-slate-600">
                        <div class="flex items-center justify-between">
                            <span class="font-bold text-slate-800 flex items-center gap-1.5">
                                <i class="fas fa-user-circle text-[#0B3B60]"></i> {{ $user->name }}
                            </span>
                            <span class="text-[10px] font-semibold bg-blue-100 text-[#0B3B60] px-2 py-0.5 rounded-full">
                                Assuré Titulaire
                            </span>
                        </div>
                        <div class="mt-1 text-[11px] text-slate-500 truncate">
                            <i class="fas fa-envelope text-[10px] mr-1"></i> {{ $user->email }}
                        </div>
                    </div>

                    <!-- Motif / Catégorie -->
                    <div>
                        <label for="categorie_id" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            Motif / Catégorie <span class="text-rose-600">*</span>
                        </label>
                        <select id="categorie_id" name="categorie_id" required
                                class="w-full rounded-xl border border-slate-300 text-sm py-2.5 px-3 focus:border-[#0B3B60] focus:ring focus:ring-[#0B3B60]/10 bg-white transition">
                            <option value="">-- Sélectionnez la catégorie --</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ old('categorie_id') == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->nom }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('categorie_id')" class="mt-1" />
                    </div>

                    <!-- Priorité -->
                    <div>
                        <label for="priorite" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            Degré d'urgence <span class="text-rose-600">*</span>
                        </label>
                        <select id="priorite" name="priorite" required
                                class="w-full rounded-xl border border-slate-300 text-sm py-2.5 px-3 focus:border-[#0B3B60] focus:ring focus:ring-[#0B3B60]/10 bg-white transition">
                            <option value="normale" {{ old('priorite', 'normale') == 'normale' ? 'selected' : '' }}>Normale (Traitement sous 48h-72h)</option>
                            <option value="urgente" {{ old('priorite') == 'urgente' ? 'selected' : '' }}>Urgente (Hospitalisation AMO / Cas critique)</option>
                            <option value="faible" {{ old('priorite') == 'faible' ? 'selected' : '' }}>Faible (Demande d'information générale)</option>
                        </select>
                    </div>

                    <!-- Objet -->
                    <div>
                        <label for="objet" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            Objet du dossier <span class="text-rose-600">*</span>
                        </label>
                        <input id="objet" type="text" name="objet" value="{{ old('objet') }}" required
                               class="w-full rounded-xl border border-slate-300 text-sm py-2.5 px-3 focus:border-[#0B3B60] focus:ring focus:ring-[#0B3B60]/10 transition"
                               placeholder="Ex: Retard liquidation pension de réversion" />
                        <x-input-error :messages="$errors->get('objet')" class="mt-1" />
                    </div>

                    <!-- Description & Références -->
                    <div>
                        <label for="description" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            Description précise & Références <span class="text-rose-600">*</span>
                        </label>
                        <textarea id="description" name="description" rows="4" required
                                  class="w-full rounded-xl border border-slate-300 text-sm py-2.5 px-3 focus:border-[#0B3B60] focus:ring focus:ring-[#0B3B60]/10 placeholder-slate-400 transition"
                                  placeholder="Précisez votre numéro NINA, numéro de pension, carnet ou référence de feuille de soins AMO..."></textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-1" />
                    </div>

                    <!-- Bouton de soumission -->
                    <button type="submit" class="w-full py-3 px-4 rounded-xl bg-[#0B3B60] hover:bg-[#07233B] text-white font-extrabold text-xs uppercase tracking-wider transition shadow-sm active:scale-98 flex items-center justify-center gap-2 cursor-pointer">
                        <i class="fas fa-check-circle"></i>
                        <span>Transmettre ma réclamation</span>
                    </button>

                    <p class="text-[11px] text-slate-400 text-center leading-tight">
                        <i class="fas fa-shield-alt text-[#0B3B60] mr-1"></i> Un récépissé officiel téléchargeable vous sera instantanément généré.
                    </p>
                </form>
            </div>
        </div>

        <!-- Historique des réclamations (Colonne 2 & 3) -->
        <div id="mes-reclamations" class="lg:col-span-2">
            <div class="bg-white rounded-2xl border border-slate-200 shadow-xs overflow-hidden">
                <!-- En-tête de la section historique -->
                <div class="p-4 sm:p-5 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2.5">
                    <div>
                        <h3 class="font-extrabold text-[#0B3B60] text-sm sm:text-base leading-tight">
                            Historique et Suivi de mes Réclamations
                        </h3>
                        <p class="text-[11px] sm:text-xs text-slate-500">
                            Consultez l'état d'instruction de vos dossiers et téléchargez vos récépissés
                        </p>
                    </div>
                    <div class="text-[11px] sm:text-xs font-bold text-slate-600 bg-slate-100 px-3 py-1 rounded-full self-start sm:self-auto">
                        {{ $mesReclamations->total() }} dossier(s) enregistré(s)
                    </div>
                </div>

                @if($mesReclamations->isEmpty())
                    <!-- État vide si aucune réclamation -->
                    <div class="p-8 sm:p-12 text-center">
                        <div class="w-14 h-14 sm:w-16 sm:h-16 rounded-2xl bg-blue-50 text-[#0B3B60] flex items-center justify-center mx-auto mb-4 text-2xl">
                            <i class="fas fa-inbox"></i>
                        </div>
                        <h4 class="text-sm sm:text-base font-bold text-slate-800">Aucune réclamation enregistrée pour le moment</h4>
                        <p class="text-xs text-slate-500 mt-1.5 max-w-sm mx-auto leading-relaxed">
                            Vous n'avez pas encore déposé de réclamation. Utilisez le formulaire ci-contre pour transmettre votre première demande aux services de la CMSS.
                        </p>
                        <a href="#nouvelle-reclamation" class="mt-4 inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-[#0B3B60] text-white text-xs font-bold uppercase tracking-wider hover:bg-[#07233B] transition">
                            <i class="fas fa-plus"></i>
                            <span>Déposer ma première réclamation</span>
                        </a>
                    </div>
                @else
                    <!-- Vue Cartes Mobile (écrans < 640px) -->
                    <div class="sm:hidden divide-y divide-slate-100">
                        @foreach($mesReclamations as $rec)
                            <div class="p-4 space-y-3 hover:bg-slate-50/50 transition">
                                <!-- En-tête de la carte avec référence & statut -->
                                <div class="flex items-center justify-between gap-2">
                                    <div class="flex items-center gap-1.5">
                                        <span class="font-mono font-bold text-xs text-[#0B3B60] bg-blue-50 px-2.5 py-1 rounded-lg border border-blue-100">
                                            {{ $rec->reference }}
                                        </span>
                                        <button type="button" onclick="navigator.clipboard.writeText('{{ $rec->reference }}'); alert('Référence copiée !');"
                                                class="text-slate-400 hover:text-[#0B3B60] p-1" title="Copier la référence">
                                            <i class="fas fa-copy text-xs"></i>
                                        </button>
                                    </div>

                                    <!-- Statut -->
                                    <div>
                                        @if($rec->statut == 'en_attente')
                                            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[11px] font-bold bg-amber-50 text-amber-700 border border-amber-200">
                                                <i class="fas fa-clock text-[9px]"></i> En attente
                                            </span>
                                        @elseif($rec->statut == 'en_cours')
                                            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[11px] font-bold bg-sky-50 text-sky-700 border border-sky-200">
                                                <i class="fas fa-spinner fa-spin text-[9px]"></i> En cours
                                            </span>
                                        @elseif($rec->statut == 'traitee')
                                            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[11px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                                <i class="fas fa-check text-[9px]"></i> Traitée
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[11px] font-bold bg-rose-50 text-rose-700 border border-rose-200">
                                                <i class="fas fa-times text-[9px]"></i> Rejetée
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Métadonnées : Catégorie & Date -->
                                <div class="flex items-center gap-2 text-[11px] text-slate-500">
                                    <span class="px-2 py-0.5 rounded bg-slate-100 font-medium text-slate-700 truncate max-w-[150px]">
                                        {{ $rec->categorie->nom ?? 'Générale' }}
                                    </span>
                                    <span>&bull;</span>
                                    <span><i class="fas fa-calendar-day text-[10px] mr-1"></i>{{ $rec->created_at->format('d/m/Y') }}</span>
                                </div>

                                <!-- Objet du dossier -->
                                <h4 class="font-bold text-slate-900 text-sm leading-snug">
                                    {{ $rec->objet }}
                                </h4>

                                <!-- Actions Mobile (Bouton Détails + Bouton Récépissé) -->
                                <div class="pt-1 flex items-center gap-2">
                                    <a href="{{ route('reclamations.show', $rec) }}" 
                                       class="flex-1 py-2 px-3 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-800 text-xs font-bold text-center flex items-center justify-center gap-1.5 transition">
                                        <i class="fas fa-eye text-xs text-slate-500"></i>
                                        <span>Consulter</span>
                                    </a>
                                    <a href="{{ route('reclamations.pdf', $rec) }}" 
                                       class="flex-1 py-2 px-3 rounded-xl bg-rose-50 hover:bg-rose-100 text-rose-700 text-xs font-bold text-center flex items-center justify-center gap-1.5 transition">
                                        <i class="fas fa-file-pdf text-xs text-rose-600"></i>
                                        <span>Récépissé PDF</span>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Vue Tableau Desktop (écrans >= 640px) -->
                    <div class="hidden sm:block overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-slate-50/80 border-b border-slate-100 text-[11px] font-bold text-slate-500 uppercase tracking-wider">
                                    <th class="py-3.5 px-4">Référence</th>
                                    <th class="py-3.5 px-4">Catégorie</th>
                                    <th class="py-3.5 px-4">Objet</th>
                                    <th class="py-3.5 px-4">Date dépôt</th>
                                    <th class="py-3.5 px-4">Statut</th>
                                    <th class="py-3.5 px-4 text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 text-xs">
                                @foreach($mesReclamations as $rec)
                                    <tr class="hover:bg-slate-50/60 transition">
                                        <!-- Référence avec bouton copier -->
                                        <td class="py-3.5 px-4 font-mono font-bold text-[#0B3B60] whitespace-nowrap">
                                            <div class="flex items-center gap-1.5">
                                                <span>{{ $rec->reference }}</span>
                                                <button type="button" onclick="navigator.clipboard.writeText('{{ $rec->reference }}'); alert('Référence copiée !');"
                                                        class="text-slate-400 hover:text-[#0B3B60] p-1" title="Copier la référence">
                                                    <i class="fas fa-copy text-[10px]"></i>
                                                </button>
                                            </div>
                                        </td>

                                        <!-- Catégorie -->
                                        <td class="py-3.5 px-4 text-slate-600 whitespace-nowrap">
                                            <span class="inline-flex items-center px-2 py-0.5 rounded bg-slate-100 text-[11px] font-medium text-slate-700">
                                                {{ $rec->categorie->nom ?? 'Générale' }}
                                            </span>
                                        </td>

                                        <!-- Objet -->
                                        <td class="py-3.5 px-4 text-slate-800 font-semibold max-w-xs truncate" title="{{ $rec->objet }}">
                                            {{ $rec->objet }}
                                        </td>

                                        <!-- Date -->
                                        <td class="py-3.5 px-4 text-slate-500 whitespace-nowrap text-[11px]">
                                            {{ $rec->created_at->format('d/m/Y') }}
                                        </td>

                                        <!-- Statut Badge -->
                                        <td class="py-3.5 px-4 whitespace-nowrap">
                                            @if($rec->statut == 'en_attente')
                                                <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[11px] font-bold bg-amber-50 text-amber-700 border border-amber-200">
                                                    <i class="fas fa-clock text-[9px]"></i> En attente
                                                </span>
                                            @elseif($rec->statut == 'en_cours')
                                                <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[11px] font-bold bg-sky-50 text-sky-700 border border-sky-200">
                                                    <i class="fas fa-spinner fa-spin text-[9px]"></i> En cours
                                                </span>
                                            @elseif($rec->statut == 'traitee')
                                                <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[11px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                                    <i class="fas fa-check text-[9px]"></i> Traitée
                                                </span>
                                            @else
                                                <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[11px] font-bold bg-rose-50 text-rose-700 border border-rose-200">
                                                    <i class="fas fa-times text-[9px]"></i> Rejetée
                                                </span>
                                            @endif
                                        </td>

                                        <!-- Actions : Détails & Récépissé PDF -->
                                        <td class="py-3.5 px-4 text-right whitespace-nowrap">
                                            <div class="inline-flex items-center gap-1.5">
                                                <a href="{{ route('reclamations.show', $rec) }}" 
                                                   class="p-1.5 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-700 transition" 
                                                   title="Consulter le détail">
                                                    <i class="fas fa-eye text-xs"></i>
                                                </a>
                                                <a href="{{ route('reclamations.pdf', $rec) }}" 
                                                   class="p-1.5 rounded-lg bg-red-50 hover:bg-red-100 text-red-600 transition" 
                                                   title="Télécharger le récépissé officiel PDF">
                                                    <i class="fas fa-file-pdf text-xs"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="p-4 border-t border-slate-100">
                        {{ $mesReclamations->links() }}
                    </div>
                @endif
            </div>

            <!-- Aide & Assistance Usagers CMSS -->
            <div class="mt-6 rounded-2xl bg-white border border-slate-200 p-4 sm:p-5 shadow-xs flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-lg shrink-0">
                        <i class="fas fa-headset"></i>
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-slate-800">Assistance usagers CMSS</h4>
                        <p class="text-xs text-slate-500">Une équipe dédiée est à votre écoute du Lundi au Vendredi (07h30 - 16h00).</p>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <a href="{{ route('guide.reclamation') }}" class="px-3.5 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold transition">
                        <i class="fas fa-book-open mr-1"></i> Guide usagers
                    </a>
                    <a href="tel:+22320224500" class="px-3.5 py-2 rounded-xl bg-[#0B3B60] hover:bg-[#07233B] text-white text-xs font-bold transition">
                        <i class="fas fa-phone mr-1"></i> +223 20 22 45 00
                    </a>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
