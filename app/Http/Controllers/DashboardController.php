<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reclamation;
use App\Models\Courrier;
use App\Models\Categorie;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // 1. Si l'utilisateur est un particulier (Assuré social citoyen)
        if ($user->role === 'utilisateur') {
            $mesReclamations = $user->reclamations()
                ->with(['categorie', 'agent'])
                ->latest()
                ->paginate(10);

            $totalDeposees = $user->reclamations()->count();
            $enAttente = $user->reclamations()->where('statut', 'en_attente')->count();
            $enCours = $user->reclamations()->where('statut', 'en_cours')->count();
            $traitees = $user->reclamations()->where('statut', 'traitee')->count();
            $categories = Categorie::all();

            return view('citoyen.dashboard', compact(
                'user',
                'mesReclamations',
                'totalDeposees',
                'enAttente',
                'enCours',
                'traitees',
                'categories'
            ));
        }

        // 2. Si l'utilisateur est un Agent ou un Administrateur CMSS
        $totalReclamations = Reclamation::count();
        $reclamationsEnAttente = Reclamation::where('statut', 'en_attente')->count();
        $reclamationsTraitees = Reclamation::where('statut', 'traitee')->count();
        $totalCourriers = Courrier::count();
        $courriersEntrants = Courrier::where('type', 'entrant')->count();
        $courriersSortants = Courrier::where('type', 'sortant')->count();
        $totalUsers = User::count();

        return view('dashboard', compact(
            'totalReclamations',
            'reclamationsEnAttente',
            'reclamationsTraitees',
            'totalCourriers',
            'courriersEntrants',
            'courriersSortants',
            'totalUsers'
        ));
    }
}