<!DOCTYPE html>
<html lang="fr" class="h-full scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Comment faire une Réclamation ? - Caisse Malienne de Sécurité Sociale (CMSS)</title>
    <meta name="description" content="Guide officiel des démarches de réclamation auprès de la CMSS. Pièces à fournir, délais d'instruction, recours et suivi de dossier.">

    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Vite Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif; }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased flex flex-col min-h-screen">

    <!-- Bandeau tricolore national du Mali -->
    <div class="w-full h-2 flex sticky top-0 z-50">
        <div class="h-full w-1/3 bg-[#15803d]"></div>
        <div class="h-full w-1/3 bg-[#eab308]"></div>
        <div class="h-full w-1/3 bg-[#dc2626]"></div>
    </div>

    <!-- En-tête -->
    <header class="bg-white border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-8 py-3.5 flex items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <img src="{{ asset('images/armoiries-mali.jpg') }}" alt="Mali" class="w-10 h-10 rounded-full border border-slate-200 shadow-sm">
                <div>
                    <span class="block text-base font-black text-[#0B3B60] leading-none">CMSS</span>
                    <span class="block text-[11px] font-bold text-slate-700">Guide Officiel de l'Assuré</span>
                </div>
            </a>

            <div class="flex items-center gap-3">
                <a href="{{ route('home') }}" class="text-xs font-bold text-slate-600 hover:text-[#0B3B60] transition flex items-center gap-1.5">
                    <i class="fas fa-arrow-left"></i>
                    <span>Retour au Portail</span>
                </a>
                <a href="{{ route('register') }}" class="px-3.5 py-2 rounded-xl bg-[#0B3B60] hover:bg-[#07233B] text-white text-xs font-bold uppercase tracking-wider transition">
                    Créer mon Espace
                </a>
            </div>
        </div>
    </header>

    <main class="flex-1">

        <!-- Bannière titre -->
        <section class="bg-[#0B3B60] text-white py-12 px-4 sm:px-8 border-b border-[#07233B]">
            <div class="max-w-4xl mx-auto text-center space-y-4">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-white/10 text-xs font-semibold text-blue-200 border border-white/20">
                    <i class="fas fa-info-circle text-amber-300"></i> Vos Droits & Démarches Simplifiées
                </span>
                <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight">
                    Comment faire une Réclamation auprès de la CMSS ?
                </h1>
                <p class="text-sm sm:text-base text-blue-100 max-w-2xl mx-auto leading-relaxed">
                    Découvrez les étapes à suivre, les pièces justificatives indispensables et les délais d'instruction pour faire valoir vos droits rapidement.
                </p>
            </div>
        </section>

        <!-- Contenu du guide -->
        <div class="max-w-5xl mx-auto px-4 sm:px-8 py-12 space-y-12">

            <!-- Cadre de distinction officiel -->
            <div class="p-4 rounded-2xl bg-blue-50 border border-blue-200 text-xs text-blue-900 flex items-start gap-3 shadow-xs">
                <i class="fas fa-info-circle text-blue-600 text-base mt-0.5 shrink-0"></i>
                <div class="leading-relaxed">
                    <strong>Portée exclusive de ce guide :</strong>
                    Ce guide détaille uniquement la procédure de contestation, de contentieux et de réclamation d'un dossier auprès de la CMSS (pensions non perçues, rejets AMO, allocations familiales). Pour les informations administratives générales, l'immatriculation initiale et les actualités institutionnelles, veuillez consulter le site officiel :
                    <a href="https://cmss.ml" target="_blank" class="font-bold underline text-[#0B3B60] hover:text-blue-900 inline-flex items-center gap-1 ml-1">
                        www.cmss.ml <i class="fas fa-external-link-alt text-[9px]"></i>
                    </a>
                </div>
            </div>

            <!-- Section 1 : Les 3 canaux de dépôt -->
            <section class="space-y-6">
                <div class="border-b border-slate-200 pb-3">
                    <h2 class="text-xl font-extrabold text-[#0B3B60] flex items-center gap-2">
                        <i class="fas fa-desktop text-blue-600"></i> 1. Choisissez votre modalité de dépôt
                    </h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Canal 1 -->
                    <div class="bg-white rounded-2xl p-6 border-2 border-[#0B3B60] shadow-sm relative flex flex-col justify-between">
                        <span class="absolute -top-3 right-4 px-2.5 py-0.5 rounded-full text-[10px] font-extrabold bg-[#0B3B60] text-white uppercase tracking-wider">
                            Recommandé
                        </span>
                        <div>
                            <div class="w-12 h-12 rounded-xl bg-blue-50 text-[#0B3B60] flex items-center justify-center text-xl mb-4">
                                <i class="fas fa-user-shield"></i>
                            </div>
                            <h3 class="font-extrabold text-base text-slate-900 mb-2">Espace Assuré en ligne</h3>
                            <p class="text-xs text-slate-600 leading-relaxed mb-4">
                                Créez votre compte en 1 minute. Vous conservez l'historique de tous vos dossiers, recevez les alertes en direct et téléchargez vos récépissés PDF certifiés.
                            </p>
                        </div>
                        <a href="{{ route('register') }}" class="w-full py-2.5 rounded-xl bg-[#0B3B60] hover:bg-[#07233B] text-white text-xs font-bold uppercase tracking-wider text-center block transition">
                            Créer mon compte
                        </a>
                    </div>

                    <!-- Canal 2 -->
                    <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm flex flex-col justify-between">
                        <div>
                            <div class="w-12 h-12 rounded-xl bg-slate-100 text-slate-700 flex items-center justify-center text-xl mb-4">
                                <i class="fas fa-paper-plane"></i>
                            </div>
                            <h3 class="font-extrabold text-base text-slate-900 mb-2">Dépôt Express sans compte</h3>
                            <p class="text-xs text-slate-600 leading-relaxed mb-4">
                                Remplissez le formulaire public direct avec votre nom et email. Un numéro de suivi <code class="text-[#0B3B60] font-bold">REC-XXXXXXXX</code> vous sera attribué immédiatement.
                            </p>
                        </div>
                        <a href="{{ route('reclamation.publique') }}" class="w-full py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-800 text-xs font-bold uppercase tracking-wider text-center block transition">
                            Dépôt rapide
                        </a>
                    </div>

                    <!-- Canal 3 -->
                    <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm flex flex-col justify-between">
                        <div>
                            <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-700 flex items-center justify-center text-xl mb-4">
                                <i class="fas fa-building"></i>
                            </div>
                            <h3 class="font-extrabold text-base text-slate-900 mb-2">Guichets Physiques</h3>
                            <p class="text-xs text-slate-600 leading-relaxed mb-4">
                                Rendez-vous au Siège National à Bamako (Hamdallaye ACI 2000) ou dans l'une de nos 9 Directions Régionales (Kayes, Sikasso, Ségou, Mopti, etc.).
                            </p>
                        </div>
                        <span class="w-full py-2.5 rounded-xl bg-slate-50 text-slate-500 text-xs font-bold uppercase tracking-wider text-center block border border-slate-200">
                            Du Lun au Ven (7h30 &ndash; 16h)
                        </span>
                    </div>
                </div>
            </section>

            <!-- Section 2 : Pièces justificatives -->
            <section class="space-y-6">
                <div class="border-b border-slate-200 pb-3">
                    <h2 class="text-xl font-extrabold text-[#0B3B60] flex items-center gap-2">
                        <i class="fas fa-folder-open text-blue-600"></i> 2. Pièces justificatives à préparer selon votre cas
                    </h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Cas 1 : Pensions & Retraites -->
                    <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="w-2.5 h-2.5 rounded-full bg-blue-600"></span>
                            <h3 class="font-bold text-base text-slate-900">Retraite & Liquidation de Pension</h3>
                        </div>
                        <ul class="text-xs text-slate-600 space-y-2">
                            <li class="flex items-start gap-2">
                                <i class="fas fa-check text-emerald-500 mt-0.5"></i>
                                <span>Arrêté ou décret d'admission à la retraite</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i class="fas fa-check text-emerald-500 mt-0.5"></i>
                                <span>Dernier bulletin de solde ou état des sommes dues</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i class="fas fa-check text-emerald-500 mt-0.5"></i>
                                <span>Copie de la carte d'identité biométrique / Numéro NINA</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i class="fas fa-check text-emerald-500 mt-0.5"></i>
                                <span>Livret de pension existant (pour les révisions de montant)</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Cas 2 : Pensions de réversion (Veuves & Orphelins) -->
                    <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="w-2.5 h-2.5 rounded-full bg-amber-500"></span>
                            <h3 class="font-bold text-base text-slate-900">Pensions de Réversion (Veuves & Ayants Droit)</h3>
                        </div>
                        <ul class="text-xs text-slate-600 space-y-2">
                            <li class="flex items-start gap-2">
                                <i class="fas fa-check text-emerald-500 mt-0.5"></i>
                                <span>Extrait d'acte de décès légalisé du fonctionnaire décédé</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i class="fas fa-check text-emerald-500 mt-0.5"></i>
                                <span>Extrait d'acte de mariage ou certificat de non-remariage</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i class="fas fa-check text-emerald-500 mt-0.5"></i>
                                <span>Certificat de vie collective des enfants orphelins mineurs</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i class="fas fa-check text-emerald-500 mt-0.5"></i>
                                <span>Jugement d'hérédité ou acte de tutelle le cas échéant</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Cas 3 : AMO -->
                    <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="w-2.5 h-2.5 rounded-full bg-emerald-600"></span>
                            <h3 class="font-bold text-base text-slate-900">Assurance Maladie Obligatoire (AMO)</h3>
                        </div>
                        <ul class="text-xs text-slate-600 space-y-2">
                            <li class="flex items-start gap-2">
                                <i class="fas fa-check text-emerald-500 mt-0.5"></i>
                                <span>Feuille de soins originale contestée ou rejetée</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i class="fas fa-check text-emerald-500 mt-0.5"></i>
                                <span>Numéro de carte AMO de l'assuré principal et des ayants droit</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i class="fas fa-check text-emerald-500 mt-0.5"></i>
                                <span>Factures acquittées et prescriptions médicales liées</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i class="fas fa-check text-emerald-500 mt-0.5"></i>
                                <span>Motif de rejet notifié par l'officine ou la formation hospitalière</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Cas 4 : Allocations familiales -->
                    <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="w-2.5 h-2.5 rounded-full bg-purple-600"></span>
                            <h3 class="font-bold text-base text-slate-900">Prestations Familiales & Allocations</h3>
                        </div>
                        <ul class="text-xs text-slate-600 space-y-2">
                            <li class="flex items-start gap-2">
                                <i class="fas fa-check text-emerald-500 mt-0.5"></i>
                                <span>Extraits d'actes de naissance des enfants à charge</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i class="fas fa-check text-emerald-500 mt-0.5"></i>
                                <span>Certificats de scolarité en cours de validité</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i class="fas fa-check text-emerald-500 mt-0.5"></i>
                                <span>Certificat de vie et de charge délivré par la mairie</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>

            <!-- Section 3 : Engagements de délai -->
            <section class="space-y-6">
                <div class="border-b border-slate-200 pb-3">
                    <h2 class="text-xl font-extrabold text-[#0B3B60] flex items-center gap-2">
                        <i class="fas fa-stopwatch text-blue-600"></i> 3. Délais de traitement & Engagements CMSS
                    </h2>
                </div>

                <div class="bg-white rounded-2xl p-6 sm:p-8 border border-slate-200 shadow-sm">
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 text-center">
                        <div class="p-4 rounded-xl bg-slate-50 border border-slate-200">
                            <div class="text-2xl font-black text-[#0B3B60]">Immédiat</div>
                            <div class="text-xs font-bold text-slate-700 mt-1">Attribution de la Référence</div>
                            <p class="text-[11px] text-slate-500 mt-2">Délivrance automatique du code REC-XXXXXXXX et du récépissé téléchargeable.</p>
                        </div>

                        <div class="p-4 rounded-xl bg-blue-50/70 border border-blue-200">
                            <div class="text-2xl font-black text-blue-700">Sous 24h</div>
                            <div class="text-xs font-bold text-slate-700 mt-1">Affectation à l'Agent</div>
                            <p class="text-[11px] text-slate-500 mt-2">Le dossier est affecté à la direction compétente (Pensions, AMO, Recouvrement).</p>
                        </div>

                        <div class="p-4 rounded-xl bg-emerald-50 border border-emerald-200">
                            <div class="text-2xl font-black text-emerald-700">48h &ndash; 72h</div>
                            <div class="text-xs font-bold text-slate-700 mt-1">Résolution & Notification</div>
                            <p class="text-[11px] text-slate-500 mt-2">Information de la décision par email, notification et actualisation du statut.</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Section 4 : Foire Aux Questions (FAQ) -->
            <section class="space-y-6">
                <div class="border-b border-slate-200 pb-3">
                    <h2 class="text-xl font-extrabold text-[#0B3B60] flex items-center gap-2">
                        <i class="fas fa-question-circle text-blue-600"></i> 4. Foire Aux Questions Fréquentes (FAQ)
                    </h2>
                </div>

                <div class="space-y-4">
                    <div class="bg-white rounded-xl p-5 border border-slate-200 shadow-sm">
                        <h4 class="font-bold text-sm text-slate-900 mb-1">Puis-je déposer une réclamation pour un parent âgé ou incapable ?</h4>
                        <p class="text-xs text-slate-600 leading-relaxed">
                            Oui. En tant qu'ayant droit ou mandataire légal, vous pouvez créer un compte ou déposer une réclamation en précisant le nom et les références complètes du parent assuré (nom, numéro NINA, matricule de pension).
                        </p>
                    </div>

                    <div class="bg-white rounded-xl p-5 border border-slate-200 shadow-sm">
                        <h4 class="font-bold text-sm text-slate-900 mb-1">Que faire si je perds mon numéro de référence REC-XXXXXXXX ?</h4>
                        <p class="text-xs text-slate-600 leading-relaxed">
                            Si vous avez créé un Espace Assuré, votre dossier reste enregistré dans votre historique à vie. Si vous avez fait un dépôt sans compte, vous pouvez retrouver votre référence dans l'email de confirmation envoyé lors de la soumission.
                        </p>
                    </div>

                    <div class="bg-white rounded-xl p-5 border border-slate-200 shadow-sm">
                        <h4 class="font-bold text-sm text-slate-900 mb-1">Où s'adresser si je ne dispose pas de connexion internet ?</h4>
                        <p class="text-xs text-slate-600 leading-relaxed">
                            Vous pouvez vous présenter directement à la Cellule Accueil de la CMSS au Siège à Hamdallaye ACI 2000 à Bamako, ou auprès des Directions Régionales de Kayes, Koulikoro, Sikasso, Ségou, Mopti, Tombouctou, Gao et Kidal. Un conseiller enregistrera votre réclamation pour vous.
                        </p>
                    </div>
                </div>
            </section>

            <!-- Section 5 : Appel à l'action -->
            <div class="rounded-2xl bg-gradient-to-r from-[#0B3B60] to-[#124d7c] text-white p-8 text-center space-y-4">
                <h3 class="text-2xl font-black">Prêt à soumettre votre dossier ?</h3>
                <p class="text-xs sm:text-sm text-blue-100 max-w-lg mx-auto">
                    Créez votre compte en quelques clics ou déposez directement votre requête pour obtenir votre récépissé horodaté.
                </p>
                <div class="flex flex-wrap items-center justify-center gap-3 pt-2">
                    <a href="{{ route('register') }}" class="px-6 py-3 rounded-xl bg-white text-[#0B3B60] font-extrabold text-xs uppercase tracking-wider shadow-md hover:bg-blue-50 transition">
                        Créer mon Compte Assuré
                    </a>
                    <a href="{{ route('reclamation.publique') }}" class="px-6 py-3 rounded-xl bg-white/10 border border-white/30 text-white font-bold text-xs uppercase tracking-wider hover:bg-white/20 transition">
                        Déposer sans compte
                    </a>
                </div>
            </div>

        </div>

    </main>

    <!-- Pied de page -->
    <footer class="bg-slate-900 text-slate-400 text-xs py-8 border-t border-slate-800 text-center">
        <div class="max-w-7xl mx-auto px-4 space-y-2">
            <p>&copy; {{ date('Y') }} Caisse Malienne de Sécurité Sociale (CMSS) &mdash; Guichet Officiel des Réclamations &bull; République du Mali.</p>
            <p class="text-[11px] text-slate-500">Hamdallaye ACI 2000, BP 247, Bamako &bull; Standard : +223 20 22 45 00</p>
            <p class="text-[11px] text-slate-400 pt-2 border-t border-slate-800">
                Site officiel d'information générale : 
                <a href="https://cmss.ml" target="_blank" class="text-amber-300 hover:underline font-bold inline-flex items-center gap-1">
                    www.cmss.ml <i class="fas fa-external-link-alt text-[9px]"></i>
                </a>
            </p>
        </div>
    </footer>

</body>
</html>
