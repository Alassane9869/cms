<x-app-layout>
    <x-slot name="header">
        <h2 style="font-size: 20px; font-weight: 700; color: #1e3a5f;">
            <i class="fas fa-users"></i> Gestion des Utilisateurs
        </h2>
    </x-slot>

    @if(session('success'))
        <div style="background: #d1fae5; border-left: 4px solid #10b981; color: #065f46; padding: 14px 20px; border-radius: 8px; margin-bottom: 20px;">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div style="background: #fee2e2; border-left: 4px solid #ef4444; color: #991b1b; padding: 14px 20px; border-radius: 8px; margin-bottom: 20px;">
            <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
        </div>
    @endif

    <div class="card" style="padding: 0; overflow: hidden;">

        <div style="padding: 20px 24px; display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #e5e7eb;">
            <div style="color: #6b7280; font-size: 14px;">
                Total : <strong style="color: #1e3a5f;">{{ $users->total() }}</strong> utilisateur(s)
            </div>
            <a href="{{ route('users.create') }}" class="btn-primary">
                <i class="fas fa-user-plus"></i> Nouvel Utilisateur
            </a>
        </div>

        <table class="table-custom" style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Rôle</th>
                    <th>Téléphone</th>
                    <th>Service</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                <tr>
                    <td style="color: #9ca3af; font-size: 13px;">{{ $loop->iteration }}</td>
                    <td>
                        <div style="display: flex; align-items: center; gap: 10px;">
                            <div style="background: linear-gradient(135deg, #1e3a5f, #2d6a9f); border-radius: 50%; width: 36px; height: 36px; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-user" style="color: white; font-size: 14px;"></i>
                            </div>
                            <span style="font-weight: 600; color: #1e3a5f;">{{ $user->name }}</span>
                        </div>
                    </td>
                    <td style="color: #6b7280; font-size: 13px;">{{ $user->email }}</td>
                    <td>
                        @if($user->role == 'admin')
                            <span class="badge" style="background: #fee2e2; color: #991b1b;"> Admin</span>
                        @elseif($user->role == 'agent')
                            <span class="badge" style="background: #dbeafe; color: #1e40af;"> Agent</span>
                        @else
                            <span class="badge" style="background: #f3f4f6; color: #6b7280;"> Utilisateur</span>
                        @endif
                    </td>
                    <td style="color: #6b7280; font-size: 13px;">{{ $user->telephone ?? '-' }}</td>
                    <td style="color: #6b7280; font-size: 13px;">{{ $user->service ?? '-' }}</td>
                    <td style="color: #6b7280; font-size: 13px;">{{ $user->created_at->format('d/m/Y') }}</td>
                    <td>
                        <div style="display: flex; gap: 6px;">
                            <a href="{{ route('users.show', $user) }}"
                               style="background: #eff6ff; color: #2d6a9f; padding: 6px 10px; border-radius: 6px; text-decoration: none; font-size: 13px;">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('users.edit', $user) }}"
                               style="background: #d1fae5; color: #059669; padding: 6px 10px; border-radius: 6px; text-decoration: none; font-size: 13px;">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        onclick="return confirm('Supprimer cet utilisateur ?')"
                                        style="background: #fee2e2; color: #dc2626; padding: 6px 10px; border-radius: 6px; border: none; cursor: pointer; font-size: 13px;">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" style="text-align: center; padding: 40px; color: #9ca3af;">
                        <i class="fas fa-users" style="font-size: 40px; margin-bottom: 10px; display: block;"></i>
                        Aucun utilisateur trouvé.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <div style="padding: 16px 24px; border-top: 1px solid #e5e7eb;">
            {{ $users->links() }}
        </div>

    </div>

</x-app-layout>