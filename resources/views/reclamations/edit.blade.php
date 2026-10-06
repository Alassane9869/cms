<x-app-layout>
    <x-slot name="header">
        <h2 style="font-size: 20px; font-weight: 700; color: #1e3a5f;">
            <i class="fas fa-edit"></i> Modifier la Réclamation
        </h2>
    </x-slot>

    <div class="card">

        @if($errors->any())
            <div style="background: #fee2e2; border-left: 4px solid #ef4444; color: #991b1b; padding: 14px 20px; border-radius: 8px; margin-bottom: 20px;">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('reclamations.update', $reclamation) }}" method="POST">
            @csrf
            @method('PUT')

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">

                <div style="grid-column: span 2;">
                    <label class="form-label">Objet *</label>
                    <input type="text" name="objet" value="{{ old('objet', $reclamation->objet) }}" class="form-control">
                </div>

                <div style="grid-column: span 2;">
                    <label class="form-label">Description *</label>
                    <textarea name="description" rows="5" class="form-control">{{ old('description', $reclamation->description) }}</textarea>
                </div>

                <div>
                    <label class="form-label">Priorité *</label>
                    <select name="priorite" class="form-control">
                        <option value="faible" @selected(old('priorite', $reclamation->priorite) == 'faible')>Faible</option>
                        <option value="normale" @selected(old('priorite', $reclamation->priorite) == 'normale')>Normale</option>
                        <option value="urgente" @selected(old('priorite', $reclamation->priorite) == 'urgente')>Urgente</option>
                    </select>
                </div>

                <div>
                    <label class="form-label">Statut *</label>
                    <select name="statut" class="form-control">
                        <option value="en_attente" @selected(old('statut', $reclamation->statut) == 'en_attente')>En attente</option>
                        <option value="en_cours" @selected(old('statut', $reclamation->statut) == 'en_cours')>En cours</option>
                        <option value="traitee" @selected(old('statut', $reclamation->statut) == 'traitee')>Traitée</option>
                        <option value="rejetee" @selected(old('statut', $reclamation->statut) == 'rejetee')>Rejetée</option>
                    </select>
                </div>

                <div style="grid-column: span 2;">
                    <label class="form-label">Catégorie</label>
                    <select name="categorie_id" class="form-control">
                        <option value="">-- Sélectionner une catégorie --</option>
                        @foreach($categories as $categorie)
                            <option value="{{ $categorie->id }}" @selected(old('categorie_id', $reclamation->categorie_id) == $categorie->id)>
                                {{ $categorie->nom }}
                            </option>
                        @endforeach
                    </select>
                </div>

            </div>

            <div style="display: flex; justify-content: space-between; margin-top: 24px;">
                <a href="{{ route('reclamations.index') }}" class="btn-secondary">
                    <i class="fas fa-arrow-left"></i> Retour
                </a>
                <button type="submit" class="btn-success" style="border: none; cursor: pointer;">
                    <i class="fas fa-save"></i> Mettre à jour
                </button>
            </div>

        </form>
    </div>

</x-app-layout>