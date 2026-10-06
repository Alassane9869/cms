-- ========================================================
-- Base de données : vuxe8870_cmss
-- Portail Officiel des Réclamations & Courriers CMSS Mali
-- Schéma de Production MySQL / cPanel
-- ========================================================

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO';
START TRANSACTION;
SET time_zone = '+00:00';

-- --------------------------------------------------------
-- Structure de la table `users`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp_code` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp_expires_at` timestamp NULL DEFAULT NULL,
  `role` enum('admin','agent','utilisateur') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'utilisateur',
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fcm_token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Données initiales pour `users`
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role`, `telephone`, `service`, `created_at`, `updated_at`, `fcm_token`, `otp_code`, `otp_expires_at`) VALUES ('1', 'Direction Générale CMSS', 'admin@cmss.ml', NULL, '$2y$12$A7IGsiRnJRzi5L6UFESF8OkCNeLgeOP7MFhhZyxWyE68Yh9nxZNzq', NULL, 'admin', '+223 20 22 45 00', 'Direction des Systèmes d''Information', '2026-10-06 16:39:52', '2026-10-06 16:39:52', NULL, NULL, NULL);
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role`, `telephone`, `service`, `created_at`, `updated_at`, `fcm_token`, `otp_code`, `otp_expires_at`) VALUES ('2', 'Mamadou Traoré', 'agent@cmss.ml', NULL, '$2y$12$Ty5YpzHRNCoJ5/dM1VZGA.zrWfTvaFVieoTEKLawcs7E9eqeXUZnq', NULL, 'agent', '+223 76 12 34 56', 'Service Instruction & Réclamations', '2026-10-06 16:39:53', '2026-10-06 16:39:53', NULL, NULL, NULL);
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role`, `telephone`, `service`, `created_at`, `updated_at`, `fcm_token`, `otp_code`, `otp_expires_at`) VALUES ('3', 'Fatoumata Coulibaly', 'assure@example.com', NULL, '$2y$12$jh1ElZJm0rgRvBUspLe5MeVopCz7kaAEebasdl5mOiEvicZO4iX9K', NULL, 'utilisateur', '+223 65 43 21 00', NULL, '2026-10-06 16:39:53', '2026-10-06 16:39:53', NULL, NULL, NULL);

-- --------------------------------------------------------
-- Structure de la table `categories`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Données initiales pour `categories`
INSERT INTO `categories` (`id`, `nom`, `description`, `created_at`, `updated_at`) VALUES ('1', 'Pensions et Retraites', 'Liquidation, calcul des droits, revalorisation et paiement des pensions de retraite des fonctionnaires et militaires.', '2026-10-06 16:39:53', '2026-10-06 16:39:53');
INSERT INTO `categories` (`id`, `nom`, `description`, `created_at`, `updated_at`) VALUES ('2', 'Immatriculation et Cotisations', 'Affiliation, attribution du numéro NINA/CMSS, mise à jour des relevés de carrière et historique des cotisations.', '2026-10-06 16:39:53', '2026-10-06 16:39:53');
INSERT INTO `categories` (`id`, `nom`, `description`, `created_at`, `updated_at`) VALUES ('3', 'Prestations Familiales', 'Allocations familiales, primes de maternité et déclarations des ayants droit.', '2026-10-06 16:39:53', '2026-10-06 16:39:53');
INSERT INTO `categories` (`id`, `nom`, `description`, `created_at`, `updated_at`) VALUES ('4', 'Accidents du Travail & Maladies Professionnelles', 'Déclaration des sinistres, prise en charge des soins médicaux et liquidation des rentes.', '2026-10-06 16:39:53', '2026-10-06 16:39:53');
INSERT INTO `categories` (`id`, `nom`, `description`, `created_at`, `updated_at`) VALUES ('5', 'Attestations et Certificats', 'Délivrance des attestations de non-paiement, certificat de radiation et relevé de carrière.', '2026-10-06 16:39:53', '2026-10-06 16:39:53');
INSERT INTO `categories` (`id`, `nom`, `description`, `created_at`, `updated_at`) VALUES ('6', 'Contentieux & Recours Administratifs', 'Réclamations formelles relatives à des retenues indues ou contestations de décisions.', '2026-10-06 16:39:53', '2026-10-06 16:39:53');

-- --------------------------------------------------------
-- Structure de la table `courriers`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `courriers`;
CREATE TABLE `courriers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `objet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('entrant','sortant') COLLATE utf8mb4_unicode_ci NOT NULL,
  `statut` enum('recu','en_cours','traite','archive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'recu',
  `expediteur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destinataire` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_reception` date DEFAULT NULL,
  `date_envoi` date DEFAULT NULL,
  `fichier` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `courriers_reference_unique` (`reference`),
  KEY `courriers_user_id_foreign` (`user_id`),
  CONSTRAINT `courriers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Données initiales pour `courriers`
INSERT INTO `courriers` (`id`, `reference`, `objet`, `description`, `type`, `statut`, `expediteur`, `destinataire`, `date_reception`, `date_envoi`, `fichier`, `user_id`, `created_at`, `updated_at`) VALUES ('1', 'COU-2026-001', 'Transmission bordereau cotisations Ministère de la Santé', 'Bordereau mensuel des retenues opérées au titre du mois précédent pour 145 agents.', 'entrant', 'traite', 'Ministère de la Santé et du Développement Social', 'Direction Recouvrement CMSS', '2026-09-29', NULL, NULL, '2', '2026-10-06 16:39:53', '2026-10-06 16:39:53');
INSERT INTO `courriers` (`id`, `reference`, `objet`, `description`, `type`, `statut`, `expediteur`, `destinataire`, `date_reception`, `date_envoi`, `fichier`, `user_id`, `created_at`, `updated_at`) VALUES ('2', 'COU-2026-002', 'Notification liquidation pension de retraite militaire', 'Transmission de l''avis de liquidation et du titre de pension au bénéficiaire.', 'sortant', 'en_cours', 'Direction des Prestations CMSS', 'État-Major Général des Armées', NULL, '2026-10-05', NULL, '1', '2026-10-06 16:39:53', '2026-10-06 16:39:53');

-- --------------------------------------------------------
-- Structure de la table `reclamations`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `reclamations`;
CREATE TABLE `reclamations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `objet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `statut` enum('en_attente','en_cours','traitee','rejetee') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en_attente',
  `priorite` enum('faible','normale','urgente') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'normale',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `categorie_id` bigint(20) UNSIGNED DEFAULT NULL,
  `agent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date_traitement` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `reclamations_reference_unique` (`reference`),
  KEY `reclamations_user_id_foreign` (`user_id`),
  KEY `reclamations_categorie_id_foreign` (`categorie_id`),
  KEY `reclamations_agent_id_foreign` (`agent_id`),
  CONSTRAINT `reclamations_agent_id_foreign` FOREIGN KEY (`agent_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `reclamations_categorie_id_foreign` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  CONSTRAINT `reclamations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Données initiales pour `reclamations`
INSERT INTO `reclamations` (`id`, `reference`, `objet`, `description`, `statut`, `priorite`, `user_id`, `categorie_id`, `agent_id`, `date_traitement`, `created_at`, `updated_at`) VALUES ('1', 'REC-2026-001', 'Retard sur paiement pension de réversion', 'Dossier déposé le mois dernier à l''agence régionale de Sikasso, toujours sans versement sur le compte bancaire.', 'en_cours', 'urgente', '3', '1', '2', NULL, '2026-10-01 16:39:53', '2026-10-06 16:39:53');
INSERT INTO `reclamations` (`id`, `reference`, `objet`, `description`, `statut`, `priorite`, `user_id`, `categorie_id`, `agent_id`, `date_traitement`, `created_at`, `updated_at`) VALUES ('2', 'REC-2026-002', 'Mise à jour relevé de cotisations 2021-2024', 'Certaines périodes d''activité au Ministère de l''Éducation ne figurent pas sur mon récapitulatif annuel.', 'en_attente', 'normale', '3', '2', NULL, NULL, '2026-10-04 16:39:53', '2026-10-06 16:39:53');
INSERT INTO `reclamations` (`id`, `reference`, `objet`, `description`, `statut`, `priorite`, `user_id`, `categorie_id`, `agent_id`, `date_traitement`, `created_at`, `updated_at`) VALUES ('3', 'REC-2026-003', 'Rectification de l''état civil sur carnet de pension', 'Erreur sur l''orthographe du nom de famille sur le certificat délivré.', 'traitee', 'faible', '3', '5', '2', '2026-10-05 16:39:53', '2026-09-26 16:39:53', '2026-10-06 16:39:53');

-- --------------------------------------------------------
-- Structure de la table `cache`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Structure de la table `cache_locks`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Structure de la table `jobs`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Structure de la table `job_batches`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Structure de la table `failed_jobs`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Structure de la table `migrations`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Données initiales pour `migrations`
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('1', '0001_01_01_000000_create_users_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('2', '0001_01_01_000001_create_cache_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('3', '0001_01_01_000002_create_jobs_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('4', '2026_06_29_201336_create_categories_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('5', '2026_06_29_201400_create_reclamations_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('6', '2026_06_29_201412_create_courriers_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('7', '2026_08_27_000000_add_fcm_token_to_users_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('8', '2026_10_06_190000_add_otp_fields_to_users_table', '2');

SET FOREIGN_KEY_CHECKS=1;
COMMIT;
