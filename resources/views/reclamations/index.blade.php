<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-blue-100 text-[#0B3B60] flex items-center justify-center font-bold">
                <i class="fas fa-clipboard-list text-lg"></i>
            </div>
            <div>
                <h1 class="text-xl font-extrabold text-slate-900 leading-tight">Gestion des Réclamations</h1>
                <p class="text-xs text-slate-500">Registre officiel des requêtes et instructions d'usagers</p>
            </div>
        </div>
    </x-slot>

    @if(session('success'))
        <div class="mb-5 p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-900 flex items-center gap-3 shadow-xs">
            <i class="fas fa-check-circle text-emerald-600 text-lg"></i>
            <span class="text-sm font-semibold">{{ session('success') }}</span>
        </div>
    @endif

    <div class="card p-0! overflow-hidden shadow-sm border border-slate-200">

        <!-- En-tête & Barre d'outils responsive -->
        <div class="p-4 sm:p-6 border-b border-slate-200 bg-slate-50/50 space-y-4">

            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                <div class="text-xs sm:text-sm text-slate-600 font-medium">
                    Total : <strong class="text-[#0B3B60] font-black text-base">{{ $reclamations->total() }}</strong> réclamation(s)
                </div>
                <a href="{{ route('reclamations.create') }}" class="btn-primary w-full sm:w-auto justify-center shadow-xs">
                    <i class="fas fa-plus"></i>
                    <span>Nouvelle Réclamation</span>
                </a>
            </div>

            <!-- Formulaire de recherche et filtres responsive -->
            <form method="GET" action="{{ route('reclamations.index') }}" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-12 gap-2.5">

                <div class="sm:col-span-2 lg:col-span-5 relative">
                    <i class="fas fa-search absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
                    <input type="text" name="search" value="{{ request('search') }}"
                           placeholder="Référence, objet, citoyen..."
                           class="w-full pl-9 pr-3 py-2.5 rounded-xl border border-slate-300 text-xs sm:text-sm text-slate-800 placeholder-slate-400 focus:ring-2 focus:ring-[#0B3B60] focus:border-[#0B3B60] outline-none transition bg-white">
                </div>

                <div class="lg:col-span-3">
                    <select name="statut" class="w-full py-2.5 px-3 rounded-xl border border-slate-300 text-xs sm:text-sm text-slate-700 focus:ring-2 focus:ring-[#0B3B60] focus:border-[#0B3B60] outline-none transition bg-white">
                        <option value="">Tous les statuts</option>
                        <option value="en_attente" {{ request('statut') == 'en_attente' ? 'selected' : '' }}>⏳ En attente</option>
                        <option value="en_cours" {{ request('statut') == 'en_cours' ? 'selected' : '' }}>🔄 En cours</option>
                        <option value="traitee" {{ request('statut') == 'traitee' ? 'selected' : '' }}>✅ Traitée</option>
                        <option value="rejetee" {{ request('statut') == 'rejetee' ? 'selected' : '' }}>❌ Rejetée</option>
                    </select>
                </div>

                <div class="lg:col-span-2">
                    <select name="priorite" class="w-full py-2.5 px-3 rounded-xl border border-slate-300 text-xs sm:text-sm text-slate-700 focus:ring-2 focus:ring-[#0B3B60] focus:border-[#0B3B60] outline-none transition bg-white">
                        <option value="">Toutes priorités</option>
                        <option value="faible" {{ request('priorite') == 'faible' ? 'selected' : '' }}>Faible</option>
                        <option value="normale" {{ request('priorite') == 'normale' ? 'selected' : '' }}>Normale</option>
                        <option value="urgente" {{ request('priorite') == 'urgente' ? 'selected' : '' }}>Urgente</option>
                    </select>
                </div>

                <div class="sm:col-span-2 lg:col-span-2 flex items-center gap-2">
                    <button type="submit" class="btn-primary flex-1 justify-center py-2.5 text-xs font-bold uppercase tracking-wider">
                        <i class="fas fa-filter"></i> Filtrer
                    </button>

                    @if(request()->hasAny(['search', 'statut', 'priorite']))
                    <a href="{{ route('reclamations.index') }}" class="btn-secondary py-2.5 px-3" title="Réinitialiser">
                        <i class="fas fa-times"></i>
                    </a>
                    @endif
                </div>

            </form>

        </div>

        <!-- Tableau avec conteneur de défilement horizontal fluide sur mobile -->
        <div class="table-responsive-wrapper">
            <table class="table-custom">
                <thead>
                    <tr>
                        <th>Référence</th>
                        <th>Objet</th>
                        <th>Statut</th>
                        <th>Priorité</th>
                        <th>Catégorie</th>
                        <th>Date</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($reclamations as $reclamation)
                    <tr class="hover:bg-slate-50/80 transition">
                        <td>
                            <a href="{{ route('reclamations.show', $reclamation) }}" class="font-mono font-bold text-[#0B3B60] hover:underline">
                                {{ $reclamation->reference }}
                            </a>
                        </td>
                        <td class="max-w-xs truncate font-medium text-slate-800" title="{{ $reclamation->objet }}">
                            {{ Str::limit($reclamation->objet, 38) }}
                        </td>
                        <td>
                            @if($reclamation->statut == 'en_attente')
                                <span class="badge bg-amber-100 text-amber-800 border border-amber-200">⏳ En attente</span>
                            @elseif($reclamation->statut == 'en_cours')
                                <span class="badge bg-sky-100 text-sky-800 border border-sky-200">🔄 En cours</span>
                            @elseif($reclamation->statut == 'traitee')
                                <span class="badge bg-emerald-100 text-emerald-800 border border-emerald-200">✅ Traitée</span>
                            @else
                                <span class="badge bg-rose-100 text-rose-800 border border-rose-200">❌ Rejetée</span>
                            @endif
                        </td>
                        <td>
                            @if($reclamation->priorite == 'urgente')
                                <span class="badge bg-rose-50 text-rose-700 border border-rose-200 font-bold">🔴 Urgente</span>
                            @elseif($reclamation->priorite == 'normale')
                                <span class="badge bg-sky-50 text-sky-700 border border-sky-200">🔵 Normale</span>
                            @else
                                <span class="badge bg-slate-100 text-slate-600">⚪ Faible</span>
                            @endif
                        </td>
                        <td class="text-slate-600 text-xs">
                            <span class="px-2 py-0.5 rounded bg-slate-100 text-slate-700 font-medium">
                                {{ $reclamation->categorie->nom ?? 'Non définie' }}
                            </span>
                        </td>
                        <td class="text-slate-500 font-mono text-xs whitespace-nowrap">
                            {{ $reclamation->created_at->format('d/m/Y') }}
                        </td>
                        <td class="text-right">
                            <div class="inline-flex items-center gap-1.5">
                                <a href="{{ route('reclamations.show', $reclamation) }}"
                                   class="p-2 rounded-lg bg-blue-50 text-[#0B3B60] hover:bg-blue-100 transition" title="Consulter">
                                    <i class="fas fa-eye text-xs"></i>
                                </a>
                                <a href="{{ route('reclamations.edit', $reclamation) }}"
                                   class="p-2 rounded-lg bg-emerald-50 text-emerald-700 hover:bg-emerald-100 transition" title="Modifier">
                                    <i class="fas fa-edit text-xs"></i>
                                </a>
                                <form action="{{ route('reclamations.destroy', $reclamation) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            onclick="return confirm('Confirmer la suppression de cette réclamation ?')"
                                            class="p-2 rounded-lg bg-rose-50 text-rose-600 hover:bg-rose-100 transition" title="Supprimer">
                                        <i class="fas fa-trash text-xs"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-12 text-slate-400">
                            <i class="fas fa-inbox text-4xl mb-2 text-slate-300 block"></i>
                            <span class="text-sm">Aucune réclamation enregistrée pour le moment.</span>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination responsive -->
        <div class="p-4 sm:p-5 border-t border-slate-200 bg-white">
            {{ $reclamations->links() }}
        </div>

    </div>

</x-app-layout>