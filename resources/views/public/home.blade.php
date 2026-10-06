<!DOCTYPE html>
<html lang="fr" class="h-full scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Caisse Malienne de Sécurité Sociale (CMSS) - Portail Officiel</title>
    <meta name="description" content="Portail officiel de la Caisse Malienne de Sécurité Sociale (CMSS). Espace assuré, gestion des pensions, AMO, dépôt et suivi des réclamations en ligne.">

    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Vite Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif; }
        .bg-cmss-navy { background-color: #0B3B60; }
        .text-cmss-navy { color: #0B3B60; }
        .border-cmss-navy { border-color: #0B3B60; }
        .hero-pattern {
            background-color: #0B3B60;
            background-image: radial-gradient(rgba(255, 255, 255, 0.08) 1px, transparent 1px);
            background-size: 24px 24px;
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased flex flex-col min-h-screen">

    <!-- Bandeau tricolore national de la République du Mali -->
    <div class="w-full h-1.5 flex sticky top-0 z-50 shadow-xs">
        <div class="h-full w-1/3 bg-[#15803d]" title="Vert - Espérance et fertilité"></div>
        <div class="h-full w-1/3 bg-[#eab308]" title="Or - Richesse du sous-sol"></div>
        <div class="h-full w-1/3 bg-[#dc2626]" title="Rouge - Sang versé pour la Patrie"></div>
    </div>

    <!-- En-tête officiel étatique -->
    <header class="bg-white border-b border-slate-200/80 sticky top-1.5 z-40 backdrop-blur-md bg-white/95 transition-all shadow-xs" x-data="{ mobileMenuOpen: false }">
        
        <!-- Top bar étatique prestigieuse (Bleu Nuit & Or) -->
        <div class="bg-[#0b1e36] text-white text-[11px] py-1.5 px-4 sm:px-8 border-b border-white/10">
            <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between gap-1.5 text-center md:text-left">
                <!-- Devise républicaine -->
                <div class="flex items-center gap-2.5 font-medium tracking-wide">
                    <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded bg-white/15 text-white font-extrabold text-[10px] uppercase tracking-wider">
                        🇲🇱 RÉPUBLIQUE DU MALI
                    </span>
                    <span class="text-blue-300/60 hidden sm:inline">&bull;</span>
                    <span class="text-blue-100 hidden sm:inline italic">Un Peuple &mdash; Un But &mdash; Une Foi</span>
                    <span class="text-blue-300/60 hidden lg:inline">&bull;</span>
                    <span class="text-blue-200 hidden lg:inline">Ministère de la Santé et du Développement Social</span>
                </div>
                
                <!-- Permanence & Assistance usagers -->
                <div class="flex items-center gap-4 text-[11px] font-semibold text-blue-100">
                    <a href="tel:+22320224500" class="hover:text-amber-300 transition flex items-center gap-1.5">
                        <i class="fas fa-phone-alt text-[10px] text-amber-400"></i>
                        <span>Assistance : +223 20 22 45 00</span>
                    </a>
                    <span class="text-white/20">|</span>
                    <a href="mailto:contact@cmss.ml" class="hover:text-amber-300 transition flex items-center gap-1.5">
                        <i class="fas fa-envelope text-[10px] text-amber-400"></i>
                        <span>contact@cmss.ml</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Navigation principale & Identité CMSS -->
        <div class="max-w-7xl mx-auto px-4 sm:px-8 py-3.5 flex items-center justify-between gap-4">
            
            <!-- Bloc Marque & Armoiries officiel -->
            <a href="{{ route('home') }}" class="flex items-center gap-3.5 shrink-0 group">
                <div class="flex items-center -space-x-2">
                    <div class="w-12 h-12 rounded-full p-0.5 bg-white border border-slate-200 shadow-sm relative z-10">
                        <img src="{{ asset('images/armoiries-mali.jpg') }}" alt="Armoiries République du Mali" class="w-full h-full object-cover rounded-full">
                    </div>
                    <div class="w-12 h-12 rounded-full p-1 bg-white border border-slate-200 shadow-sm relative z-20">
                        <img src="{{ asset('images/logo.jpg') }}" alt="Logo CMSS" class="w-full h-full object-contain">
                    </div>
                </div>
                <div class="border-l border-slate-200 pl-3">
                    <div class="flex items-center gap-2">
                        <span class="text-xl font-black text-[#0B3B60] tracking-tight group-hover:text-blue-900 transition leading-none">
                            CMSS
                        </span>
                        <span class="inline-flex px-1.5 py-0.5 rounded text-[9px] font-extrabold uppercase bg-emerald-50 text-emerald-800 border border-emerald-200">
                            Portail Officiel
                        </span>
                    </div>
                    <div class="text-xs font-bold text-slate-800 leading-tight mt-0.5">
                        Caisse Malienne de Sécurité Sociale
                    </div>
                    <div class="text-[10px] font-medium text-slate-500 leading-none mt-0.5 hidden sm:block">
                        Protection Sociale des Agents de l'État & Ayants Droit
                    </div>
                </div>
            </a>

            <!-- Liens de navigation centrés (Desktop) -->
            <nav class="hidden xl:flex items-center gap-1.5 text-xs font-bold text-slate-600">
                <a href="{{ route('home') }}" 
                   class="px-3.5 py-2 rounded-xl text-[#0B3B60] bg-blue-50 font-extrabold transition">
                    Accueil
                </a>
                <a href="#missions" 
                   class="px-3.5 py-2 rounded-xl hover:text-[#0B3B60] hover:bg-slate-100 transition">
                    Missions & Régimes
                </a>
                <a href="#equipes" 
                   class="px-3.5 py-2 rounded-xl hover:text-[#0B3B60] hover:bg-slate-100 transition">
                    Direction & Équipe
                </a>
                <a href="{{ route('guide.reclamation') }}" 
                   class="px-3.5 py-2 rounded-xl text-blue-700 hover:text-[#0B3B60] hover:bg-blue-50/60 transition inline-flex items-center gap-1.5">
                    <i class="fas fa-book-reader text-xs text-blue-600"></i>
                    <span>Comment Réclamer ?</span>
                </a>
                <a href="#suivi-rapide" 
                   class="px-3.5 py-2 rounded-xl hover:text-[#0B3B60] hover:bg-slate-100 transition inline-flex items-center gap-1.5">
                    <i class="fas fa-search text-xs text-slate-400"></i>
                    <span>Suivi Dossier</span>
                </a>
            </nav>

            <!-- Actions Utilisateur & Espace Assuré (Desktop) -->
            <div class="hidden sm:flex items-center gap-2.5 shrink-0">
                @auth
                    <a href="{{ route('dashboard') }}" class="px-4 py-2.5 rounded-xl bg-[#0B3B60] hover:bg-[#07233B] text-white text-xs font-bold uppercase tracking-wider transition shadow-sm flex items-center gap-2">
                        <i class="fas fa-user-circle text-sm text-amber-300"></i>
                        <span>{{ auth()->user()->isCitoyen() ? 'Mon Espace Assuré' : 'Tableau de bord' }}</span>
                    </a>
                @else
                    <a href="{{ route('login') }}" 
                       class="px-3.5 py-2 rounded-xl text-xs font-bold text-slate-700 hover:text-[#0B3B60] hover:bg-slate-100 border border-slate-300 transition inline-flex items-center gap-1.5">
                        <i class="fas fa-sign-in-alt text-[11px] text-slate-400"></i>
                        <span>Se connecter</span>
                    </a>
                    <a href="{{ route('register') }}" 
                       class="px-4 py-2.5 rounded-xl bg-[#0B3B60] hover:bg-[#07233B] text-white text-xs font-bold uppercase tracking-wider transition shadow-md hover:shadow-lg flex items-center gap-2">
                        <i class="fas fa-user-shield text-xs text-amber-300"></i>
                        <span>Espace Particulier</span>
                    </a>
                @endauth
            </div>

            <!-- Hamburger Button (Mobile / Tablette) -->
            <div class="flex items-center xl:hidden gap-2">
                <button @click="mobileMenuOpen = !mobileMenuOpen" 
                        class="p-2 rounded-xl border border-slate-300 text-slate-700 hover:text-[#0B3B60] hover:bg-slate-100 transition focus:outline-none"
                        aria-label="Menu de navigation">
                    <i :class="mobileMenuOpen ? 'fa-times' : 'fa-bars'" class="fas text-lg"></i>
                </button>
            </div>
        </div>

        <!-- Menu Déroulant Mobile & Tablette -->
        <div x-show="mobileMenuOpen" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-2"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-2"
             @click.away="mobileMenuOpen = false"
             class="xl:hidden border-t border-slate-200 bg-white px-4 py-4 space-y-2 shadow-lg"
             style="display: none;">
            <a href="{{ route('home') }}" class="block px-3 py-2 rounded-lg text-sm font-bold text-[#0B3B60] bg-blue-50">
                <i class="fas fa-home mr-2 text-blue-600"></i> Accueil
            </a>
            <a href="#missions" @click="mobileMenuOpen = false" class="block px-3 py-2 rounded-lg text-sm font-semibold text-slate-700 hover:bg-slate-100">
                <i class="fas fa-shield-alt mr-2 text-slate-400"></i> Missions & Régimes
            </a>
            <a href="#equipes" @click="mobileMenuOpen = false" class="block px-3 py-2 rounded-lg text-sm font-semibold text-slate-700 hover:bg-slate-100">
                <i class="fas fa-users mr-2 text-slate-400"></i> Direction & Équipe
            </a>
            <a href="{{ route('guide.reclamation') }}" class="block px-3 py-2 rounded-lg text-sm font-semibold text-blue-700 hover:bg-blue-50">
                <i class="fas fa-book-reader mr-2 text-blue-600"></i> Comment Réclamer ? (Guide)
            </a>
            <a href="#suivi-rapide" @click="mobileMenuOpen = false" class="block px-3 py-2 rounded-lg text-sm font-semibold text-slate-700 hover:bg-slate-100">
                <i class="fas fa-search mr-2 text-slate-400"></i> Suivi Express de Dossier
            </a>

            <div class="pt-3 border-t border-slate-200 flex flex-col gap-2">
                @auth
                    <a href="{{ route('dashboard') }}" class="w-full py-2.5 px-4 rounded-xl bg-[#0B3B60] text-white text-xs font-bold uppercase tracking-wider text-center">
                        {{ auth()->user()->isCitoyen() ? 'Mon Espace Assuré' : 'Tableau de bord' }}
                    </a>
                @else
                    <a href="{{ route('register') }}" class="w-full py-2.5 px-4 rounded-xl bg-[#0B3B60] text-white text-xs font-bold uppercase tracking-wider text-center flex items-center justify-center gap-2">
                        <i class="fas fa-user-shield text-amber-300"></i>
                        <span>Créer mon Espace Particulier</span>
                    </a>
                    <a href="{{ route('login') }}" class="w-full py-2 px-4 rounded-xl border border-slate-300 text-slate-700 text-xs font-bold text-center">
                        Se connecter
                    </a>
                @endauth
            </div>
        </div>
    </header>

    <main class="flex-1">

        <!-- ========================================================= -->
        <!-- HERO SECTION : Institutionnelle, digne et rassurante -->
        <!-- ========================================================= -->
        <section class="hero-pattern text-white py-14 sm:py-20 relative overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-8 relative z-10">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">

                    <!-- Colonne Texte -->
                    <div class="lg:col-span-7 space-y-6">
                        <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-xs font-semibold text-blue-100">
                            <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                            <span>Portail Numérique Officiel des Retraités et Assurés Sociaux</span>
                        </div>

                        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black tracking-tight leading-tight">
                            La Sécurité Sociale au service des <span class="text-amber-300">Serviteurs de l'État</span> et de leurs Familles.
                        </h1>

                        <p class="text-base sm:text-lg text-blue-100 font-normal leading-relaxed max-w-2xl">
                            Gestion des pensions civiles et militaires, Assurance Maladie Obligatoire (AMO) et prestations familiales. Déposez vos réclamations et suivez vos dossiers en ligne en toute transparence.
                        </p>

                        <!-- Call To Actions -->
                        <div class="flex flex-wrap items-center gap-3 pt-2">
                            <a href="{{ route('register') }}" class="px-6 py-3.5 rounded-xl bg-white text-[#0B3B60] hover:bg-blue-50 font-extrabold text-sm uppercase tracking-wider shadow-lg transition flex items-center gap-2">
                                <i class="fas fa-user-shield"></i>
                                <span>Créer mon Espace Assuré</span>
                            </a>
                            <a href="{{ route('guide.reclamation') }}" class="px-5 py-3.5 rounded-xl bg-white/10 hover:bg-white/20 text-white border border-white/30 font-bold text-sm transition flex items-center gap-2 backdrop-blur-sm">
                                <i class="fas fa-book-reader"></i>
                                <span>Comment faire une réclamation ?</span>
                            </a>
                            <a href="{{ route('reclamation.publique') }}" class="px-4 py-3.5 rounded-xl text-blue-200 hover:text-white font-semibold text-xs transition">
                                Déposer sans compte &rarr;
                            </a>
                        </div>

                        <!-- Baromètre des chiffres clés -->
                        <div class="pt-6 border-t border-white/15 grid grid-cols-3 gap-4 text-left">
                            <div>
                                <div class="text-2xl sm:text-3xl font-black text-white">+350 000</div>
                                <div class="text-xs text-blue-200 font-medium mt-0.5">Pensionnés & Assurés</div>
                            </div>
                            <div>
                                <div class="text-2xl sm:text-3xl font-black text-amber-300">48h &ndash; 72h</div>
                                <div class="text-xs text-blue-200 font-medium mt-0.5">Délai moyen d'instruction</div>
                            </div>
                            <div>
                                <div class="text-2xl sm:text-3xl font-black text-emerald-400">9 Agences</div>
                                <div class="text-xs text-blue-200 font-medium mt-0.5">Présence régionale au Mali</div>
                            </div>
                        </div>
                    </div>

                    <!-- Colonne Visuelle : Siège officiel CMSS -->
                    <div class="lg:col-span-5">
                        <div class="relative rounded-2xl overflow-hidden shadow-2xl border-4 border-white/20 bg-slate-900 group">
                            <img src="{{ asset('images/caisse.jpg') }}" alt="Bâtiment Siège CMSS Bamako" class="w-full h-80 sm:h-96 object-cover object-center group-hover:scale-105 transition duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/30 to-transparent"></div>
                            <div class="absolute bottom-4 left-4 right-4 text-white">
                                <div class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded bg-black/50 backdrop-blur-md text-[11px] font-bold text-amber-300 mb-1">
                                    <i class="fas fa-landmark"></i> Siège National CMSS
                                </div>
                                <p class="text-sm font-bold">Hamdallaye ACI 2000, Bamako &mdash; République du Mali</p>
                                <p class="text-xs text-slate-300">Accueil, immatriculation et traitement centralisé des pensions</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- ========================================================= -->
        <!-- WIDGET : Suivi Express de Dossier en Ligne -->
        <!-- ========================================================= -->
        <section id="suivi-rapide" class="relative -mt-8 z-20 max-w-5xl mx-auto px-4">
            <div class="bg-white rounded-2xl shadow-xl border border-slate-200 p-6 sm:p-8">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-4">
                    <div>
                        <span class="text-[11px] font-bold text-[#0B3B60] uppercase tracking-wider bg-blue-50 px-2.5 py-1 rounded-full">
                            <i class="fas fa-search mr-1"></i> Recherche Immédiate
                        </span>
                        <h2 class="text-lg sm:text-xl font-extrabold text-slate-900 mt-1">
                            Suivre l'état d'avancement de votre réclamation
                        </h2>
                    </div>
                    <span class="text-xs text-slate-500">
                        Numéro figurant sur votre récépissé officiel
                    </span>
                </div>

                <form method="GET" action="{{ route('home') }}#suivi-rapide" class="flex flex-col sm:flex-row gap-3">
                    <div class="relative flex-1">
                        <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <i class="fas fa-barcode"></i>
                        </span>
                        <input type="text" name="suivi" value="{{ request('suivi') }}" required
                               placeholder="Ex: REC-A1B2C3D4"
                               class="w-full pl-10 pr-4 py-3 rounded-xl border border-slate-300 text-sm font-mono font-bold text-slate-900 uppercase tracking-wider focus:ring-2 focus:ring-[#0B3B60] focus:border-[#0B3B60] outline-none">
                    </div>
                    <button type="submit" class="px-6 py-3 rounded-xl bg-[#0B3B60] hover:bg-[#07233B] text-white font-bold text-xs uppercase tracking-wider transition shadow-sm flex items-center justify-center gap-2">
                        <i class="fas fa-search"></i>
                        <span>Vérifier le statut</span>
                    </button>
                </form>

                <!-- Affichage du résultat de recherche si soumis -->
                @if($dossierSuivi)
                    <div class="mt-6 p-5 rounded-2xl bg-blue-50/70 border border-blue-200">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 border-b border-blue-200/80 pb-3 mb-4">
                            <div>
                                <span class="text-xs text-slate-500 font-medium">Référence du dossier</span>
                                <h3 class="text-xl font-mono font-black text-[#0B3B60]">{{ $dossierSuivi->reference }}</h3>
                            </div>
                            <div>
                                @if($dossierSuivi->statut == 'en_attente')
                                    <span class="px-3.5 py-1.5 rounded-full text-xs font-bold bg-amber-100 text-amber-800 border border-amber-300 inline-flex items-center gap-1.5">
                                        <i class="fas fa-clock"></i> Statut : En attente d'instruction
                                    </span>
                                @elseif($dossierSuivi->statut == 'en_cours')
                                    <span class="px-3.5 py-1.5 rounded-full text-xs font-bold bg-sky-100 text-sky-800 border border-sky-300 inline-flex items-center gap-1.5">
                                        <i class="fas fa-spinner fa-spin"></i> Statut : En cours d'examen technique
                                    </span>
                                @elseif($dossierSuivi->statut == 'traitee')
                                    <span class="px-3.5 py-1.5 rounded-full text-xs font-bold bg-emerald-100 text-emerald-800 border border-emerald-300 inline-flex items-center gap-1.5">
                                        <i class="fas fa-check-circle"></i> Statut : Traitée / Décision rendue
                                    </span>
                                @else
                                    <span class="px-3.5 py-1.5 rounded-full text-xs font-bold bg-rose-100 text-rose-800 border border-rose-300 inline-flex items-center gap-1.5">
                                        <i class="fas fa-times-circle"></i> Statut : Non retenue / Rejetée
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-xs">
                            <div>
                                <span class="font-bold text-slate-500 uppercase text-[10px]">Catégorie</span>
                                <p class="font-bold text-slate-800 mt-0.5">{{ $dossierSuivi->categorie->nom ?? 'Générale' }}</p>
                            </div>
                            <div>
                                <span class="font-bold text-slate-500 uppercase text-[10px]">Date de dépôt</span>
                                <p class="font-bold text-slate-800 mt-0.5">{{ $dossierSuivi->created_at->format('d/m/Y à H:i') }}</p>
                            </div>
                            <div>
                                <span class="font-bold text-slate-500 uppercase text-[10px]">Objet</span>
                                <p class="font-bold text-slate-800 mt-0.5 truncate">{{ $dossierSuivi->objet }}</p>
                            </div>
                        </div>
                    </div>
                @elseif($refIntrouvable)
                    <div class="mt-6 p-4 rounded-xl bg-red-50 border border-red-200 text-xs text-red-700 flex items-center gap-3">
                        <i class="fas fa-exclamation-triangle text-base text-red-600"></i>
                        <span>Aucune réclamation ne correspond à la référence <strong>{{ request('suivi') }}</strong>. Veuillez vérifier votre saisie ou contacter nos services.</span>
                    </div>
                @endif
            </div>
        </section>

        <!-- ========================================================= -->
        <!-- MISSIONS & RÉGIMES DE LA CMSS -->
        <!-- ========================================================= -->
        <section id="missions" class="py-20 max-w-7xl mx-auto px-4 sm:px-8">
            <div class="text-center max-w-3xl mx-auto mb-14">
                <span class="text-xs font-bold text-[#0B3B60] uppercase tracking-wider bg-blue-50 px-3 py-1 rounded-full">
                    Missions Réglementaires
                </span>
                <h2 class="text-3xl font-extrabold text-slate-900 mt-2">
                    Les Régimes de Protection Sociale gérés par la CMSS
                </h2>
                <p class="text-sm text-slate-600 mt-2">
                    La CMSS assure la gestion déléguée et directe des régimes obligatoires de sécurité sociale pour tous les agents publics de l'État malien.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Régime 1 : Pensions -->
                <div class="bg-white rounded-2xl p-7 border border-slate-200 shadow-sm hover:shadow-md transition">
                    <div class="w-14 h-14 rounded-2xl bg-blue-50 text-[#0B3B60] flex items-center justify-center text-2xl mb-6">
                        <i class="fas fa-user-clock"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Régime des Pensions de Retraite</h3>
                    <p class="text-xs text-slate-600 leading-relaxed mb-4">
                        Liquidation, révision et paiement régulier des pensions d'ancienneté, des pensions d'invalidité, des pensions de veuvage et d'orphelinat pour les fonctionnaires civils et militaires.
                    </p>
                    <ul class="text-xs text-slate-500 space-y-2 border-t border-slate-100 pt-4">
                        <li class="flex items-center gap-2"><i class="fas fa-check text-emerald-500 text-[10px]"></i> Arrérages et livrets de pension</li>
                        <li class="flex items-center gap-2"><i class="fas fa-check text-emerald-500 text-[10px]"></i> Contrôle physique et biométrique</li>
                        <li class="flex items-center gap-2"><i class="fas fa-check text-emerald-500 text-[10px]"></i> Droits des ayants droit & réversion</li>
                    </ul>
                </div>

                <!-- Régime 2 : AMO -->
                <div class="bg-white rounded-2xl p-7 border border-slate-200 shadow-sm hover:shadow-md transition">
                    <div class="w-14 h-14 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-2xl mb-6">
                        <i class="fas fa-heartbeat"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Assurance Maladie Obligatoire (AMO)</h3>
                    <p class="text-xs text-slate-600 leading-relaxed mb-4">
                        Organisme gestionnaire délégué (OGD) pour les fonctionnaires, magistrats, militaires et députés. Gestion des cartes AMO, feuilles de soins et conventions médicales.
                    </p>
                    <ul class="text-xs text-slate-500 space-y-2 border-t border-slate-100 pt-4">
                        <li class="flex items-center gap-2"><i class="fas fa-check text-emerald-500 text-[10px]"></i> Prise en charge des soins & hospitalisations</li>
                        <li class="flex items-center gap-2"><i class="fas fa-check text-emerald-500 text-[10px]"></i> Distribution des cartes biométriques</li>
                        <li class="flex items-center gap-2"><i class="fas fa-check text-emerald-500 text-[10px]"></i> Remboursement des prestations médicales</li>
                    </ul>
                </div>

                <!-- Régime 3 : Prestations familiales -->
                <div class="bg-white rounded-2xl p-7 border border-slate-200 shadow-sm hover:shadow-md transition">
                    <div class="w-14 h-14 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center text-2xl mb-6">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Prestations Familiales & Risques</h3>
                    <p class="text-xs text-slate-600 leading-relaxed mb-4">
                        Paiement des allocations familiales, indemnités prénatales et de maternité, ainsi que la réparation des accidents de travail et maladies professionnelles.
                    </p>
                    <ul class="text-xs text-slate-500 space-y-2 border-t border-slate-100 pt-4">
                        <li class="flex items-center gap-2"><i class="fas fa-check text-emerald-500 text-[10px]"></i> Allocations périodiques pour enfants</li>
                        <li class="flex items-center gap-2"><i class="fas fa-check text-emerald-500 text-[10px]"></i> Indemnités de congé de maternité</li>
                        <li class="flex items-center gap-2"><i class="fas fa-check text-emerald-500 text-[10px]"></i> Rentes en capital accidents du travail</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- ========================================================= -->
        <!-- SECTION ÉQUIPES & DIRECTION : Images et Statuts réels -->
        <!-- ========================================================= -->
        <section id="equipes" class="py-20 bg-slate-100/70 border-y border-slate-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-8">
                <div class="text-center max-w-3xl mx-auto mb-14">
                    <span class="text-xs font-bold text-[#0B3B60] uppercase tracking-wider bg-white px-3 py-1 rounded-full border border-slate-200 shadow-sm">
                        Gouvernance & Service Public
                    </span>
                    <h2 class="text-3xl font-extrabold text-slate-900 mt-2">
                        Nos Équipes Dirigeantes & Pôles Opérationnels
                    </h2>
                    <p class="text-sm text-slate-600 mt-2">
                        Une administration moderne, réactive et dévouée au bien-être des assurés sociaux du Mali.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($equipe as $membre)
                        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden flex flex-col justify-between hover:-translate-y-1 transition duration-300">
                            <div>
                                <!-- Photo du membre de l'équipe -->
                                <div class="relative h-60 bg-slate-200 overflow-hidden">
                                    <img src="{{ asset($membre['image']) }}" alt="{{ $membre['nom'] }}" class="w-full h-full object-cover object-top">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
                                    
                                    <!-- Badge de statut opérationnel -->
                                    <div class="absolute top-3 right-3">
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold bg-white/95 text-slate-800 shadow-sm border border-slate-200">
                                            <span class="w-2 h-2 rounded-full {{ $membre['badge_color'] == 'emerald' ? 'bg-emerald-500' : 'bg-blue-600' }} animate-pulse"></span>
                                            <span>{{ $membre['statut'] }}</span>
                                        </span>
                                    </div>

                                    <!-- Nom et fonction sur l'image -->
                                    <div class="absolute bottom-3 left-3 right-3 text-white">
                                        <h4 class="font-extrabold text-sm leading-tight">{{ $membre['nom'] }}</h4>
                                        <p class="text-xs text-blue-200 font-semibold">{{ $membre['role'] }}</p>
                                    </div>
                                </div>

                                <!-- Corps descriptif -->
                                <div class="p-4">
                                    <div class="text-[11px] font-bold text-[#0B3B60] uppercase tracking-wider mb-1.5">
                                        {{ $membre['direction'] }}
                                    </div>
                                    <p class="text-xs text-slate-600 leading-relaxed">
                                        {{ $membre['description'] }}
                                    </p>
                                </div>
                            </div>

                            <div class="p-4 pt-0 border-t border-slate-100 flex items-center justify-between text-[11px] text-slate-500">
                                <span><i class="fas fa-check-circle text-emerald-500 mr-1"></i> Direction CMSS</span>
                                <span class="font-mono text-slate-400">Bamako, Mali</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- ========================================================= -->
        <!-- COMMENT FAIRE UNE RÉCLAMATION : 4 Étapes Simples -->
        <!-- ========================================================= -->
        <section class="py-20 max-w-7xl mx-auto px-4 sm:px-8">
            <div class="text-center max-w-3xl mx-auto mb-14">
                <span class="text-xs font-bold text-[#0B3B60] uppercase tracking-wider bg-blue-50 px-3 py-1 rounded-full">
                    Démarche Simplifiée
                </span>
                <h2 class="text-3xl font-extrabold text-slate-900 mt-2">
                    Comment faire une Réclamation en 4 étapes ?
                </h2>
                <p class="text-sm text-slate-600 mt-2">
                    Un processus 100% numérisé pour un traitement équitable, transparent et rapide de toutes vos requêtes.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <!-- Étape 1 -->
                <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm relative">
                    <div class="w-10 h-10 rounded-xl bg-[#0B3B60] text-white flex items-center justify-center font-extrabold text-base mb-4">
                        1
                    </div>
                    <h3 class="font-bold text-base text-slate-900 mb-2">Créez votre Espace</h3>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        Inscrivez-vous en 1 minute avec votre email et téléphone pour conserver l'historique complet de vos demandes.
                    </p>
                </div>

                <!-- Étape 2 -->
                <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm relative">
                    <div class="w-10 h-10 rounded-xl bg-[#0B3B60] text-white flex items-center justify-center font-extrabold text-base mb-4">
                        2
                    </div>
                    <h3 class="font-bold text-base text-slate-900 mb-2">Décrivez votre dossier</h3>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        Sélectionnez la catégorie (Pensions, AMO, Prestations) et indiquez votre numéro NINA ou matricule de solde.
                    </p>
                </div>

                <!-- Étape 3 -->
                <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm relative">
                    <div class="w-10 h-10 rounded-xl bg-[#0B3B60] text-white flex items-center justify-center font-extrabold text-base mb-4">
                        3
                    </div>
                    <h3 class="font-bold text-base text-slate-900 mb-2">Récépissé Officiel</h3>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        Recevez immédiatement votre référence unique <code class="text-[#0B3B60] font-bold">REC-XXXXXXXX</code> et téléchargez votre récépissé PDF.
                    </p>
                </div>

                <!-- Étape 4 -->
                <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm relative">
                    <div class="w-10 h-10 rounded-xl bg-[#0B3B60] text-white flex items-center justify-center font-extrabold text-base mb-4">
                        4
                    </div>
                    <h3 class="font-bold text-base text-slate-900 mb-2">Résolution sous 72h</h3>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        Les agents examinent votre situation et vous notifient de la résolution par SMS, email et sur votre espace en ligne.
                    </p>
                </div>
            </div>

            <!-- Bouton vers le guide complet -->
            <div class="mt-10 text-center">
                <a href="{{ route('guide.reclamation') }}" class="inline-flex items-center gap-2 px-6 py-3.5 rounded-xl bg-[#0B3B60] hover:bg-[#07233B] text-white font-bold text-xs uppercase tracking-wider transition shadow-md">
                    <i class="fas fa-book-reader"></i>
                    <span>Consulter le Guide Détaillé & Liste des Pièces</span>
                </a>
            </div>
        </section>

        <!-- ========================================================= -->
        <!-- BANNIÈRE D'APPEL À L'ACTION ESPACE PARTICULIER -->
        <!-- ========================================================= -->
        <section class="bg-gradient-to-r from-[#0B3B60] to-[#124d7c] text-white py-14">
            <div class="max-w-7xl mx-auto px-4 sm:px-8 flex flex-col md:flex-row items-center justify-between gap-8">
                <div class="max-w-2xl">
                    <h2 class="text-2xl sm:text-3xl font-extrabold leading-tight">
                        Vous êtes fonctionnaire, retraité ou ayant droit ?
                    </h2>
                    <p class="mt-2 text-sm text-blue-100">
                        Ouvrez votre compte sécurisé dès aujourd'hui pour déposer vos requêtes, consulter l'état de traitement de vos pensions et télécharger tous vos récépissés officiels.
                    </p>
                </div>
                <div class="flex flex-wrap items-center gap-3">
                    <a href="{{ route('register') }}" class="px-6 py-3.5 rounded-xl bg-white text-[#0B3B60] hover:bg-blue-50 font-extrabold text-xs uppercase tracking-wider shadow-lg transition">
                        Créer mon Compte Assuré
                    </a>
                    <a href="{{ route('login') }}" class="px-6 py-3.5 rounded-xl bg-white/10 hover:bg-white/20 text-white border border-white/30 font-bold text-xs uppercase tracking-wider transition">
                        Connexion
                    </a>
                </div>
            </div>
        </section>

    </main>

    <!-- ========================================================= -->
    <!-- PIED DE PAGE INSTITUTIONNEL DE LA RÉPUBLIQUE DU MALI -->
    <!-- ========================================================= -->
    <footer class="bg-slate-900 text-slate-300 text-xs border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-8 py-14 grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Col 1 : CMSS Identité -->
            <div class="space-y-4">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('images/logo.jpg') }}" alt="CMSS" class="w-10 h-10 bg-white p-1 rounded-xl">
                    <div>
                        <div class="font-extrabold text-white text-base leading-tight">CMSS MALI</div>
                        <div class="text-[10px] text-slate-400">Sécurité Sociale des Agents de l'État</div>
                    </div>
                </div>
                <p class="text-slate-400 leading-relaxed text-[11px]">
                    Établissement Public à Caractère Administratif (EPA) doté de la personnalité morale et de l'autonomie financière, placé sous la tutelle du Ministère de la Santé et du Développement Social.
                </p>
            </div>

            <!-- Col 2 : Coordonnées Siège -->
            <div class="space-y-2">
                <h4 class="text-white font-bold uppercase tracking-wider text-xs mb-3">Siège National</h4>
                <p class="flex items-start gap-2 text-slate-400">
                    <i class="fas fa-map-marker-alt text-red-500 mt-1"></i>
                    <span>Hamdallaye ACI 2000, BP 247, Bamako &mdash; République du Mali</span>
                </p>
                <p class="flex items-center gap-2 text-slate-400">
                    <i class="fas fa-phone text-blue-400"></i>
                    <span>+223 20 22 45 00 / 20 22 45 02</span>
                </p>
                <p class="flex items-center gap-2 text-slate-400">
                    <i class="fas fa-envelope text-emerald-400"></i>
                    <span>contact@cmss.ml</span>
                </p>
                <p class="flex items-center gap-2 text-slate-400">
                    <i class="fas fa-clock text-amber-400"></i>
                    <span>Lun &ndash; Ven : 7h30 &ndash; 16h00</span>
                </p>
            </div>

            <!-- Col 3 : Agences Régionales -->
            <div class="space-y-2">
                <h4 class="text-white font-bold uppercase tracking-wider text-xs mb-3">Agences Régionales</h4>
                <ul class="text-[11px] text-slate-400 space-y-1">
                    <li>&bull; Direction Régionale de Kayes</li>
                    <li>&bull; Direction Régionale de Koulikoro</li>
                    <li>&bull; Direction Régionale de Sikasso</li>
                    <li>&bull; Direction Régionale de Ségou</li>
                    <li>&bull; Direction Régionale de Mopti</li>
                    <li>&bull; Agences de Tombouctou, Gao & Kidal</li>
                </ul>
            </div>

            <!-- Col 4 : Liens Rapides -->
            <div class="space-y-2">
                <h4 class="text-white font-bold uppercase tracking-wider text-xs mb-3">Services en ligne</h4>
                <ul class="text-[11px] text-slate-400 space-y-1.5">
                    <li><a href="{{ route('guide.reclamation') }}" class="hover:text-white transition">&rarr; Comment faire une réclamation</a></li>
                    <li><a href="{{ route('register') }}" class="hover:text-white transition">&rarr; Créer mon Espace Assuré</a></li>
                    <li><a href="{{ route('login') }}" class="hover:text-white transition">&rarr; Connexion Assuré & Agent</a></li>
                    <li><a href="{{ route('reclamation.publique') }}" class="hover:text-white transition">&rarr; Déposer une réclamation directe</a></li>
                    <li><a href="#suivi-rapide" class="hover:text-white transition">&rarr; Suivi rapide de récépissé</a></li>
                </ul>
            </div>
        </div>

        <div class="border-t border-slate-800 py-4 px-4 sm:px-8 text-center text-[11px] text-slate-500">
            &copy; {{ date('Y') }} Caisse Malienne de Sécurité Sociale (CMSS) &mdash; République du Mali. Tous droits réservés.
        </div>
    </footer>

</body>
</html>
