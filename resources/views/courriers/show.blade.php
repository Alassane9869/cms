<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                📬 Détail du Courrier
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

                <!-- Référence -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-500">Référence</label>
                    <p class="text-lg font-bold text-blue-600">{{ $courrier->reference }}</p>
                </div>

                <!-- Type -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-500">Type</label>
                    @if($courrier->type == 'entrant')
                        <span class="px-2 py-1 text-xs rounded-full bg-blue-100 text-blue-800">📥 Entrant</span>
                    @else
                        <span class="px-2 py-1 text-xs rounded-full bg-purple-100 text-purple-800">📤 Sortant</span>
                    @endif
                </div>

                <!-- Objet -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-500">Objet</label>
                    <p class="text-gray-800">{{ $courrier->objet }}</p>
                </div>

                <!-- Description -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-500">Description</label>
                    <p class="text-gray-800">{{ $courrier->description ?? 'Aucune description' }}</p>
                </div>

                <!-- Expéditeur et Destinataire -->
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Expéditeur</label>
                        <p class="text-gray-800">{{ $courrier->expediteur }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Destinataire</label>
                        <p class="text-gray-800">{{ $courrier->destinataire }}</p>
                    </div>
                </div>

                <!-- Statut -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-500">Statut</label>
                    @if($courrier->statut == 'recu')
                        <span class="px-2 py-1 text-xs rounded-full bg-yellow-100 text-yellow-800">Reçu</span>
                    @elseif($courrier->statut == 'en_cours')
                        <span class="px-2 py-1 text-xs rounded-full bg-blue-100 text-blue-800">En cours</span>
                    @elseif($courrier->statut == 'traite')
                        <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">Traité</span>
                    @else
                        <span class="px-2 py-1 text-xs rounded-full bg-gray-100 text-gray-800">Archivé</span>
                    @endif
                </div>

                <!-- Dates -->
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Date de réception</label>
                        <p class="text-gray-800">{{ $courrier->date_reception ?? 'Non définie' }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Date d'envoi</label>
                        <p class="text-gray-800">{{ $courrier->date_envoi ?? 'Non définie' }}</p>
                    </div>
                </div>

                <!-- Fichier -->
                @if($courrier->fichier)
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-500">Fichier joint</label>
                    <a href="{{ Storage::url($courrier->fichier) }}"
                       target="_blank"
                       class="text-blue-600 hover:text-blue-900">
                        📎 Télécharger le fichier
                    </a>
                </div>
                @endif

                <!-- Actions -->
                <div class="flex gap-4">
                    <a href="{{ route('courriers.edit', $courrier) }}"
                       class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                        ✏️ Modifier
                    </a>
                    <form action="{{ route('courriers.destroy', $courrier) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                onclick="return confirm('Supprimer ce courrier ?')"
                                class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                            🗑️ Supprimer
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>