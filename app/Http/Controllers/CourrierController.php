<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courrier;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CourrierController extends Controller
{
    public function index()
    {
        $courriers = Courrier::with('user')->latest()->paginate(10);
        return view('courriers.index', compact('courriers'));
    }

    public function create()
    {
        return view('courriers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'objet'          => 'required|string|max:255',
            'description'    => 'nullable|string',
            'type'           => 'required|in:entrant,sortant',
            'expediteur'     => 'required|string|max:255',
            'destinataire'   => 'required|string|max:255',
            'date_reception' => 'nullable|date',
            'date_envoi'     => 'nullable|date',
            'fichier'        => 'nullable|file|mimes:pdf,doc,docx,jpg,png|max:5120',
        ]);

        $fichier = null;
        if ($request->hasFile('fichier')) {
            $fichier = $request->file('fichier')->store('courriers', 'public');
        }

        do {
            $reference = 'COU-' . strtoupper(Str::random(8));
        } while (Courrier::where('reference', $reference)->exists());

        Courrier::create([
            'reference'      => $reference,
            'objet'          => $validated['objet'],
            'description'    => $validated['description'] ?? null,
            'type'           => $validated['type'],
            'statut'         => 'recu',
            'expediteur'     => $validated['expediteur'],
            'destinataire'   => $validated['destinataire'],
            'date_reception' => $validated['date_reception'] ?? null,
            'date_envoi'     => $validated['date_envoi'] ?? null,
            'fichier'        => $fichier,
            'user_id'        => auth()->id(),
        ]);

        return redirect()->route('courriers.index')
                         ->with('success', 'Courrier ajouté avec succès !');
    }

    public function show(Courrier $courrier)
    {
        return view('courriers.show', compact('courrier'));
    }

    public function edit(Courrier $courrier)
    {
        return view('courriers.edit', compact('courrier'));
    }

    public function update(Request $request, Courrier $courrier)
    {
        $validated = $request->validate([
            'objet'          => 'required|string|max:255',
            'description'    => 'nullable|string',
            'type'           => 'required|in:entrant,sortant',
            'statut'         => 'required|in:recu,en_cours,traite,archive',
            'expediteur'     => 'required|string|max:255',
            'destinataire'   => 'required|string|max:255',
            'date_reception' => 'nullable|date',
            'date_envoi'     => 'nullable|date',
            'fichier'        => 'nullable|file|mimes:pdf,doc,docx,jpg,png|max:5120',
        ]);

        if ($request->hasFile('fichier')) {
            if ($courrier->fichier && Storage::disk('public')->exists($courrier->fichier)) {
                Storage::disk('public')->delete($courrier->fichier);
            }
            $validated['fichier'] = $request->file('fichier')->store('courriers', 'public');
        } else {
            unset($validated['fichier']);
        }

        $courrier->update($validated);

        return redirect()->route('courriers.index')
                         ->with('success', 'Courrier mis à jour !');
    }

    public function destroy(Courrier $courrier)
    {
        if ($courrier->fichier && Storage::disk('public')->exists($courrier->fichier)) {
            Storage::disk('public')->delete($courrier->fichier);
        }

        $courrier->delete();

        return redirect()->route('courriers.index')
                         ->with('success', 'Courrier supprimé avec succès !');
    }
}