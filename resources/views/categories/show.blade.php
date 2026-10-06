<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                📁 Détail de la Catégorie
            </h2>
            <a href="{{ route('categories.index') }}"
               class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                ← Retour
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6">

                <!-- Nom -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-500">Nom</label>
                    <p class="text-lg font-bold text-blue-600">{{ $categorie->nom }}</p>
                </div>

                <!-- Description -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-500">Description</label>
                    <p class="text-gray-800">{{ $categorie->description ?? 'Aucune description' }}</p>
                </div>

                <!-- Date -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-500">Date de création</label>
                    <p class="text-gray-800">{{ $categorie->created_at->format('d/m/Y H:i') }}</p>
                </div>

                <!-- Actions -->
                <div class="flex gap-4">
                    <a href="{{ route('categories.edit', $categorie) }}"
                       class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                        ✏️ Modifier
                    </a>
                    <form action="{{ route('categories.destroy', $categorie) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                onclick="return confirm('Supprimer cette catégorie ?')"
                                class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                            🗑️ Supprimer
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>