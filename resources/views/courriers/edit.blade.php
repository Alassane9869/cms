<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                ✏️ Modifier le Courrier
            </h2>
            <a href="{{ route('courriers.index') }}"
               class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                ← Retour
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6">

                @if($errors->any())
                    <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('courriers.update', $courrier) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Type -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Type *</label>
                        <select name="type"
                                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="entrant" {{ old('type', $courrier->type) == 'entrant' ? 'selected' : '' }}>📥 Entrant</option>
                            <option value="sortant" {{ old('type', $courrier->type) == 'sortant' ? 'selected' : '' }}>📤 Sortant</option>
                        </select>
                    </div>

                    <!-- Objet -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Objet *</label>
                        <input type="text" name="objet" value="{{ old('objet', $courrier->objet) }}"
                               class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <textarea name="description" rows="4"
                                  class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description', $courrier->description) }}</textarea>
                    </div>

                    <!-- Expéditeur et Destinataire -->
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Expéditeur *</label>
                            <input type="text" name="expediteur" value="{{ old('expediteur', $courrier->expediteur) }}"
                                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Destinataire *</label>
                            <input type="text" name="destinataire" value="{{ old('destinataire', $courrier->destinataire) }}"
                                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>

                    <!-- Statut -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Statut *</label>
                        <select name="statut"
                                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="recu" {{ old('statut', $courrier->statut) == 'recu' ? 'selected' : '' }}>Reçu</option>
                            <option value="en_cours" {{ old('statut', $courrier->statut) == 'en_cours' ? 'selected' : '' }}>En cours</option>
                            <option value="traite" {{ old('statut', $courrier->statut) == 'traite' ? 'selected' : '' }}>Traité</option>
                            <option value="archive" {{ old('statut', $courrier->statut) == 'archive' ? 'selected' : '' }}>Archivé</option>
                        </select>
                    </div>

                    <!-- Dates -->
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Date de réception</label>
                            <input type="date" name="date_reception" value="{{ old('date_reception', $courrier->date_reception) }}"
                                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Date d'envoi</label>
                            <input type="date" name="date_envoi" value="{{ old('date_envoi', $courrier->date_envoi) }}"
                                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>

                    <!-- Bouton -->
                    <div class="flex justify-end">
                        <button type="submit"
                                class="bg-green-500 text-white px-6 py-2 rounded hover:bg-green-600">
                            💾 Mettre à jour
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>