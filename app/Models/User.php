<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'telephone',
        'service',
        'fcm_token',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Vérifier si l'utilisateur est admin
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    // Vérifier si l'utilisateur est agent
    public function isAgent(): bool
    {
        return $this->role === 'agent';
    }

    // Vérifier si l'utilisateur est un assuré particulier (citoyen)
    public function isCitoyen(): bool
    {
        return $this->role === 'utilisateur';
    }

    // Relations
    public function reclamations()
    {
        return $this->hasMany(Reclamation::class);
    }

    public function courriers()
    {
        return $this->hasMany(Courrier::class);
    }
}