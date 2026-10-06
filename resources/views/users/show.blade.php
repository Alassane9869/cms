<x-app-layout>
    <x-slot name="header">
        <h2 style="font-size: 20px; font-weight: 700; color: #1e3a5f;">
            <i class="fas fa-user"></i> Détail Utilisateur
        </h2>
    </x-slot>

    <div class="card">

        <!-- Avatar et infos principales -->
        <div style="display: flex; align-items: center; gap: 20px; margin-bottom: 30px; padding-bottom: 20px; border-bottom: 2px solid #eff6ff;">
            <div style="background: linear-gradient(135deg, #1e3a5f, #2d6a9f); border-radius: 50%; width: 80px; height: 80px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                <i class="fas fa-user" style="color: white; font-size: 32px;"></i>
            </div>
            <div>
                <h3 style="font-size: 22px; font-weight: 700; color: #1e3a5f; margin: 0;">{{ $user->name }}</h3>
                <p style="color: #6b7280; margin: 4px 0;">
                    <i class="fas fa-envelope"></i> {{ $user->email }}
                </p>
                <div style="margin-top: 8px;">
                    @if($user->role == 'admin')
                        <span class="badge" style="background: #fee2e2; color: #991b1b;"> Admin</span>
                    @elseif($user->role == 'agent')
                        <span class="badge" style="background: #dbeafe; color: #1e40af;">👤 Agent</span>
                    @else
                        <span class="badge" style="background: #f3f4f6; color: #6b7280;">👥 Utilisateur</span>
                    @endif
                </div>
            </div>
        </div>

        <!-- Informations détaillées -->
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 30px;">

            <div style="background: #f9fafb; border-radius: 8px; padding: 16px;">
                <label style="color: #6b7280; font-size: 12px; font-weight: 600; text-transform: uppercase;">
                    <i class="fas fa-phone"></i> Téléphone
                </label>
                <p style="color: #1e3a5f; font-weight: 600; margin-top: 6px;">
                    {{ $user->telephone ?? 'Non renseigné' }}
                </p>
            </div>

            <div style="background: #f9fafb; border-radius: 8px; padding: 16px;">
                <label style="color: #6b7280; font-size: 12px; font-weight: 600; text-transform: uppercase;">
                    <i class="fas fa-building"></i> Service
                </label>
                <p style="color: #1e3a5f; font-weight: 600; margin-top: 6px;">
                    {{ $user->service ?? 'Non renseigné' }}
                </p>
            </div>

            <div style="background: #f9fafb; border-radius: 8px; padding: 16px;">
                <label style="color: #6b7280; font-size: 12px; font-weight: 600; text-transform: uppercase;">
                    <i class="fas fa-calendar"></i> Date de création
                </label>
                <p style="color: #1e3a5f; font-weight: 600; margin-top: 6px;">
                    {{ $user->created_at->format('d/m/Y H:i') }}
                </p>
            </div>

            <div style="background: #f9fafb; border-radius: 8px; padding: 16px;">
                <label style="color: #6b7280; font-size: 12px; font-weight: 600; text-transform: uppercase;">
                    <i class="fas fa-clipboard-list"></i> Réclamations
                </label>
                <p style="color: #1e3a5f; font-weight: 600; margin-top: 6px;">
                    {{ $user->reclamations->count() }} réclamation(s)
                </p>
            </div>

        </div>

        <!-- Actions -->
        <div style="display: flex; gap: 12px;">
            <a href="{{ route('users.edit', $user) }}" class="btn-success">
                <i class="fas fa-edit"></i> Modifier
            </a>
            @if($user->id !== auth()->id())
            <form action="{{ route('users.destroy', $user) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"
                        onclick="return confirm('Supprimer cet utilisateur ?')"
                        class="btn-danger" style="border: none; cursor: pointer;">
                    <i class="fas fa-trash"></i> Supprimer
                </button>
            </form>
            @endif
            <a href="{{ route('users.index') }}" class="btn-secondary">
                <i class="fas fa-arrow-left"></i> Retour
            </a>
        </div>

    </div>

</x-app-layout>