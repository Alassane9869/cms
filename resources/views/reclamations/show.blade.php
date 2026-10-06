<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-2.5 sm:gap-3">
            <div class="w-8 h-8 rounded-lg bg-[#0B3B60] text-white flex items-center justify-center text-xs shrink-0 shadow-xs">
                <i class="fas fa-clipboard-list"></i>
            </div>
            <div class="min-w-0">
                <h1 class="text-sm sm:text-base font-extrabold text-[#0B3B60] tracking-tight truncate leading-tight">
                    Détail du Dossier
                </h1>
                <p class="text-[10px] sm:text-[11px] text-slate-400 font-medium truncate">
                    Réf : {{ $reclamation->reference }}
                </p>
            </div>
        </div>
    </x-slot>

    <div class="max-w-4xl mx-auto space-y-6">

        <!-- Carte d'en-tête de référence -->
        <div class="rounded-2xl sm:rounded-3xl bg-gradient-to-br from-[#07233B] via-[#0B3B60] to-[#125386] text-white shadow-md overflow-hidden border border-[#0B3B60]/30">
            <!-- Ruban Tricolore National du Mali -->
            <div class="h-1.5 w-full flex">
                <div class="flex-1 bg-[#1EB53A]"></div>
                <div class="flex-1 bg-[#FCD116]"></div>
                <div class="flex-1 bg-[#CE1126]"></div>
            </div>

            <div class="p-5 sm:p-7 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <div class="flex items-center gap-2 mb-1.5">
                        <span class="text-[11px] font-semibold text-blue-200/80 uppercase tracking-wider">Référence Officielle</span>
                        <button type="button" onclick="navigator.clipboard.writeText('{{ $reclamation->reference }}'); alert('Référence copiée !');"
                                class="text-white/60 hover:text-white p-1" title="Copier la référence">
                            <i class="fas fa-copy text-xs"></i>
                        </button>
                    </div>
                    <div class="text-2xl sm:text-3xl font-mono font-black tracking-wide text-white">
                        {{ $reclamation->reference }}
                    </div>
                    <div class="text-xs text-blue-100/80 mt-1">
                        Déposé le {{ $reclamation->created_at->format('d/m/Y à H:i') }}
                    </div>
                </div>

                <div>
                    @if($reclamation->statut == 'en_attente')
                        <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-bold bg-amber-400 text-slate-950 shadow-sm">
                            <i class="fas fa-clock text-xs"></i> En attente d'instruction
                        </span>
                    @elseif($reclamation->statut == 'en_cours')
                        <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-bold bg-sky-400 text-slate-950 shadow-sm">
                            <i class="fas fa-spinner fa-spin text-xs"></i> Instruction en cours
                        </span>
                    @elseif($reclamation->statut == 'traitee')
                        <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-bold bg-emerald-400 text-slate-950 shadow-sm">
                            <i class="fas fa-check-circle text-xs"></i> Dossier Traité & Validé
                        </span>
                    @else
                        <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-bold bg-rose-400 text-slate-950 shadow-sm">
                            <i class="fas fa-times-circle text-xs"></i> Dossier Rejeté
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <!-- Détails du dossier -->
        <div class="bg-white rounded-2xl border border-slate-200/90 shadow-xs p-5 sm:p-7 space-y-6">

            <!-- Objet & Description -->
            <div class="space-y-4">
                <div class="p-4 rounded-xl bg-slate-50 border border-slate-100">
                    <label class="block text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1">
                        Objet de la réclamation
                    </label>
                    <h3 class="text-base sm:text-lg font-bold text-[#0B3B60]">
                        {{ $reclamation->objet }}
                    </h3>
                </div>

                <div class="p-4 rounded-xl bg-slate-50 border border-slate-100">
                    <label class="block text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1">
                        Exposé précis des faits & Références citées
                    </label>
                    <p class="text-sm text-slate-700 whitespace-pre-line leading-relaxed">
                        {{ $reclamation->description }}
                    </p>
                </div>
            </div>

            <!-- Grille d'attributs -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3.5 pt-2">
                <!-- Catégorie -->
                <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-100">
                    <span class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider">Catégorie</span>
                    <span class="text-xs font-bold text-slate-800 mt-1 block truncate">
                        {{ $reclamation->categorie->nom ?? 'Non définie' }}
                    </span>
                </div>

                <!-- Priorité -->
                <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-100">
                    <span class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider">Urgence</span>
                    <div class="mt-1">
                        @if($reclamation->priorite == 'urgente')
                            <span class="inline-flex items-center gap-1 text-[11px] font-bold text-rose-700">
                                <span class="w-2 h-2 rounded-full bg-rose-500"></span> Urgente
                            </span>
                        @elseif($reclamation->priorite == 'normale')
                            <span class="inline-flex items-center gap-1 text-[11px] font-bold text-blue-700">
                                <span class="w-2 h-2 rounded-full bg-blue-500"></span> Normale
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1 text-[11px] font-bold text-slate-600">
                                <span class="w-2 h-2 rounded-full bg-slate-400"></span> Faible
                            </span>
                        @endif
                    </div>
                </div>

                <!-- Déposé par -->
                <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-100">
                    <span class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider">Assuré</span>
                    <span class="text-xs font-bold text-slate-800 mt-1 block truncate">
                        {{ $reclamation->user->name ?? 'Inconnu' }}
                    </span>
                </div>

                <!-- Contact -->
                <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-100">
                    <span class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider">Contact</span>
                    <span class="text-xs font-semibold text-slate-700 mt-1 block truncate">
                        {{ $reclamation->user->telephone ?? $reclamation->user->email }}
                    </span>
                </div>
            </div>

            <!-- Chronologie d'avancement du dossier -->
            <div class="p-5 rounded-2xl bg-slate-50/70 border border-slate-200/80">
                <h4 class="text-xs font-bold text-[#0B3B60] uppercase tracking-wider mb-4 flex items-center gap-2">
                    <i class="fas fa-route"></i> Progression de l'instruction administrative
                </h4>

                <div class="grid grid-cols-3 gap-2 text-center relative">
                    <!-- Étape 1 : Dépôt -->
                    <div class="space-y-1.5">
                        <div class="w-8 h-8 rounded-full bg-[#0B3B60] text-white flex items-center justify-center mx-auto text-xs font-bold shadow-xs">
                            <i class="fas fa-check"></i>
                        </div>
                        <div class="text-xs font-bold text-[#0B3B60]">Dépôt initial</div>
                        <div class="text-[10px] text-slate-400">{{ $reclamation->created_at->format('d/m/Y') }}</div>
                    </div>

                    <!-- Étape 2 : Instruction -->
                    <div class="space-y-1.5">
                        <div class="w-8 h-8 rounded-full {{ in_array($reclamation->statut, ['en_cours', 'traitee']) ? 'bg-sky-600 text-white' : 'bg-slate-200 text-slate-400' }} flex items-center justify-center mx-auto text-xs font-bold shadow-xs">
                            <i class="fas fa-tasks"></i>
                        </div>
                        <div class="text-xs font-bold {{ in_array($reclamation->statut, ['en_cours', 'traitee']) ? 'text-sky-600' : 'text-slate-400' }}">Instruction technique</div>
                        <div class="text-[10px] text-slate-400">Services CMSS</div>
                    </div>

                    <!-- Étape 3 : Décision -->
                    <div class="space-y-1.5">
                        <div class="w-8 h-8 rounded-full {{ $reclamation->statut == 'traitee' ? 'bg-emerald-600 text-white' : ($reclamation->statut == 'rejetee' ? 'bg-rose-600 text-white' : 'bg-slate-200 text-slate-400') }} flex items-center justify-center mx-auto text-xs font-bold shadow-xs">
                            <i class="fas {{ $reclamation->statut == 'traitee' ? 'fa-check-double' : ($reclamation->statut == 'rejetee' ? 'fa-ban' : 'fa-flag-checkered') }}"></i>
                        </div>
                        <div class="text-xs font-bold {{ $reclamation->statut == 'traitee' ? 'text-emerald-600' : ($reclamation->statut == 'rejetee' ? 'text-rose-600' : 'text-slate-400') }}">
                            {{ $reclamation->statut == 'rejetee' ? 'Dossier Rejeté' : 'Décision / Résolution' }}
                        </div>
                        <div class="text-[10px] text-slate-400">
                            {{ $reclamation->statut == 'traitee' ? 'Traitement finalisé' : 'En attente' }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Barre d'actions adaptée Mobile & Desktop -->
            <div class="pt-4 border-t border-slate-100 flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-3">
                <a href="{{ route('reclamations.pdf', $reclamation) }}" 
                   class="inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl bg-[#0B3B60] hover:bg-[#07233B] text-white text-xs font-bold uppercase tracking-wider shadow-sm transition active:scale-98">
                    <i class="fas fa-file-pdf text-amber-400 text-sm"></i>
                    <span>Télécharger le Récépissé Officiel (PDF)</span>
                </a>

                <div class="flex items-center gap-2">
                    @if(auth()->user() && !auth()->user()->isCitoyen())
                        <a href="{{ route('reclamations.edit', $reclamation) }}" class="flex-1 sm:flex-initial inline-flex items-center justify-center gap-1.5 px-4 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold transition">
                            <i class="fas fa-edit"></i>
                            <span>Traiter</span>
                        </a>
                        <form action="{{ route('reclamations.destroy', $reclamation) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Confirmez-vous la suppression de cette réclamation ?')"
                                    class="inline-flex items-center justify-center gap-1.5 px-3 py-2.5 rounded-xl bg-rose-50 hover:bg-rose-100 text-rose-700 text-xs font-bold transition">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                        <a href="{{ route('reclamations.index') }}" class="inline-flex items-center justify-center gap-1.5 px-4 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold transition">
                            <i class="fas fa-arrow-left"></i>
                            <span>Retour</span>
                        </a>
                    @else
                        <a href="{{ route('reclamations.index') }}" class="inline-flex items-center justify-center gap-1.5 px-4 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold transition">
                            <i class="fas fa-folder-open text-xs text-[#0B3B60]"></i>
                            <span>Mes Réclamations</span>
                        </a>
                        <a href="{{ route('dashboard') }}" class="inline-flex items-center justify-center gap-1.5 px-4 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold transition">
                            <i class="fas fa-home text-xs"></i>
                            <span>Mon Espace</span>
                        </a>
                    @endif
                </div>
            </div>

        </div>

    </div>
</x-app-layout>