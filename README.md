# 🏛️ CMSS &mdash; Système Intégré de Gestion des Réclamations et Courriers

Système web moderne et sécurisé conçu pour la **Caisse Malienne de Sécurité Sociale (CMSS)**. La plateforme permet la dématérialisation et le traitement transparent des réclamations des assurés sociaux ainsi que le suivi rigoureux du flux des courriers administratifs entrants et sortants.

---

## 🌟 Fonctionnalités Clés

### 1. 📢 Portail Citoyen & Usagers (Accès Public)
- **Dépôt sans pré-requis** : Soumission simplifiée de réclamations sans obligation de créer un compte à l'avance.
- **Référence unique horodatée** : Attribution instantanée d'un identifiant de dossier (ex: `REC-2026-001`).
- **Confirmation immédiate** : Récapitulatif à l'écran et envoi d'un courriel de confirmation.
- **Interface Mobile-First** : Formulaire 100% responsive adapté aux téléphones, tablettes et ordinateurs.

### 2. 🗂️ Gestion des Réclamations (Espace Agents & Direction)
- **Cycle de vie complet** : États *En attente*, *En cours d'instruction*, *Traitée*, *Rejetée*.
- **Gestion des priorités** : Priorisation des dossiers urgents avec indicateurs visuels.
- **Filtrage multicritères** : Recherche par référence, objet, statut, priorité et catégorie.
- **Édition & Export PDF** : Génération en un clic d'une fiche officielle récapitulative au format PDF téléchargeable.
- **Notifications assurés** : Alerte email automatique lors de la clôture et de la disponibilité du dossier.

### 3. ✉️ Gestion des Courriers Administratifs
- **Flux entrant & sortant** : Numérisation et archivage des correspondances avec ministères, employeurs et partenaires.
- **Gestion des pièces jointes** : Téléversement sécurisé de bordereaux et documents justificatifs (PDF, Word, Images).
- **Purge propre** : Nettoyage physique automatique des anciens fichiers sur le serveur lors des suppressions.

### 4. 📊 Tableau de Bord & Rapports Analytiques
- Statistiques en temps réel sur les volumes de réclamations et courriers.
- Répartition par catégorie de prestation (Pensions, Cotisations, Prestations familiales, etc.).
- Graphiques d'évolution mensuelle et taux de traitement.

### 5. 🔐 Administration & Sécurité (RBAC)
- **Contrôle d'accès par rôle** :
  - `admin` : Accès global, administration des agents, gestion des catégories et configuration.
  - `agent` : Instruction des dossiers, gestion des courriers, mise à jour des statuts.
  - `utilisateur` : Consultation citoyenne.
- Protection stricte contre les attaques CSRF, injections SQL et failles d'assignation de masse (Mass Assignment).

---

## 🚀 Démarrage Rapide (Environnement Prêt à l'Emploi)

Le projet est configuré par défaut sur **SQLite** pour une portabilité maximale sans aucune configuration complexe de serveur de base de données.

### 1. Prérequis
- **PHP** : version 8.2 ou supérieure (avec extensions `pdo_sqlite`, `mbstring`, `fileinfo`, `gd`, `openssl`).
- **Composer** : gestionnaire de paquets PHP.
- **Node.js** : v18+ & **NPM** : pour les assets Vite.

### 2. Installation en 3 étapes

```bash
# 1. Cloner ou ouvrir le projet dans votre terminal
cd cmss

# 2. Installer les dépendances
composer install
npm install
npm run build

# 3. Initialiser la base de données et les données de démonstration
php artisan migrate:fresh --seed
php artisan storage:link
```

### 3. Lancer l'application

```bash
php artisan serve
```

L'application est immédiatement accessible sur : **`http://localhost:8000`**
- **Portail Citoyen** : `http://localhost:8000/soumettre-reclamation`
- **Espace Agent / Admin** : `http://localhost:8000/login`

---

## 🔑 Comptes & Identifiants de Démonstration

La base de données pré-remplie (`php artisan db:seed`) fournit les comptes de test suivants :

| Rôle | Adresse E-mail | Mot de passe | Description |
| :--- | :--- | :--- | :--- |
| **Administrateur** | `admin@cmss.ml` | `Admin@2026!` | Accès complet (Dashboard, Utilisateurs, Catégories, Courriers, Réclamations) |
| **Agent Instructeur** | `agent@cmss.ml` | `Agent@2026!` | Traitement des réclamations, gestion des courriers |
| **Assuré Citoyen** | `assure@example.com` | `Assure@2026!` | Compte usager de test |

---

## ⚙️ Configuration Avancée & Production (MySQL)

Pour déployer en production sur un serveur MySQL / MariaDB :

1. Éditer le fichier `.env` :
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=cmss_db
DB_USERNAME=votre_utilisateur
DB_PASSWORD=votre_mot_de_passe
```

2. Exécuter les migrations et le remplissage :
```bash
php artisan migrate --force --seed
```

3. Optimiser l'application pour la production :
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
npm run build
```

---

## 📂 Structure du Projet

```text
cmss/
├── app/
│   ├── Http/Controllers/       # Contrôleurs métier (Courrier, Réclamation, Dashboard...)
│   ├── Http/Middleware/        # Vérification des rôles (CheckRole)
│   ├── Models/                 # Modèles Eloquent (Reclamation, Courrier, Categorie, User)
│   ├── Notifications/          # Notifications par mail (création, traitement)
│   └── Services/               # Services tiers (Firebase Web Push)
├── database/
│   ├── migrations/             # Schémas de base de données
│   └── seeders/                # Données initiales & comptes démo
├── public/
│   ├── images/                 # Identité visuelle CMSS (logo, illustrations)
│   └── storage/                # Lien symbolique vers les pièces jointes
├── resources/
│   ├── views/                  # Vues Blade (layouts, dashboard, réclamations, courriers)
│   ├── css/                    # Styles Tailwind CSS
│   └── js/                     # Scripts Alpine.js et intégration client
└── routes/
    ├── web.php                 # Routes applicatives et portail public
    └── auth.php                # Authentification sécurisée
```

---

## 🛡️ Sécurité & Bonnes Pratiques

- **Sessions et Tokens** : Sessions sécurisées et protection CSRF active sur toutes les requêtes d'écriture et de déconnexion.
- **Stockage étanche** : Fichiers téléversés isolés et contrôlés par type MIME (PDF, Word, JPG, PNG).
- **Secrets protégés** : Le fichier `.gitignore` isole strictement les clés d'API et comptes de service JSON.

---

&copy; 2026 **Caisse Malienne de Sécurité Sociale (CMSS)** &mdash; Tous droits réservés.
