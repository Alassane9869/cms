<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
            <div>
                <div class="flex items-center gap-2">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-[#0B3B60] text-white">
                        <i class="fas fa-user-check mr-1 text-[10px]"></i> Espace Assuré Social
                    </span>
                    <span class="text-xs text-slate-400 font-medium">République du Mali</span>
                </div>
                <h2 class="text-xl font-extrabold text-[#0B3B60] mt-1">
                    Tableau de Bord Citoyen & Historique
                </h2>
            </div>
            <div>
                <a href="#nouvelle-reclamation" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-[#0B3B60] hover:bg-[#07233B] text-white text-xs font-bold uppercase tracking-wider shadow-sm transition">
                    <i class="fas fa-plus-circle"></i>
                    <span>Déposer une Réclamation</span>
                </a>
            </div>
        </div>
    </x-slot>

    <!-- Bannière d'accueil personnalisé de l'assuré -->
    <div class="mb-8 rounded-2xl bg-gradient-to-r from-[#0B3B60] via-[#104e7d] to-[#1c6499] text-white p-6 sm:p-8 shadow-md relative overflow-hidden">
        <div class="relative z-10 max-w-3xl">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/15 backdrop-blur-sm text-xs font-semibold mb-3 border border-white/20">
                <i class="fas fa-shield-alt text-amber-300"></i> CMSS &bull; Protection Sociale des Fonctionnaires et Militaires
            </div>
            <h1 class="text-2xl sm:text-3xl font-black tracking-tight leading-tight">
                Bonjour, {{ $user->name }}
            </h1>
            <p class="mt-2 text-sm sm:text-base text-blue-100 font-normal leading-relaxed">
                Bienvenue sur votre portail sécurisé. Vous pouvez déposer directement vos réclamations (Pensions, AMO, Prestations), suivre en temps réel l'avancement de vos dossiers et télécharger vos récépissés officiels.
            </p>
            <div class="mt-5 flex flex-wrap items-center gap-4 text-xs text-blue-200">
                <div class="flex items-center gap-1.5 bg-black/20 px-3 py-1.5 rounded-lg">
                    <i class="fas fa-envelope text-white/70"></i>
                    <span>{{ $user->email }}</span>
                </div>
                @if($user->telephone)
                <div class="flex items-center gap-1.5 bg-black/20 px-3 py-1.5 rounded-lg">
                    <i class="fas fa-phone text-white/70"></i>
                    <span>{{ $user->telephone }}</span>
                </div>
                @endif
                <div class="flex items-center gap-1.5 bg-black/20 px-3 py-1.5 rounded-lg">
                    <i class="fas fa-clock text-white/70"></i>
                    <span>Inscrit le {{ $user->created_at->format('d/m/Y') }}</span>
                </div>
            </div>
        </div>

        <!-- Décoration graphique subtile -->
        <div class="absolute -right-10 -bottom-10 w-64 h-64 bg-white/5 rounded-full pointer-events-none"></div>
        <div class="absolute right-12 top-6 opacity-10 hidden lg:block">
            <img src="{{ asset('images/logo.jpg') }}" alt="CMSS" class="w-48 h-48 object-contain">
        </div>
    </div>

    <!-- Indicateurs / Statistiques personnelles de l'usager -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 mb-8">
        <!-- Total Déposées -->
        <div class="bg-white rounded-2xl p-5 border border-slate-200/80 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs font-bold text-slate-500 uppercase tracking-wider">Total Déposées</p>
                <p class="text-2xl sm:text-3xl font-extrabold text-slate-900 mt-1">{{ $totalDeposees }}</p>
                <p class="text-[11px] text-slate-400 mt-1">Dossiers transmis</p>
            </div>
            <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-700 flex items-center justify-center text-xl shrink-0">
                <i class="fas fa-folder-open"></i>
            </div>
        </div>

        <!-- En Attente -->
        <div class="bg-white rounded-2xl p-5 border border-slate-200/80 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs font-bold text-amber-600 uppercase tracking-wider">En Attente</p>
                <p class="text-2xl sm:text-3xl font-extrabold text-amber-600 mt-1">{{ $enAttente }}</p>
                <p class="text-[11px] text-slate-400 mt-1">En attente d'instruction</p>
            </div>
            <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center text-xl shrink-0">
                <i class="fas fa-hourglass-half"></i>
            </div>
        </div>

        <!-- En Cours -->
        <div class="bg-white rounded-2xl p-5 border border-slate-200/80 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs font-bold text-sky-600 uppercase tracking-wider">En Cours</p>
                <p class="text-2xl sm:text-3xl font-extrabold text-sky-600 mt-1">{{ $enCours }}</p>
                <p class="text-[11px] text-slate-400 mt-1">En cours d'examen</p>
            </div>
            <div class="w-12 h-12 rounded-xl bg-sky-50 text-sky-600 flex items-center justify-center text-xl shrink-0">
                <i class="fas fa-spinner fa-spin-pulse"></i>
            </div>
        </div>

        <!-- Traitées / Résolues -->
        <div class="bg-white rounded-2xl p-5 border border-slate-200/80 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs font-bold text-emerald-600 uppercase tracking-wider">Traitées / Résolues</p>
                <p class="text-2xl sm:text-3xl font-extrabold text-emerald-600 mt-1">{{ $traitees }}</p>
                <p class="text-[11px] text-slate-400 mt-1">Réclamations abouties</p>
            </div>
            <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-xl shrink-0">
                <i class="fas fa-check-circle"></i>
            </div>
        </div>
    </div>

    <!-- Section principale à 2 colonnes ou sections successives -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">

        <!-- Formulaire de dépôt de nouvelle réclamation (Colonne 1) -->
        <div id="nouvelle-reclamation" class="lg:col-span-1">
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden sticky top-20">
                <div class="p-5 border-b border-slate-100 bg-slate-50/70 flex items-center justify-between">
                    <div class="flex items-center gap-2.5">
                        <div class="w-8 h-8 rounded-lg bg-[#0B3B60] text-white flex items-center justify-center text-sm">
                            <i class="fas fa-paper-plane"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-[#0B3B60] text-sm">Nouvelle Réclamation</h3>
                            <p class="text-[11px] text-slate-500">Transmise directement aux services CMSS</p>
                        </div>
                    </div>
                    <span class="text-[10px] font-bold text-emerald-700 bg-emerald-100 px-2 py-0.5 rounded-full">
                        Délai 48h-72h
                    </span>
                </div>

                <form method="POST" action="{{ route('reclamations.store') }}" class="p-5 space-y-4">
                    @csrf

                    <!-- Rappel de l'identité de l'assuré (pré-remplie) -->
                    <div class="p-3 rounded-xl bg-slate-50 border border-slate-200 text-xs text-slate-600">
                        <div class="flex items-center justify-between">
                            <span class="font-bold text-slate-700">{{ $user->name }}</span>
                            <span class="text-[10px] bg-slate-200 px-2 py-0.5 rounded text-slate-700">Assuré</span>
                        </div>
                        <div class="mt-1 text-[11px] text-slate-500 flex items-center gap-2">
                            <span><i class="fas fa-envelope text-[10px]"></i> {{ $user->email }}</span>
                        </div>
                    </div>

                    <!-- Catégorie de réclamation -->
                    <div>
                        <label for="categorie_id" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">
                            Motif / Catégorie <span class="text-red-600">*</span>
                        </label>
                        <select id="categorie_id" name="categorie_id" required
                                class="w-full rounded-lg border-slate-300 text-sm py-2 px-3 focus:border-[#0B3B60] focus:ring focus:ring-[#0B3B60]/10 bg-white">
                            <option value="">-- Sélectionnez la catégorie --</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ old('categorie_id') == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->nom }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('categorie_id')" class="mt-1" />
                    </div>

                    <!-- Priorité -->
                    <div>
                        <label for="priorite" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">
                            Degré d'urgence <span class="text-red-600">*</span>
                        </label>
                        <select id="priorite" name="priorite" required
                                class="w-full rounded-lg border-slate-300 text-sm py-2 px-3 focus:border-[#0B3B60] focus:ring focus:ring-[#0B3B60]/10 bg-white">
                            <option value="normale" {{ old('priorite') == 'normale' ? 'selected' : '' }}>Normale (Traitement sous 48h-72h)</option>
                            <option value="urgente" {{ old('priorite') == 'urgente' ? 'selected' : '' }}>Urgente (Hospitalisation AMO / Cas critique)</option>
                            <option value="faible" {{ old('faible') == 'faible' ? 'selected' : '' }}>Faible (Demande d'information générale)</option>
                        </select>
                    </div>

                    <!-- Objet -->
                    <div>
                        <label for="objet" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">
                            Objet du dossier <span class="text-red-600">*</span>
                        </label>
                        <input id="objet" type="text" name="objet" value="{{ old('objet') }}" required
                               class="w-full rounded-lg border-slate-300 text-sm py-2 px-3 focus:border-[#0B3B60] focus:ring focus:ring-[#0B3B60]/10"
                               placeholder="Ex: Retard liquidation pension de réversion" />
                        <x-input-error :messages="$errors->get('objet')" class="mt-1" />
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">
                            Description précise & Références <span class="text-red-600">*</span>
                        </label>
                        <textarea id="description" name="description" rows="4" required
                                  class="w-full rounded-lg border-slate-300 text-sm py-2 px-3 focus:border-[#0B3B60] focus:ring focus:ring-[#0B3B60]/10 placeholder-slate-400"
                                  placeholder="Précisez votre numéro NINA, numéro de pension ou référence de feuille de soins AMO..."></textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-1" />
                    </div>

                    <!-- Bouton de soumission -->
                    <button type="submit" class="w-full py-2.5 px-4 rounded-xl bg-[#0B3B60] hover:bg-[#07233B] text-white font-bold text-xs uppercase tracking-wider transition shadow-sm flex items-center justify-center gap-2">
                        <i class="fas fa-check"></i>
                        <span>Transmettre ma réclamation</span>
                    </button>

                    <p class="text-[11px] text-slate-400 text-center">
                        <i class="fas fa-shield-alt text-[#0B3B60]"></i> Un récépissé officiel téléchargeable vous sera instantanément généré.
                    </p>
                </form>
            </div>
        </div>

        <!-- Historique des réclamations (Colonne 2 & 3) -->
        <div id="mes-reclamations" class="lg:col-span-2">
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                    <div>
                        <h3 class="font-extrabold text-[#0B3B60] text-base">
                            Historique et Suivi de mes Réclamations
                        </h3>
                        <p class="text-xs text-slate-500">
                            Consultez l'état d'instruction de vos dossiers et téléchargez vos récépissés
                        </p>
                    </div>
                    <div class="text-xs font-bold text-slate-500">
                        {{ $mesReclamations->total() }} dossier(s) enregistré(s)
                    </div>
                </div>

                @if($mesReclamations->isEmpty())
                    <!-- État vide -->
                    <div class="p-12 text-center">
                        <div class="w-16 h-16 rounded-full bg-blue-50 text-[#0B3B60] flex items-center justify-center mx-auto mb-4 text-2xl">
                            <i class="fas fa-inbox"></i>
                        </div>
                        <h4 class="text-base font-bold text-slate-800">Aucune réclamation enregistrée pour le moment</h4>
                        <p class="text-xs text-slate-500 mt-1 max-w-sm mx-auto">
                            Vous n'avez pas encore déposé de réclamation. Utilisez le formulaire ci-contre pour transmettre votre première demande aux services de la CMSS.
                        </p>
                        <a href="#nouvelle-reclamation" class="mt-4 inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-[#0B3B60] text-white text-xs font-bold uppercase tracking-wider hover:bg-[#07233B] transition">
                            <i class="fas fa-plus"></i>
                            <span>Déposer ma première réclamation</span>
                        </a>
                    </div>
                @else
                    <!-- Table responsive -->
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-slate-50/80 border-b border-slate-100 text-[11px] font-bold text-slate-500 uppercase tracking-wider">
                                    <th class="py-3.5 px-4">Référence</th>
                                    <th class="py-3.5 px-4">Catégorie</th>
                                    <th class="py-3.5 px-4">Objet</th>
                                    <th class="py-3.5 px-4">Date dépôt</th>
                                    <th class="py-3.5 px-4">Statut</th>
                                    <th class="py-3.5 px-4 text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 text-xs">
                                @foreach($mesReclamations as $rec)
                                    <tr class="hover:bg-slate-50/60 transition">
                                        <!-- Référence avec bouton copier -->
                                        <td class="py-3.5 px-4 font-mono font-bold text-[#0B3B60] whitespace-nowrap">
                                            <div class="flex items-center gap-1.5">
                                                <span>{{ $rec->reference }}</span>
                                                <button type="button" onclick="navigator.clipboard.writeText('{{ $rec->reference }}'); alert('Référence {{ $rec->reference }} copiée !');"
                                                        class="text-slate-400 hover:text-[#0B3B60] p-1" title="Copier la référence">
                                                    <i class="fas fa-copy text-[10px]"></i>
                                                </button>
                                            </div>
                                        </td>

                                        <!-- Catégorie -->
                                        <td class="py-3.5 px-4 text-slate-600 whitespace-nowrap">
                                            <span class="inline-flex items-center px-2 py-0.5 rounded bg-slate-100 text-[11px] font-medium text-slate-700">
                                                {{ $rec->categorie->nom ?? 'Générale' }}
                                            </span>
                                        </td>

                                        <!-- Objet -->
                                        <td class="py-3.5 px-4 text-slate-800 font-semibold max-w-xs truncate" title="{{ $rec->objet }}">
                                            {{ $rec->objet }}
                                        </td>

                                        <!-- Date -->
                                        <td class="py-3.5 px-4 text-slate-500 whitespace-nowrap text-[11px]">
                                            {{ $rec->created_at->format('d/m/Y') }}
                                        </td>

                                        <!-- Statut Badge -->
                                        <td class="py-3.5 px-4 whitespace-nowrap">
                                            @if($rec->statut == 'en_attente')
                                                <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[11px] font-bold bg-amber-50 text-amber-700 border border-amber-200">
                                                    <i class="fas fa-clock text-[9px]"></i> En attente
                                                </span>
                                            @elseif($rec->statut == 'en_cours')
                                                <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[11px] font-bold bg-sky-50 text-sky-700 border border-sky-200">
                                                    <i class="fas fa-spinner fa-spin text-[9px]"></i> En cours
                                                </span>
                                            @elseif($rec->statut == 'traitee')
                                                <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[11px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                                    <i class="fas fa-check text-[9px]"></i> Traitée
                                                </span>
                                            @else
                                                <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[11px] font-bold bg-rose-50 text-rose-700 border border-rose-200">
                                                    <i class="fas fa-times text-[9px]"></i> Rejetée
                                                </span>
                                            @endif
                                        </td>

                                        <!-- Actions : Détails & Récépissé PDF -->
                                        <td class="py-3.5 px-4 text-right whitespace-nowrap">
                                            <div class="inline-flex items-center gap-1.5">
                                                <a href="{{ route('reclamations.show', $rec) }}" 
                                                   class="p-1.5 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-700 transition" 
                                                   title="Consulter le détail">
                                                    <i class="fas fa-eye text-xs"></i>
                                                </a>
                                                <a href="{{ route('reclamations.pdf', $rec) }}" 
                                                   class="p-1.5 rounded-lg bg-red-50 hover:bg-red-100 text-red-600 transition" 
                                                   title="Télécharger le récépissé officiel PDF">
                                                    <i class="fas fa-file-pdf text-xs"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="p-4 border-t border-slate-100">
                        {{ $mesReclamations->links() }}
                    </div>
                @endif
            </div>

            <!-- Aide & Engagements CMSS -->
            <div class="mt-6 rounded-2xl bg-white border border-slate-200 p-5 shadow-sm flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-lg shrink-0">
                        <i class="fas fa-headset"></i>
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-slate-800">Besoin d'un accompagnement personnalisé ?</h4>
                        <p class="text-xs text-slate-500">Contactez le standard usagers de la CMSS ou consultez le guide des démarches.</p>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <a href="{{ route('guide.reclamation') }}" class="px-3.5 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold transition">
                        <i class="fas fa-book-open mr-1"></i> Guide des démarches
                    </a>
                    <a href="tel:+22320224500" class="px-3.5 py-2 rounded-xl bg-[#0B3B60] hover:bg-[#07233B] text-white text-xs font-bold transition">
                        <i class="fas fa-phone mr-1"></i> +223 20 22 45 00
                    </a>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
