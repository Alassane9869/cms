<!DOCTYPE html>
<html lang="fr" class="h-full bg-slate-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'CMSS - Gestion des Réclamations') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @auth
        <meta name="csrf-token" content="{{ csrf_token() }}">
    @endauth
    <style>
        body { font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif; }
        .sidebar-gradient {
            background: linear-gradient(180deg, #0f1f38 0%, #17325c 50%, #1e3a5f 100%);
        }
        .nav-link {
            display: flex;
            align-items: center;
            padding: 10px 16px;
            color: rgba(255,255,255,0.75);
            text-decoration: none;
            transition: all 0.2s ease;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 500;
            margin: 3px 12px;
        }
        .nav-link:hover {
            background: rgba(255,255,255,0.12);
            color: #ffffff;
            transform: translateX(3px);
        }
        .nav-link.active {
            background: linear-gradient(135deg, rgba(255,255,255,0.22), rgba(255,255,255,0.1));
            color: #ffffff;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            font-weight: 600;
        }
        .nav-link i { width: 22px; margin-right: 12px; font-size: 15px; }

        .card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.05), 0 1px 2px -1px rgba(0, 0, 0, 0.05);
            border: 1px solid #e2e8f0;
            padding: 24px;
        }
        .card-stat {
            border-radius: 16px;
            padding: 24px;
            color: white;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }
        .card-stat:hover {
            transform: translateY(-3px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.15), 0 8px 10px -6px rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            background: linear-gradient(135deg, #1e3a5f, #2d6a9f);
            color: white;
            padding: 9px 20px;
            border-radius: 10px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.2s;
            border: none;
            cursor: pointer;
        }
        .btn-primary:hover {
            opacity: 0.95;
            transform: translateY(-1px);
            color: white;
            box-shadow: 0 4px 12px rgba(30, 58, 95, 0.25);
        }
        .btn-success {
            background: linear-gradient(135deg, #059669, #10b981);
            color: white;
            padding: 9px 20px;
            border-radius: 10px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.2s;
            border: none;
            cursor: pointer;
        }
        .btn-success:hover {
            opacity: 0.95;
            transform: translateY(-1px);
            color: white;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.25);
        }
        .btn-danger {
            background: linear-gradient(135deg, #dc2626, #ef4444);
            color: white;
            padding: 9px 20px;
            border-radius: 10px;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.2s;
            text-decoration: none;
        }
        .btn-danger:hover {
            opacity: 0.95;
            transform: translateY(-1px);
            color: white;
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.25);
        }
        .btn-secondary {
            background: #64748b;
            color: white;
            padding: 9px 20px;
            border-radius: 10px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.2s;
            border: none;
            cursor: pointer;
        }
        .btn-secondary:hover { background: #475569; color: white; }

        .table-custom {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid #e2e8f0;
        }
        .table-custom thead {
            background: #0f1f38;
            color: white;
        }
        .table-custom thead th {
            padding: 14px 18px;
            font-weight: 600;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            text-align: left;
        }
        .table-custom tbody tr {
            background: white;
            transition: background-color 0.15s ease;
        }
        .table-custom tbody tr:hover { background: #f8fafc; }
        .table-custom tbody td {
            padding: 14px 18px;
            border-bottom: 1px solid #e2e8f0;
            font-size: 14px;
            color: #334155;
        }
        .badge {
            padding: 5px 12px;
            border-radius: 9999px;
            font-size: 12px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }
        .form-control {
            width: 100%;
            border: 1.5px solid #cbd5e1;
            border-radius: 10px;
            padding: 10px 14px;
            transition: all 0.2s;
            outline: none;
            font-size: 14px;
            background: #ffffff;
        }
        .form-control:focus {
            border-color: #2d6a9f;
            box-shadow: 0 0 0 4px rgba(45, 106, 159, 0.12);
        }
        .form-label {
            display: block;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 6px;
            font-size: 14px;
        }
    </style>
</head>
<body class="h-full antialiased text-slate-800" x-data="{ sidebarOpen: false }">

    <!-- Mobile Backdrop Overlay -->
    <div x-show="sidebarOpen" 
         x-transition:enter="transition-opacity ease-linear duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition-opacity ease-linear duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @click="sidebarOpen = false" 
         class="fixed inset-0 z-40 bg-slate-900/60 backdrop-blur-sm md:hidden" 
         style="display: none;">
    </div>

    <!-- Sidebar (Desktop Fixed & Mobile Drawer) -->
    <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full md:translate-x-0'"
           class="fixed inset-y-0 left-0 z-50 w-64 sidebar-gradient text-white flex flex-col transition-transform duration-300 ease-in-out shadow-2xl md:shadow-none">

        <!-- Logo & Header -->
        <div class="p-5 border-b border-white/10 flex items-center justify-between">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
                <div class="bg-white p-1 rounded-xl w-10 h-10 flex items-center justify-center overflow-hidden shadow-sm">
                    <img src="{{ asset('images/logo.jpg') }}" alt="CMSS Logo" class="w-full h-full object-contain">
                </div>
                <div>
                    <div class="font-extrabold text-lg tracking-wide text-white">CMSS</div>
                    <div class="text-xs text-blue-200/80 font-medium leading-none">Sécurité Sociale</div>
                </div>
            </a>
            <!-- Mobile Close Button -->
            <button @click="sidebarOpen = false" class="md:hidden text-white/70 hover:text-white p-1 rounded-lg">
                <i class="fas fa-times text-lg"></i>
            </button>
        </div>

        <!-- Navigation Links -->
        <nav class="flex-1 overflow-y-auto py-5 space-y-1">

            <div class="px-5 mb-2 text-[11px] font-bold text-blue-200/60 uppercase tracking-wider">
                Menu Principal
            </div>

            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="fas fa-tachometer-alt"></i> Tableau de bord
            </a>

            <a href="{{ route('reclamations.index') }}" class="nav-link {{ request()->routeIs('reclamations.*') ? 'active' : '' }}">
                <i class="fas fa-clipboard-list"></i> Réclamations
            </a>

            <a href="{{ route('courriers.index') }}" class="nav-link {{ request()->routeIs('courriers.*') ? 'active' : '' }}">
                <i class="fas fa-envelope"></i> Courriers
            </a>

            <a href="{{ route('categories.index') }}" class="nav-link {{ request()->routeIs('categories.*') ? 'active' : '' }}">
                <i class="fas fa-tags"></i> Catégories
            </a>

            <a href="{{ route('rapports.index') }}" class="nav-link {{ request()->routeIs('rapports.*') ? 'active' : '' }}">
                <i class="fas fa-chart-pie"></i> Rapports & Stats
            </a>

            @if(auth()->user() && auth()->user()->isAdmin())
            <div class="px-5 pt-4 pb-2 text-[11px] font-bold text-blue-200/60 uppercase tracking-wider">
                Administration
            </div>

            <a href="{{ route('users.index') }}" class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}">
                <i class="fas fa-users-cog"></i> Utilisateurs
            </a>
            @endif

            <div class="px-5 pt-4 pb-2 text-[11px] font-bold text-blue-200/60 uppercase tracking-wider">
                Mon Espace
            </div>

            <a href="{{ route('profile.edit') }}" class="nav-link {{ request()->routeIs('profile.*') ? 'active' : '' }}">
                <i class="fas fa-user-circle"></i> Mon Profil
            </a>

            <a href="{{ route('reclamation.publique') }}" target="_blank" class="nav-link">
                <i class="fas fa-external-link-alt"></i> Portail Citoyen
            </a>
        </nav>

        <!-- Sidebar User Footer -->
        <div class="p-4 border-t border-white/10 bg-black/10">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3 overflow-hidden">
                    <div class="w-9 h-9 rounded-full bg-blue-600/50 border border-white/20 flex items-center justify-center font-bold text-sm text-white shrink-0">
                        {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
                    </div>
                    <div class="truncate">
                        <div class="text-sm font-semibold text-white truncate">{{ auth()->user()->name ?? 'Utilisateur' }}</div>
                        <div class="text-xs text-blue-200/70 capitalize">{{ auth()->user()->role ?? 'Agent' }}</div>
                    </div>
                </div>
                <!-- Logout Form Button (Secured POST) -->
                <form method="POST" action="{{ route('logout') }}" class="shrink-0">
                    @csrf
                    <button type="submit" title="Se déconnecter" class="text-white/60 hover:text-rose-300 p-2 rounded-lg hover:bg-white/10 transition">
                        <i class="fas fa-sign-out-alt"></i>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <!-- Main Content Area -->
    <div class="md:pl-64 flex flex-col min-h-screen">

        <!-- Topbar -->
        <header class="sticky top-0 z-30 bg-white/95 backdrop-blur border-b border-slate-200/80 px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <div class="flex items-center gap-4">
                <!-- Hamburger Toggle (Mobile) -->
                <button @click="sidebarOpen = !sidebarOpen" class="md:hidden p-2 rounded-lg text-slate-600 hover:text-slate-900 hover:bg-slate-100 transition">
                    <i class="fas fa-bars text-lg"></i>
                </button>

                <!-- Page Header Title -->
                <div>
                    @isset($header)
                        {{ $header }}
                    @else
                        <h1 class="text-lg font-bold text-slate-900 leading-tight">CMSS Gestion</h1>
                    @endisset
                </div>
            </div>

            <!-- Topbar Right Info -->
            <div class="flex items-center gap-3 sm:gap-5">
                <div class="hidden sm:flex items-center gap-2 text-xs font-semibold text-slate-500 bg-slate-100 px-3 py-1.5 rounded-full">
                    <i class="fas fa-calendar-day text-blue-600"></i>
                    <span>{{ now()->locale('fr')->isoFormat('LL') }}</span>
                </div>

                <div class="flex items-center gap-3 pl-3 sm:border-l sm:border-slate-200">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold {{ auth()->user() && auth()->user()->isAdmin() ? 'bg-indigo-100 text-indigo-800' : 'bg-blue-100 text-blue-800' }}">
                        <i class="fas fa-shield-alt mr-1"></i>
                        {{ strtoupper(auth()->user()->role ?? 'AGENT') }}
                    </span>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-xs font-semibold text-rose-600 hover:text-rose-700 bg-rose-50 hover:bg-rose-100 px-3 py-1.5 rounded-lg transition inline-flex items-center gap-1.5">
                            <i class="fas fa-power-off"></i>
                            <span class="hidden sm:inline">Quitter</span>
                        </button>
                    </form>
                </div>
            </div>
        </header>

        <!-- Flash Messages & Page Content -->
        <main class="flex-1 p-4 sm:p-6 lg:p-8 max-w-7xl w-full mx-auto">
            <!-- Global Flash Messages -->
            @if(session('success'))
                <div class="mb-6 p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-900 flex items-center justify-between shadow-sm animate-fade-in">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-emerald-500 text-white flex items-center justify-center shrink-0">
                            <i class="fas fa-check"></i>
                        </div>
                        <div>
                            <div class="font-bold text-sm">Succès</div>
                            <div class="text-sm text-emerald-800">{{ session('success') }}</div>
                        </div>
                    </div>
                    <button onclick="this.parentElement.remove()" class="text-emerald-700 hover:text-emerald-900 p-1">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 p-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-900 flex items-center justify-between shadow-sm">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-rose-500 text-white flex items-center justify-center shrink-0">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <div>
                            <div class="font-bold text-sm">Erreur</div>
                            <div class="text-sm text-rose-800">{{ session('error') }}</div>
                        </div>
                    </div>
                    <button onclick="this.parentElement.remove()" class="text-rose-700 hover:text-rose-900 p-1">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            @endif

            @if(session('status'))
                <div class="mb-6 p-4 rounded-xl bg-blue-50 border border-blue-200 text-blue-900 flex items-center gap-3 shadow-sm">
                    <i class="fas fa-info-circle text-blue-600 text-lg"></i>
                    <span class="text-sm font-medium">{{ session('status') }}</span>
                </div>
            @endif

            {{ $slot }}
        </main>

        <!-- Footer -->
        <footer class="border-t border-slate-200 bg-white py-4 px-6 text-center text-xs text-slate-500">
            &copy; {{ date('Y') }} Caisse Malienne de Sécurité Sociale (CMSS) &mdash; Système Intégré de Gestion des Réclamations et Courriers.
        </footer>
    </div>

</body>
</html>