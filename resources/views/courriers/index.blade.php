<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-purple-100 text-purple-900 flex items-center justify-center font-bold">
                <i class="fas fa-envelope-open-text text-lg"></i>
            </div>
            <div>
                <h1 class="text-xl font-extrabold text-slate-900 leading-tight">Gestion des Courriers</h1>
                <p class="text-xs text-slate-500">Flux administratif des courriers entrants et sortants</p>
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

        <!-- Header tableau responsive -->
        <div class="p-4 sm:p-6 border-b border-slate-200 bg-slate-50/50 flex flex-col sm:flex-row justify-between sm:items-center gap-3">
            <div class="text-xs sm:text-sm text-slate-600 font-medium">
                Total : <strong class="text-[#0B3B60] font-black text-base">{{ $courriers->total() }}</strong> courrier(s)
            </div>
            <a href="{{ route('courriers.create') }}" class="btn-primary w-full sm:w-auto justify-center shadow-xs">
                <i class="fas fa-plus"></i>
                <span>Nouveau Courrier</span>
            </a>
        </div>

        <!-- Table responsive -->
        <div class="table-responsive-wrapper">
            <table class="table-custom">
                <thead>
                    <tr>
                        <th>Référence</th>
                        <th>Objet</th>
                        <th>Type</th>
                        <th>Statut</th>
                        <th>Expéditeur</th>
                        <th>Destinataire</th>
                        <th>Date</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($courriers as $courrier)
                    <tr class="hover:bg-slate-50/80 transition">
                        <td>
                            <a href="{{ route('courriers.show', $courrier) }}" class="font-mono font-bold text-purple-700 hover:underline">
                                {{ $courrier->reference }}
                            </a>
                        </td>
                        <td class="max-w-xs truncate font-medium text-slate-800" title="{{ $courrier->objet }}">
                            {{ Str::limit($courrier->objet, 35) }}
                        </td>
                        <td>
                            @if($courrier->type == 'entrant')
                                <span class="badge bg-blue-100 text-blue-800 border border-blue-200">📥 Entrant</span>
                            @else
                                <span class="badge bg-purple-100 text-purple-800 border border-purple-200">📤 Sortant</span>
                            @endif
                        </td>
                        <td>
                            @if($courrier->statut == 'recu')
                                <span class="badge bg-amber-100 text-amber-800 border border-amber-200">📬 Reçu</span>
                            @elseif($courrier->statut == 'en_cours')
                                <span class="badge bg-sky-100 text-sky-800 border border-sky-200">🔄 En cours</span>
                            @elseif($courrier->statut == 'traite')
                                <span class="badge bg-emerald-100 text-emerald-800 border border-emerald-200">✅ Traité</span>
                            @else
                                <span class="badge bg-slate-100 text-slate-700 border border-slate-200">📦 Archivé</span>
                            @endif
                        </td>
                        <td class="text-slate-600 text-xs truncate max-w-[140px]" title="{{ $courrier->expediteur }}">
                            {{ $courrier->expediteur }}
                        </td>
                        <td class="text-slate-600 text-xs truncate max-w-[140px]" title="{{ $courrier->destinataire }}">
                            {{ $courrier->destinataire }}
                        </td>
                        <td class="text-slate-500 font-mono text-xs whitespace-nowrap">
                            {{ $courrier->created_at->format('d/m/Y') }}
                        </td>
                        <td class="text-right">
                            <div class="inline-flex items-center gap-1.5">
                                <a href="{{ route('courriers.show', $courrier) }}"
                                   class="p-2 rounded-lg bg-blue-50 text-[#0B3B60] hover:bg-blue-100 transition" title="Consulter">
                                    <i class="fas fa-eye text-xs"></i>
                                </a>
                                <a href="{{ route('courriers.edit', $courrier) }}"
                                   class="p-2 rounded-lg bg-emerald-50 text-emerald-700 hover:bg-emerald-100 transition" title="Modifier">
                                    <i class="fas fa-edit text-xs"></i>
                                </a>
                                <form action="{{ route('courriers.destroy', $courrier) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            onclick="return confirm('Confirmer la suppression de ce courrier ?')"
                                            class="p-2 rounded-lg bg-rose-50 text-rose-600 hover:bg-rose-100 transition" title="Supprimer">
                                        <i class="fas fa-trash text-xs"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center py-12 text-slate-400">
                            <i class="fas fa-inbox text-4xl mb-2 text-slate-300 block"></i>
                            <span class="text-sm">Aucun courrier enregistré pour le moment.</span>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="p-4 sm:p-5 border-t border-slate-200 bg-white">
            {{ $courriers->links() }}
        </div>

    </div>

</x-app-layout>