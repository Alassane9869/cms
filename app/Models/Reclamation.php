<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reclamation extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference',
        'objet',
        'description',
        'statut',
        'priorite',
        'user_id',
        'categorie_id',
        'agent_id',
        'date_traitement',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }
}