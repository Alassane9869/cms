<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reclamation;
use App\Models\Courrier;
use App\Models\Categorie;
use Carbon\Carbon;

class RapportController extends Controller
{
    public function index()
    {
        // Réclamations par statut
        $reclamationsParStatut = Reclamation::selectRaw('statut, count(*) as total')
            ->groupBy('statut')
            ->pluck('total', 'statut');

        // Réclamations par priorité
        $reclamationsParPriorite = Reclamation::selectRaw('priorite, count(*) as total')
            ->groupBy('priorite')
            ->pluck('total', 'priorite');

        // Réclamations par catégorie
        $reclamationsParCategorie = Categorie::withCount('reclamations')->get();

        // Réclamations des 6 derniers mois
        $reclamationsParMois = [];
        for ($i = 5; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $count = Reclamation::whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->count();
            $reclamationsParMois[$date->format('M Y')] = $count;
        }

        // Courriers par type
        $courriersParType = Courrier::selectRaw('type, count(*) as total')
            ->groupBy('type')
            ->pluck('total', 'type');

        return view('rapports.index', compact(
            'reclamationsParStatut',
            'reclamationsParPriorite',
            'reclamationsParCategorie',
            'reclamationsParMois',
            'courriersParType'
        ));
    }
}