<x-app-layout>
    <x-slot name="header">
        <h2 style="font-size: 20px; font-weight: 700; color: #1e3a5f;">
            <i class="fas fa-clipboard-list"></i> Liste des Réclamations
        </h2>
    </x-slot>

    @if(session('success'))
        <div style="background: #d1fae5; border-left: 4px solid #10b981; color: #065f46; padding: 14px 20px; border-radius: 8px; margin-bottom: 20px; display: flex; align-items: center; gap: 10px;">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    <div class="card" style="padding: 0; overflow: hidden;">

       <!-- Header tableau -->
<div style="padding: 20px 24px; border-bottom: 1px solid #e5e7eb;">

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
    <div style="color: #6b7280; font-size: 14px;">
        Total : <strong style="color: #1e3a5f;">{{ $reclamations->total() }}</strong> réclamation(s)
    </div>
    <a href="{{ route('reclamations.create') }}" class="btn-primary">
        <i class="fas fa-plus"></i> Nouvelle Réclamation
    </a>
</div>

<!-- Formulaire de recherche -->
<form method="GET" action="{{ route('reclamations.index') }}" style="display: flex; gap: 10px;">

    <div style="flex: 1; position: relative;">
        <i class="fas fa-search" style="position: absolute; left: 14px; top: 50%; transform: translateY(-50%); color: #9ca3af;"></i>
        <input type="text" name="search" value="{{ request('search') }}"
               placeholder="Rechercher par référence ou objet..."
               style="width: 100%; padding: 10px 14px 10px 40px; border: 2px solid #e5e7eb; border-radius: 8px; outline: none;">
    </div>

    <select name="statut" style="padding: 10px 14px; border: 2px solid #e5e7eb; border-radius: 8px; outline: none;">
        <option value="">Tous les statuts</option>
        <option value="en_attente" {{ request('statut') == 'en_attente' ? 'selected' : '' }}>En attente</option>
        <option value="en_cours" {{ request('statut') == 'en_cours' ? 'selected' : '' }}>En cours</option>
        <option value="traitee" {{ request('statut') == 'traitee' ? 'selected' : '' }}>Traitée</option>
        <option value="rejetee" {{ request('statut') == 'rejetee' ? 'selected' : '' }}>Rejetée</option>
    </select>

    <select name="priorite" style="padding: 10px 14px; border: 2px solid #e5e7eb; border-radius: 8px; outline: none;">
        <option value="">Toutes priorités</option>
        <option value="faible" {{ request('priorite') == 'faible' ? 'selected' : '' }}>Faible</option>
        <option value="normale" {{ request('priorite') == 'normale' ? 'selected' : '' }}>Normale</option>
        <option value="urgente" {{ request('priorite') == 'urgente' ? 'selected' : '' }}>Urgente</option>
    </select>

    <button type="submit" class="btn-primary" style="border: none; cursor: pointer;">
        <i class="fas fa-filter"></i> Filtrer
    </button>

    @if(request()->hasAny(['search', 'statut', 'priorite']))
    <a href="{{ route('reclamations.index') }}" class="btn-secondary">
        <i class="fas fa-times"></i>
    </a>
    @endif

</form>

</div>

        <table class="table-custom" style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr>
                    <th>Référence</th>
                    <th>Objet</th>
                    <th>Statut</th>
                    <th>Priorité</th>
                    <th>Catégorie</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($reclamations as $reclamation)
                <tr>
                    <td>
                        <span style="font-weight: 600; color: #2d6a9f;">{{ $reclamation->reference }}</span>
                    </td>
                    <td style="max-width: 200px;">
                        <span style="color: #374151;">{{ Str::limit($reclamation->objet, 40) }}</span>
                    </td>
                    <td>
                        @if($reclamation->statut == 'en_attente')
                            <span class="badge" style="background: #fef3c7; color: #92400e;">⏳ En attente</span>
                        @elseif($reclamation->statut == 'en_cours')
                            <span class="badge" style="background: #dbeafe; color: #1e40af;">🔄 En cours</span>
                        @elseif($reclamation->statut == 'traitee')
                            <span class="badge" style="background: #d1fae5; color: #065f46;">✅ Traitée</span>
                        @else
                            <span class="badge" style="background: #fee2e2; color: #991b1b;">❌ Rejetée</span>
                        @endif
                    </td>
                    <td>
                        @if($reclamation->priorite == 'urgente')
                            <span class="badge" style="background: #fee2e2; color: #991b1b;">🔴 Urgente</span>
                        @elseif($reclamation->priorite == 'normale')
                            <span class="badge" style="background: #dbeafe; color: #1e40af;">🔵 Normale</span>
                        @else
                            <span class="badge" style="background: #f3f4f6; color: #6b7280;">⚪ Faible</span>
                        @endif
                    </td>
                    <td style="color: #6b7280; font-size: 13px;">
                        {{ $reclamation->categorie->nom ?? 'Non définie' }}
                    </td>
                    <td style="color: #6b7280; font-size: 13px;">
                        {{ $reclamation->created_at->format('d/m/Y') }}
                    </td>
                    <td>
                        <div style="display: flex; gap: 6px;">
                            <a href="{{ route('reclamations.show', $reclamation) }}"
                               style="background: #eff6ff; color: #2d6a9f; padding: 6px 10px; border-radius: 6px; text-decoration: none; font-size: 13px;">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('reclamations.edit', $reclamation) }}"
                               style="background: #d1fae5; color: #059669; padding: 6px 10px; border-radius: 6px; text-decoration: none; font-size: 13px;">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('reclamations.destroy', $reclamation) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        onclick="return confirm('Supprimer cette réclamation ?')"
                                        style="background: #fee2e2; color: #dc2626; padding: 6px 10px; border-radius: 6px; border: none; cursor: pointer; font-size: 13px;">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" style="text-align: center; padding: 40px; color: #9ca3af;">
                        <i class="fas fa-inbox" style="font-size: 40px; margin-bottom: 10px; display: block;"></i>
                        Aucune réclamation trouvée.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <div style="padding: 16px 24px; border-top: 1px solid #e5e7eb;">
            {{ $reclamations->links() }}
        </div>

    </div>

</x-app-layout>