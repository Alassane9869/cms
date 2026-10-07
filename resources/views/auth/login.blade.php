<x-guest-layout>
    <div class="mb-6 text-center">
        <div class="w-14 h-14 rounded-xl bg-slate-50 border border-slate-200 mx-auto flex items-center justify-center p-1.5 shadow-sm mb-3">
            <img src="{{ asset('images/logo.jpg') }}" alt="CMSS" class="w-full h-full object-contain">
        </div>
        <h2 class="text-xl font-bold text-[#0B3B60]">Espace Assuré & Agents CMSS</h2>
        <p class="text-xs text-slate-500 mt-1">Connectez-vous pour gérer vos réclamations, suivre vos dossiers et télécharger vos attestations</p>
    </div>

    <!-- Message de session / Statut -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    @if ($errors->any())
        <div class="mb-4 p-3 rounded-lg bg-red-50 border border-red-200 text-xs text-red-700">
            <div class="font-bold flex items-center gap-1.5 mb-1">
                <i class="fas fa-exclamation-circle"></i> Identifiants incorrects
            </div>
            <span>Veuillez vérifier votre adresse email et votre mot de passe.</span>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-1">
                Adresse E-mail <span class="text-red-600">*</span>
            </label>
            <div class="relative">
                <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                    <i class="fas fa-envelope text-xs"></i>
                </span>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                       class="w-full pl-9 rounded-lg border-slate-300 text-sm py-2 px-3 focus:border-[#0B3B60] focus:ring focus:ring-[#0B3B60]/10"
                       placeholder="votre.email@domaine.com" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-1" />
        </div>

        <!-- Password -->
        <div>
            <div class="flex items-center justify-between mb-1">
                <label for="password" class="block text-xs font-bold text-slate-700 uppercase tracking-wide">
                    Mot de passe <span class="text-red-600">*</span>
                </label>
                @if (Route::has('password.request'))
                    <a class="text-xs text-[#0B3B60] hover:underline" href="{{ route('password.request') }}">
                        Mot de passe oublié ?
                    </a>
                @endif
            </div>
            <div class="relative">
                <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                    <i class="fas fa-lock text-xs"></i>
                </span>
                <input id="password" type="password" name="password" required autocomplete="current-password"
                       class="w-full pl-9 rounded-lg border-slate-300 text-sm py-2 px-3 focus:border-[#0B3B60] focus:ring focus:ring-[#0B3B60]/10"
                       placeholder="••••••••" />
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-1" />
        </div>

        <!-- Remember Me (Coché par défaut pour éviter les déconnexions intempestives) -->
        <div class="flex items-center">
            <label for="remember_me" class="inline-flex items-center cursor-pointer">
                <input id="remember_me" type="checkbox" checked value="1" class="rounded border-slate-300 text-[#0B3B60] shadow-sm focus:ring-[#0B3B60]" name="remember">
                <span class="ms-2 text-xs text-slate-600 font-semibold">Rester connecté sur cet appareil</span>
            </label>
        </div>

        <!-- Bouton Connexion -->
        <div class="pt-2">
            <button type="submit" class="w-full py-2.5 px-4 rounded-lg bg-[#0B3B60] hover:bg-[#07233B] text-white font-bold text-sm uppercase tracking-wider transition shadow-sm flex items-center justify-center gap-2">
                <span>Accéder à mon espace</span>
                <i class="fas fa-arrow-right text-xs"></i>
            </button>
        </div>

        <!-- Séparateur -->
        <div class="relative my-4">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-slate-200"></div>
            </div>
            <div class="relative flex justify-center text-xs uppercase">
                <span class="bg-white px-3 text-slate-400 font-semibold">Nouveau sur le portail ?</span>
            </div>
        </div>

        <!-- Lien Créer Compte Assuré (Particulier) -->
        <a href="{{ route('register') }}" class="w-full py-2.5 px-4 rounded-lg border-2 border-[#0B3B60] text-[#0B3B60] hover:bg-[#0B3B60]/5 font-bold text-sm uppercase tracking-wider transition text-center flex items-center justify-center gap-2">
            <i class="fas fa-user-plus text-xs"></i>
            <span>Créer mon compte particulier (Assuré)</span>
        </a>

        <!-- Lien Suivre une réclamation existante -->
        <div class="pt-2 text-center">
            <a href="{{ route('home') }}#suivi-rapide" class="text-xs text-slate-500 hover:text-[#0B3B60] hover:underline inline-flex items-center gap-1.5">
                <i class="fas fa-search text-[10px]"></i>
                <span>Suivre l'avancement d'un dossier avec ma référence (REC-...)</span>
            </a>
        </div>
    </form>
</x-guest-layout>