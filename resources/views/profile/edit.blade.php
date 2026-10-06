<x-app-layout>
    <x-slot name="header">
        <h2 style="font-size: 20px; font-weight: 700; color: #1e3a5f;">
            <i class="fas fa-user-circle"></i> Mon Profil
        </h2>
    </x-slot>

    <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 20px;">

        <!-- Carte profil gauche -->
        <div class="card" style="text-align: center;">
            <div style="background: linear-gradient(135deg, #1e3a5f, #2d6a9f); border-radius: 50%; width: 100px; height: 100px; display: flex; align-items: center; justify-content: center; margin: 0 auto 16px;">
                <i class="fas fa-user" style="color: white; font-size: 40px;"></i>
            </div>
            <h3 style="font-size: 18px; font-weight: 700; color: #1e3a5f;">{{ auth()->user()->name }}</h3>
            <p style="color: #6b7280; font-size: 14px; margin-top: 4px;">{{ auth()->user()->email }}</p>
            <div style="margin-top: 12px;">
                @if(auth()->user()->role == 'admin')
                    <span class="badge" style="background: #fee2e2; color: #991b1b;"> Admin</span>
                @elseif(auth()->user()->role == 'agent')
                    <span class="badge" style="background: #dbeafe; color: #1e40af;">👤 Agent</span>
                @else
                    <span class="badge" style="background: #f3f4f6; color: #6b7280;">👥 Utilisateur</span>
                @endif
            </div>
            <div style="margin-top: 20px; padding-top: 20px; border-top: 1px solid #e5e7eb;">
                <p style="color: #6b7280; font-size: 13px;">
                    <i class="fas fa-phone"></i> {{ auth()->user()->telephone ?? 'Non renseigné' }}
                </p>
                <p style="color: #6b7280; font-size: 13px; margin-top: 8px;">
                    <i class="fas fa-building"></i> {{ auth()->user()->service ?? 'Non renseigné' }}
                </p>
                <p style="color: #6b7280; font-size: 13px; margin-top: 8px;">
                    <i class="fas fa-calendar"></i> Membre depuis {{ auth()->user()->created_at->format('d/m/Y') }}
                </p>
            </div>
        </div>

        <!-- Formulaires droite -->
        <div style="display: flex; flex-direction: column; gap: 20px;">

            <!-- Modifier informations -->
            <div class="card">
                <h3 style="font-size: 16px; font-weight: 700; color: #1e3a5f; margin-bottom: 20px;">
                    <i class="fas fa-edit"></i> Modifier mes informations
                </h3>

                @if(session('status') === 'profile-updated')
                    <div style="background: #d1fae5; border-left: 4px solid #10b981; color: #065f46; padding: 12px 16px; border-radius: 8px; margin-bottom: 16px;">
                        <i class="fas fa-check-circle"></i> Profil mis à jour avec succès !
                    </div>
                @endif

                @if($errors->any())
                    <div style="background: #fee2e2; border-left: 4px solid #ef4444; color: #991b1b; padding: 12px 16px; border-radius: 8px; margin-bottom: 16px;">
                        <ul style="margin: 0; padding-left: 20px;">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    @method('patch')

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">

                        <div style="grid-column: span 2;">
                            <label class="form-label">Nom complet</label>
                            <input type="text" name="name"
                                   value="{{ old('name', auth()->user()->name) }}"
                                   class="form-control">
                        </div>

                        <div style="grid-column: span 2;">
                            <label class="form-label">Adresse Email</label>
                            <input type="email" name="email"
                                   value="{{ old('email', auth()->user()->email) }}"
                                   class="form-control">
                        </div>

                    </div>

                    <div style="display: flex; justify-content: flex-end; margin-top: 16px;">
                        <button type="submit" class="btn-primary" style="border: none; cursor: pointer;">
                            <i class="fas fa-save"></i> Enregistrer les modifications
                        </button>
                    </div>
                </form>
            </div>

            <!-- Modifier mot de passe -->
            <div class="card">
                <h3 style="font-size: 16px; font-weight: 700; color: #1e3a5f; margin-bottom: 20px;">
                    <i class="fas fa-lock"></i> Modifier mon mot de passe
                </h3>

                @if(session('status') === 'password-updated')
                    <div style="background: #d1fae5; border-left: 4px solid #10b981; color: #065f46; padding: 12px 16px; border-radius: 8px; margin-bottom: 16px;">
                        <i class="fas fa-check-circle"></i> Mot de passe mis à jour avec succès !
                    </div>
                @endif

                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    @method('put')

                    <div style="display: flex; flex-direction: column; gap: 16px;">

                        <div>
                            <label class="form-label">Mot de passe actuel</label>
                            <input type="password" name="current_password"
                                   class="form-control"
                                   placeholder="Votre mot de passe actuel">
                        </div>

                        <div>
                            <label class="form-label">Nouveau mot de passe</label>
                            <input type="password" name="password"
                                   class="form-control"
                                   placeholder="Nouveau mot de passe (min. 8 caractères)">
                        </div>

                        <div>
                            <label class="form-label">Confirmer le nouveau mot de passe</label>
                            <input type="password" name="password_confirmation"
                                   class="form-control"
                                   placeholder="Confirmez le nouveau mot de passe">
                        </div>

                    </div>

                    <div style="display: flex; justify-content: flex-end; margin-top: 16px;">
                        <button type="submit" class="btn-success" style="border: none; cursor: pointer;">
                            <i class="fas fa-key"></i> Mettre à jour le mot de passe
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>

</x-app-layout>