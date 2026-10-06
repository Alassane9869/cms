<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\Reclamation;
use App\Models\Categorie;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PublicReclamationController extends Controller
{
    /**
     * Page d'accueil publique officielle de la CMSS
     */
    public function home(Request $request)
    {
        $categories = Categorie::all();
        $totalReclamations = Reclamation::count();
        $reclamationsTraitees = Reclamation::where('statut', 'traitee')->count();
        $tauxResolution = $totalReclamations > 0 ? round(($reclamationsTraitees / $totalReclamations) * 100) : 98;

        // Suivi express direct depuis la page d'accueil
        $dossierSuivi = null;
        $refIntrouvable = false;
        if ($request->filled('suivi')) {
            $reference = trim($request->suivi);
            $dossierSuivi = Reclamation::where('reference', $reference)->with('categorie')->first();
            if (!$dossierSuivi) {
                $refIntrouvable = true;
            }
        }

        // Équipes dirigeantes & départements opérationnels
        $equipe = [
            [
                'nom' => 'M. Ichaka Koné',
                'role' => 'Directeur Général',
                'direction' => 'Direction Générale CMSS',
                'statut' => 'Direction Active',
                'badge_color' => 'emerald',
                'image' => 'images/equipe/dg.jpg',
                'description' => 'Le Directeur Général dirige la Direction Générale et assure la gestion administrative, technique et financière de l\'organisme sous le contrôle du Conseil d\'Administration.',
            ],
            [
                'nom' => 'M. Bakary Traoré',
                'role' => 'Directeur des Prestations & Pensions',
                'direction' => 'Direction de la Liquidation',
                'statut' => 'Guichets Opérationnels',
                'badge_color' => 'blue',
                'image' => 'images/equipe/prestations.jpg',
                'description' => 'Liquidation des pensions civiles et militaires, instruction des dossiers de réversion et versement régulier des arrérages.',
            ],
            [
                'nom' => 'Mme Fatoumata Keïta',
                'role' => 'Directrice du Recouvrement & Immatriculation',
                'direction' => 'Direction AMO & Cotisations',
                'statut' => 'Service Opérationnel',
                'badge_color' => 'blue',
                'image' => 'images/equipe/recouvrement.jpg',
                'description' => 'Immatriculation des nouveaux fonctionnaires, délivrance des attestations et contrôle de la conformité des droits AMO.',
            ],
            [
                'nom' => 'Division Accueil, Écoute & Réclamations',
                'role' => 'Pôle Assistance & Usagers',
                'direction' => 'Centre de Relation Citoyens',
                'statut' => 'Permanence Ouverte (7h30 - 16h00)',
                'badge_color' => 'emerald',
                'image' => 'images/caisse.jpg',
                'description' => 'Prise en charge continue des usagers au siège et dans les 9 agences régionales, instruction rapide des litiges.',
            ],
        ];

        return view('public.home', compact(
            'categories',
            'totalReclamations',
            'reclamationsTraitees',
            'tauxResolution',
            'dossierSuivi',
            'refIntrouvable',
            'equipe'
        ));
    }

    /**
     * Page explicative détaillée "Comment faire une réclamation"
     */
    public function guide()
    {
        $categories = Categorie::all();
        return view('public.guide', compact('categories'));
    }

    /**
     * Page de soumission directe d'une réclamation et consultation
     */
    public function index(Request $request)
    {
        $categories = Categorie::all();
        $dossierSuivi = null;
        $refIntrouvable = false;

        if ($request->filled('suivi')) {
            $reference = trim($request->suivi);
            $dossierSuivi = Reclamation::where('reference', $reference)->with('categorie')->first();
            if (!$dossierSuivi) {
                $refIntrouvable = true;
            }
        }

        return view('public.reclamation', compact('categories', 'dossierSuivi', 'refIntrouvable'));
    }

    /**
     * Traitement de la soumission publique
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom'          => 'required|string|max:255',
            'email'        => 'required|email',
            'telephone'    => 'nullable|string|max:20',
            'objet'        => 'required|string|max:255',
            'description'  => 'required|string',
            'categorie_id' => 'nullable|exists:categories,id',
        ]);

        // Créer ou trouver l'utilisateur citoyen
        $user = User::firstOrCreate(
            ['email' => $request->email],
            [
                'name'      => $request->nom,
                'password'  => Hash::make(Str::random(12)),
                'role'      => 'utilisateur',
                'telephone' => $request->telephone,
            ]
        );

        // Générer une référence unique
        $reference = 'REC-' . strtoupper(Str::random(8));

        // Sauvegarder la réclamation dans la base de données
        $reclamation = Reclamation::create([
            'reference'    => $reference,
            'objet'        => $request->objet,
            'description'  => $request->description,
            'priorite'     => 'normale',
            'categorie_id' => $request->categorie_id,
            'user_id'      => $user->id,
            'statut'       => 'en_attente',
        ]);

        $nom   = $request->nom;
        $email = $request->email;
        $objet = $request->objet;

        // Envoyer email de confirmation au citoyen (avec tolérance aux pannes réseau)
        try {
            Mail::send('emails.reclamation_confirmation', [
                'nom'       => $nom,
                'objet'     => $objet,
                'reference' => $reference,
            ], function($message) use ($email, $reference) {
                $message->to($email)
                        ->subject('Confirmation de votre réclamation - ' . $reference);
            });
        } catch (\Throwable $e) {
            \Illuminate\Support\Facades\Log::warning('Email confirmation réclamation non délivré : ' . $e->getMessage());
        }

        return redirect()->route('reclamation.publique', ['suivi' => $reference])
                         ->with('success', 'Votre réclamation a été enregistrée avec succès ! Référence officielle attribuée : ' . $reference);
    }
}