<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reclamation;
use App\Models\Categorie;
use App\Notifications\ReclamationCreee;
use App\Notifications\ReclamationTraitee;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;

class ReclamationController extends Controller
{
    public function index(Request $request)
    {
        $query = Reclamation::with(['user', 'categorie']);

        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('reference', 'like', '%' . $request->search . '%')
                  ->orWhere('objet', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('statut')) {
            $query->where('statut', $request->statut);
        }

        if ($request->filled('priorite')) {
            $query->where('priorite', $request->priorite);
        }

        $reclamations = $query->latest()->paginate(10)->withQueryString();
        return view('reclamations.index', compact('reclamations'));
    }

    public function create()
    {
        $categories = Categorie::all();
        return view('reclamations.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'objet'        => 'required|string|max:255',
            'description'  => 'required|string',
            'priorite'     => 'required|in:faible,normale,urgente',
            'categorie_id' => 'nullable|exists:categories,id',
        ]);

        $reclamation = Reclamation::create([
            'reference'    => 'REC-' . strtoupper(Str::random(8)),
            'objet'        => $request->objet,
            'description'  => $request->description,
            'priorite'     => $request->priorite,
            'categorie_id' => $request->categorie_id,
            'user_id'      => auth()->id(),
            'statut'       => 'en_attente',
        ]);

        try {
            auth()->user()->notify(new ReclamationCreee($reclamation));
        } catch (\Throwable $e) {
            \Illuminate\Support\Facades\Log::info('Notification email non délivrée: ' . $e->getMessage());
        }

        if (auth()->user()->isCitoyen()) {
            return redirect()->route('dashboard')
                             ->with('success', 'Votre réclamation (' . $reclamation->reference . ') a été transmise avec succès aux services de la CMSS !');
        }

        return redirect()->route('reclamations.index')
                         ->with('success', 'Réclamation créée avec succès !');
    }

    public function show(Reclamation $reclamation)
    {
        if (auth()->user()->isCitoyen() && $reclamation->user_id !== auth()->id()) {
            abort(403, 'Vous n\'êtes pas autorisé à consulter ce dossier.');
        }

        return view('reclamations.show', compact('reclamation'));
    }

    public function edit(Reclamation $reclamation)
    {
        if (auth()->user()->isCitoyen()) {
            abort(403, 'Seuls les agents de la CMSS peuvent instruire cette réclamation.');
        }

        $categories = Categorie::all();
        return view('reclamations.edit', compact('reclamation', 'categories'));
    }

    public function update(Request $request, Reclamation $reclamation)
    {
        if (auth()->user()->isCitoyen()) {
            abort(403, 'Action non autorisée.');
        }

        $validated = $request->validate([
            'objet'        => 'required|string|max:255',
            'description'  => 'required|string',
            'priorite'     => 'required|in:faible,normale,urgente',
            'statut'       => 'required|in:en_attente,en_cours,traitee,rejetee',
            'categorie_id' => 'nullable|exists:categories,id',
        ]);

        $ancienStatut = $reclamation->statut;

        $reclamation->update($validated);

        if ($ancienStatut !== 'traitee' && $reclamation->statut === 'traitee') {
            $reclamation->load('user');
            if ($reclamation->user) {
                try {
                    $reclamation->user->notify(new ReclamationTraitee($reclamation));
                } catch (\Throwable $e) {
                    \Illuminate\Support\Facades\Log::info('Notification email non délivrée: ' . $e->getMessage());
                }

                try {
                    app(\App\Services\FirebaseService::class)->sendReclamationTraitee($reclamation->user, $reclamation->reference);
                } catch (\Throwable $e) {
                    \Illuminate\Support\Facades\Log::info('Notification FCM non envoyee: ' . $e->getMessage());
                }
            }
        }

        return redirect()->route('reclamations.index')
                         ->with('success', 'Réclamation mise à jour !');
    }

    public function destroy(Reclamation $reclamation)
    {
        if (auth()->user()->isCitoyen()) {
            abort(403, 'Suppression non autorisée pour un assuré particulier.');
        }

        $reclamation->delete();
        return redirect()->route('reclamations.index')
                         ->with('success', 'Réclamation supprimée !');
    }

    public function exportPdf(Reclamation $reclamation)
    {
        if (auth()->user()->isCitoyen() && $reclamation->user_id !== auth()->id()) {
            abort(403, 'Accès non autorisé à ce document.');
        }

        $pdf = Pdf::loadView('reclamations.pdf', compact('reclamation'));
        return $pdf->download('reclamation-' . $reclamation->reference . '.pdf');
    }
}