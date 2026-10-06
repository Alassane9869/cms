<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
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
        'otp_code',
        'otp_expires_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'otp_code',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'otp_expires_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Générer un code OTP à 6 chiffres valide 15 minutes.
     */
    public function generateOtp(): string
    {
        $code = (string) random_int(100000, 999999);
        $this->update([
            'otp_code' => $code,
            'otp_expires_at' => now()->addMinutes(15),
        ]);
        return $code;
    }

    /**
     * Vérifier la validité du code OTP.
     */
    public function verifyOtp(string $code): bool
    {
        if (empty($this->otp_code) || empty($this->otp_expires_at)) {
            return false;
        }

        if (now()->isAfter($this->otp_expires_at)) {
            return false;
        }

        return hash_equals((string) $this->otp_code, trim($code));
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