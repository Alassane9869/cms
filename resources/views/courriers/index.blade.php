<x-app-layout>
    <x-slot name="header">
        <h2 style="font-size: 20px; font-weight: 700; color: #1e3a5f;">
            <i class="fas fa-envelope"></i> Liste des Courriers
        </h2>
    </x-slot>

    @if(session('success'))
        <div style="background: #d1fae5; border-left: 4px solid #10b981; color: #065f46; padding: 14px 20px; border-radius: 8px; margin-bottom: 20px; display: flex; align-items: center; gap: 10px;">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    <div class="card" style="padding: 0; overflow: hidden;">

        <!-- Header tableau -->
        <div style="padding: 20px 24px; display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #e5e7eb;">
            <div style="color: #6b7280; font-size: 14px;">
                Total : <strong style="color: #1e3a5f;">{{ $courriers->total() }}</strong> courrier(s)
            </div>
            <a href="{{ route('courriers.create') }}" class="btn-primary">
                <i class="fas fa-plus"></i> Nouveau Courrier
            </a>
        </div>

        <table class="table-custom" style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr>
                    <th>Référence</th>
                    <th>Objet</th>
                    <th>Type</th>
                    <th>Statut</th>
                    <th>Expéditeur</th>
                    <th>Destinataire</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($courriers as $courrier)
                <tr>
                    <td>
                        <span style="font-weight: 600; color: #7c3aed;">{{ $courrier->reference }}</span>
                    </td>
                    <td style="max-width: 180px;">
                        <span style="color: #374151;">{{ Str::limit($courrier->objet, 35) }}</span>
                    </td>
                    <td>
                        @if($courrier->type == 'entrant')
                            <span class="badge" style="background: #dbeafe; color: #1e40af;">📥 Entrant</span>
                        @else
                            <span class="badge" style="background: #f5f3ff; color: #6d28d9;">📤 Sortant</span>
                        @endif
                    </td>
                    <td>
                        @if($courrier->statut == 'recu')
                            <span class="badge" style="background: #fef3c7; color: #92400e;">📬 Reçu</span>
                        @elseif($courrier->statut == 'en_cours')
                            <span class="badge" style="background: #dbeafe; color: #1e40af;">🔄 En cours</span>
                        @elseif($courrier->statut == 'traite')
                            <span class="badge" style="background: #d1fae5; color: #065f46;">✅ Traité</span>
                        @else
                            <span class="badge" style="background: #f3f4f6; color: #6b7280;">📦 Archivé</span>
                        @endif
                    </td>
                    <td style="color: #6b7280; font-size: 13px;">
                        {{ $courrier->expediteur }}
                    </td>
                    <td style="color: #6b7280; font-size: 13px;">
                        {{ $courrier->destinataire }}
                    </td>
                    <td style="color: #6b7280; font-size: 13px;">
                        {{ $courrier->created_at->format('d/m/Y') }}
                    </td>
                    <td>
                        <div style="display: flex; gap: 6px;">
                            <a href="{{ route('courriers.show', $courrier) }}"
                               style="background: #eff6ff; color: #2d6a9f; padding: 6px 10px; border-radius: 6px; text-decoration: none; font-size: 13px;">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('courriers.edit', $courrier) }}"
                               style="background: #d1fae5; color: #059669; padding: 6px 10px; border-radius: 6px; text-decoration: none; font-size: 13px;">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('courriers.destroy', $courrier) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        onclick="return confirm('Supprimer ce courrier ?')"
                                        style="background: #fee2e2; color: #dc2626; padding: 6px 10px; border-radius: 6px; border: none; cursor: pointer; font-size: 13px;">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" style="text-align: center; padding: 40px; color: #9ca3af;">
                        <i class="fas fa-inbox" style="font-size: 40px; margin-bottom: 10px; display: block;"></i>
                        Aucun courrier trouvé.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <div style="padding: 16px 24px; border-top: 1px solid #e5e7eb;">
            {{ $courriers->links() }}
        </div>

    </div>

</x-app-layout>