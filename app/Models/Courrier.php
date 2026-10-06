<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courrier extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference',
        'objet',
        'description',
        'type',
        'statut',
        'expediteur',
        'destinataire',
        'date_reception',
        'date_envoi',
        'fichier',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}