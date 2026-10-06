<!DOCTYPE html>
<html lang="fr" class="h-full scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portail Officiel des Réclamations & Requêtes - CMSS Mali</title>
    <meta name="description" content="Portail numérique officiel dédié au dépôt et au suivi des réclamations des assurés sociaux et retraités de la Caisse Malienne de Sécurité Sociale (CMSS).">

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
        <div class="bg-[#0b1e36] text-white text-[10px] sm:text-[11px] py-1.5 px-3 sm:px-8 border-b border-white/10">
            <div class="max-w-7xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-1 text-center sm:text-left">
                <!-- Devise républicaine -->
                <div class="flex items-center gap-2 font-medium tracking-wide">
                    <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded bg-white/15 text-white font-extrabold text-[9px] sm:text-[10px] uppercase tracking-wider">
                        🇲🇱 RÉPUBLIQUE DU MALI
                    </span>
                    <span class="text-blue-300/60 hidden sm:inline">&bull;</span>
                    <span class="text-blue-100 hidden sm:inline italic">Portail Officiel des Réclamations &bull; CMSS</span>
                    <span class="text-blue-300/60 hidden lg:inline">&bull;</span>
                    <span class="text-blue-200 hidden lg:inline">Ministère de la Santé et du Développement Social</span>
                </div>
                
                <!-- Lien Site Principal & Assistance usagers -->
                <div class="flex items-center gap-3 sm:gap-4 text-[10px] sm:text-[11px] font-semibold text-blue-100">
                    <a href="tel:+22320224500" class="hover:text-amber-300 transition flex items-center gap-1.5">
                        <i class="fas fa-phone-alt text-[9px] sm:text-[10px] text-amber-400"></i>
                        <span>+223 20 22 45 00</span>
                    </a>
                    <span class="text-white/20">|</span>
                    <a href="https://cmss.ml" target="_blank" class="hover:text-amber-300 text-amber-300 transition flex items-center gap-1.5" title="Accéder au site institutionnel général de la CMSS">
                        <i class="fas fa-external-link-alt text-[9px] sm:text-[10px]"></i>
                        <span>Site Général cmss.ml</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Navigation principale & Identité CMSS -->
        <div class="max-w-7xl mx-auto px-3.5 sm:px-8 py-3 sm:py-3.5 flex items-center justify-between gap-3">
            
            <!-- Bloc Marque & Armoiries officiel -->
            <a href="{{ route('home') }}" class="flex items-center gap-2.5 sm:gap-3.5 shrink-0 group">
                <div class="flex items-center -space-x-2 shrink-0">
                    <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-full p-0.5 bg-white border border-slate-200 shadow-sm relative z-10">
                        <img src="{{ asset('images/armoiries-mali.jpg') }}" alt="Armoiries République du Mali" class="w-full h-full object-cover rounded-full">
                    </div>
                    <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-full p-0.5 sm:p-1 bg-white border border-slate-200 shadow-sm relative z-20">
                        <img src="{{ asset('images/logo.jpg') }}" alt="Logo CMSS" class="w-full h-full object-contain">
                    </div>
                </div>
                <div class="border-l border-slate-200 pl-2.5 sm:pl-3">
                    <div class="flex items-center gap-1.5 sm:gap-2">
                        <span class="text-lg sm:text-xl font-black text-[#0B3B60] tracking-tight group-hover:text-blue-900 transition leading-none">
                            CMSS
                        </span>
                        <span class="inline-flex px-1.5 py-0.5 rounded text-[8px] sm:text-[9px] font-extrabold uppercase bg-emerald-50 text-emerald-800 border border-emerald-200">
                            Guichet Réclamations
                        </span>
                    </div>
                    <div class="text-[11px] sm:text-xs font-bold text-slate-800 leading-tight mt-0.5 truncate max-w-[170px] sm:max-w-none">
                        Caisse Malienne de Sécurité Sociale
                    </div>
                    <div class="text-[9px] sm:text-[10px] font-medium text-slate-500 leading-none mt-0.5 hidden sm:block">
                        Dépôt et Suivi des Requêtes & Contentieux Usagers
                    </div>
                </div>
            </a>

            <!-- Liens de navigation centrés (Desktop) -->
            <nav class="hidden xl:flex items-center gap-1.5 text-xs font-bold text-slate-600">
                <a href="{{ route('home') }}" 
                   class="px-3.5 py-2 rounded-xl text-[#0B3B60] bg-blue-50 font-extrabold transition">
                    Accueil
                </a>
                <a href="#motifs-reclamations" 
                   class="px-3.5 py-2 rounded-xl hover:text-[#0B3B60] hover:bg-slate-100 transition">
                    Motifs de Réclamation
                </a>
                <a href="#suivi-rapide" 
                   class="px-3.5 py-2 rounded-xl hover:text-[#0B3B60] hover:bg-slate-100 transition inline-flex items-center gap-1.5">
                    <i class="fas fa-search text-xs text-slate-400"></i>
                    <span>Suivi de Dossier</span>
                </a>
                <a href="#equipes" 
                   class="px-3.5 py-2 rounded-xl hover:text-[#0B3B60] hover:bg-slate-100 transition">
                    Instruction & Équipe
                </a>
                <a href="{{ route('guide.reclamation') }}" 
                   class="px-3.5 py-2 rounded-xl text-blue-700 hover:text-[#0B3B60] hover:bg-blue-50/60 transition inline-flex items-center gap-1.5">
                    <i class="fas fa-book-reader text-xs text-blue-600"></i>
                    <span>Comment Réclamer ?</span>
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
            <a href="#motifs-reclamations" @click="mobileMenuOpen = false" class="block px-3 py-2 rounded-lg text-sm font-semibold text-slate-700 hover:bg-slate-100">
                <i class="fas fa-file-alt mr-2 text-slate-400"></i> Motifs de Réclamation
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
        <!-- HERO SECTION : Image de fond majestueuse & Rendu Étatique -->
        <!-- ========================================================= -->
        <section class="relative text-white py-12 sm:py-20 lg:py-24 overflow-hidden bg-[#071d33]">
            
            <!-- 1. NOUVELLE IMAGE DE FOND RÉELLE HAUTE QUALITÉ DU SIÈGE CMSS -->
            <div class="absolute inset-0 z-0">
                <img src="{{ asset('images/caisse.jpg') }}" alt="Siège National CMSS Direction Générale" 
                     class="w-full h-full object-cover object-center filter brightness-[0.80] contrast-[1.08] transform duration-700">
                
                <!-- Overlay bleu nuit étatique calibré pour mettre en valeur le vrai bâtiment tout en assurant une lisibilité optimale -->
                <div class="absolute inset-0 bg-gradient-to-r from-[#06182a]/95 via-[#0B3B60]/85 to-[#06182a]/75 mix-blend-multiply"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-[#071d33] via-transparent to-black/35"></div>
                <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-blue-400/20 via-transparent to-transparent"></div>
            </div>

            <!-- Filigrane d'emblème officiel en arrière-plan -->
            <div class="absolute right-4 bottom-4 lg:right-20 lg:bottom-10 opacity-10 pointer-events-none z-0">
                <img src="{{ asset('images/logo.jpg') }}" alt="" class="w-80 h-80 sm:w-96 sm:h-96 object-contain rounded-full">
            </div>

            <div class="max-w-7xl mx-auto px-4 sm:px-8 relative z-10">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">

                    <!-- Colonne Gauche : Titres, Guichet & Actions -->
                    <div class="lg:col-span-7 space-y-5 sm:space-y-6">
                        
                        <!-- Badge Institutionnel Guichet Réclamations -->
                        <div class="inline-flex items-center gap-2 px-3 py-1 sm:px-3.5 sm:py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-[11px] sm:text-xs font-semibold text-blue-100 shadow-sm">
                            <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                            <span>🇲🇱 Guichet Numérique des Réclamations &bull; CMSS Mali</span>
                        </div>

                        <!-- Titre Principal -->
                        <h1 class="text-2xl sm:text-4xl lg:text-5xl font-black tracking-tight leading-snug sm:leading-tight">
                            Portail Officiel des <span class="text-amber-300">Réclamations & Requêtes</span> de la CMSS
                        </h1>

                        <!-- Sous-titre explicatif -->
                        <p class="text-sm sm:text-base lg:text-lg text-blue-100/90 font-normal leading-relaxed max-w-2xl">
                            Plateforme officielle dédiée au dépôt sécurisé et au suivi en direct de vos requêtes (Pensions de Retraite, Assurance Maladie Obligatoire AMO, Prestations Familiales).
                        </p>

                        <!-- Cadre Distinction Officielle : Guichet Réclamations vs Site Général -->
                        <div class="p-3 sm:p-3.5 rounded-xl bg-blue-950/75 backdrop-blur-md border border-white/20 text-[11px] sm:text-xs text-blue-100 flex items-start gap-2.5 max-w-2xl shadow-inner">
                            <i class="fas fa-info-circle text-amber-300 text-sm sm:text-base mt-0.5 shrink-0"></i>
                            <div class="leading-relaxed">
                                <strong class="text-white">Guichet Spécialisé Réclamations :</strong>
                                Ce portail est uniquement destiné au dépôt et au suivi de vos réclamations. Pour les actualités, textes de loi et informations générales de la CMSS, consultez le site officiel :
                                <a href="https://cmss.ml" target="_blank" class="text-amber-300 font-bold hover:text-white underline ml-1 inline-flex items-center gap-1">
                                    www.cmss.ml <i class="fas fa-external-link-alt text-[9px]"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Call To Actions Stratégiques (optimisé mobile / plein écran) -->
                        <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 pt-1">
                            <a href="{{ route('register') }}" 
                               class="w-full sm:w-auto px-6 py-3.5 rounded-xl bg-white text-[#0B3B60] hover:bg-blue-50 font-extrabold text-xs sm:text-sm uppercase tracking-wider shadow-xl hover:shadow-2xl transition flex items-center justify-center gap-2 group text-center">
                                <i class="fas fa-user-shield text-[#0B3B60] group-hover:scale-110 transition"></i>
                                <span>Créer mon Espace Assuré</span>
                            </a>
                            <a href="{{ route('guide.reclamation') }}" 
                               class="w-full sm:w-auto px-5 py-3.5 rounded-xl bg-white/10 hover:bg-white/20 text-white border border-white/30 font-bold text-xs sm:text-sm transition flex items-center justify-center gap-2 backdrop-blur-sm text-center">
                                <i class="fas fa-book-reader text-amber-300"></i>
                                <span>Comment réclamer ?</span>
                            </a>
                            <a href="{{ route('reclamation.publique') }}" 
                               class="w-full sm:w-auto px-4 py-3 rounded-xl text-blue-200 hover:text-white font-semibold text-xs transition text-center">
                                Déposer sans compte &rarr;
                            </a>
                        </div>

                        <!-- Baromètre des chiffres clés en cartes transparentes -->
                        <div class="pt-4 sm:pt-6 border-t border-white/15 grid grid-cols-3 gap-2 sm:gap-4 text-center sm:text-left">
                            <div class="p-2.5 sm:p-3 rounded-xl bg-black/25 backdrop-blur-sm border border-white/10">
                                <div class="text-xl sm:text-3xl font-black text-white">+350k</div>
                                <div class="text-[10px] sm:text-xs text-blue-200 font-medium mt-0.5">Assurés & Retraités</div>
                            </div>
                            <div class="p-2.5 sm:p-3 rounded-xl bg-black/25 backdrop-blur-sm border border-white/10">
                                <div class="text-lg sm:text-3xl font-black text-amber-300">48h &ndash; 72h</div>
                                <div class="text-[10px] sm:text-xs text-blue-200 font-medium mt-0.5">Délai d'instruction</div>
                            </div>
                            <div class="p-2.5 sm:p-3 rounded-xl bg-black/25 backdrop-blur-sm border border-white/10">
                                <div class="text-xl sm:text-3xl font-black text-emerald-400">9 Agences</div>
                                <div class="text-[10px] sm:text-xs text-blue-200 font-medium mt-0.5">Réseau Mali</div>
                            </div>
                        </div>
                    </div>

                    <!-- Colonne Droite : Carte d'Autorité Officielle (Avec LOGO CMSS au lieu de la photo DG) -->
                    <div class="lg:col-span-5">
                        <div class="rounded-2xl sm:rounded-3xl bg-slate-900/85 backdrop-blur-md border border-white/20 shadow-2xl overflow-hidden p-5 sm:p-6 text-white space-y-4 sm:space-y-5">
                            
                            <!-- En-tête de la carte -->
                            <div class="flex items-center justify-between pb-3 sm:pb-4 border-b border-white/15">
                                <div class="flex items-center gap-2.5 sm:gap-3">
                                    <img src="{{ asset('images/armoiries-mali.jpg') }}" alt="Mali" class="w-9 h-9 sm:w-10 sm:h-10 rounded-full border border-white/30 object-cover">
                                    <div>
                                        <div class="text-[9px] sm:text-[10px] uppercase font-bold tracking-wider text-amber-300">République du Mali</div>
                                        <div class="text-xs sm:text-sm font-extrabold text-white">Caisse Malienne de Sécurité Sociale</div>
                                    </div>
                                </div>
                                <span class="px-2.5 py-1 rounded-full text-[10px] font-extrabold bg-emerald-500/20 text-emerald-300 border border-emerald-500/30 flex items-center gap-1.5 shrink-0">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-ping"></span>
                                    <span>Guichet Ouvert</span>
                                </span>
                            </div>

                            <!-- Bloc LOGO CMSS & Identité (Remplace l'image du directeur ici) -->
                            <div class="flex items-center gap-3.5 sm:gap-4 bg-white/10 p-3 sm:p-3.5 rounded-2xl border border-white/15">
                                <div class="w-14 h-14 sm:w-16 sm:h-16 rounded-xl bg-white p-1.5 border border-white/30 shadow-md shrink-0 flex items-center justify-center">
                                    <img src="{{ asset('images/logo.jpg') }}" alt="Logo Officiel CMSS" class="w-full h-full object-contain">
                                </div>
                                <div>
                                    <div class="text-[10px] sm:text-xs font-bold text-amber-300 uppercase tracking-wide">Établissement Public de Prévoyance</div>
                                    <div class="text-sm sm:text-base font-extrabold text-white leading-tight mt-0.5">CMSS Mali</div>
                                    <p class="text-[10px] sm:text-[11px] text-blue-100/80 leading-snug mt-1">
                                        Protection sociale solidaire, impartialité et célérité dans le traitement de vos réclamations.
                                    </p>
                                </div>
                            </div>

                            <!-- Repères Siège & Services -->
                            <div class="space-y-2 text-xs text-blue-100/90 pt-1">
                                <div class="flex items-center gap-2.5">
                                    <i class="fas fa-landmark text-amber-300 w-4 text-center shrink-0"></i>
                                    <span class="text-[11px] sm:text-xs"><strong>Siège National :</strong> Hamdallaye ACI 2000, Bamako</span>
                                </div>
                                <div class="flex items-center gap-2.5">
                                    <i class="fas fa-clock text-emerald-400 w-4 text-center shrink-0"></i>
                                    <span class="text-[11px] sm:text-xs"><strong>Accueil physique :</strong> Lun &ndash; Ven (7h30 &ndash; 16h00)</span>
                                </div>
                                <div class="flex items-center gap-2.5">
                                    <i class="fas fa-globe text-sky-400 w-4 text-center shrink-0"></i>
                                    <span class="text-[11px] sm:text-xs"><strong>Guichet Numérique :</strong> Dépôt & suivi 24h/24 & 7j/7</span>
                                </div>
                            </div>

                            <!-- Bouton rapide vers le suivi -->
                            <div class="pt-1">
                                <a href="#suivi-rapide" class="w-full py-2.5 sm:py-3 px-4 rounded-xl bg-gradient-to-r from-blue-600 to-[#0B3B60] hover:from-blue-500 hover:to-[#093150] text-white font-bold text-xs uppercase tracking-wider text-center block transition shadow-md border border-white/15">
                                    <i class="fas fa-search mr-1.5"></i> Suivre une réclamation en direct
                                </a>
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
        <!-- MOTIFS DE RÉCLAMATIONS PRIS EN CHARGE SUR CE GUICHET -->
        <!-- ========================================================= -->
        <section id="motifs-reclamations" class="py-20 max-w-7xl mx-auto px-4 sm:px-8">
            <div class="text-center max-w-3xl mx-auto mb-14">
                <span class="text-xs font-bold text-[#0B3B60] uppercase tracking-wider bg-blue-50 px-3 py-1 rounded-full">
                    Domaines Traités par ce Guichet
                </span>
                <h2 class="text-3xl font-extrabold text-slate-900 mt-2">
                    Quelles Réclamations Pouvez-Vous Déposer Ici ?
                </h2>
                <p class="text-sm text-slate-600 mt-2">
                    Ce portail traite en priorité les litiges, retards d'instruction, omissions et anomalies de paiement relatifs aux trois régimes de la CMSS :
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Motif 1 : Pensions -->
                <div class="bg-white rounded-2xl p-7 border border-slate-200 shadow-sm hover:shadow-md transition">
                    <div class="w-14 h-14 rounded-2xl bg-blue-50 text-[#0B3B60] flex items-center justify-center text-2xl mb-6">
                        <i class="fas fa-user-clock"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Pensions & Retraites</h3>
                    <p class="text-xs text-slate-600 leading-relaxed mb-4">
                        Dépôt de requêtes pour retards de liquidation, arrérages non versés, révision de quotité et régularisation des droits d'ayants droit civils et militaires.
                    </p>
                    <ul class="text-xs text-slate-600 space-y-2 border-t border-slate-100 pt-4">
                        <li class="flex items-center gap-2"><i class="fas fa-check-circle text-emerald-600 text-xs"></i> Retard de liquidation de dossier de pension</li>
                        <li class="flex items-center gap-2"><i class="fas fa-check-circle text-emerald-600 text-xs"></i> Arrérages impayés et rappels sur salaire</li>
                        <li class="flex items-center gap-2"><i class="fas fa-check-circle text-emerald-600 text-xs"></i> Pension de veuvage ou orphelinat (réversion)</li>
                        <li class="flex items-center gap-2"><i class="fas fa-check-circle text-emerald-600 text-xs"></i> Problème de livret de pension ou contrôle physique</li>
                    </ul>
                </div>

                <!-- Motif 2 : AMO -->
                <div class="bg-white rounded-2xl p-7 border border-slate-200 shadow-sm hover:shadow-md transition">
                    <div class="w-14 h-14 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-2xl mb-6">
                        <i class="fas fa-heartbeat"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Assurance Maladie (AMO)</h3>
                    <p class="text-xs text-slate-600 leading-relaxed mb-4">
                        Contestation de rejet de feuilles de soins, retard de délivrance de carte biométrique ou refus de prise en charge auprès de la CMSS (OGD).
                    </p>
                    <ul class="text-xs text-slate-600 space-y-2 border-t border-slate-100 pt-4">
                        <li class="flex items-center gap-2"><i class="fas fa-check-circle text-emerald-600 text-xs"></i> Rejet ou retard de remboursement de feuille de soins</li>
                        <li class="flex items-center gap-2"><i class="fas fa-check-circle text-emerald-600 text-xs"></i> Non-délivrance ou blocage de carte biométrique AMO</li>
                        <li class="flex items-center gap-2"><i class="fas fa-check-circle text-emerald-600 text-xs"></i> Refus injustifié d'entente préalable ou hospitalisation</li>
                        <li class="flex items-center gap-2"><i class="fas fa-check-circle text-emerald-600 text-xs"></i> Problème d'affiliation des ayants droit (enfants, conjoint)</li>
                    </ul>
                </div>

                <!-- Motif 3 : Prestations familiales -->
                <div class="bg-white rounded-2xl p-7 border border-slate-200 shadow-sm hover:shadow-md transition">
                    <div class="w-14 h-14 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center text-2xl mb-6">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Prestations Familiales & Risques</h3>
                    <p class="text-xs text-slate-600 leading-relaxed mb-4">
                        Réclamations relatives au non-paiement des allocations pour charges d'enfants, indemnités de maternité ou rentes accidents de service (AT/MP).
                    </p>
                    <ul class="text-xs text-slate-600 space-y-2 border-t border-slate-100 pt-4">
                        <li class="flex items-center gap-2"><i class="fas fa-check-circle text-emerald-600 text-xs"></i> Non-versement des allocations familiales</li>
                        <li class="flex items-center gap-2"><i class="fas fa-check-circle text-emerald-600 text-xs"></i> Retard de paiement de congé de maternité</li>
                        <li class="flex items-center gap-2"><i class="fas fa-check-circle text-emerald-600 text-xs"></i> Liquidation des rentes pour accidents du travail</li>
                        <li class="flex items-center gap-2"><i class="fas fa-check-circle text-emerald-600 text-xs"></i> Régularisation des attestations de cotisation</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- ========================================================= -->
        <!-- SECTION ÉQUIPES : La Chaîne de Traitement des Réclamations -->
        <!-- ========================================================= -->
        <section id="equipes" class="py-20 bg-slate-100/70 border-y border-slate-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-8">
                <div class="text-center max-w-3xl mx-auto mb-14">
                    <span class="text-xs font-bold text-[#0B3B60] uppercase tracking-wider bg-white px-3 py-1 rounded-full border border-slate-200 shadow-sm">
                        Gouvernance & Traitement Diligent
                    </span>
                    <h2 class="text-3xl font-extrabold text-slate-900 mt-2">
                        La Chaîne de Décision & Traitement de vos Requêtes
                    </h2>
                    <p class="text-sm text-slate-600 mt-2">
                        Sous l'autorité de la Direction Générale, des équipes dédiées instruisent et régularisent chaque réclamation d'usager dans le strict respect de la réglementation.
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
        <!-- Bannière d'information institutionnelle : Portail Réclamations vs Site Général CMSS -->
        <div class="bg-[#06182a] border-b border-slate-800 py-4 px-4 sm:px-8">
            <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between gap-3 text-center md:text-left">
                <div class="flex items-center gap-2.5 text-xs text-blue-200">
                    <span class="w-2.5 h-2.5 rounded-full bg-amber-400 shrink-0"></span>
                    <span><strong>Précision Importante :</strong> Ce portail est le service numérique dédié exclusivement au dépôt, à l'instruction et au suivi des réclamations des assurés.</span>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-[11px] text-slate-400 hidden sm:inline">Pour les actualités, textes de loi et informations générales :</span>
                    <a href="https://cmss.ml" target="_blank" class="px-3.5 py-1.5 rounded-lg bg-white/10 hover:bg-white/20 text-amber-300 font-bold text-xs inline-flex items-center gap-1.5 transition border border-white/15">
                        <span>Accéder au site officiel CMSS (cmss.ml)</span>
                        <i class="fas fa-external-link-alt text-[10px]"></i>
                    </a>
                </div>
            </div>
        </div>

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
