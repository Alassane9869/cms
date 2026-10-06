<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-blue-100 text-blue-900 flex items-center justify-center font-bold">
                <i class="fas fa-tachometer-alt"></i>
            </div>
            <div>
                <h1 class="text-xl font-bold text-slate-900">Tableau de bord</h1>
                <p class="text-xs text-slate-500">Vue d'ensemble des réclamations citoyennes et courriers administratifs</p>
            </div>
        </div>
    </x-slot>

    <!-- Cartes statistiques principales (1 col sur mobile, 2 cols sur tablette, 4 cols sur desktop) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">

        <!-- Total Réclamations -->
        <div class="card-stat" style="background: linear-gradient(135deg, #0f1f38 0%, #1e3a5f 100%);">
            <div class="flex justify-between items-start">
                <div>
                    <div class="text-xs uppercase tracking-wider font-semibold text-blue-200/80 mb-1">Total Réclamations</div>
                    <div class="text-3xl font-extrabold tracking-tight">{{ $totalReclamations }}</div>
                </div>
                <div class="bg-white/15 backdrop-blur-sm rounded-xl w-12 h-12 flex items-center justify-center shrink-0">
                    <i class="fas fa-clipboard-list text-xl text-white"></i>
                </div>
            </div>
            <div class="mt-4 pt-3 border-t border-white/10 text-xs text-blue-200/70 flex items-center gap-1.5">
                <i class="fas fa-chart-line"></i>
                <span>Enregistrées dans le système</span>
            </div>
        </div>

        <!-- En Attente -->
        <div class="card-stat" style="background: linear-gradient(135deg, #b45309 0%, #f59e0b 100%);">
            <div class="flex justify-between items-start">
                <div>
                    <div class="text-xs uppercase tracking-wider font-semibold text-amber-100/90 mb-1">En Attente</div>
                    <div class="text-3xl font-extrabold tracking-tight">{{ $reclamationsEnAttente }}</div>
                </div>
                <div class="bg-white/20 backdrop-blur-sm rounded-xl w-12 h-12 flex items-center justify-center shrink-0">
                    <i class="fas fa-clock text-xl text-white"></i>
                </div>
            </div>
            <div class="mt-4 pt-3 border-t border-white/10 text-xs text-amber-100/80 flex items-center gap-1.5">
                <i class="fas fa-exclamation-circle"></i>
                <span>Dossiers à instruire</span>
            </div>
        </div>

        <!-- Traitées -->
        <div class="card-stat" style="background: linear-gradient(135deg, #047857 0%, #10b981 100%);">
            <div class="flex justify-between items-start">
                <div>
                    <div class="text-xs uppercase tracking-wider font-semibold text-emerald-100/90 mb-1">Traitées</div>
                    <div class="text-3xl font-extrabold tracking-tight">{{ $reclamationsTraitees }}</div>
                </div>
                <div class="bg-white/20 backdrop-blur-sm rounded-xl w-12 h-12 flex items-center justify-center shrink-0">
                    <i class="fas fa-check-double text-xl text-white"></i>
                </div>
            </div>
            <div class="mt-4 pt-3 border-t border-white/10 text-xs text-emerald-100/80 flex items-center gap-1.5">
                <i class="fas fa-check-circle"></i>
                <span>Réclamations résolues</span>
            </div>
        </div>

        <!-- Total Courriers -->
        <div class="card-stat" style="background: linear-gradient(135deg, #6d28d9 0%, #8b5cf6 100%);">
            <div class="flex justify-between items-start">
                <div>
                    <div class="text-xs uppercase tracking-wider font-semibold text-purple-100/90 mb-1">Total Courriers</div>
                    <div class="text-3xl font-extrabold tracking-tight">{{ $totalCourriers }}</div>
                </div>
                <div class="bg-white/20 backdrop-blur-sm rounded-xl w-12 h-12 flex items-center justify-center shrink-0">
                    <i class="fas fa-envelope-open-text text-xl text-white"></i>
                </div>
            </div>
            <div class="mt-4 pt-3 border-t border-white/10 text-xs text-purple-100/80 flex items-center gap-1.5">
                <i class="fas fa-mail-bulk"></i>
                <span>Flux administratif entrant/sortant</span>
            </div>
        </div>

    </div>

    <!-- Section Courriers & Accès Rapide (Responsive 2fr 1fr -> 1 col sur mobile) -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">

        <!-- Courriers Répartition (2 colonnes sur desktop) -->
        <div class="card lg:col-span-2">
            <div class="flex items-center justify-between mb-5 pb-3 border-b border-slate-100">
                <h2 class="text-base font-bold text-slate-800 flex items-center gap-2">
                    <i class="fas fa-exchange-alt text-blue-900"></i>
                    <span>Flux des Courriers Administratifs</span>
                </h2>
                <a href="{{ route('courriers.index') }}" class="text-xs font-semibold text-blue-900 hover:text-blue-800">
                    Voir tout <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="p-5 rounded-2xl bg-gradient-to-br from-blue-50 to-indigo-50 border border-blue-100 text-center">
                    <div class="w-12 h-12 mx-auto rounded-xl bg-blue-900 text-white flex items-center justify-center mb-3 shadow-sm">
                        <i class="fas fa-inbox text-lg"></i>
                    </div>
                    <div class="text-3xl font-extrabold text-blue-950">{{ $courriersEntrants }}</div>
                    <div class="text-sm font-semibold text-slate-600 mt-1">Courriers Entrants</div>
                    <p class="text-xs text-slate-400 mt-1">Reçus d'usagers ou partenaires</p>
                </div>

                <div class="p-5 rounded-2xl bg-gradient-to-br from-purple-50 to-fuchsia-50 border border-purple-100 text-center">
                    <div class="w-12 h-12 mx-auto rounded-xl bg-purple-700 text-white flex items-center justify-center mb-3 shadow-sm">
                        <i class="fas fa-paper-plane text-lg"></i>
                    </div>
                    <div class="text-3xl font-extrabold text-purple-950">{{ $courriersSortants }}</div>
                    <div class="text-sm font-semibold text-slate-600 mt-1">Courriers Sortants</div>
                    <p class="text-xs text-slate-400 mt-1">Émis par les services de la CMSS</p>
                </div>
            </div>
        </div>

        <!-- Accès Rapide (1 colonne) -->
        <div class="card">
            <h2 class="text-base font-bold text-slate-800 flex items-center gap-2 mb-5 pb-3 border-b border-slate-100">
                <i class="fas fa-bolt text-amber-500"></i>
                <span>Actions Rapides</span>
            </h2>
            <div class="flex flex-col gap-3">
                <a href="{{ route('reclamations.create') }}" class="btn-primary justify-center w-full">
                    <i class="fas fa-plus-circle"></i>
                    <span>Nouvelle Réclamation</span>
                </a>
                <a href="{{ route('courriers.create') }}" class="btn-success justify-center w-full">
                    <i class="fas fa-plus-circle"></i>
                    <span>Nouveau Courrier</span>
                </a>
                <a href="{{ route('categories.create') }}" class="btn-secondary justify-center w-full" style="background: linear-gradient(135deg, #6d28d9, #8b5cf6);">
                    <i class="fas fa-tag"></i>
                    <span>Nouvelle Catégorie</span>
                </a>
                <a href="{{ route('rapports.index') }}" class="btn-secondary justify-center w-full">
                    <i class="fas fa-chart-bar"></i>
                    <span>Consulter les Rapports</span>
                </a>
            </div>
        </div>

    </div>

    <!-- Utilisateurs (visible seulement pour l'administrateur) -->
    @if(auth()->user() && auth()->user()->isAdmin())
    <div class="card mb-8">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-indigo-50 text-indigo-700 flex items-center justify-center shrink-0">
                    <i class="fas fa-users-cog text-lg"></i>
                </div>
                <div>
                    <h2 class="text-base font-bold text-slate-900">Gestion des Utilisateurs & Accès</h2>
                    <p class="text-xs text-slate-500">Comptes agents et administrateurs habilités</p>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <div class="bg-slate-100 px-4 py-2 rounded-xl text-center">
                    <div class="text-lg font-bold text-slate-900 leading-none">{{ $totalUsers }}</div>
                    <div class="text-[11px] text-slate-500 font-medium">Actifs</div>
                </div>
                <a href="{{ route('users.index') }}" class="btn-primary">
                    <i class="fas fa-user-shield"></i>
                    <span>Gérer les comptes</span>
                </a>
            </div>
        </div>
    </div>
    @endif

</x-app-layout>