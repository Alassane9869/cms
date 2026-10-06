<x-guest-layout>
    <div class="mb-6 text-center">
        <div class="w-14 h-14 rounded-xl bg-slate-50 border border-slate-200 mx-auto flex items-center justify-center p-1.5 shadow-sm mb-3">
            <img src="{{ asset('images/logo.jpg') }}" alt="CMSS" class="w-full h-full object-contain">
        </div>
        <h2 class="text-lg font-bold text-[#0B3B60]">Création de Compte Assuré</h2>
        <p class="text-xs text-slate-500 mt-1">Créez votre espace personnel pour déposer et suivre l'historique de vos réclamations</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <!-- Nom complet -->
        <div>
            <label for="name" class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-1">
                Nom complet <span class="text-red-600">*</span>
            </label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                   class="w-full rounded-lg border-slate-300 text-sm py-2 px-3 focus:border-[#0B3B60] focus:ring focus:ring-[#0B3B60]/10"
                   placeholder="Ex: Amadou Coulibaly" />
            <x-input-error :messages="$errors->get('name')" class="mt-1" />
        </div>

        <!-- Email -->
        <div>
            <label for="email" class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-1">
                Adresse E-mail <span class="text-red-600">*</span>
            </label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required
                   class="w-full rounded-lg border-slate-300 text-sm py-2 px-3 focus:border-[#0B3B60] focus:ring focus:ring-[#0B3B60]/10"
                   placeholder="exemple@email.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-1" />
        </div>

        <!-- Téléphone -->
        <div>
            <label for="telephone" class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-1">
                Numéro de téléphone
            </label>
            <input id="telephone" type="text" name="telephone" value="{{ old('telephone') }}"
                   class="w-full rounded-lg border-slate-300 text-sm py-2 px-3 focus:border-[#0B3B60] focus:ring focus:ring-[#0B3B60]/10"
                   placeholder="+223 XX XX XX XX" />
            <x-input-error :messages="$errors->get('telephone')" class="mt-1" />
        </div>

        <!-- Mot de passe -->
        <div>
            <label for="password" class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-1">
                Mot de passe <span class="text-red-600">*</span>
            </label>
            <input id="password" type="password" name="password" required autocomplete="new-password"
                   class="w-full rounded-lg border-slate-300 text-sm py-2 px-3 focus:border-[#0B3B60] focus:ring focus:ring-[#0B3B60]/10"
                   placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-1" />
        </div>

        <!-- Confirmation Mot de passe -->
        <div>
            <label for="password_confirmation" class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-1">
                Confirmer le mot de passe <span class="text-red-600">*</span>
            </label>
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                   class="w-full rounded-lg border-slate-300 text-sm py-2 px-3 focus:border-[#0B3B60] focus:ring focus:ring-[#0B3B60]/10"
                   placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
        </div>

        <!-- Bouton Inscription -->
        <div class="pt-2">
            <button type="submit" class="w-full py-2.5 px-4 rounded-lg bg-[#0B3B60] hover:bg-[#07233B] text-white font-bold text-sm uppercase tracking-wider transition shadow-sm">
                Créer mon compte assuré
            </button>
        </div>

        <!-- Lien de connexion -->
        <div class="text-center pt-2 text-xs text-slate-600">
            Vous possédez déjà un compte ? 
            <a href="{{ route('login') }}" class="font-bold text-[#0B3B60] hover:underline">
                Se connecter
            </a>
        </div>
    </form>
</x-guest-layout>
