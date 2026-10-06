<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-indigo-100 text-indigo-900 flex items-center justify-center font-bold">
                <i class="fas fa-users-cog text-lg"></i>
            </div>
            <div>
                <h1 class="text-xl font-extrabold text-slate-900 leading-tight">Gestion des Utilisateurs</h1>
                <p class="text-xs text-slate-500">Administration des comptes agents, administrateurs et assurés</p>
            </div>
        </div>
    </x-slot>

    @if(session('success'))
        <div class="mb-5 p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-900 flex items-center gap-3 shadow-xs">
            <i class="fas fa-check-circle text-emerald-600 text-lg"></i>
            <span class="text-sm font-semibold">{{ session('success') }}</span>
        </div>
    @endif

    @if(session('error'))
        <div class="mb-5 p-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-900 flex items-center gap-3 shadow-xs">
            <i class="fas fa-exclamation-triangle text-rose-600 text-lg"></i>
            <span class="text-sm font-semibold">{{ session('error') }}</span>
        </div>
    @endif

    <div class="card p-0! overflow-hidden shadow-sm border border-slate-200">

        <!-- Header tableau responsive -->
        <div class="p-4 sm:p-6 border-b border-slate-200 bg-slate-50/50 flex flex-col sm:flex-row justify-between sm:items-center gap-3">
            <div class="text-xs sm:text-sm text-slate-600 font-medium">
                Total : <strong class="text-[#0B3B60] font-black text-base">{{ $users->total() }}</strong> utilisateur(s)
            </div>
            <a href="{{ route('users.create') }}" class="btn-primary w-full sm:w-auto justify-center shadow-xs">
                <i class="fas fa-user-plus"></i>
                <span>Nouvel Utilisateur</span>
            </a>
        </div>

        <!-- Table responsive -->
        <div class="table-responsive-wrapper">
            <table class="table-custom">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom & Prénom</th>
                        <th>Email</th>
                        <th>Rôle</th>
                        <th>Téléphone</th>
                        <th>Date création</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($users as $user)
                    <tr class="hover:bg-slate-50/80 transition">
                        <td class="text-slate-400 font-mono text-xs">{{ $loop->iteration }}</td>
                        <td>
                            <div class="flex items-center gap-2.5">
                                <div class="w-8 h-8 rounded-full bg-linear-to-tr from-[#0B3B60] to-blue-600 text-white flex items-center justify-center font-bold text-xs shrink-0 shadow-xs">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </div>
                                <span class="font-bold text-slate-900">{{ $user->name }}</span>
                            </div>
                        </td>
                        <td class="text-slate-600 text-xs font-mono">{{ $user->email }}</td>
                        <td>
                            @if($user->role == 'admin')
                                <span class="badge bg-indigo-100 text-indigo-800 border border-indigo-200 font-bold">🛡️ Administrateur</span>
                            @elseif($user->role == 'agent')
                                <span class="badge bg-blue-100 text-blue-800 border border-blue-200 font-semibold">💼 Agent CMSS</span>
                            @else
                                <span class="badge bg-emerald-100 text-emerald-800 border border-emerald-200 font-semibold">👤 Assuré Social</span>
                            @endif
                        </td>
                        <td class="text-slate-600 text-xs font-mono">
                            {{ $user->telephone ?? '—' }}
                        </td>
                        <td class="text-slate-500 font-mono text-xs whitespace-nowrap">
                            {{ $user->created_at->format('d/m/Y') }}
                        </td>
                        <td class="text-right">
                            <div class="inline-flex items-center gap-1.5">
                                <a href="{{ route('users.edit', $user) }}"
                                   class="p-2 rounded-lg bg-emerald-50 text-emerald-700 hover:bg-emerald-100 transition" title="Modifier">
                                    <i class="fas fa-edit text-xs"></i>
                                </a>
                                @if(auth()->id() !== $user->id)
                                <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            onclick="return confirm('Confirmer la suppression de cet utilisateur ?')"
                                            class="p-2 rounded-lg bg-rose-50 text-rose-600 hover:bg-rose-100 transition" title="Supprimer">
                                        <i class="fas fa-trash text-xs"></i>
                                    </button>
                                </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-12 text-slate-400">
                            <i class="fas fa-users text-4xl mb-2 text-slate-300 block"></i>
                            <span class="text-sm">Aucun utilisateur trouvé.</span>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="p-4 sm:p-5 border-t border-slate-200 bg-white">
            {{ $users->links() }}
        </div>

    </div>

</x-app-layout>