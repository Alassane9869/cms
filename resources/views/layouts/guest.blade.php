<!DOCTYPE html>
<html lang="fr" class="h-full bg-slate-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CMSS - Caisse Malienne de Sécurité Sociale') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif; }
    </style>
</head>
<body class="min-h-full bg-slate-100 text-slate-800 antialiased flex flex-col justify-between">

    <!-- Bandeau national Mali -->
    <div class="w-full h-1.5 flex">
        <div class="h-full w-1/3 bg-[#15803d]"></div>
        <div class="h-full w-1/3 bg-[#eab308]"></div>
        <div class="h-full w-1/3 bg-[#dc2626]"></div>
    </div>

    <!-- Header officiel minimal -->
    <header class="py-4 px-6 border-b border-slate-200 bg-white">
        <div class="max-w-6xl mx-auto flex items-center justify-between">
            <a href="/" class="flex items-center gap-3">
                <img src="{{ asset('images/armoiries-mali.jpg') }}" alt="Mali" class="w-10 h-10 rounded-full border border-slate-200 shadow-sm">
                <div>
                    <div class="text-[10px] uppercase font-bold text-slate-500 leading-none">République du Mali</div>
                    <div class="text-sm font-extrabold text-[#0B3B60] leading-tight">Caisse Malienne de Sécurité Sociale</div>
                </div>
            </a>
            <a href="/" class="text-xs font-bold text-[#0B3B60] hover:underline flex items-center gap-1.5">
                <i class="fas fa-arrow-left"></i>
                <span>Retour au portail</span>
            </a>
        </div>
    </header>

    <!-- Card Content -->
    <main class="flex-1 flex flex-col justify-center items-center px-4 py-10 sm:px-6">
        <div class="w-full sm:max-w-md bg-white p-6 sm:p-8 rounded-2xl border border-slate-200 shadow-sm">
            {{ $slot }}
        </div>
    </main>

    <!-- Footer -->
    <footer class="py-4 border-t border-slate-200 bg-white text-center text-xs text-slate-500">
        &copy; {{ date('Y') }} Caisse Malienne de Sécurité Sociale (CMSS) &mdash; République du Mali.
    </footer>

</body>
</html>
