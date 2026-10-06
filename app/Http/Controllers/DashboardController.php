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