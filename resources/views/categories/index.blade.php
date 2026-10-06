<x-app-layout>
    <x-slot name="header">
        <h2 style="font-size: 20px; font-weight: 700; color: #1e3a5f;">
            <i class="fas fa-tags"></i> Liste des Catégories
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
                Total : <strong style="color: #1e3a5f;">{{ $categories->total() }}</strong> catégorie(s)
            </div>
            <a href="{{ route('categories.create') }}" class="btn-primary">
                <i class="fas fa-plus"></i> Nouvelle Catégorie
            </a>
        </div>

        <table class="table-custom" style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Date création</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $categorie)
                <tr>
                    <td style="color: #9ca3af; font-size: 13px;">
                        {{ $loop->iteration }}
                    </td>
                    <td>
                        <div style="display: flex; align-items: center; gap: 10px;">
                            <div style="background: #eff6ff; border-radius: 8px; width: 36px; height: 36px; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-tag" style="color: #2d6a9f;"></i>
                            </div>
                            <span style="font-weight: 600; color: #1e3a5f;">{{ $categorie->nom }}</span>
                        </div>
                    </td>
                    <td style="color: #6b7280; font-size: 13px;">
                        {{ Str::limit($categorie->description ?? 'Aucune description', 50) }}
                    </td>
                    <td style="color: #6b7280; font-size: 13px;">
                        {{ $categorie->created_at->format('d/m/Y') }}
                    </td>
                    <td>
                        <div style="display: flex; gap: 6px;">
                            <a href="{{ route('categories.show', $categorie) }}"
                               style="background: #eff6ff; color: #2d6a9f; padding: 6px 10px; border-radius: 6px; text-decoration: none; font-size: 13px;">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('categories.edit', $categorie) }}"
                               style="background: #d1fae5; color: #059669; padding: 6px 10px; border-radius: 6px; text-decoration: none; font-size: 13px;">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('categories.destroy', $categorie) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        onclick="return confirm('Supprimer cette catégorie ?')"
                                        style="background: #fee2e2; color: #dc2626; padding: 6px 10px; border-radius: 6px; border: none; cursor: pointer; font-size: 13px;">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align: center; padding: 40px; color: #9ca3af;">
                        <i class="fas fa-tags" style="font-size: 40px; margin-bottom: 10px; display: block;"></i>
                        Aucune catégorie trouvée.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <div style="padding: 16px 24px; border-top: 1px solid #e5e7eb;">
            {{ $categories->links() }}
        </div>

    </div>

</x-app-layout>