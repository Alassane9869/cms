<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Réclamation {{ $reclamation->reference }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            padding: 20px;
        }
        .header {
            text-align: center;
            border-bottom: 3px solid #1e3a5f;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        .header h1 {
            color: #1e3a5f;
            margin: 0;
        }
        .header p {
            color: #666;
            margin: 5px 0;
        }
        .reference {
            background: #eff6ff;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
        }
        .reference strong {
            font-size: 18px;
            color: #1e3a5f;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table td {
            padding: 12px;
            border-bottom: 1px solid #e5e7eb;
        }
        table td:first-child {
            font-weight: bold;
            color: #1e3a5f;
            width: 200px;
        }
        .badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }
        .footer {
            margin-top: 40px;
            text-align: center;
            color: #9ca3af;
            font-size: 12px;
            border-top: 1px solid #e5e7eb;
            padding-top: 20px;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>CMSS - Caisse Malienne de Sécurité Sociale</h1>
        <p>Fiche de Réclamation</p>
    </div>

    <div class="reference">
        <strong>{{ $reclamation->reference }}</strong>
    </div>

    <table>
        <tr>
            <td>Objet</td>
            <td>{{ $reclamation->objet }}</td>
        </tr>
        <tr>
            <td>Description</td>
            <td>{{ $reclamation->description }}</td>
        </tr>
        <tr>
            <td>Statut</td>
            <td>
                @if($reclamation->statut == 'en_attente')
                    <span class="badge" style="background: #fef3c7; color: #92400e;">En attente</span>
                @elseif($reclamation->statut == 'en_cours')
                    <span class="badge" style="background: #dbeafe; color: #1e40af;">En cours</span>
                @elseif($reclamation->statut == 'traitee')
                    <span class="badge" style="background: #d1fae5; color: #065f46;">Traitée</span>
                @else
                    <span class="badge" style="background: #fee2e2; color: #991b1b;">Rejetée</span>
                @endif
            </td>
        </tr>
        <tr>
            <td>Priorité</td>
            <td>{{ ucfirst($reclamation->priorite) }}</td>
        </tr>
        <tr>
            <td>Catégorie</td>
            <td>{{ $reclamation->categorie->nom ?? 'Non définie' }}</td>
        </tr>
        <tr>
            <td>Créé par</td>
            <td>{{ $reclamation->user->name ?? 'Inconnu' }}</td>
        </tr>
        <tr>
            <td>Date de création</td>
            <td>{{ $reclamation->created_at->format('d/m/Y à H:i') }}</td>
        </tr>
        @if($reclamation->date_traitement)
        <tr>
            <td>Date de traitement</td>
            <td>{{ \Carbon\Carbon::parse($reclamation->date_traitement)->format('d/m/Y à H:i') }}</td>
        </tr>
        @endif
    </table>

    <div class="footer">
        Document généré le {{ now()->format('d/m/Y à H:i') }} - CMSS Gestion des Réclamations
    </div>

</body>
</html>