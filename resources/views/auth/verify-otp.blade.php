<x-guest-layout>
    <div class="mb-6 text-center">
        <div class="w-14 h-14 rounded-2xl bg-blue-50 border border-blue-200 mx-auto flex items-center justify-center p-2 shadow-xs mb-3 text-[#0B3B60]">
            <i class="fas fa-shield-alt text-2xl text-[#0B3B60]"></i>
        </div>
        <h2 class="text-xl font-black text-[#0B3B60]">Vérification par Code OTP</h2>
        <p class="text-xs text-slate-600 mt-1 max-w-sm mx-auto">
            Pour sécuriser votre compte assuré et activer vos droits de réclamation, veuillez saisir le code à 6 chiffres envoyé à votre adresse :
        </p>
        <div class="mt-2 inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-slate-100 text-xs font-bold text-slate-700">
            <i class="fas fa-envelope text-blue-600"></i>
            <span>{{ $email }}</span>
        </div>
    </div>

    <!-- Message de statut / renvoi -->
    @if (session('status'))
        <div class="mb-4 p-3 rounded-xl bg-emerald-50 border border-emerald-200 text-xs text-emerald-800 flex items-start gap-2">
            <i class="fas fa-check-circle text-emerald-600 mt-0.5 shrink-0"></i>
            <span>{{ session('status') }}</span>
        </div>
    @endif

    @if (session('success'))
        <div class="mb-4 p-3 rounded-xl bg-emerald-50 border border-emerald-200 text-xs text-emerald-800 flex items-start gap-2">
            <i class="fas fa-check-circle text-emerald-600 mt-0.5 shrink-0"></i>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <form method="POST" action="{{ route('otp.verify.submit') }}" class="space-y-4">
        @csrf

        <!-- Champ OTP -->
        <div>
            <label for="otp_code" class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-1.5 text-center">
                Code de sécurité à 6 chiffres <span class="text-red-600">*</span>
            </label>
            <div class="relative">
                <input id="otp_code" 
                       type="text" 
                       name="otp_code" 
                       inputmode="numeric" 
                       pattern="[0-9]*" 
                       maxlength="6" 
                       value="{{ old('otp_code') }}" 
                       required 
                       autofocus
                       class="w-full text-center text-2xl tracking-[0.5em] font-mono font-black py-3 px-4 rounded-xl border-2 border-slate-300 focus:border-[#0B3B60] focus:ring focus:ring-[#0B3B60]/20 transition"
                       placeholder="••••••" />
            </div>
            <p class="text-[11px] text-slate-500 text-center mt-1.5">
                ⏱ Valable 15 minutes. Vérifiez également vos dossiers <em>Courriers indésirables / Spams</em>.
            </p>
            <x-input-error :messages="$errors->get('otp_code')" class="mt-2 text-center" />
        </div>

        <button type="submit"
                class="w-full py-3 px-4 rounded-xl bg-[#0B3B60] hover:bg-[#07233B] text-white text-xs font-black uppercase tracking-wider shadow-sm transition flex items-center justify-center gap-2">
            <i class="fas fa-check-circle"></i>
            <span>Confirmer et Activer mon Compte</span>
        </button>
    </form>

    <!-- Renvoi du code OTP -->
    <div class="mt-6 pt-5 border-t border-slate-200 text-center space-y-3">
        <p class="text-xs text-slate-500">Vous n'avez pas reçu le code ?</p>
        <form method="POST" action="{{ route('otp.resend') }}" class="inline">
            @csrf
            <button type="submit" class="text-xs font-bold text-[#0B3B60] hover:underline inline-flex items-center gap-1.5">
                <i class="fas fa-redo-alt text-[10px]"></i>
                <span>Renvoyer un nouveau code OTP</span>
            </button>
        </form>
    </div>

    <!-- Déconnexion / Changer de compte -->
    <div class="mt-4 text-center">
        <a href="{{ route('logout') }}" class="text-[11px] text-slate-400 hover:text-rose-600 transition inline-flex items-center gap-1.5 font-medium">
            <i class="fas fa-sign-out-alt text-[10px]"></i>
            <span>Se déconnecter / Utiliser une autre adresse</span>
        </a>
    </div>
</x-guest-layout>
