<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view for insured citizens.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'telephone' => ['nullable', 'string', 'max:20'],
            'password'  => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'telephone' => $request->telephone,
            'role'      => 'utilisateur',
            'password'  => Hash::make($request->password),
        ]);

        event(new Registered($user));

        // Générer le code OTP et envoyer l'email de confirmation
        $otp = $user->generateOtp();
        try {
            Mail::send('emails.verification_otp', [
                'nom'     => $user->name,
                'otpCode' => $otp,
            ], function ($message) use ($user) {
                $message->to($user->email)
                        ->subject('Code de vérification OTP - Activation de votre compte CMSS');
            });
        } catch (\Throwable $e) {
            Log::warning('Erreur envoi OTP lors de l\'inscription : ' . $e->getMessage());
        }

        Auth::login($user);

        return redirect()->route('otp.verify.notice')
            ->with('status', 'Un code de vérification à 6 chiffres a été envoyé par email à l\'adresse ' . $user->email . '. Veuillez le saisir pour valider votre compte.');
    }
}
