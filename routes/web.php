<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReclamationController;
use App\Http\Controllers\PublicReclamationController;
use App\Http\Controllers\CourrierController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RapportController;
use App\Http\Controllers\PushTokenController;

// Redirection accueil vers portail citoyen public
Route::get('/', function () {
    return redirect()->route('reclamation.publique');
});

// Portail public réclamation citoyen
Route::get('/soumettre-reclamation', [PublicReclamationController::class, 'index'])->name('reclamation.publique');
Route::post('/soumettre-reclamation', [PublicReclamationController::class, 'store'])->name('reclamation.publique.store');

// Espace authentifié (Agents & Administrateurs)
Route::middleware(['auth'])->group(function () {

    // Tableau de bord
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profil utilisateur
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Export PDF Réclamation
    Route::get('/reclamations/{reclamation}/pdf', [ReclamationController::class, 'exportPdf'])->name('reclamations.pdf');

    // Gestion des Réclamations
    Route::resource('reclamations', ReclamationController::class);
    Route::post('/push-token', [PushTokenController::class, 'store'])->name('push-token.store');

    // Gestion des Courriers
    Route::resource('courriers', CourrierController::class);

    // Gestion des Catégories
    Route::resource('categories', CategorieController::class);

    // Rapports et Statistiques
    Route::get('/rapports', [RapportController::class, 'index'])->name('rapports.index');

    // Gestion des Utilisateurs (Administrateur uniquement)
    Route::resource('users', UserController::class)->middleware('role:admin');
});

require __DIR__.'/auth.php';