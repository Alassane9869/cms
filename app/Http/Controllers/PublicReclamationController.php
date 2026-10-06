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

        // Équipes de direction & chaîne d'instruction des réclamations
        $equipe = [
            [
                'nom' => 'M. Ichaka Koné',
                'role' => 'Directeur Général',
                'direction' => 'Direction Générale CMSS',
                'statut' => 'Direction Active',
                'badge_color' => 'emerald',
                'image' => 'images/equipe/dg.jpg',
                'description' => 'Le Directeur Général dirige la Direction Générale et assure la gestion administrative, technique et financière de l\'organisme sous le contrôle du Conseil d\'Administration. Il veille à la qualité du service public et au traitement diligent des réclamations des usagers.',
            ],
            [
                'nom' => 'M. Bakary Traoré',
                'role' => 'Directeur des Prestations & Pensions',
                'direction' => 'Pôle Liquidation des Droits',
                'statut' => 'Instruction Réclamations Ouverte',
                'badge_color' => 'blue',
                'image' => 'images/equipe/prestations.jpg',
                'description' => 'Instruction technique et régularisation des réclamations portant sur les pensions de retraite, calculs d\'arrérages, pensions de réversion et rentes d\'ayants droit.',
            ],
            [
                'nom' => 'Mme Fatoumata Keïta',
                'role' => 'Directrice du Recouvrement & Immatriculation',
                'direction' => 'Pôle Contentieux AMO & Droits',
                'statut' => 'Instruction Réclamations Ouverte',
                'badge_color' => 'blue',
                'image' => 'images/equipe/recouvrement.jpg',
                'description' => 'Traitement des litiges de feuilles de soins AMO, contestations de rejets médicaux, régularisation des affiliations et délivrance des cartes biométriques.',
            ],
            [
                'nom' => 'Division Accueil, Écoute & Réclamations',
                'role' => 'Cellule Centrale d\'Écoute Usagers',
                'direction' => 'Centre de Traitement des Requêtes',
                'statut' => 'Permanence Ouverte (7h30 - 16h00)',
                'badge_color' => 'emerald',
                'image' => 'images/caisse.jpg',
                'description' => 'Guichet unique d\'enregistrement, de notification et d\'orientation de toutes les réclamations formulées par les fonctionnaires, retraités et veuves.',
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

        // Si l'utilisateur recherche un dossier avec son code de référence
        if ($request->filled('suivi')) {
            $reference = trim($request->suivi);
            $dossierSuivi = Reclamation::where('reference', $reference)->with('categorie')->first();
            if (!$dossierSuivi) {
                $refIntrouvable = true;
            }
            return view('public.reclamation', compact('categories', 'dossierSuivi', 'refIntrouvable'));
        }

        // Obligation réglementaire : création de compte & vérification OTP requises pour déposer
        if (!auth()->check()) {
            session(['url.intended' => route('reclamation.publique')]);
            return redirect()->route('register')
                ->with('info', 'Pour déposer une réclamation et garantir le suivi légal de votre dossier, vous devez créer votre Espace Assuré et confirmer votre adresse email par code de sécurité (OTP).');
        }

        if (!auth()->user()->hasVerifiedEmail()) {
            session(['url.intended' => route('reclamation.publique')]);
            return redirect()->route('otp.verify.notice')
                ->with('info', 'Veuillez saisir votre code de sécurité OTP reçu par email pour valider votre compte avant de déposer une réclamation.');
        }

        return view('public.reclamation', compact('categories', 'dossierSuivi', 'refIntrouvable'));
    }

    /**
     * Traitement de la soumission d'une réclamation
     */
    public function store(Request $request)
    {
        // Contrôle d'accès : Compte obligatoire et email vérifié par OTP
        if (!auth()->check()) {
            session(['url.intended' => route('reclamation.publique')]);
            return redirect()->route('register')
                ->with('info', 'Pour déposer une réclamation, vous devez d\'abord créer un compte et valider votre adresse email par code OTP.');
        }

        $user = auth()->user();

        if (!$user->hasVerifiedEmail()) {
            session(['url.intended' => route('reclamation.publique')]);
            return redirect()->route('otp.verify.notice')
                ->with('info', 'Veuillez d\'abord valider votre adresse email par code OTP.');
        }

        $request->validate([
            'objet'        => 'required|string|max:255',
            'description'  => 'required|string',
            'categorie_id' => 'nullable|exists:categories,id',
            'telephone'    => 'nullable|string|max:20',
        ]);

        // Mise à jour du téléphone si renseigné
        if ($request->filled('telephone') && empty($user->telephone)) {
            $user->update(['telephone' => $request->telephone]);
        }

        // Générer une référence unique officielle
        $reference = 'REC-' . strtoupper(Str::random(8));

        // Sauvegarder la réclamation liée au compte vérifié de l'usager
        $reclamation = Reclamation::create([
            'reference'    => $reference,
            'objet'        => $request->objet,
            'description'  => $request->description,
            'priorite'     => 'normale',
            'categorie_id' => $request->categorie_id,
            'user_id'      => $user->id,
            'statut'       => 'en_attente',
        ]);

        // Envoyer email officiel d'accusé de réception
        try {
            Mail::send('emails.reclamation_confirmation', [
                'nom'       => $user->name,
                'objet'     => $request->objet,
                'reference' => $reference,
            ], function($message) use ($user, $reference) {
                $message->to($user->email)
                        ->subject('Accusé de réception officiel de votre réclamation - ' . $reference);
            });
        } catch (\Throwable $e) {
            Log::warning('Email confirmation réclamation non délivré : ' . $e->getMessage());
        }

        return redirect()->route('reclamation.publique', ['suivi' => $reference])
                         ->with('success', 'Votre réclamation officielle a été enregistrée avec succès sous la référence ' . $reference . '. Un accusé de réception a été envoyé à ' . $user->email . '.');
    }
}