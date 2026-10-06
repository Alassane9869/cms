<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between gap-3">
            <div class="flex items-center gap-2.5 sm:gap-3 min-w-0">
                <div class="w-8 h-8 rounded-lg bg-[#0B3B60] text-white flex items-center justify-center text-xs shrink-0 shadow-xs">
                    <i class="fas {{ auth()->user()->isCitoyen() ? 'fa-folder-open' : 'fa-clipboard-list' }}"></i>
                </div>
                <div class="min-w-0">
                    <h1 class="text-sm sm:text-base font-extrabold text-[#0B3B60] tracking-tight truncate leading-tight">
                        {{ auth()->user()->isCitoyen() ? 'Mes Réclamations & Registre Officiel' : 'Gestion des Réclamations & Requêtes' }}
                    </h1>
                    <p class="text-[10px] sm:text-[11px] text-slate-400 font-medium truncate">
                        {{ auth()->user()->isCitoyen() ? 'Suivi en temps réel de vos démarches & récépissés officiels' : 'Registre officiel d\'instruction & traitement des dossiers' }}
                    </p>
                </div>
            </div>

            <a href="{{ route('reclamations.create') }}" 
               class="shrink-0 inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl bg-gradient-to-r from-[#0B3B60] to-[#125386] hover:from-[#07233B] hover:to-[#0B3B60] text-white text-xs font-bold uppercase tracking-wider shadow-xs active:scale-98 transition">
                <i class="fas fa-plus text-amber-300 text-xs"></i>
                <span class="hidden sm:inline">Nouvelle Réclamation</span>
                <span class="sm:hidden">Déposer</span>
            </a>
        </div>
    </x-slot>

    <!-- 1. Onglets Rapides de Filtrage par Statut -->
    <div class="mb-5 overflow-x-auto pb-1 scrollbar-none">
        <div class="flex items-center gap-2 min-w-max">
            <!-- Tous -->
            <a href="{{ route('reclamations.index') }}" 
               class="px-3.5 py-1.5 rounded-xl text-xs font-bold transition flex items-center gap-1.5 {{ !request('statut') ? 'bg-[#0B3B60] text-white shadow-xs' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200' }}">
                <span>Toutes</span>
                <span class="px-1.5 py-0.2 rounded-full text-[10px] {{ !request('statut') ? 'bg-white/20 text-white' : 'bg-slate-100 text-slate-700' }}">{{ $counts['total'] }}</span>
            </a>

            <!-- En Attente -->
            <a href="{{ route('reclamations.index', array_merge(request()->except('page'), ['statut' => 'en_attente'])) }}" 
               class="px-3.5 py-1.5 rounded-xl text-xs font-bold transition flex items-center gap-1.5 {{ request('statut') == 'en_attente' ? 'bg-amber-500 text-white shadow-xs' : 'bg-white text-slate-600 hover:bg-amber-50 border border-slate-200' }}">
                <span class="w-2 h-2 rounded-full {{ request('statut') == 'en_attente' ? 'bg-white' : 'bg-amber-500' }}"></span>
                <span>En attente</span>
                <span class="px-1.5 py-0.2 rounded-full text-[10px] {{ request('statut') == 'en_attente' ? 'bg-white/20 text-white' : 'bg-amber-50 text-amber-800' }}">{{ $counts['en_attente'] }}</span>
            </a>

            <!-- En Cours -->
            <a href="{{ route('reclamations.index', array_merge(request()->except('page'), ['statut' => 'en_cours'])) }}" 
               class="px-3.5 py-1.5 rounded-xl text-xs font-bold transition flex items-center gap-1.5 {{ request('statut') == 'en_cours' ? 'bg-sky-600 text-white shadow-xs' : 'bg-white text-slate-600 hover:bg-sky-50 border border-slate-200' }}">
                <span class="w-2 h-2 rounded-full {{ request('statut') == 'en_cours' ? 'bg-white' : 'bg-sky-500' }}"></span>
                <span>En cours</span>
                <span class="px-1.5 py-0.2 rounded-full text-[10px] {{ request('statut') == 'en_cours' ? 'bg-white/20 text-white' : 'bg-sky-50 text-sky-800' }}">{{ $counts['en_cours'] }}</span>
            </a>

            <!-- Traitées / Résolues -->
            <a href="{{ route('reclamations.index', array_merge(request()->except('page'), ['statut' => 'traitee'])) }}" 
               class="px-3.5 py-1.5 rounded-xl text-xs font-bold transition flex items-center gap-1.5 {{ request('statut') == 'traitee' ? 'bg-emerald-600 text-white shadow-xs' : 'bg-white text-slate-600 hover:bg-emerald-50 border border-slate-200' }}">
                <span class="w-2 h-2 rounded-full {{ request('statut') == 'traitee' ? 'bg-white' : 'bg-emerald-500' }}"></span>
                <span>Résolues</span>
                <span class="px-1.5 py-0.2 rounded-full text-[10px] {{ request('statut') == 'traitee' ? 'bg-white/20 text-white' : 'bg-emerald-50 text-emerald-800' }}">{{ $counts['traitee'] }}</span>
            </a>

            <!-- Rejetées -->
            <a href="{{ route('reclamations.index', array_merge(request()->except('page'), ['statut' => 'rejetee'])) }}" 
               class="px-3.5 py-1.5 rounded-xl text-xs font-bold transition flex items-center gap-1.5 {{ request('statut') == 'rejetee' ? 'bg-rose-600 text-white shadow-xs' : 'bg-white text-slate-600 hover:bg-rose-50 border border-slate-200' }}">
                <span class="w-2 h-2 rounded-full {{ request('statut') == 'rejetee' ? 'bg-white' : 'bg-rose-500' }}"></span>
                <span>Rejetées</span>
                <span class="px-1.5 py-0.2 rounded-full text-[10px] {{ request('statut') == 'rejetee' ? 'bg-white/20 text-white' : 'bg-rose-50 text-rose-800' }}">{{ $counts['rejetee'] }}</span>
            </a>
        </div>
    </div>

    <!-- 2. Barre d'outils de recherche & filtres -->
    <div class="bg-white rounded-2xl border border-slate-200/90 shadow-xs mb-6 p-4">
        <form method="GET" action="{{ route('reclamations.index') }}" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-12 gap-2.5">
            @if(request('statut'))
                <input type="hidden" name="statut" value="{{ request('statut') }}">
            @endif

            <!-- Champ Recherche -->
            <div class="sm:col-span-2 lg:col-span-6 relative">
                <i class="fas fa-search absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
                <input type="text" name="search" value="{{ request('search') }}"
                       placeholder="Rechercher par référence REC-..., objet..."
                       class="w-full pl-9 pr-3 py-2.5 rounded-xl border border-slate-300 text-xs sm:text-sm text-slate-800 placeholder-slate-400 focus:ring-2 focus:ring-[#0B3B60] focus:border-[#0B3B60] outline-none transition bg-white font-medium">
            </div>

            <!-- Filtre Priorité -->
            <div class="lg:col-span-3">
                <select name="priorite" class="w-full py-2.5 px-3 rounded-xl border border-slate-300 text-xs sm:text-sm text-slate-700 focus:ring-2 focus:ring-[#0B3B60] focus:border-[#0B3B60] outline-none transition bg-white">
                    <option value="">Toutes les urgences</option>
                    <option value="faible" {{ request('priorite') == 'faible' ? 'selected' : '' }}>⚪ Faible</option>
                    <option value="normale" {{ request('priorite') == 'normale' ? 'selected' : '' }}>🔵 Normale</option>
                    <option value="urgente" {{ request('priorite') == 'urgente' ? 'selected' : '' }}>🔴 Urgente</option>
                </select>
            </div>

            <!-- Boutons Appliquer / Réinitialiser -->
            <div class="sm:col-span-2 lg:col-span-3 flex items-center gap-2">
                <button type="submit" class="flex-1 py-2.5 px-4 rounded-xl bg-[#0B3B60] hover:bg-[#07233B] text-white text-xs font-bold uppercase tracking-wider transition flex items-center justify-center gap-1.5">
                    <i class="fas fa-filter text-xs text-amber-300"></i>
                    <span>Filtrer</span>
                </button>

                @if(request()->hasAny(['search', 'statut', 'priorite']))
                <a href="{{ route('reclamations.index') }}" class="py-2.5 px-3.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-600 transition" title="Effacer les filtres">
                    <i class="fas fa-times text-xs"></i>
                </a>
                @endif
            </div>
        </form>
    </div>

    <!-- 3. Conteneur des Réclamations -->
    <div class="bg-white rounded-2xl border border-slate-200/90 shadow-xs overflow-hidden">
        @if($reclamations->isEmpty())
            <!-- État vide -->
            <div class="p-8 sm:p-14 text-center">
                <div class="w-16 h-16 rounded-2xl bg-blue-50 text-[#0B3B60] flex items-center justify-center mx-auto mb-4 text-2xl">
                    <i class="fas fa-folder-closed"></i>
                </div>
                <h4 class="text-base font-bold text-slate-800">
                    {{ request()->hasAny(['search', 'statut', 'priorite']) ? 'Aucun résultat ne correspond à vos critères' : 'Aucune réclamation enregistrée' }}
                </h4>
                <p class="text-xs text-slate-500 mt-1.5 max-w-md mx-auto leading-relaxed">
                    {{ request()->hasAny(['search', 'statut', 'priorite']) ? 'Essayez de réinitialiser vos filtres ou de modifier votre recherche.' : 'Vous pouvez déposer une nouvelle réclamation à tout moment auprès des services de la CMSS.' }}
                </p>

                <div class="mt-5 flex items-center justify-center gap-3">
                    @if(request()->hasAny(['search', 'statut', 'priorite']))
                        <a href="{{ route('reclamations.index') }}" class="px-4 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold transition">
                            <i class="fas fa-times mr-1"></i> Réinitialiser
                        </a>
                    @endif
                    <a href="{{ route('reclamations.create') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-[#0B3B60] hover:bg-[#07233B] text-white text-xs font-bold uppercase tracking-wider transition shadow-xs">
                        <i class="fas fa-plus text-amber-300"></i>
                        <span>Déposer une Réclamation</span>
                    </a>
                </div>
            </div>
        @else

            <!-- Vue Cartes Mobile (< 640px) -->
            <div class="sm:hidden divide-y divide-slate-100">
                @foreach($reclamations as $rec)
                    <div class="p-4 space-y-3 hover:bg-slate-50/60 transition">
                        <!-- En-tête : Référence + Statut -->
                        <div class="flex items-center justify-between gap-2">
                            <div class="flex items-center gap-1.5">
                                <span class="font-mono font-bold text-xs text-[#0B3B60] bg-blue-50 px-2.5 py-1 rounded-lg border border-blue-100">
                                    {{ $rec->reference }}
                                </span>
                                <button type="button" onclick="navigator.clipboard.writeText('{{ $rec->reference }}'); alert('Référence copiée !');"
                                        class="text-slate-400 hover:text-[#0B3B60] p-1" title="Copier">
                                    <i class="fas fa-copy text-xs"></i>
                                </button>
                            </div>

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

                        <!-- Métadonnées & Catégorie -->
                        <div class="flex flex-wrap items-center gap-2 text-[11px] text-slate-500">
                            <span class="px-2 py-0.5 rounded bg-slate-100 font-medium text-slate-700 truncate max-w-[150px]">
                                {{ $rec->categorie->nom ?? 'Générale' }}
                            </span>
                            <span>&bull;</span>
                            <span><i class="fas fa-calendar-day text-[10px] mr-1"></i>{{ $rec->created_at->format('d/m/Y') }}</span>

                            @if(!auth()->user()->isCitoyen() && $rec->user)
                                <span>&bull;</span>
                                <span class="font-semibold text-slate-700"><i class="fas fa-user text-[10px] mr-1"></i>{{ $rec->user->name }}</span>
                            @endif
                        </div>

                        <!-- Objet -->
                        <h4 class="font-bold text-slate-900 text-sm leading-snug">
                            {{ $rec->objet }}
                        </h4>

                        <!-- Actions Mobile -->
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

                            @if(!auth()->user()->isCitoyen())
                                <a href="{{ route('reclamations.edit', $rec) }}" class="p-2 rounded-xl bg-emerald-50 text-emerald-700" title="Traiter">
                                    <i class="fas fa-edit text-xs"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Vue Tableau Desktop (>= 640px) -->
            <div class="hidden sm:block overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50/80 border-b border-slate-100 text-[11px] font-bold text-slate-500 uppercase tracking-wider">
                            <th class="py-3.5 px-4">Référence</th>
                            @if(!auth()->user()->isCitoyen())
                                <th class="py-3.5 px-4">Assuré Demandeur</th>
                            @endif
                            <th class="py-3.5 px-4">Catégorie</th>
                            <th class="py-3.5 px-4">Objet de la réclamation</th>
                            <th class="py-3.5 px-4">Urgence</th>
                            <th class="py-3.5 px-4">Date dépôt</th>
                            <th class="py-3.5 px-4">Statut</th>
                            <th class="py-3.5 px-4 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-xs">
                        @foreach($reclamations as $rec)
                            <tr class="hover:bg-slate-50/60 transition">
                                <!-- Référence -->
                                <td class="py-3.5 px-4 font-mono font-bold text-[#0B3B60] whitespace-nowrap">
                                    <div class="flex items-center gap-1.5">
                                        <a href="{{ route('reclamations.show', $rec) }}" class="hover:underline">
                                            {{ $rec->reference }}
                                        </a>
                                        <button type="button" onclick="navigator.clipboard.writeText('{{ $rec->reference }}'); alert('Référence copiée !');"
                                                class="text-slate-400 hover:text-[#0B3B60] p-1" title="Copier">
                                            <i class="fas fa-copy text-[10px]"></i>
                                        </button>
                                    </div>
                                </td>

                                @if(!auth()->user()->isCitoyen())
                                    <td class="py-3.5 px-4 text-slate-800 font-semibold whitespace-nowrap">
                                        {{ $rec->user->name ?? 'Anonyme' }}
                                    </td>
                                @endif

                                <!-- Catégorie -->
                                <td class="py-3.5 px-4 text-slate-600 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded bg-slate-100 text-[11px] font-medium text-slate-700">
                                        {{ $rec->categorie->nom ?? 'Générale' }}
                                    </span>
                                </td>

                                <!-- Objet -->
                                <td class="py-3.5 px-4 text-slate-800 font-medium max-w-xs truncate" title="{{ $rec->objet }}">
                                    {{ $rec->objet }}
                                </td>

                                <!-- Urgence / Priorité -->
                                <td class="py-3.5 px-4 whitespace-nowrap">
                                    @if($rec->priorite == 'urgente')
                                        <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded text-[11px] font-bold bg-rose-50 text-rose-700 border border-rose-200">
                                            <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span> Urgente
                                        </span>
                                    @elseif($rec->priorite == 'normale')
                                        <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded text-[11px] font-semibold bg-sky-50 text-sky-700 border border-sky-200">
                                            <span class="w-1.5 h-1.5 rounded-full bg-sky-500"></span> Normale
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded text-[11px] font-medium bg-slate-100 text-slate-600">
                                            <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Faible
                                        </span>
                                    @endif
                                </td>

                                <!-- Date -->
                                <td class="py-3.5 px-4 text-slate-500 whitespace-nowrap text-[11px]">
                                    {{ $rec->created_at->format('d/m/Y') }}
                                </td>

                                <!-- Statut -->
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

                                <!-- Actions -->
                                <td class="py-3.5 px-4 text-right whitespace-nowrap">
                                    <div class="inline-flex items-center gap-1.5">
                                        <a href="{{ route('reclamations.show', $rec) }}" 
                                           class="p-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 transition" 
                                           title="Consulter le dossier">
                                            <i class="fas fa-eye text-xs"></i>
                                        </a>

                                        <a href="{{ route('reclamations.pdf', $rec) }}" 
                                           class="p-2 rounded-xl bg-rose-50 hover:bg-rose-100 text-rose-600 transition" 
                                           title="Télécharger le Récépissé Officiel (PDF)">
                                            <i class="fas fa-file-pdf text-xs"></i>
                                        </a>

                                        @if(!auth()->user()->isCitoyen())
                                            <a href="{{ route('reclamations.edit', $rec) }}" 
                                               class="p-2 rounded-xl bg-emerald-50 hover:bg-emerald-100 text-emerald-700 transition" 
                                               title="Instruire / Modifier">
                                                <i class="fas fa-edit text-xs"></i>
                                            </a>

                                            <form action="{{ route('reclamations.destroy', $rec) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        onclick="return confirm('Confirmez-vous la suppression de ce dossier ?')"
                                                        class="p-2 rounded-xl bg-rose-50 hover:bg-rose-100 text-rose-600 transition" 
                                                        title="Supprimer">
                                                    <i class="fas fa-trash text-xs"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="p-4 border-t border-slate-100 bg-white flex items-center justify-between">
                {{ $reclamations->links() }}
            </div>

        @endif
    </div>
</x-app-layout>