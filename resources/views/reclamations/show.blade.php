<x-app-layout>
    <x-slot name="header">
        <h2 style="font-size: 20px; font-weight: 700; color: #1e3a5f;">
            <i class="fas fa-clipboard-list"></i> Détail de la Réclamation
        </h2>
    </x-slot>

    <div class="card">

        <!-- Référence -->
        <div style="background: linear-gradient(135deg, #1e3a5f, #2d6a9f); border-radius: 10px; padding: 20px; margin-bottom: 24px; display: flex; justify-content: space-between; align-items: center;">
            <div>
                <p style="color: rgba(255,255,255,0.7); font-size: 13px; margin: 0;">Référence</p>
                <p style="color: white; font-size: 22px; font-weight: 700; margin: 5px 0 0;">{{ $reclamation->reference }}</p>
            </div>
            <div style="text-align: right;">
                @if($reclamation->statut == 'en_attente')
                    <span style="background: #fef3c7; color: #92400e; padding: 6px 16px; border-radius: 20px; font-size: 13px; font-weight: 600;">⏳ En attente</span>
                @elseif($reclamation->statut == 'en_cours')
                    <span style="background: #dbeafe; color: #1e40af; padding: 6px 16px; border-radius: 20px; font-size: 13px; font-weight: 600;">🔄 En cours</span>
                @elseif($reclamation->statut == 'traitee')
                    <span style="background: #d1fae5; color: #065f46; padding: 6px 16px; border-radius: 20px; font-size: 13px; font-weight: 600;">✅ Traitée</span>
                @else
                    <span style="background: #fee2e2; color: #991b1b; padding: 6px 16px; border-radius: 20px; font-size: 13px; font-weight: 600;">❌ Rejetée</span>
                @endif
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">

            <!-- Objet -->
            <div style="background: #f9fafb; border-radius: 8px; padding: 16px; grid-column: span 2;">
                <label style="color: #6b7280; font-size: 12px; font-weight: 600; text-transform: uppercase;">Objet</label>
                <p style="color: #1e3a5f; font-weight: 600; margin-top: 4px; font-size: 16px;">{{ $reclamation->objet }}</p>
            </div>

            <!-- Description -->
            <div style="background: #f9fafb; border-radius: 8px; padding: 16px; grid-column: span 2;">
                <label style="color: #6b7280; font-size: 12px; font-weight: 600; text-transform: uppercase;">Description</label>
                <p style="color: #374151; margin-top: 4px; line-height: 1.6;">{{ $reclamation->description }}</p>
            </div>

            <!-- Priorité -->
            <div style="background: #f9fafb; border-radius: 8px; padding: 16px;">
                <label style="color: #6b7280; font-size: 12px; font-weight: 600; text-transform: uppercase;">Priorité</label>
                <div style="margin-top: 8px;">
                    @if($reclamation->priorite == 'urgente')
                        <span style="background: #fee2e2; color: #991b1b; padding: 4px 12px; border-radius: 20px; font-size: 13px; font-weight: 600;">🔴 Urgente</span>
                    @elseif($reclamation->priorite == 'normale')
                        <span style="background: #dbeafe; color: #1e40af; padding: 4px 12px; border-radius: 20px; font-size: 13px; font-weight: 600;">🔵 Normale</span>
                    @else
                        <span style="background: #f3f4f6; color: #6b7280; padding: 4px 12px; border-radius: 20px; font-size: 13px; font-weight: 600;">⚪ Faible</span>
                    @endif
                </div>
            </div>

            <!-- Catégorie -->
            <div style="background: #f9fafb; border-radius: 8px; padding: 16px;">
                <label style="color: #6b7280; font-size: 12px; font-weight: 600; text-transform: uppercase;">Catégorie</label>
                <p style="color: #1e3a5f; font-weight: 600; margin-top: 4px;">{{ $reclamation->categorie->nom ?? 'Non définie' }}</p>
            </div>

            <!-- Créé par -->
            <div style="background: #f9fafb; border-radius: 8px; padding: 16px;">
                <label style="color: #6b7280; font-size: 12px; font-weight: 600; text-transform: uppercase;">Créé par</label>
                <p style="color: #1e3a5f; font-weight: 600; margin-top: 4px;">{{ $reclamation->user->name ?? 'Inconnu' }}</p>
            </div>

            <!-- Email -->
            <div style="background: #f9fafb; border-radius: 8px; padding: 16px;">
                <label style="color: #6b7280; font-size: 12px; font-weight: 600; text-transform: uppercase;">Email</label>
                <a href="mailto:{{ $reclamation->user->email }}"
                   style="color: #2d6a9f; font-weight: 600; margin-top: 4px; display: block; text-decoration: none;">
                    <i class="fas fa-envelope"></i> {{ $reclamation->user->email ?? 'Non renseigné' }}
                </a>
            </div>

            <!-- Téléphone -->
            <div style="background: #f9fafb; border-radius: 8px; padding: 16px;">
                <label style="color: #6b7280; font-size: 12px; font-weight: 600; text-transform: uppercase;">Téléphone</label>
                <p style="color: #1e3a5f; font-weight: 600; margin-top: 4px;">
                    <i class="fas fa-phone"></i> {{ $reclamation->user->telephone ?? 'Non renseigné' }}
                </p>
            </div>

            <!-- Date -->
            <div style="background: #f9fafb; border-radius: 8px; padding: 16px;">
                <label style="color: #6b7280; font-size: 12px; font-weight: 600; text-transform: uppercase;">Date de création</label>
                <p style="color: #1e3a5f; font-weight: 600; margin-top: 4px;">
                    <i class="fas fa-calendar"></i> {{ $reclamation->created_at->format('d/m/Y H:i') }}
                </p>
            </div>

        </div>

        <!-- Actions -->
        <div style="display: flex; gap: 12px; margin-top: 10px;">
            <a href="{{ route('reclamations.pdf', $reclamation) }}" class="btn-danger">
                <i class="fas fa-file-pdf"></i> Télécharger PDF
            </a>
            <a href="{{ route('reclamations.edit', $reclamation) }}" class="btn-success">
                <i class="fas fa-edit"></i> Modifier
            </a>
            <form action="{{ route('reclamations.destroy', $reclamation) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"
                        onclick="return confirm('Supprimer cette réclamation ?')"
                        class="btn-danger" style="border: none; cursor: pointer;">
                    <i class="fas fa-trash"></i> Supprimer
                </button>
            </form>
            <a href="{{ route('reclamations.index') }}" class="btn-secondary">
                <i class="fas fa-arrow-left"></i> Retour
            </a>
        </div>

    </div>

</x-app-layout>