<x-app-layout>
    <x-slot name="header">
        <h2 style="font-size: 20px; font-weight: 700; color: #1e3a5f;">
            <i class="fas fa-user-plus"></i> Nouvel Utilisateur
        </h2>
    </x-slot>

    <div class="card">

        @if($errors->any())
            <div style="background: #fee2e2; border-left: 4px solid #ef4444; color: #991b1b; padding: 14px 20px; border-radius: 8px; margin-bottom: 20px;">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('users.store') }}" method="POST">
            @csrf

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">

                <div>
                    <label class="form-label"><i class="fas fa-user"></i> Nom complet *</label>
                    <input type="text" name="name" value="{{ old('name') }}"
                           class="form-control" placeholder="Nom complet">
                </div>

                <div>
                    <label class="form-label"><i class="fas fa-envelope"></i> Email *</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                           class="form-control" placeholder="email@cmss.ml">
                </div>

                <div>
                    <label class="form-label"><i class="fas fa-lock"></i> Mot de passe *</label>
                    <input type="password" name="password"
                           class="form-control" placeholder="Minimum 6 caractères">
                </div>

                <div>
                    <label class="form-label"><i class="fas fa-lock"></i> Confirmer mot de passe *</label>
                    <input type="password" name="password_confirmation"
                           class="form-control" placeholder="Confirmer le mot de passe">
                </div>

                <div>
                    <label class="form-label"><i class="fas fa-shield-alt"></i> Rôle *</label>
                    <select name="role" class="form-control">
                        <option value="utilisateur" @selected(old('role') == 'utilisateur')>👥 Utilisateur</option>
                        <option value="agent" @selected(old('role') == 'agent')> Agent</option>
                        <option value="admin" @selected(old('role') == 'admin')> Admin</option>
                    </select>
                </div>

                <div>
                    <label class="form-label"><i class="fas fa-phone"></i> Téléphone</label>
                    <input type="text" name="telephone" value="{{ old('telephone') }}"
                           class="form-control" placeholder="+223 XX XX XX XX">
                </div>

                <div style="grid-column: span 2;">
                    <label class="form-label"><i class="fas fa-building"></i> Service</label>
                    <input type="text" name="service" value="{{ old('service') }}"
                           class="form-control" placeholder="Ex: Direction des pensions">
                </div>

            </div>

            <div style="display: flex; justify-content: space-between; margin-top: 24px;">
                <a href="{{ route('users.index') }}" class="btn-secondary">
                    <i class="fas fa-arrow-left"></i> Retour
                </a>
                <button type="submit" class="btn-primary" style="border: none; cursor: pointer;">
                    <i class="fas fa-save"></i> Enregistrer
                </button>
            </div>

        </form>
    </div>

</x-app-layout>