<x-app-layout>
    <x-slot name="header">
        <h2 style="font-size: 20px; font-weight: 700; color: #1e3a5f;">
            <i class="fas fa-chart-bar"></i> Rapports et Statistiques
        </h2>
    </x-slot>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.0/chart.umd.min.js"></script>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">

        <!-- Réclamations par statut -->
        <div class="card">
            <h3 style="font-size: 16px; font-weight: 700; color: #1e3a5f; margin-bottom: 20px;">
                <i class="fas fa-chart-pie"></i> Réclamations par Statut
            </h3>
            <canvas id="chartStatut"></canvas>
        </div>

        <!-- Réclamations par priorité -->
        <div class="card">
            <h3 style="font-size: 16px; font-weight: 700; color: #1e3a5f; margin-bottom: 20px;">
                <i class="fas fa-chart-pie"></i> Réclamations par Priorité
            </h3>
            <canvas id="chartPriorite"></canvas>
        </div>

    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">

        <!-- Evolution mensuelle -->
        <div class="card">
            <h3 style="font-size: 16px; font-weight: 700; color: #1e3a5f; margin-bottom: 20px;">
                <i class="fas fa-chart-line"></i> Évolution sur 6 mois
            </h3>
            <canvas id="chartEvolution"></canvas>
        </div>

        <!-- Courriers par type -->
        <div class="card">
            <h3 style="font-size: 16px; font-weight: 700; color: #1e3a5f; margin-bottom: 20px;">
                <i class="fas fa-chart-bar"></i> Courriers Entrants vs Sortants
            </h3>
            <canvas id="chartCourriers"></canvas>
        </div>

    </div>

    <!-- Réclamations par catégorie -->
    <div class="card">
        <h3 style="font-size: 16px; font-weight: 700; color: #1e3a5f; margin-bottom: 20px;">
            <i class="fas fa-chart-bar"></i> Réclamations par Catégorie
        </h3>
        <canvas id="chartCategorie"></canvas>
    </div>

    <script>
        // Couleurs CMSS
        const couleurs = ['#1e3a5f', '#2d6a9f', '#10b981', '#f59e0b', '#ef4444', '#7c3aed', '#06b6d4'];

        // Graphique Statut
        new Chart(document.getElementById('chartStatut'), {
            type: 'doughnut',
            data: {
                labels: [
                    @foreach($reclamationsParStatut as $statut => $total)
                        '{{ ucfirst(str_replace("_", " ", $statut)) }}',
                    @endforeach
                ],
                datasets: [{
                    data: [
                        @foreach($reclamationsParStatut as $statut => $total)
                            {{ $total }},
                        @endforeach
                    ],
                    backgroundColor: couleurs
                }]
            },
            options: { responsive: true }
        });

        // Graphique Priorité
        new Chart(document.getElementById('chartPriorite'), {
            type: 'pie',
            data: {
                labels: [
                    @foreach($reclamationsParPriorite as $priorite => $total)
                        '{{ ucfirst($priorite) }}',
                    @endforeach
                ],
                datasets: [{
                    data: [
                        @foreach($reclamationsParPriorite as $priorite => $total)
                            {{ $total }},
                        @endforeach
                    ],
                    backgroundColor: ['#ef4444', '#2d6a9f', '#9ca3af']
                }]
            },
            options: { responsive: true }
        });

        // Graphique Evolution
        new Chart(document.getElementById('chartEvolution'), {
            type: 'line',
            data: {
                labels: [
                    @foreach($reclamationsParMois as $mois => $total)
                        '{{ $mois }}',
                    @endforeach
                ],
                datasets: [{
                    label: 'Réclamations',
                    data: [
                        @foreach($reclamationsParMois as $mois => $total)
                            {{ $total }},
                        @endforeach
                    ],
                    borderColor: '#1e3a5f',
                    backgroundColor: 'rgba(30, 58, 95, 0.1)',
                    fill: true,
                    tension: 0.3
                }]
            },
            options: { responsive: true }
        });

        // Graphique Courriers
        new Chart(document.getElementById('chartCourriers'), {
            type: 'bar',
            data: {
                labels: ['Entrant', 'Sortant'],
                datasets: [{
                    label: 'Courriers',
                    data: [
                        {{ $courriersParType['entrant'] ?? 0 }},
                        {{ $courriersParType['sortant'] ?? 0 }}
                    ],
                    backgroundColor: ['#2d6a9f', '#7c3aed']
                }]
            },
            options: { responsive: true }
        });

        // Graphique Catégorie
        new Chart(document.getElementById('chartCategorie'), {
            type: 'bar',
            data: {
                labels: [
                    @foreach($reclamationsParCategorie as $cat)
                        '{{ $cat->nom }}',
                    @endforeach
                ],
                datasets: [{
                    label: 'Réclamations',
                    data: [
                        @foreach($reclamationsParCategorie as $cat)
                            {{ $cat->reclamations_count }},
                        @endforeach
                    ],
                    backgroundColor: '#10b981'
                }]
            },
            options: { responsive: true, indexAxis: 'y' }
        });
    </script>

</x-app-layout>