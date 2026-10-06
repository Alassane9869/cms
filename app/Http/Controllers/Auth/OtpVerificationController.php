<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class OtpVerificationController extends Controller
{
    /**
     * Affiche l'écran de saisie du code OTP.
     */
    public function notice(Request $request): View|RedirectResponse
    {
        $user = $request->user();

        if ($user && $user->hasVerifiedEmail()) {
            return redirect()->intended(route('dashboard', absolute: false));
        }

        // Si l'utilisateur n'a pas encore de code ou s'il a expiré, on en génère un automatiquement
        if (empty($user->otp_code) || ($user->otp_expires_at && now()->isAfter($user->otp_expires_at))) {
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
                Log::warning('Erreur lors de l\'envoi du premier code OTP : ' . $e->getMessage());
            }
        }

        return view('auth.verify-otp', [
            'email' => $user->email,
        ]);
    }

    /**
     * Valide le code OTP saisi par l'assuré.
     */
    public function verify(Request $request): RedirectResponse
    {
        $request->validate([
            'otp_code' => ['required', 'string', 'digits:6'],
        ], [
            'otp_code.required' => 'Veuillez saisir votre code à 6 chiffres.',
            'otp_code.digits'   => 'Le code de vérification doit comporter exactement 6 chiffres.',
        ]);

        $user = $request->user();

        if (!$user->verifyOtp($request->otp_code)) {
            return back()->withErrors([
                'otp_code' => 'Code de vérification incorrect ou expiré (validité 15 min). Veuillez cliquer sur "Renvoyer un nouveau code" si nécessaire.',
            ]);
        }

        // Marquer l'adresse email comme vérifiée et réinitialiser l'OTP
        $user->forceFill([
            'email_verified_at' => now(),
            'otp_code'          => null,
            'otp_expires_at'    => null,
        ])->save();

        // Si l'utilisateur avait l'intention de déposer une réclamation
        $intendedUrl = session()->pull('url.intended', route('reclamation.publique'));

        return redirect($intendedUrl)->with('success', 'Votre adresse email a été validée avec succès ! Votre compte est activé.');
    }

    /**
     * Renvoie un nouveau code OTP par email.
     */
    public function resend(Request $request): RedirectResponse
    {
        $user = $request->user();

        if ($user->hasVerifiedEmail()) {
            return redirect()->intended(route('dashboard', absolute: false));
        }

        $otp = $user->generateOtp();

        try {
            Mail::send('emails.verification_otp', [
                'nom'     => $user->name,
                'otpCode' => $otp,
            ], function ($message) use ($user) {
                $message->to($user->email)
                        ->subject('Nouveau code de vérification OTP - CMSS Mali');
            });
        } catch (\Throwable $e) {
            Log::warning('Erreur lors du renvoi du code OTP : ' . $e->getMessage());
        }

        return back()->with('status', 'Un nouveau code de sécurité à 6 chiffres vient d\'être envoyé à votre adresse email (' . $user->email . ').');
    }
}
