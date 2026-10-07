<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        // Maintenir la session active par défaut pour éviter les déconnexions intempestives
        $remember = $request->has('remember') ? $request->boolean('remember') : true;

        if (!Auth::attempt($request->only('email', 'password'), $remember)) {
            return back()->withErrors([
                'email' => 'Les identifiants sont incorrects.',
            ]);
        }

        $request->session()->regenerate();

        $user = Auth::user();

        // Les comptes de gestion (Admin et Agent) accèdent directement à leur espace sans OTP
        if ($user && ($user->isAdmin() || $user->isAgent())) {
            if (!$user->hasVerifiedEmail()) {
                $user->forceFill(['email_verified_at' => now()])->save();
            }
            return redirect()->route('dashboard');
        }

        if ($user && !$user->hasVerifiedEmail()) {
            return redirect()->route('otp.verify.notice');
        }

        return redirect()->intended(route('dashboard'));
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        try {
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        } catch (\Throwable $e) {
            // Silencieux si la session était déjà expirée
        }

        return redirect()->route('login')->with('status', 'Vous avez été déconnecté avec succès.');
    }
}