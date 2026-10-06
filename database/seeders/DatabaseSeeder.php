<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Categorie;
use App\Models\Reclamation;
use App\Models\Courrier;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Administrateur Principal CMSS
        $admin = User::firstOrCreate(
            ['email' => 'admin@cmss.ml'],
            [
                'name'      => 'Direction Générale CMSS',
                'password'  => Hash::make('Admin@2026!'),
                'role'      => 'admin',
                'telephone' => '+223 20 22 45 00',
                'service'   => 'Direction des Systèmes d\'Information',
            ]
        );

        // 2. Agent de traitement des dossiers
        $agent = User::firstOrCreate(
            ['email' => 'agent@cmss.ml'],
            [
                'name'      => 'Mamadou Traoré',
                'password'  => Hash::make('Agent@2026!'),
                'role'      => 'agent',
                'telephone' => '+223 76 12 34 56',
                'service'   => 'Service Instruction & Réclamations',
            ]
        );

        // 3. Citoyen usager de test
        $citoyen = User::firstOrCreate(
            ['email' => 'assure@example.com'],
            [
                'name'      => 'Fatoumata Coulibaly',
                'password'  => Hash::make('Assure@2026!'),
                'role'      => 'utilisateur',
                'telephone' => '+223 65 43 21 00',
                'service'   => null,
            ]
        );

        // 4. Catégories officielles de prestations CMSS
        $categoriesData = [
            [
                'nom'         => 'Pensions et Retraites',
                'description' => 'Liquidation, calcul des droits, revalorisation et paiement des pensions de retraite des fonctionnaires et militaires.',
            ],
            [
                'nom'         => 'Immatriculation et Cotisations',
                'description' => 'Affiliation, attribution du numéro NINA/CMSS, mise à jour des relevés de carrière et historique des cotisations.',
            ],
            [
                'nom'         => 'Prestations Familiales',
                'description' => 'Allocations familiales, primes de maternité et déclarations des ayants droit.',
            ],
            [
                'nom'         => 'Accidents du Travail & Maladies Professionnelles',
                'description' => 'Déclaration des sinistres, prise en charge des soins médicaux et liquidation des rentes.',
            ],
            [
                'nom'         => 'Attestations et Certificats',
                'description' => 'Délivrance des attestations de non-paiement, certificat de radiation et relevé de carrière.',
            ],
            [
                'nom'         => 'Contentieux & Recours Administratifs',
                'description' => 'Réclamations formelles relatives à des retenues indues ou contestations de décisions.',
            ],
        ];

        $categories = [];
        foreach ($categoriesData as $cat) {
            $categories[] = Categorie::firstOrCreate(
                ['nom' => $cat['nom']],
                ['description' => $cat['description']]
            );
        }

        // 5. Exemples de Réclamations
        if (Reclamation::count() === 0) {
            Reclamation::create([
                'reference'       => 'REC-2026-001',
                'objet'           => 'Retard sur paiement pension de réversion',
                'description'     => 'Dossier déposé le mois dernier à l\'agence régionale de Sikasso, toujours sans versement sur le compte bancaire.',
                'statut'          => 'en_cours',
                'priorite'        => 'urgente',
                'user_id'         => $citoyen->id,
                'categorie_id'    => $categories[0]->id,
                'agent_id'        => $agent->id,
                'created_at'      => now()->subDays(5),
            ]);

            Reclamation::create([
                'reference'       => 'REC-2026-002',
                'objet'           => 'Mise à jour relevé de cotisations 2021-2024',
                'description'     => 'Certaines périodes d\'activité au Ministère de l\'Éducation ne figurent pas sur mon récapitulatif annuel.',
                'statut'          => 'en_attente',
                'priorite'        => 'normale',
                'user_id'         => $citoyen->id,
                'categorie_id'    => $categories[1]->id,
                'agent_id'        => null,
                'created_at'      => now()->subDays(2),
            ]);

            Reclamation::create([
                'reference'       => 'REC-2026-003',
                'objet'           => 'Rectification de l\'état civil sur carnet de pension',
                'description'     => 'Erreur sur l\'orthographe du nom de famille sur le certificat délivré.',
                'statut'          => 'traitee',
                'priorite'        => 'faible',
                'user_id'         => $citoyen->id,
                'categorie_id'    => $categories[4]->id,
                'agent_id'        => $agent->id,
                'date_traitement' => now()->subDay(),
                'created_at'      => now()->subDays(10),
            ]);
        }

        // 6. Exemples de Courriers administratifs
        if (Courrier::count() === 0) {
            Courrier::create([
                'reference'      => 'COU-2026-001',
                'objet'          => 'Transmission bordereau cotisations Ministère de la Santé',
                'description'    => 'Bordereau mensuel des retenues opérées au titre du mois précédent pour 145 agents.',
                'type'           => 'entrant',
                'statut'         => 'traite',
                'expediteur'     => 'Ministère de la Santé et du Développement Social',
                'destinataire'   => 'Direction Recouvrement CMSS',
                'date_reception' => now()->subDays(7)->toDateString(),
                'user_id'        => $agent->id,
            ]);

            Courrier::create([
                'reference'      => 'COU-2026-002',
                'objet'          => 'Notification liquidation pension de retraite militaire',
                'description'    => 'Transmission de l\'avis de liquidation et du titre de pension au bénéficiaire.',
                'type'           => 'sortant',
                'statut'         => 'en_cours',
                'expediteur'     => 'Direction des Prestations CMSS',
                'destinataire'   => 'État-Major Général des Armées',
                'date_envoi'     => now()->subDays(1)->toDateString(),
                'user_id'        => $admin->id,
            ]);
        }
    }
}
