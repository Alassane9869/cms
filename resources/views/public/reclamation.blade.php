<!DOCTYPE html>
<html lang="fr" class="h-full bg-slate-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portail des Réclamations &mdash; Caisse Malienne de Sécurité Sociale (CMSS)</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; }
    </style>
</head>
<body class="min-h-full bg-slate-100/70 text-slate-900 antialiased flex flex-col justify-between">

    <!-- 1. Bandeau Tricolore National de la République du Mali -->
    <div class="w-full h-1.5 flex">
        <div class="h-full w-1/3 bg-[#15803d]"></div>
        <div class="h-full w-1/3 bg-[#eab308]"></div>
        <div class="h-full w-1/3 bg-[#dc2626]"></div>
    </div>

    <!-- 2. En-tête Institutionnel & Républicain -->
    <header class="bg-white border-b border-slate-200 shadow-sm sticky top-0 z-40">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-3.5 flex items-center justify-between">

            <!-- Identité de l'institution -->
            <div class="flex items-center gap-3.5 sm:gap-4">
                <a href="{{ route('reclamation.publique') }}" class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-lg p-0.5 flex items-center justify-center shrink-0 border border-slate-200 bg-white">
                        <img src="{{ asset('images/logo.jpg') }}" alt="Logo CMSS" class="w-full h-full object-contain">
                    </div>
                    <div>
                        <div class="text-[11px] font-bold uppercase tracking-wider text-slate-500 leading-none">
                            République du Mali
                        </div>
                        <div class="text-base sm:text-lg font-bold text-[#0c3254] leading-tight mt-0.5">
                            Caisse Malienne de Sécurité Sociale
                        </div>
                        <div class="text-[11px] text-slate-500 font-medium hidden sm:block">
                            Établissement Public à Caractère Administratif (EPA)
                        </div>
                    </div>
                </a>
            </div>

            <!-- Espace Agent & Liens utiles -->
            <div class="flex items-center gap-3">
                <a href="{{ route('login') }}" class="inline-flex items-center gap-2 px-3.5 py-2 rounded-lg text-xs sm:text-sm font-semibold text-[#0c3254] bg-slate-100 hover:bg-slate-200 border border-slate-300 transition">
                    <i class="fas fa-lock text-slate-500"></i>
                    <span>Espace Agent</span>
                </a>
            </div>
        </div>
    </header>

    <!-- 3. Fil d'Ariane & Titre de Démarche Publique -->
    <div class="bg-white border-b border-slate-200">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <nav class="flex items-center gap-2 text-xs text-slate-500 mb-2">
                <span>Accueil</span>
                <span>&rsaquo;</span>
                <span>Services en ligne</span>
                <span>&rsaquo;</span>
                <span class="text-slate-800 font-semibold">Réclamation usager</span>
            </nav>
            <h1 class="text-xl sm:text-2xl font-bold text-[#0c3254] tracking-tight">
                Enregistrement d'une réclamation en ligne
            </h1>
            <p class="text-xs sm:text-sm text-slate-600 mt-1">
                Formulaire officiel destiné aux assurés sociaux, pensionnés et partenaires pour toute contestation ou signalement d'anomalie.
            </p>
        </div>
    </div>

    <!-- 4. Contenu Principal : Formulaire Administratif Soigné -->
    <main class="flex-1 max-w-4xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-10">

        <!-- Message d'information réglementaire -->
        <div class="mb-6 p-4 rounded-lg bg-blue-50/80 border border-blue-200 text-slate-800 text-xs sm:text-sm flex items-start gap-3">
            <i class="fas fa-info-circle text-[#0c3254] text-base mt-0.5 shrink-0"></i>
            <div class="leading-relaxed">
                <strong>Information importante :</strong> Votre requête sera instruite par les services compétents de la CMSS. Dès validation, un numéro de dossier unique vous sera transmis à l'écran et par courriel pour assurer votre suivi.
            </div>
        </div>

        <!-- Alerte Succès / Récépissé Officiel -->
        @if(session('success'))
            <div class="mb-6 p-5 rounded-lg bg-emerald-50 border-2 border-emerald-400 text-emerald-950 shadow-sm">
                <div class="flex items-start gap-3">
                    <div class="w-8 h-8 rounded-full bg-emerald-600 text-white flex items-center justify-center shrink-0 mt-0.5">
                        <i class="fas fa-check"></i>
                    </div>
                    <div class="flex-1">
                        <div class="font-bold text-sm text-emerald-900 mb-1">Confirmation d'Enregistrement</div>
                        <div class="text-xs sm:text-sm text-emerald-800 leading-relaxed font-medium">
                            {{ session('success') }}
                        </div>
                        <div class="mt-2 text-xs text-emerald-700">
                            Veuillez noter précieusement cette référence pour toute démarche physique à nos guichets.
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- Erreurs de validation -->
        @if($errors->any())
            <div class="mb-6 p-4 rounded-lg bg-red-50 border border-red-200 text-red-900 text-xs sm:text-sm">
                <div class="font-bold text-red-800 flex items-center gap-2 mb-2">
                    <i class="fas fa-exclamation-triangle text-red-600"></i>
                    <span>Certains champs obligatoires n'ont pas été correctement remplis :</span>
                </div>
                <ul class="list-disc pl-5 space-y-1 text-red-700">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Carte Principale du Formulaire -->
        <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6 sm:p-8">

            <form action="{{ route('reclamation.publique.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- SECTION 1 : Identité du Demandeur -->
                <div>
                    <div class="flex items-center gap-2 pb-2 mb-4 border-b border-slate-200">
                        <span class="w-6 h-6 rounded bg-[#0c3254] text-white text-xs font-bold flex items-center justify-center">1</span>
                        <h2 class="text-sm font-bold uppercase tracking-wider text-slate-800">
                            Renseignements sur l'assuré / le demandeur
                        </h2>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-5">
                        <!-- Nom complet -->
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-1.5">
                                Nom et Prénoms <span class="text-red-600">*</span>
                            </label>
                            <input type="text" 
                                   name="nom" 
                                   value="{{ old('nom') }}" 
                                   required
                                   class="w-full rounded-lg border-slate-300 shadow-sm focus:border-[#0c3254] focus:ring focus:ring-[#0c3254]/10 text-sm py-2 px-3"
                                   placeholder="Ex: Amadou Diallo">
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-1.5">
                                Adresse E-mail <span class="text-red-600">*</span>
                            </label>
                            <input type="email" 
                                   name="email" 
                                   value="{{ old('email') }}" 
                                   required
                                   class="w-full rounded-lg border-slate-300 shadow-sm focus:border-[#0c3254] focus:ring focus:ring-[#0c3254]/10 text-sm py-2 px-3"
                                   placeholder="exemple@email.com">
                        </div>
                    </div>

                    <!-- Téléphone -->
                    <div class="mt-4">
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-1.5">
                            Numéro de téléphone
                        </label>
                        <input type="text" 
                               name="telephone" 
                               value="{{ old('telephone') }}" 
                               class="w-full sm:w-1/2 rounded-lg border-slate-300 shadow-sm focus:border-[#0c3254] focus:ring focus:ring-[#0c3254]/10 text-sm py-2 px-3"
                               placeholder="+223 XX XX XX XX">
                        <p class="text-[11px] text-slate-500 mt-1">Numéro joignable pour les échanges et notifications de l'agent instructeur.</p>
                    </div>
                </div>

                <!-- SECTION 2 : Détails de la Réclamation -->
                <div class="pt-2">
                    <div class="flex items-center gap-2 pb-2 mb-4 border-b border-slate-200">
                        <span class="w-6 h-6 rounded bg-[#0c3254] text-white text-xs font-bold flex items-center justify-center">2</span>
                        <h2 class="text-sm font-bold uppercase tracking-wider text-slate-800">
                            Objet et motifs de la réclamation
                        </h2>
                    </div>

                    <!-- Catégorie -->
                    <div class="mb-4">
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-1.5">
                            Prestation ou domaine concerné
                        </label>
                        <select name="categorie_id" 
                                class="w-full rounded-lg border-slate-300 shadow-sm focus:border-[#0c3254] focus:ring focus:ring-[#0c3254]/10 text-sm py-2 px-3 bg-white">
                            <option value="">-- Sélectionner la catégorie correspondante --</option>
                            @foreach($categories as $categorie)
                                <option value="{{ $categorie->id }}" {{ old('categorie_id') == $categorie->id ? 'selected' : '' }}>
                                    {{ $categorie->nom }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Objet -->
                    <div class="mb-4">
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-1.5">
                            Objet de la réclamation <span class="text-red-600">*</span>
                        </label>
                        <input type="text" 
                               name="objet" 
                               value="{{ old('objet') }}" 
                               required
                               class="w-full rounded-lg border-slate-300 shadow-sm focus:border-[#0c3254] focus:ring focus:ring-[#0c3254]/10 text-sm py-2 px-3"
                               placeholder="Ex: Retard de liquidation de ma pension de retraite militaire">
                    </div>

                    <!-- Description -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-1.5">
                            Exposé détaillé des faits <span class="text-red-600">*</span>
                        </label>
                        <textarea name="description" 
                                  rows="6" 
                                  required
                                  class="w-full rounded-lg border-slate-300 shadow-sm focus:border-[#0c3254] focus:ring focus:ring-[#0c3254]/10 text-sm p-3"
                                  placeholder="Veuillez préciser votre numéro de matricule/NINA, votre service d'origine, les démarches déjà entreprises et les pièces en votre possession...">{{ old('description') }}</textarea>
                    </div>
                </div>

                <!-- Engagement et Mentions Légales -->
                <div class="p-3.5 bg-slate-50 border border-slate-200 rounded-lg text-xs text-slate-600 leading-relaxed">
                    <div class="flex items-start gap-2">
                        <i class="fas fa-lock text-slate-500 mt-0.5"></i>
                        <span>
                            <strong>Protection des données :</strong> Les informations recueillies sur ce formulaire officiel sont traitées dans le strict respect du secret professionnel et des dispositions légales encadrant la protection des données au Mali.
                        </span>
                    </div>
                </div>

                <!-- Bouton de Soumission Officiel -->
                <div class="pt-2">
                    <button type="submit" 
                            class="w-full sm:w-auto px-8 py-3 rounded-lg bg-[#0c3254] hover:bg-[#08223a] text-white font-bold text-sm tracking-wide shadow-sm hover:shadow transition flex items-center justify-center gap-2 cursor-pointer">
                        <i class="fas fa-paper-plane text-xs"></i>
                        <span>Transmettre la réclamation</span>
                    </button>
                </div>

            </form>

        </div>

        <!-- Coordonnées et permanences officielles de la CMSS -->
        <div class="mt-8 border border-slate-200 bg-white rounded-xl p-5 text-xs text-slate-600">
            <div class="font-bold text-slate-800 text-sm mb-2 flex items-center gap-2">
                <i class="fas fa-building text-[#0c3254]"></i>
                <span>Caisse Malienne de Sécurité Sociale &mdash; Guichets et Permanence</span>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 pt-1">
                <div>
                    <span class="font-semibold text-slate-700">Siège social :</span> Hamdallaye ACI 2000, Bamako
                </div>
                <div>
                    <span class="font-semibold text-slate-700">Standard téléphonique :</span> +223 20 22 45 00
                </div>
                <div>
                    <span class="font-semibold text-slate-700">Heures d'accueil :</span> Lundi au Vendredi, 7h30 &ndash; 16h00
                </div>
            </div>
        </div>

    </main>

    <!-- 5. Pied de Page Républicain Officiel -->
    <footer class="border-t border-slate-200 bg-white py-6 text-xs text-slate-500 mt-12">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-3 text-center sm:text-left">
            <div>
                &copy; {{ date('Y') }} <strong>Caisse Malienne de Sécurité Sociale (CMSS)</strong> &mdash; République du Mali.
            </div>
            <div class="text-slate-400">
                Ministère de la Santé et du Développement Social
            </div>
        </div>
    </footer>

</body>
</html>