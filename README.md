<p align="center">
  <img src="public/images/logo.jpg" alt="Logo CMSS Mali" width="130" style="border-radius: 18px; box-shadow: 0 10px 25px rgba(11, 59, 96, 0.25);" />
</p>

<h1 align="center">Caisse Malienne de Sécurité Sociale (CMSS)</h1>

<p align="center">
  <strong>Portail Officiel des Réclamations, Requêtes & Gestion des Courriers Administratifs</strong><br>
  <em>République du Mali &bull; Un Peuple - Un But - Une Foi</em>
</p>

<p align="center">
  <a href="https://laravel.com"><img src="https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel 12" /></a>
  <a href="https://www.php.net"><img src="https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP 8.2+" /></a>
  <a href="https://tailwindcss.com"><img src="https://img.shields.io/badge/Tailwind_CSS-3.x-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white" alt="Tailwind CSS 3" /></a>
  <img src="https://img.shields.io/badge/Mali_CMSS-Officiel-0B3B60?style=for-the-badge&logo=gov&logoColor=white" alt="CMSS Mali" />
  <img src="https://img.shields.io/badge/Récépissés_PDF-Certifiés_SHA--256-CE1126?style=for-the-badge&logo=adobe-acrobat-reader&logoColor=white" alt="Certifié PDF" />
  <img src="https://img.shields.io/badge/Mobile_Ready-iOS_&_Android-1EB53A?style=for-the-badge&logo=apple&logoColor=white" alt="Mobile Ready" />
</p>

---

## 🌟 Présentation Institutionnelle

La **Caisse Malienne de Sécurité Sociale (CMSS)** est l'organisme public de référence chargé d'assurer la couverture sociale, le versement des pensions et la gestion des prestations pour les fonctionnaires civils, les magistrats et les personnels des Forces Armées et de Sécurité de la République du Mali, ainsi que leurs ayants droit.

Cette plateforme web moderne constitue le **guichet unique dématérialisé** permettant :
- Aux **Assurés Sociaux** (fonctionnaires, militaires, retraités, veuves et orphelins) de déposer leurs réclamations, d'en suivre l'instruction en temps réel et de télécharger un **Récépissé Officiel PDF certifié** opposable à l'administration.
- Aux **Agents & Directeurs de la CMSS** de traiter, orienter et résoudre les dossiers selon les exigences de célérité et de transparence républicaine (délai garanti sous **48h à 72h ouvrées**).
- Aux **Services Courriers** d'assurer la traçabilité intégrale des correspondances administratives entrantes et sortantes.

---

## 🏛️ Architecture Modulaire de la Plateforme

Chaque fonctionnalité a été conçue comme un **module autonome, aéré et spécialisé**, garantissant une séparation nette des responsabilités :

```
┌────────────────────────────────────────────────────────────────────────┐
│                        PORTAIL DIGITAL CMSS                            │
├───────────────────┬───────────────────┬────────────────────────────────┤
│  MODULE ASSURÉ    │  MODULE AGENT     │  MODULE COURRIER & DIRECTION   │
├───────────────────┼───────────────────┼────────────────────────────────┤
│ • Tableau de Bord │ • File d'attente  │ • Enregistrement courriers     │
│ • Dépôt dédié     │ • Instruction     │ • Affectation par service      │
│ • Historique REC  │ • Clôture/Avis    │ • Rapports statistiques        │
│ • Récépissé PDF   │ • Notification    │ • Gestion des utilisateurs     │
└───────────────────┴───────────────────┴────────────────────────────────┘
```

### 1. 📊 Mon Espace Assuré (Tableau de Bord Citoyen)
- **Route** : `/dashboard`
- **Rôle** : Centre de pilotage personnel de l'assuré avec ruban tricolore du Mali (`#1EB53A`, `#FCD116`, `#CE1126`), badge de vérification et coordonnées officielles.
- **Indicateurs Clés (KPIs)** :
  - 📂 **Total Déposées** : Volume global des dossiers enregistrés.
  - ⏳ **En Attente** : Requêtes en attente de prise en charge par un gestionnaire.
  - 🔄 **En Cours** : Dossiers en cours d'examen technique par les services de liquidation.
  - ✅ **Résolues** : Réclamations abouties et validées.
- **Accès Rapide** : Guichet des 3 régimes essentiels :
  - 💼 *Pensions & Retraites* (liquidation, arrérages, mensualisation).
  - 🏥 *Assurance Maladie Obligatoire (AMO)* (cartes, feuilles de soins, prises en charge).
  - 👨‍👩‍👧‍👦 *Prestations Familiales & Maternité* (allocations, naissances).

### 2. ✍️ Module Dédié de Dépôt de Réclamation
- **Route** : `/reclamations/create`
- **Rôle** : Formulaire officiel spacieux et guidé en 5 sections :
  1. **Domaine de Prestation** : Orientation automatique vers la direction compétente.
  2. **Degré d'Urgence** : 3 cartes interactives (*Faible*, *Normale 48h-72h*, *Urgente*).
  3. **Objet de la Demande** : Synthèse claire avec exemples contextuels.
  4. **Exposé Circonstancié des Faits** : Références de pension, matricule solde, centre CMSS concerné.
  5. **Engagement sur l'Honneur** : Déclaration légale et bouton de transmission sécurisée.

### 3. 📁 Registre & Historique des Réclamations
- **Route** : `/reclamations`
- **Rôle** : Suivi exhaustif de toutes les requêtes déposées :
  - **Onglets dynamiques par statut** : *Toutes*, *En attente*, *En cours*, *Résolues*, *Rejetées* avec compteurs en direct.
  - **Moteur de recherche** : Par référence officielle `REC-XXXXXXXX` ou mots-clés.
  - **Double affichage responsive** : Tableau riche sur grand écran et cartes tactiles ergonomiques sur smartphone.
  - **Actions instantanées** : Consultation du suivi et téléchargement direct du PDF.

### 4. 📜 Fiche Détaillée du Dossier & Progression
- **Route** : `/reclamations/{id}`
- **Rôle** : Vue administrative complète avec **timeline chronologique à 3 étapes** :
  - `Étape 1` : **Dépôt initial** (date, heure et enregistrement).
  - `Étape 2` : **Instruction technique** (examen par les directions CMSS).
  - `Étape 3` : **Décision / Résolution finale** (validation ou rejet motivé).

### 5. 📄 Récépissé Officiel Certifié (PDF Haute Définition)
- **Route** : `/reclamations/{id}/pdf`
- **Moteur** : Générateur DomPDF optimisé avec logos vectoriels et base64 intégrés.
- **Éléments de Sécurité Institutionnels** :
  - En-tête aux armoiries officielles de la République du Mali et devise nationale.
  - Numéro de référence unique `REC-XXXXXXXX` opposable aux administrations.
  - Empreinte de sécurité cryptographique **SHA-256**.
  - Cachet et signature de la Direction de la Liquidation des Pensions et Prestations.
  - Rappel du cadre légal et des voies de recours sous 30 jours.

### 6. 📬 Gestion Électronique des Courriers (GEC)
- **Route** : `/courriers`
- **Rôle** : Numérotation séquentielle, classement et archivage des courriers entrants et sortants pour le secrétariat et les directions régionales.

### 7. 👥 Gestion des Rôles & Sécurité (RBAC)
- **Route** : `/users`, `/categories`, `/rapports`
- **Rôle** : Contrôle strict des habilitations administratives :
  - `admin` : Superviseur, gestion des agents, indicateurs globaux, configuration.
  - `agent` : Instructeur technique, changement de statut, traitement opérationnel.
  - `utilisateur` : Assuré citoyen avec cloisonnement strict (ne consulte que ses propres dossiers).

### 8. 👤 Mon Profil Assuré
- **Route** : `/profile`
- **Rôle** : Mise à jour des coordonnées personnelles, numéro de téléphone de contact et renouvellement sécurisé du mot de passe.

---

## 📱 Ergonomie Mobile & Compatibilité Tactile

L'application respecte les standards les plus exigeants pour smartphones :
- **iPhone (iOS Safari)** : Prise en compte intégrale des encoches et de la Dynamic Island (`viewport-fit=cover`, `--sat`, `--sab`).
- **Android (Chrome)** : Palette institutionnelle CMSS (`theme-color: #0B3B60`), cibles tactiles de 44px minimum.
- **Barre de Navigation Inférieure (Bottom Tab Bar)** :
  - 🏠 **Accueil** (`/dashboard`)
  - 📂 **Dossiers** (`/reclamations`)
  - ➕ **Bouton Central Surélevé `+ Réclamer`** (`/reclamations/create`)
  - 📖 **Guide** (`/guide-reclamation`)
  - 👤 **Profil** (`/profile`)

---

## 🔑 Identifiants & Comptes de Démonstration

La base de données pré-remplie (`php artisan db:seed`) contient les comptes de test opérationnels suivants :

| Rôle | Adresse E-mail | Mot de Passe | Prérogatives |
| :--- | :--- | :--- | :--- |
| **🛡️ Direction Générale (Admin)** | `admin@cmss.ml` | `Admin@2026!` | Accès total : Direction, Utilisateurs, Statistiques, Courriers, Réclamations. |
| **👔 Agent Instructeur (Agent)** | `agent@cmss.ml` | `Agent@2026!` | Traitement technique des réclamations, attribution, mise à jour des statuts. |
| **👤 Assuré Social (Citoyen)** | `assure@example.com` | `Assure@2026!` | Espace citoyen test : Dépôt de requêtes, suivi en direct, récépissés PDF. |

> [!NOTE]
> Les comptes administratifs (`admin@cmss.ml` et `agent@cmss.ml`) bénéficient d'une **exemption automatique de code OTP** et accèdent directement au tableau de bord.

---

## 🚀 Installation Locale en 3 Minutes

### 1. Prérequis
- **PHP** : `^8.2` (extensions requises : `pdo_sqlite`, `mbstring`, `fileinfo`, `gd`, `openssl`)
- **Composer** : `^2.5`
- **Node.js** : `^18.0` & **NPM** : `^9.0`

### 2. Cloner et installer les dépendances

```bash
# Cloner le dépôt
git clone https://github.com/Alassane9869/cms.git cmss
cd cmss

# Installer les dépendances PHP et Node
composer install
npm install
npm run build
```

### 3. Configurer et initialiser l'environnement

```bash
# Copier le fichier d'environnement
cp .env.example .env

# Générer la clé applicative
php artisan key:generate

# Initialiser la base de données avec les comptes et catégories CMSS
php artisan migrate:fresh --seed

# Créer le lien symbolique pour les pièces jointes
php artisan storage:link
```

### 4. Démarrer le serveur de développement

```bash
php artisan serve
```

L'application est immédiatement accessible sur **`http://localhost:8000`**.

---

## 🌐 Déploiement en Production (Serveur o2switch / cPanel)

Pour actualiser le site en ligne sur un serveur d'hébergement cPanel :

```bash
cd /home/vuxe8870/repositories/cms && \
git pull origin main && \
/bin/rsync -a --chmod=D755,F644 --exclude='.git' --exclude='node_modules' --exclude='.env' /home/vuxe8870/repositories/cms/ /home/vuxe8870/cmss.danayaplus.com/ && \
cd /home/vuxe8870/cmss.danayaplus.com && \
php artisan optimize:clear && \
php artisan view:cache
```

*(Si votre dossier webroot s'intitule `cmss9869.com`, remplacez simplement `cmss.danayaplus.com` par `cmss9869.com`).*

---

## 🧪 Tests Automatisés & Qualité

Le projet dispose d'une suite de tests automatisés (Unitaires et Fonctionnels) validant l'ensemble des parcours critiques :

```bash
php artisan test
```

Résultats :
```text
   PASS  Tests\Unit\ExampleTest
  ✓ that true is true

   PASS  Tests\Feature\ExampleTest
  ✓ home page is accessible
  ✓ guide page is accessible
  ✓ unauthenticated user is redirected to register for reclamation
  ✓ verified user can access reclamation form
  ✓ user can verify email with otp code
  ✓ citizen dashboard is accessible for utilisateur
  ✓ admin dashboard is accessible for admin

  Tests:    8 passed (15 assertions)
  Duration: 4.12s
```

---

## 📂 Structure du Répertoire

```text
cmss/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Auth/                 # Authentification, OTP & Sessions
│   │   │   ├── DashboardController.php
│   │   │   ├── ReclamationController.php
│   │   │   ├── PublicReclamationController.php
│   │   │   ├── CourrierController.php
│   │   │   └── CategorieController.php
│   │   └── Middleware/
│   │       └── CheckRole.php         # Contrôle d'accès par rôle (RBAC)
│   ├── Models/                       # Eloquent: User, Reclamation, Courrier, Categorie
│   └── Notifications/                # Alertes e-mail transactionnelles
├── database/
│   ├── migrations/                   # Schémas relationnels
│   └── seeders/
│       └── DatabaseSeeder.php        # Données de référence et comptes initiaux
├── public/
│   ├── build/                        # Assets CSS/JS compilés de production
│   └── images/                       # Logotypes officiels CMSS & Armoiries du Mali
├── resources/
│   ├── views/
│   │   ├── citoyen/                  # Mon Espace Assuré
│   │   ├── reclamations/             # Formulaires, Registre et Template PDF
│   │   ├── courriers/                # Gestion des courriers
│   │   ├── layouts/                  # Gabarits responsive (App & Guest)
│   │   └── public/                   # Portail public et Guide des démarches
│   └── css/                          # Feuilles de styles Tailwind
└── routes/
    ├── web.php                       # Routes métier et guichet public
    └── auth.php                      # Routes d'authentification et OTP
```

---

## 🛡️ Sécurité & Conformité Réglementaire

- **Protection CSRF** sur toutes les soumissions et formulaires de déconnexion.
- **Hashage fort des mots de passe** via `bcrypt`.
- **Validation stricte des types MIME** sur les pièces jointes (PDF, DOCX, JPG, PNG).
- **Audit cryptographique SHA-256** apposé sur chaque récépissé officiel.
- **Cloisonnement multi-locataire** : un assuré ne peut en aucun cas accéder aux dossiers d'un tiers.

---

## 🏛️ Mentions Officielles

&copy; **2026 Caisse Malienne de Sécurité Sociale (CMSS)**  
*Ministère de la Santé et du Développement Social &bull; République du Mali*  
Direction Générale : Quartier du Fleuve, Bamako, Mali  
Standard Téléphonique : **+223 20 22 45 00** &bull; Portail : **cmss.ml**
