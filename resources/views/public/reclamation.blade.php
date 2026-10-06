<!DOCTYPE html>
<html lang="fr" class="h-full bg-slate-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portail Officiel des Réclamations &mdash; Caisse Malienne de Sécurité Sociale (CMSS)</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; }
        .cmss-blue { background-color: #0B3B60; }
        .cmss-blue-dark { background-color: #07233B; }
        .text-cmss-blue { color: #0B3B60; }
        .border-cmss-blue { border-color: #0B3B60; }
    </style>
</head>
<body class="min-h-full bg-slate-100 text-slate-800 antialiased flex flex-col justify-between">

    <!-- 1. BANDEAU TRICOLORE NATIONAL DE LA RÉPUBLIQUE DU MALI -->
    <div class="w-full h-1.5 flex">
        <div class="h-full w-1/3 bg-[#15803d]"></div>
        <div class="h-full w-1/3 bg-[#eab308]"></div>
        <div class="h-full w-1/3 bg-[#dc2626]"></div>
    </div>

    <!-- 2. EN-TÊTE ÉTATIQUE OFFICIEL : ARMOIRIES DU MALI & LOGO CMSS -->
    <header class="bg-white border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex flex-col md:flex-row items-center justify-between gap-4">
            
            <!-- Bloc officiel gauche : Armoiries du Mali + Logo CMSS + Textes Étatiques -->
            <div class="flex items-center gap-4 sm:gap-6 text-center sm:text-left">
                
                <!-- Armoiries de la République du Mali -->
                <div class="w-16 h-16 sm:w-18 sm:h-18 shrink-0 flex items-center justify-center p-0.5 rounded-full bg-white border border-slate-200 shadow-sm">
                    <img src="{{ asset('images/armoiries-mali.jpg') }}" alt="Armoiries de la République du Mali" class="w-full h-full object-contain rounded-full">
                </div>

                <!-- Textes républicains -->
                <div class="border-l border-slate-200 pl-4 sm:pl-6 text-left">
                    <div class="text-[11px] font-extrabold uppercase tracking-widest text-slate-600 leading-none">
                        RÉPUBLIQUE DU MALI
                    </div>
                    <div class="text-[10px] italic text-slate-500 font-medium mb-1">
                        Un Peuple &mdash; Un But &mdash; Une Foi
                    </div>
                    <div class="text-xs font-semibold text-slate-700 leading-tight">
                        Ministère de la Santé et du Développement Social
                    </div>
                    <div class="text-base sm:text-lg font-extrabold text-[#0B3B60] leading-tight">
                        Caisse Malienne de Sécurité Sociale (CMSS)
                    </div>
                </div>

                <!-- Logo CMSS -->
                <div class="w-16 h-16 sm:w-18 sm:h-18 shrink-0 hidden lg:flex items-center justify-center p-1 rounded-xl bg-white border border-slate-200 shadow-sm">
                    <img src="{{ asset('images/logo.jpg') }}" alt="Logo Officiel CMSS" class="w-full h-full object-contain">
                </div>
            </div>

            <!-- Espace Particulier & Agent Sécurisé -->
            <div class="flex items-center gap-2 sm:gap-3 shrink-0">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-1.5 px-3 py-2 rounded-lg text-xs font-bold text-slate-700 hover:text-[#0B3B60] transition">
                    <i class="fas fa-arrow-left"></i>
                    <span>Portail CMSS</span>
                </a>
                <a href="{{ route('register') }}" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-lg text-xs font-bold text-white bg-emerald-700 hover:bg-emerald-800 transition shadow-sm">
                    <i class="fas fa-user-plus text-xs"></i>
                    <span>Créer Espace Assuré</span>
                </a>
                <a href="{{ route('login') }}" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-lg text-xs font-bold text-white bg-[#0B3B60] hover:bg-[#07233B] transition shadow-sm">
                    <i class="fas fa-lock text-xs"></i>
                    <span>Connexion</span>
                </a>
            </div>

        </div>
    </header>

    <!-- 3. BARRE DE NAVIGATION OFFICIELLE (BLEU & BLANC) -->
    <nav class="bg-[#0B3B60] text-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between overflow-x-auto text-xs sm:text-sm font-semibold tracking-wide py-2.5">
            <div class="flex items-center gap-4 sm:gap-8 whitespace-nowrap">
                <a href="{{ route('home') }}" class="text-white hover:text-amber-300 transition flex items-center gap-2 py-1">
                    <i class="fas fa-home"></i>
                    <span>Accueil Principal</span>
                </a>
                <a href="{{ route('guide.reclamation') }}" class="text-white hover:text-amber-300 transition flex items-center gap-2 py-1">
                    <i class="fas fa-book-open"></i>
                    <span>Comment réclamer ? (Guide)</span>
                </a>
                <a href="#formulaire-reclamation" class="text-white hover:text-amber-300 transition flex items-center gap-2 py-1">
                    <i class="fas fa-edit"></i>
                    <span>Déposer sans compte</span>
                </a>
                <a href="#suivi-dossier" class="text-white hover:text-amber-300 transition flex items-center gap-2 py-1">
                    <i class="fas fa-search"></i>
                    <span>Suivre mon dossier</span>
                </a>
            </div>
            <div class="hidden md:flex items-center gap-2 text-xs text-amber-300 font-bold">
                <i class="fas fa-phone-alt"></i>
                <span>Standard : +223 20 22 45 00</span>
            </div>
        </div>
    </nav>

    <!-- 4. BANNIÈRE HERO INSTITUTIONNELLE (BLEU D'ÉTAT & BLANC) -->
    <section class="bg-gradient-to-b from-[#0B3B60] to-[#0d4570] text-white py-10 sm:py-12 border-b border-[#07233B]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl">
                <span class="inline-flex items-center gap-2 px-3 py-1 rounded-md text-xs font-bold bg-white/10 text-blue-100 border border-white/20 mb-3">
                    <i class="fas fa-certificate text-amber-300"></i>
                    <span>Service Public Dématérialisé &mdash; Loi n° 10-029</span>
                </span>
                <h1 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold tracking-tight leading-tight">
                    Portail Officiel des Réclamations et Recours des Assurés Sociaux
                </h1>
                <p class="mt-3 text-sm sm:text-base text-blue-100 leading-relaxed">
                    Plateforme officielle de la Caisse Malienne de Sécurité Sociale (CMSS) dédiée à la prise en charge rapide des contestations relatives aux pensions de retraite, à l'Assurance Maladie Obligatoire (AMO) et aux prestations familiales.
                </p>
            </div>

            <!-- 4 Cartouches Clés d'Information -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-3 sm:gap-4 mt-8 pt-6 border-t border-white/15">
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-3.5 border border-white/15">
                    <div class="text-amber-300 text-lg mb-1"><i class="fas fa-user-shield"></i></div>
                    <div class="font-bold text-sm">Pensions & Retraites</div>
                    <div class="text-[11px] text-blue-200 mt-0.5">Fonctionnaires et militaires</div>
                </div>
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-3.5 border border-white/15">
                    <div class="text-emerald-300 text-lg mb-1"><i class="fas fa-heartbeat"></i></div>
                    <div class="font-bold text-sm">Gestion AMO</div>
                    <div class="text-[11px] text-blue-200 mt-0.5">Assurance Maladie Obligatoire</div>
                </div>
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-3.5 border border-white/15">
                    <div class="text-blue-300 text-lg mb-1"><i class="fas fa-clock"></i></div>
                    <div class="font-bold text-sm">Délais Garantis</div>
                    <div class="text-[11px] text-blue-200 mt-0.5">Instruction sous 48h à 72h</div>
                </div>
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-3.5 border border-white/15">
                    <div class="text-amber-300 text-lg mb-1"><i class="fas fa-hand-holding-usd"></i></div>
                    <div class="font-bold text-sm">Démarche Gratuite</div>
                    <div class="text-[11px] text-blue-200 mt-0.5">Aucun frais d'enregistrement</div>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. CORPS PRINCIPAL : GRILLE 2 COLONNES (GUIDE/SUIVI + FORMULAIRE) -->
    <main class="flex-1 max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">

        <!-- Notification de succès après enregistrement -->
        @if(session('success'))
            <div class="mb-8 p-6 rounded-xl bg-white border-2 border-emerald-500 shadow-md">
                <div class="flex items-start gap-4">
                    <div class="w-10 h-10 rounded-full bg-emerald-600 text-white flex items-center justify-center shrink-0">
                        <i class="fas fa-check text-lg"></i>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-base font-bold text-emerald-900">Accusé d'Enregistrement Officiel</h3>
                        <p class="text-sm text-slate-700 mt-1 font-medium leading-relaxed">
                            {{ session('success') }}
                        </p>
                        <div class="mt-3 p-3 bg-emerald-50 rounded-lg text-xs text-emerald-800 font-semibold border border-emerald-200 flex items-center gap-2">
                            <i class="fas fa-info-circle"></i>
                            <span>Un e-mail récapitulatif vous a été envoyé. Conservez votre référence pour le suivi en ligne ou à nos guichets.</span>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

            <!-- COLONNE GAUCHE (5 colonnes) : MODULE DE SUIVI & INFORMATIONS INSTITUTIONNELLES -->
            <div class="lg:col-span-5 space-y-6">

                <!-- 1. MODULE DE SUIVI EN LIGNE PAR RÉFÉRENCE -->
                <div id="suivi-dossier" class="bg-white rounded-xl border border-slate-300 shadow-sm p-5 sm:p-6">
                    <div class="flex items-center gap-2 pb-3 mb-4 border-b border-slate-200">
                        <div class="w-8 h-8 rounded-lg bg-[#0B3B60] text-white flex items-center justify-center text-xs font-bold">
                            <i class="fas fa-search"></i>
                        </div>
                        <div>
                            <h2 class="text-sm font-bold uppercase tracking-wider text-[#0B3B60]">
                                Suivre une réclamation en cours
                            </h2>
                            <p class="text-[11px] text-slate-500">Consultez l'état d'avancement de votre dossier</p>
                        </div>
                    </div>

                    <form action="{{ route('reclamation.publique') }}" method="GET" class="space-y-3">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-1">
                                Référence de dossier (ex: REC-XXXXXXXX)
                            </label>
                            <input type="text" 
                                   name="suivi" 
                                   value="{{ request('suivi') }}" 
                                   required
                                   class="w-full rounded-lg border-slate-300 text-sm font-semibold uppercase tracking-wider py-2 px-3 focus:border-[#0B3B60] focus:ring focus:ring-[#0B3B60]/10"
                                   placeholder="REC-XXXXXXXX">
                        </div>
                        <button type="submit" class="w-full py-2.5 px-4 rounded-lg bg-slate-800 hover:bg-[#0B3B60] text-white text-xs font-bold uppercase tracking-wider transition flex items-center justify-center gap-2">
                            <i class="fas fa-search text-xs"></i>
                            <span>Vérifier le statut du dossier</span>
                        </button>
                    </form>

                    <!-- Résultat du suivi si recherché -->
                    @if(isset($dossierSuivi) && $dossierSuivi)
                        <div class="mt-4 p-4 rounded-lg bg-blue-50/70 border border-blue-200 space-y-2">
                            <div class="flex items-center justify-between">
                                <span class="text-xs font-bold text-slate-600">Dossier :</span>
                                <span class="font-mono font-bold text-xs text-[#0B3B60]">{{ $dossierSuivi->reference }}</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-xs font-bold text-slate-600">Statut actuel :</span>
                                @if($dossierSuivi->statut === 'en_attente')
                                    <span class="px-2 py-0.5 rounded text-xs font-bold bg-amber-100 text-amber-800 border border-amber-300">En attente d'instruction</span>
                                @elseif($dossierSuivi->statut === 'en_cours')
                                    <span class="px-2 py-0.5 rounded text-xs font-bold bg-blue-100 text-blue-800 border border-blue-300">En cours de traitement</span>
                                @elseif($dossierSuivi->statut === 'traitee')
                                    <span class="px-2 py-0.5 rounded text-xs font-bold bg-emerald-100 text-emerald-800 border border-emerald-300">Dossier Traité & Prêt</span>
                                @else
                                    <span class="px-2 py-0.5 rounded text-xs font-bold bg-slate-100 text-slate-800">{{ ucfirst($dossierSuivi->statut) }}</span>
                                @endif
                            </div>
                            <div class="text-xs text-slate-600 pt-1 border-t border-blue-200/60">
                                <strong>Objet :</strong> {{ $dossierSuivi->objet }}
                            </div>
                            <div class="text-[11px] text-slate-500">
                                Enregistré le {{ $dossierSuivi->created_at->format('d/m/Y à H:i') }}
                            </div>
                        </div>
                    @elseif(isset($refIntrouvable) && $refIntrouvable)
                        <div class="mt-4 p-3 rounded-lg bg-rose-50 border border-rose-200 text-rose-800 text-xs font-semibold">
                            <i class="fas fa-exclamation-circle mr-1"></i>
                            Aucun dossier trouvé pour la référence « {{ request('suivi') }} ». Veuillez vérifier la saisie.
                        </div>
                    @endif
                </div>

                <!-- 2. PHOTO OFFICIELLE DU SIÈGE & MISSIONS -->
                <div id="missions-cmss" class="bg-white rounded-xl border border-slate-300 shadow-sm overflow-hidden">
                    <img src="{{ asset('images/caisse.jpg') }}" alt="Direction Générale CMSS Bamako" class="w-full h-44 object-cover">
                    <div class="p-5">
                        <div class="text-xs font-bold uppercase tracking-wider text-[#0B3B60] mb-1">
                            Direction Générale de la CMSS
                        </div>
                        <h3 class="text-sm font-extrabold text-slate-900 leading-tight">
                            Au service des retraités et agents de l'État depuis 1961
                        </h3>
                        <p class="text-xs text-slate-600 mt-2 leading-relaxed">
                            La CMSS garantit la sécurité du versement des pensions de retraite, assure le paiement des rentes d'invalidité et protège les familles par le régime des prestations familiales et la gestion déléguée de l'AMO.
                        </p>
                    </div>
                </div>

                <!-- 3. ÉTAPES DU TRAITEMENT ADMINISTRATIF -->
                <div class="bg-white rounded-xl border border-slate-300 shadow-sm p-5 space-y-3.5">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-slate-700 pb-2 border-b border-slate-200">
                        Procédure de prise en charge
                    </h3>
                    
                    <div class="flex items-start gap-3 text-xs">
                        <div class="w-6 h-6 rounded bg-slate-100 border border-slate-300 font-bold text-[#0B3B60] flex items-center justify-center shrink-0">1</div>
                        <div>
                            <strong class="text-slate-800">Saisie du formulaire officiel</strong>
                            <div class="text-slate-500 text-[11px]">Renseignez vos coordonnées complètes et l'objet de votre contestation.</div>
                        </div>
                    </div>

                    <div class="flex items-start gap-3 text-xs">
                        <div class="w-6 h-6 rounded bg-slate-100 border border-slate-300 font-bold text-[#0B3B60] flex items-center justify-center shrink-0">2</div>
                        <div>
                            <strong class="text-slate-800">Attribution de la référence REC</strong>
                            <div class="text-slate-500 text-[11px]">Délivrance immédiate de votre numéro officiel de réclamation.</div>
                        </div>
                    </div>

                    <div class="flex items-start gap-3 text-xs">
                        <div class="w-6 h-6 rounded bg-slate-100 border border-slate-300 font-bold text-[#0B3B60] flex items-center justify-center shrink-0">3</div>
                        <div>
                            <strong class="text-slate-800">Instruction & Notification</strong>
                            <div class="text-slate-500 text-[11px]">Nos agents étudient le dossier et vous informent par email et SMS.</div>
                        </div>
                    </div>
                </div>

                <!-- 4. AGENCES RÉGIONALES & CONTACTS -->
                <div id="agences-contacts" class="bg-white rounded-xl border border-slate-300 shadow-sm p-5 text-xs text-slate-600 space-y-2">
                    <div class="font-bold text-slate-800 text-xs uppercase tracking-wider pb-2 border-b border-slate-200">
                        Guichets d'accueil & Agences régionales
                    </div>
                    <p class="text-[11px] leading-relaxed">
                        En plus du dépôt en ligne, la CMSS vous accueille dans ses agences régionales :
                    </p>
                    <div class="grid grid-cols-2 gap-1 text-[11px] font-semibold text-slate-700 pt-1">
                        <div>&bull; Agence de Kayes</div>
                        <div>&bull; Agence de Koulikoro</div>
                        <div>&bull; Agence de Sikasso</div>
                        <div>&bull; Agence de Ségou</div>
                        <div>&bull; Agence de Mopti</div>
                        <div>&bull; Agence de Tombouctou</div>
                        <div>&bull; Agence de Gao</div>
                        <div>&bull; Agence de Kidal</div>
                    </div>
                </div>

            </div>

            <!-- COLONNE DROITE (7 colonnes) : LE FORMULAIRE OFFICIEL -->
            <div id="formulaire-reclamation" class="lg:col-span-7">

                <div class="bg-white rounded-xl border border-slate-300 shadow-sm overflow-hidden">

                    <!-- En-tête officiel du formulaire -->
                    <div class="bg-[#0B3B60] px-6 py-4 text-white flex items-center justify-between">
                        <div>
                            <h2 class="text-base font-bold tracking-tight">Formulaire de Réclamation Usager</h2>
                            <p class="text-xs text-blue-200">Remplissez les mentions obligatoires signalées par un astérisque (<span class="text-amber-300">*</span>)</p>
                        </div>
                        <span class="text-[11px] font-bold px-2.5 py-1 rounded bg-white/10 text-white border border-white/20">
                            Service Officiel
                        </span>
                    </div>

                    <!-- Corps du formulaire -->
                    <div class="p-6 sm:p-8">

                        <!-- Affichage des erreurs de validation -->
                        @if($errors->any())
                            <div class="mb-6 p-4 rounded-lg bg-rose-50 border border-rose-200 text-rose-900 text-xs">
                                <div class="font-bold text-sm mb-1.5 flex items-center gap-1.5">
                                    <i class="fas fa-exclamation-triangle text-rose-600"></i>
                                    <span>Veuillez vérifier les champs suivants :</span>
                                </div>
                                <ul class="list-disc pl-5 space-y-0.5">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('reclamation.publique.store') }}" method="POST" class="space-y-6">
                            @csrf

                            <!-- SECTION 1 : Renseignements du Demandeur -->
                            <div>
                                <div class="flex items-center gap-2 pb-2 mb-4 border-b border-slate-200">
                                    <span class="w-5 h-5 rounded bg-[#0B3B60] text-white text-[11px] font-bold flex items-center justify-center">1</span>
                                    <h3 class="text-xs font-bold uppercase tracking-wider text-slate-800">
                                        Identification du Demandeur / Assuré
                                    </h3>
                                </div>

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <!-- Nom complet -->
                                    <div>
                                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-1">
                                            Nom et Prénoms <span class="text-red-600">*</span>
                                        </label>
                                        <input type="text" 
                                               name="nom" 
                                               value="{{ old('nom') }}" 
                                               required
                                               class="w-full rounded-lg border-slate-300 text-sm py-2.5 px-3 focus:border-[#0B3B60] focus:ring focus:ring-[#0B3B60]/10"
                                               placeholder="Ex: Amadou Coulibaly">
                                    </div>

                                    <!-- Email -->
                                    <div>
                                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-1">
                                            Adresse E-mail <span class="text-red-600">*</span>
                                        </label>
                                        <input type="email" 
                                               name="email" 
                                               value="{{ old('email') }}" 
                                               required
                                               class="w-full rounded-lg border-slate-300 text-sm py-2.5 px-3 focus:border-[#0B3B60] focus:ring focus:ring-[#0B3B60]/10"
                                               placeholder="adresse@domaine.com">
                                    </div>
                                </div>

                                <!-- Téléphone -->
                                <div class="mt-4">
                                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-1">
                                        Numéro de Téléphone Joignable
                                    </label>
                                    <input type="text" 
                                           name="telephone" 
                                           value="{{ old('telephone') }}" 
                                           class="w-full sm:w-2/3 rounded-lg border-slate-300 text-sm py-2.5 px-3 focus:border-[#0B3B60] focus:ring focus:ring-[#0B3B60]/10"
                                           placeholder="+223 XX XX XX XX">
                                    <p class="text-[11px] text-slate-500 mt-1">Numéro pour le contact direct par l'agent instructeur en charge de votre dossier.</p>
                                </div>
                            </div>

                            <!-- SECTION 2 : Motif de la Réclamation -->
                            <div class="pt-2">
                                <div class="flex items-center gap-2 pb-2 mb-4 border-b border-slate-200">
                                    <span class="w-5 h-5 rounded bg-[#0B3B60] text-white text-[11px] font-bold flex items-center justify-center">2</span>
                                    <h3 class="text-xs font-bold uppercase tracking-wider text-slate-800">
                                        Prestation Concernée et Exposé des Faits
                                    </h3>
                                </div>

                                <!-- Catégorie de Prestation -->
                                <div class="mb-4">
                                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-1">
                                        Régime ou Domaine de Prestation
                                    </label>
                                    <select name="categorie_id" 
                                            class="w-full rounded-lg border-slate-300 text-sm py-2.5 px-3 bg-white focus:border-[#0B3B60] focus:ring focus:ring-[#0B3B60]/10">
                                        <option value="">-- Sélectionner la catégorie concernée --</option>
                                        @foreach($categories as $categorie)
                                            <option value="{{ $categorie->id }}" {{ old('categorie_id') == $categorie->id ? 'selected' : '' }}>
                                                {{ $categorie->nom }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Objet -->
                                <div class="mb-4">
                                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-1">
                                        Objet Précis de la Réclamation <span class="text-red-600">*</span>
                                    </label>
                                    <input type="text" 
                                           name="objet" 
                                           value="{{ old('objet') }}" 
                                           required
                                           class="w-full rounded-lg border-slate-300 text-sm py-2.5 px-3 focus:border-[#0B3B60] focus:ring focus:ring-[#0B3B60]/10"
                                           placeholder="Ex: Régularisation de rappel sur pension de retraite">
                                </div>

                                <!-- Description -->
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-1">
                                        Exposé Détaillé des Faits et Références <span class="text-red-600">*</span>
                                    </label>
                                    <textarea name="description" 
                                              rows="6" 
                                              required
                                              class="w-full rounded-lg border-slate-300 text-sm p-3 focus:border-[#0B3B60] focus:ring focus:ring-[#0B3B60]/10"
                                              placeholder="Veuillez préciser votre numéro de matricule, NINA ou numéro de pensionné, l'agence régionale de rattachement et la chronologie des événements...">{{ old('description') }}</textarea>
                                </div>
                            </div>

                            <!-- Mentions Légales et Protection des Données -->
                            <div class="p-3.5 bg-slate-50 border border-slate-200 rounded-lg text-[11px] text-slate-600 leading-relaxed">
                                <div class="flex items-start gap-2">
                                    <i class="fas fa-balance-scale text-[#0B3B60] mt-0.5"></i>
                                    <div>
                                        <strong>Cadre Réglementaire :</strong> Les données collectées sont strictement confidentielles et utilisées dans le cadre de l'instruction administrative des dossiers d'assurés sociaux, conformément aux textes régissant la protection des données au Mali.
                                    </div>
                                </div>
                            </div>

                            <!-- Bouton de Soumission Officiel -->
                            <div class="pt-2">
                                <button type="submit" 
                                        class="w-full sm:w-auto px-8 py-3 rounded-lg bg-[#0B3B60] hover:bg-[#07233B] text-white font-extrabold text-sm uppercase tracking-wider transition shadow-sm hover:shadow flex items-center justify-center gap-2 cursor-pointer">
                                    <i class="fas fa-paper-plane text-xs"></i>
                                    <span>Transmettre la Réclamation à la CMSS</span>
                                </button>
                            </div>

                        </form>

                    </div>

                    <!-- Pied de carte -->
                    <div class="px-6 py-3 bg-slate-50 border-t border-slate-200 text-xs text-slate-500 flex items-center justify-between">
                        <span>République du Mali &mdash; Un Peuple, Un But, Une Foi</span>
                        <a href="{{ route('login') }}" class="font-bold text-[#0B3B60] hover:underline">
                            Connexion Administration &rarr;
                        </a>
                    </div>

                </div>

            </div>

        </div>

    </main>

    <!-- 6. PIED DE PAGE OFFICIEL RÉPUBLICAIN (BLEU MARINE D'ÉTAT & BLANC) -->
    <footer class="bg-[#07233B] text-white border-t-2 border-[#eab308] mt-12 py-8 text-xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pb-6 border-b border-white/10 text-slate-300">
                
                <div>
                    <div class="font-extrabold text-white text-sm mb-2 flex items-center gap-2">
                        <img src="{{ asset('images/armoiries-mali.jpg') }}" alt="Mali" class="w-6 h-6 rounded-full inline">
                        <span>Caisse Malienne de Sécurité Sociale</span>
                    </div>
                    <p class="text-[11px] leading-relaxed">
                        Établissement Public National à Caractère Administratif (EPA), institué par la loi n° 10-029 du 12 juillet 2010. Organisme de prévoyance sociale et de solidarité nationale.
                    </p>
                </div>

                <div>
                    <div class="font-extrabold text-white text-sm mb-2">
                        Direction Générale & Siège
                    </div>
                    <div class="text-[11px] leading-relaxed space-y-1">
                        <div>Hamdallaye ACI 2000, Bamako, Mali</div>
                        <div>Boîte Postale : BP 53 Bamako</div>
                        <div>Téléphone : +223 20 22 45 00 / +223 20 22 45 10</div>
                        <div>Courriel officiel : contact@cmss.ml</div>
                    </div>
                </div>

                <div>
                    <div class="font-extrabold text-white text-sm mb-2">
                        Institutions & Partenaires
                    </div>
                    <div class="text-[11px] leading-relaxed space-y-1">
                        <div>&bull; Ministère de la Santé et du Développement Social</div>
                        <div>&bull; Caisse Nationale d'Assurance Maladie (CANAM)</div>
                        <div>&bull; Institut National de Prévoyance Sociale (INPS)</div>
                        <div>&bull; Conférence Interafricaine de la Prévoyance Sociale (CIPRES)</div>
                    </div>
                </div>

            </div>

            <div class="pt-4 flex flex-col sm:flex-row items-center justify-between gap-2 text-[11px] text-slate-400">
                <div>
                    &copy; {{ date('Y') }} <strong>Caisse Malienne de Sécurité Sociale (CMSS)</strong> &mdash; République du Mali. Tous droits réservés.
                </div>
                <div class="flex items-center gap-4 text-slate-400">
                    <span>Mentions Légales</span>
                    <span>&bull;</span>
                    <span>Confidentialité</span>
                    <span>&bull;</span>
                    <a href="{{ route('login') }}" class="text-amber-300 hover:underline">Accès Agents</a>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>