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
    public function index()
    {
        $categories = Categorie::all();
        return view('public.reclamation', compact('categories'));
    }

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

        return redirect()->route('reclamation.publique')
                         ->with('success', 'Votre réclamation a été enregistrée avec succès ! Votre référence est : ' . $reference);
    }
}