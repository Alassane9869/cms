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

        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
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

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('reclamation.publique');
    }
}