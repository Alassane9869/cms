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
                    Caisse Malienne de Sécurité Sociale &bull; République du Mali
                </p>
            </div>
        </div>
    </x-slot>

    <!-- 1. Bannière d'accueil personnalisé de l'assuré avec bordure tricolore nationale -->
    <div class="banner-cmss-official mb-6 sm:mb-8 rounded-2xl sm:rounded-3xl shadow-md relative overflow-hidden border border-[#0B3B60]/30"
         style="background-color: #0B3B60 !important; background-image: linear-gradient(135deg, #07233B 0%, #0B3B60 55%, #125386 100%) !important; color: #ffffff !important;">
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
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-semibold text-white banner-btn-glass"
                          style="background-color: rgba(255,255,255,0.18) !important; border: 1px solid rgba(255,255,255,0.3) !important; color: #ffffff !important;">
                        <i class="fas fa-shield-alt text-amber-300"></i> CMSS &bull; Protection Sociale des Fonctionnaires et Militaires
                    </span>
                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[10px] font-bold"
                          style="background-color: rgba(16, 185, 129, 0.25) !important; border: 1px solid rgba(52, 211, 153, 0.4) !important; color: #6ee7b7 !important;">
                        <i class="fas fa-check-circle"></i> Compte Assuré Vérifié
                    </span>
                </div>

                <!-- Salutation personnalisée -->
                <h1 class="text-xl sm:text-3xl font-black tracking-tight leading-tight text-white" style="color: #ffffff !important;">
                    Bonjour, {{ $user->name }}
                </h1>
                <p class="mt-2 text-xs sm:text-sm font-normal leading-relaxed max-w-2xl" style="color: #e0f2fe !important;">
                    Bienvenue sur votre portail officiel sécurisé. Vous pouvez déposer directement vos réclamations (Pensions, AMO, Prestations), suivre en temps réel l'avancement de vos dossiers et télécharger vos récépissés officiels.
                </p>

                <!-- Puces d'informations utilisateur -->
                <div class="mt-4 sm:mt-5 flex flex-wrap items-center gap-2 sm:gap-3 text-xs">
                    <div class="flex items-center gap-1.5 px-3 py-1.5 rounded-lg banner-pill-dark"
                         style="background-color: rgba(0,0,0,0.35) !important; border: 1px solid rgba(255,255,255,0.15) !important; color: #f1f5f9 !important;">
                        <i class="fas fa-envelope text-white/70 text-[11px]"></i>
                        <span class="truncate max-w-[200px] sm:max-w-none text-white">{{ $user->email }}</span>
                    </div>

                    @if($user->telephone)
                    <div class="flex items-center gap-1.5 px-3 py-1.5 rounded-lg banner-pill-dark"
                         style="background-color: rgba(0,0,0,0.35) !important; border: 1px solid rgba(255,255,255,0.15) !important; color: #f1f5f9 !important;">
                        <i class="fas fa-phone text-white/70 text-[11px]"></i>
                        <span class="text-white">{{ $user->telephone }}</span>
                    </div>
                    @endif

                    <div class="flex items-center gap-1.5 px-3 py-1.5 rounded-lg banner-pill-dark"
                         style="background-color: rgba(0,0,0,0.35) !important; border: 1px solid rgba(255,255,255,0.15) !important; color: #f1f5f9 !important;">
                        <i class="fas fa-calendar-alt text-white/70 text-[11px]"></i>
                        <span class="text-white">Inscrit le {{ $user->created_at->format('d/m/Y') }}</span>
                    </div>
                </div>

                <!-- Boutons d'action clairs vers les modules dédiés -->
                <div class="mt-5 sm:mt-6 flex flex-col sm:flex-row items-stretch sm:items-center gap-2.5 sm:gap-3">
                    <a href="{{ route('reclamations.create') }}" 
                       class="banner-btn-gold inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-xl font-bold text-xs uppercase tracking-wider shadow-md active:scale-98 transition"
                       style="background-color: #FCD116 !important; color: #0F172A !important;">
                        <i class="fas fa-plus-circle text-sm"></i>
                        <span>Déposer une Réclamation</span>
                    </a>
                    <a href="{{ route('reclamations.index') }}" 
                       class="banner-btn-glass inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl font-semibold text-xs tracking-wide active:scale-98 transition"
                       style="background-color: rgba(255,255,255,0.18) !important; border: 1px solid rgba(255,255,255,0.3) !important; color: #ffffff !important;">
                        <i class="fas fa-folder-open text-xs text-amber-300"></i>
                        <span>Historique de mes dossiers ({{ $totalDeposees }})</span>
                    </a>
                    <a href="{{ route('guide.reclamation') }}" 
                       class="banner-btn-glass inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl font-semibold text-xs tracking-wide active:scale-98 transition"
                       style="background-color: rgba(255,255,255,0.18) !important; border: 1px solid rgba(255,255,255,0.3) !important; color: #ffffff !important;">
                        <i class="fas fa-book-open text-xs text-sky-300"></i>
                        <span>Guide des Démarches</span>
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

    <!-- 2. Indicateurs / Statistiques personnelles de l'usager -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-5 mb-6 sm:mb-8">
        <!-- Total Déposées -->
        <a href="{{ route('reclamations.index') }}" class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200/80 shadow-xs hover:shadow-md hover:border-[#0B3B60]/40 transition block">
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
        </a>

        <!-- En Attente -->
        <a href="{{ route('reclamations.index', ['statut' => 'en_attente']) }}" class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200/80 shadow-xs hover:shadow-md hover:border-amber-300 transition block">
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
        </a>

        <!-- En Cours -->
        <a href="{{ route('reclamations.index', ['statut' => 'en_cours']) }}" class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200/80 shadow-xs hover:shadow-md hover:border-sky-300 transition block">
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
        </a>

        <!-- Traitées / Résolues -->
        <a href="{{ route('reclamations.index', ['statut' => 'traitee']) }}" class="bg-white rounded-2xl p-4 sm:p-5 border border-slate-200/80 shadow-xs hover:shadow-md hover:border-emerald-300 transition block">
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
        </a>
    </div>

    <!-- 3. Section Dossiers Récents (Pleine Largeur & Aérée) -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-xs overflow-hidden mb-8">
        <!-- En-tête de la section -->
        <div class="p-4 sm:p-6 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-blue-50 text-[#0B3B60] flex items-center justify-center text-base shrink-0">
                    <i class="fas fa-clock-rotate-left"></i>
                </div>
                <div>
                    <h3 class="font-extrabold text-[#0B3B60] text-sm sm:text-base leading-tight">
                        Dossiers Récents & Suivi en Temps Réel
                    </h3>
                    <p class="text-[11px] sm:text-xs text-slate-500">
                        Consultez l'avancement de vos demandes et téléchargez vos récépissés officiels
                    </p>
                </div>
            </div>

            <div class="flex items-center gap-2">
                <a href="{{ route('reclamations.create') }}" class="px-3.5 py-2 rounded-xl bg-[#0B3B60] hover:bg-[#07233B] text-white text-xs font-bold transition flex items-center gap-1.5">
                    <i class="fas fa-plus"></i>
                    <span>Nouvelle Réclamation</span>
                </a>
                @if(!$mesReclamations->isEmpty())
                <a href="{{ route('reclamations.index') }}" class="px-3.5 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold transition flex items-center gap-1">
                    <span>Tout voir ({{ $totalDeposees }})</span>
                    <i class="fas fa-arrow-right text-[10px]"></i>
                </a>
                @endif
            </div>
        </div>

        @if($mesReclamations->isEmpty())
            <!-- État vide si aucune réclamation -->
            <div class="p-8 sm:p-14 text-center">
                <div class="w-16 h-16 rounded-2xl bg-blue-50 text-[#0B3B60] flex items-center justify-center mx-auto mb-4 text-2xl">
                    <i class="fas fa-inbox"></i>
                </div>
                <h4 class="text-base font-bold text-slate-800">Aucune réclamation enregistrée pour le moment</h4>
                <p class="text-xs text-slate-500 mt-1.5 max-w-md mx-auto leading-relaxed">
                    Vous n'avez pas encore déposé de réclamation auprès de la CMSS. Cliquez sur le bouton ci-dessous pour ouvrir le formulaire dédié et transmettre votre première demande.
                </p>
                <a href="{{ route('reclamations.create') }}" class="mt-5 inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-[#0B3B60] text-white text-xs font-bold uppercase tracking-wider hover:bg-[#07233B] transition shadow-sm">
                    <i class="fas fa-paper-plane"></i>
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
                                           class="p-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 transition" 
                                           title="Consulter le détail du dossier">
                                            <i class="fas fa-eye text-xs"></i>
                                        </a>
                                        <a href="{{ route('reclamations.pdf', $rec) }}" 
                                           class="p-2 rounded-xl bg-rose-50 hover:bg-rose-100 text-rose-600 transition" 
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

            <!-- Pied du tableau avec lien vers l'historique complet -->
            <div class="p-4 border-t border-slate-100 bg-slate-50/50 flex items-center justify-between">
                <span class="text-xs text-slate-500">Affichage des 5 dossiers les plus récents</span>
                <a href="{{ route('reclamations.index') }}" class="text-xs font-bold text-[#0B3B60] hover:underline flex items-center gap-1">
                    <span>Consulter le registre complet</span>
                    <i class="fas fa-arrow-right text-[10px]"></i>
                </a>
            </div>
        @endif
    </div>

    <!-- 4. Module Services Sociaux & Démarches Usagers (3 Colonnes Claires) -->
    <div class="mb-8">
        <div class="mb-4">
            <h3 class="text-base font-extrabold text-[#0B3B60]">
                Guichet des Droits & Prestations Sociales
            </h3>
            <p class="text-xs text-slate-500">Accédez aux démarches administratives officielles de la CMSS</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 sm:gap-6">
            <!-- Service 1 : Pensions -->
            <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-xs hover:shadow-md transition">
                <div class="w-12 h-12 rounded-xl bg-blue-50 text-[#0B3B60] flex items-center justify-center text-xl mb-4">
                    <i class="fas fa-money-check-alt"></i>
                </div>
                <h4 class="font-bold text-slate-900 text-sm">Pensions de Retraite</h4>
                <p class="text-xs text-slate-500 mt-1 leading-relaxed">
                    Liquidation des pensions civiles et militaires, pensions de réversion, attestations de non-paiement et mensualisation.
                </p>
                <a href="{{ route('reclamations.create') }}" class="mt-4 inline-flex items-center gap-1.5 text-xs font-bold text-[#0B3B60] hover:underline">
                    <span>Signaler un retard ou problème</span>
                    <i class="fas fa-chevron-right text-[10px]"></i>
                </a>
            </div>

            <!-- Service 2 : AMO -->
            <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-xs hover:shadow-md transition">
                <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-700 flex items-center justify-center text-xl mb-4">
                    <i class="fas fa-notes-medical"></i>
                </div>
                <h4 class="font-bold text-slate-900 text-sm">Assurance Maladie (AMO)</h4>
                <p class="text-xs text-slate-500 mt-1 leading-relaxed">
                    Délivrance de carnets et cartes d'assurés, remboursement de feuilles de soins, prises en charge hospitalières d'urgence.
                </p>
                <a href="{{ route('reclamations.create') }}" class="mt-4 inline-flex items-center gap-1.5 text-xs font-bold text-emerald-700 hover:underline">
                    <span>Déposer un contentieux AMO</span>
                    <i class="fas fa-chevron-right text-[10px]"></i>
                </a>
            </div>

            <!-- Service 3 : Prestations Familiales -->
            <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-xs hover:shadow-md transition">
                <div class="w-12 h-12 rounded-xl bg-purple-50 text-purple-700 flex items-center justify-center text-xl mb-4">
                    <i class="fas fa-users-viewfinder"></i>
                </div>
                <h4 class="font-bold text-slate-900 text-sm">Prestations Familiales</h4>
                <p class="text-xs text-slate-500 mt-1 leading-relaxed">
                    Allocations prénatales et de maternité, allocations familiales aux fonctionnaires et militaires, droits des ayants droit.
                </p>
                <a href="{{ route('reclamations.create') }}" class="mt-4 inline-flex items-center gap-1.5 text-xs font-bold text-purple-700 hover:underline">
                    <span>Demande d'information ou réclamation</span>
                    <i class="fas fa-chevron-right text-[10px]"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- 5. Assistance & Standard Téléphonique CMSS -->
    <div class="rounded-2xl bg-white border border-slate-200 p-4 sm:p-5 shadow-xs flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-lg shrink-0">
                <i class="fas fa-headset"></i>
            </div>
            <div>
                <h4 class="text-sm font-bold text-slate-800">Assistance usagers & Écoute citoyenne</h4>
                <p class="text-xs text-slate-500">Nos agents d'accueil vous accompagnent du Lundi au Vendredi de 07h30 à 16h00.</p>
            </div>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('guide.reclamation') }}" class="px-3.5 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold transition">
                <i class="fas fa-book-open mr-1"></i> Guide des démarches
            </a>
            <a href="tel:+22320224500" class="px-3.5 py-2 rounded-xl bg-[#0B3B60] hover:bg-[#07233B] text-white text-xs font-bold transition">
                <i class="fas fa-phone mr-1"></i> +223 20 22 45 00
            </a>
        </div>
    </div>
</x-app-layout>
