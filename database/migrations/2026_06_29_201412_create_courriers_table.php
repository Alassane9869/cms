<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('courriers', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->unique();
            $table->string('objet');
            $table->text('description')->nullable();
            $table->enum('type', ['entrant', 'sortant']);
            $table->enum('statut', ['recu', 'en_cours', 'traite', 'archive'])->default('recu');
            $table->string('expediteur');
            $table->string('destinataire');
            $table->date('date_reception')->nullable();
            $table->date('date_envoi')->nullable();
            $table->string('fichier')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('courriers');
    }
};