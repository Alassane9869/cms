@php
    $logoBase64 = '';
    $armoiriesBase64 = '';
    if (file_exists(public_path('images/logo.jpg'))) {
        $logoBase64 = 'data:image/jpeg;base64,' . base64_encode(file_get_contents(public_path('images/logo.jpg')));
    }
    if (file_exists(public_path('images/armoiries-mali.jpg'))) {
        $armoiriesBase64 = 'data:image/jpeg;base64,' . base64_encode(file_get_contents(public_path('images/armoiries-mali.jpg')));
    }
    $securityHash = strtoupper(substr(hash('sha256', $reclamation->reference . $reclamation->created_at . 'CMSS_MALI_OFFICIAL'), 0, 16));
@endphp
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Récépissé Officiel - {{ $reclamation->reference }}</title>
    <style>
        @page {
            margin: 18mm 15mm 18mm 15mm;
        }
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            color: #1e293b;
            font-size: 11pt;
            line-height: 1.4;
            margin: 0;
            padding: 0;
        }
        /* Ruban Tricolore National */
        .flag-stripe {
            width: 100%;
            height: 4px;
            margin-bottom: 12px;
        }
        .flag-green { width: 33.33%; height: 4px; background-color: #15803d; float: left; }
        .flag-yellow { width: 33.33%; height: 4px; background-color: #facc15; float: left; }
        .flag-red { width: 33.34%; height: 4px; background-color: #dc2626; float: left; }

        .clear { clear: both; }

        /* En-tête officiel à 3 colonnes */
        .header-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 14px;
        }
        .header-table td {
            vertical-align: middle;
            border: none;
            padding: 0;
        }
        .header-left {
            width: 42%;
            text-align: left;
            font-size: 8.5pt;
            line-height: 1.25;
            color: #334155;
        }
        .header-center {
            width: 16%;
            text-align: center;
        }
        .header-right {
            width: 42%;
            text-align: right;
            font-size: 8.5pt;
            line-height: 1.25;
            color: #334155;
        }
        .institution-title {
            font-weight: bold;
            font-size: 9.5pt;
            color: #0B3B60;
            text-transform: uppercase;
        }
        .republic-title {
            font-weight: 800;
            font-size: 10pt;
            color: #0f172a;
            letter-spacing: 0.5px;
        }
        .motto {
            font-style: italic;
            font-size: 7.5pt;
            color: #64748b;
            margin-bottom: 4px;
        }

        /* Titre Principal du Document */
        .document-title-box {
            background-color: #0B3B60;
            color: #ffffff;
            text-align: center;
            padding: 10px 14px;
            border-radius: 6px;
            margin: 12px 0 14px 0;
        }
        .document-title-box h1 {
            margin: 0;
            font-size: 13pt;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            font-weight: 800;
        }
        .document-title-box p {
            margin: 3px 0 0 0;
            font-size: 8.5pt;
            color: #bfdbfe;
        }

        /* Cartouche de Sécurité & Numéro de Récépissé */
        .security-badge-table {
            width: 100%;
            border-collapse: collapse;
            background-color: #f8fafc;
            border: 1.5px solid #cbd5e1;
            border-radius: 6px;
            margin-bottom: 14px;
        }
        .security-badge-table td {
            padding: 9px 12px;
            border: none;
        }
        .ref-label {
            font-size: 8pt;
            text-transform: uppercase;
            color: #64748b;
            font-weight: bold;
        }
        .ref-value {
            font-size: 13pt;
            font-weight: 800;
            font-family: 'Courier New', Courier, monospace;
            color: #0B3B60;
        }
        .hash-code {
            font-family: 'Courier New', Courier, monospace;
            font-size: 8pt;
            color: #475569;
            background-color: #e2e8f0;
            padding: 2px 6px;
            border-radius: 3px;
        }

        /* Sections & Données Tabulaires */
        .section-header {
            font-size: 9.5pt;
            font-weight: 800;
            color: #0B3B60;
            text-transform: uppercase;
            letter-spacing: 0.4px;
            border-bottom: 1.5px solid #0B3B60;
            padding-bottom: 3px;
            margin: 12px 0 8px 0;
        }
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }
        .data-table td {
            padding: 6px 8px;
            border-bottom: 1px solid #e2e8f0;
            font-size: 9pt;
            vertical-align: top;
        }
        .data-label {
            width: 32%;
            font-weight: bold;
            color: #475569;
            background-color: #f8fafc;
        }
        .data-value {
            width: 68%;
            color: #0f172a;
        }

        /* Statut Badges */
        .status-badge {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 12px;
            font-size: 8pt;
            font-weight: bold;
            text-transform: uppercase;
        }
        .status-en_attente { background-color: #fef3c7; color: #92400e; border: 1px solid #fde68a; }
        .status-en_cours { background-color: #e0f2fe; color: #0369a1; border: 1px solid #bae6fd; }
        .status-traitee { background-color: #dcfce7; color: #15803d; border: 1px solid #bbf7d0; }
        .status-rejetee { background-color: #fee2e2; color: #b91c1c; border: 1px solid #fecaca; }

        /* Bloc Détails / Description */
        .content-box {
            background-color: #ffffff;
            border: 1px solid #cbd5e1;
            border-left: 3.5px solid #0B3B60;
            padding: 9px 12px;
            border-radius: 4px;
            font-size: 9pt;
            color: #1e293b;
            margin-top: 5px;
            line-height: 1.45;
        }

        /* Notice d'engagements & Délais Légaux */
        .notice-box {
            background-color: #eff6ff;
            border: 1px dashed #93c5fd;
            border-radius: 6px;
            padding: 8px 12px;
            font-size: 8pt;
            color: #1e40af;
            margin-top: 10px;
            line-height: 1.35;
        }

        /* Zone de Signature & Cachet Officiel */
        .signatures-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 14px;
        }
        .signatures-table td {
            width: 50%;
            vertical-align: top;
            border: none;
            padding: 0 10px;
        }
        .stamp-box {
            border: 1px dashed #cbd5e1;
            border-radius: 8px;
            padding: 10px;
            text-align: center;
            background-color: #fafafa;
            min-height: 85px;
        }
        .official-seal-text {
            color: #0B3B60;
            font-weight: bold;
            font-size: 8.5pt;
            text-transform: uppercase;
        }
        .official-seal-sub {
            font-size: 7pt;
            color: #64748b;
            margin-top: 2px;
        }
        .certified-pill {
            display: inline-block;
            margin-top: 8px;
            padding: 2px 8px;
            background-color: #059669;
            color: #ffffff;
            font-size: 7.5pt;
            font-weight: bold;
            border-radius: 10px;
            text-transform: uppercase;
        }

        /* Pied de page institutionnel */
        .footer-note {
            margin-top: 18px;
            padding-top: 8px;
            border-top: 1px solid #cbd5e1;
            font-size: 7pt;
            color: #64748b;
            text-align: center;
            line-height: 1.3;
        }
    </style>
</head>
<body>

    <!-- Ruban National Tricolore -->
    <div class="flag-stripe">
        <div class="flag-green"></div>
        <div class="flag-yellow"></div>
        <div class="flag-red"></div>
    </div>
    <div class="clear"></div>

    <!-- En-tête officiel -->
    <table class="header-table">
        <tr>
            <!-- Gauche : Institutions de Tutelle & CMSS -->
            <td class="header-left">
                <div class="republic-title">RÉPUBLIQUE DU MALI</div>
                <div class="motto">Un Peuple &mdash; Un But &mdash; Une Foi</div>
                <div style="font-size: 8pt; color: #475569; margin-top: 2px;">
                    Ministère de la Santé et du Développement Social
                </div>
                <div class="institution-title" style="margin-top: 3px;">
                    Caisse Malienne de Sécurité Sociale
                </div>
                <div style="font-size: 7.5pt; color: #64748b;">
                    Direction Générale &bull; Service Réclamations & Contentieux
                </div>
            </td>

            <!-- Centre : Armoiries & Logo Officiel -->
            <td class="header-center">
                @if($logoBase64)
                    <img src="{{ $logoBase64 }}" alt="CMSS" style="max-height: 52px; max-width: 70px; object-fit: contain;">
                @elseif($armoiriesBase64)
                    <img src="{{ $armoiriesBase64 }}" alt="Mali" style="max-height: 52px; max-width: 70px; object-fit: contain;">
                @endif
            </td>

            <!-- Droite : Date, Lieu & Réf -->
            <td class="header-right">
                <div style="font-weight: bold; color: #0B3B60; font-size: 8.5pt;">
                    BAMAKO, LE {{ now()->format('d/m/Y') }}
                </div>
                <div style="font-size: 8pt; color: #475569; margin-top: 2px;">
                    Guichet Numérique des Usagers
                </div>
                <div style="font-size: 7.5pt; color: #64748b; margin-top: 3px;">
                    Téléservice officiel certifié
                </div>
                <div style="font-size: 7.5pt; color: #059669; font-weight: bold; margin-top: 2px;">
                    &bull; Enregistrement Direct Validé
                </div>
            </td>
        </tr>
    </table>

    <!-- Cartouche Titre Officiel -->
    <div class="document-title-box">
        <h1>Récépissé Officiel d'Enregistrement de Réclamation</h1>
        <p>Attestation administrative certifiée valant accusé de réception et prise en charge officielle</p>
    </div>

    <!-- Clé de Sécurité & Numéro de Dossier -->
    <table class="security-badge-table">
        <tr>
            <td style="width: 50%;">
                <div class="ref-label">Numéro Unique de Dossier (Référence)</div>
                <div class="ref-value">{{ $reclamation->reference }}</div>
            </td>
            <td style="width: 50%; text-align: right;">
                <div class="ref-label">Clé de Contrôle Numérique (Hash)</div>
                <div style="margin-top: 3px;">
                    <span class="hash-code">{{ $securityHash }}</span>
                </div>
            </td>
        </tr>
    </table>

    <!-- Section 1 : Identité du Requérant -->
    <div class="section-header">1. Identité de l'Assuré(e) / Requérant(e)</div>
    <table class="data-table">
        <tr>
            <td class="data-label">Nom & Prénom(s)</td>
            <td class="data-value" style="font-weight: bold; font-size: 9.5pt;">{{ $reclamation->user->name ?? 'Non spécifié' }}</td>
        </tr>
        <tr>
            <td class="data-label">Adresse de messagerie</td>
            <td class="data-value">{{ $reclamation->user->email ?? 'Non renseigné' }}</td>
        </tr>
        <tr>
            <td class="data-label">Numéro de téléphone</td>
            <td class="data-value">{{ $reclamation->user->telephone ?? 'Non renseigné' }}</td>
        </tr>
        <tr>
            <td class="data-label">Statut du demandeur</td>
            <td class="data-value">Assuré Social Titulaire (Fonction Publique / Armée / Retraité)</td>
        </tr>
    </table>

    <!-- Section 2 : Caractéristiques de la Requête -->
    <div class="section-header">2. Paramètres & Statut de la Réclamation</div>
    <table class="data-table">
        <tr>
            <td class="data-label">Domaine / Catégorie</td>
            <td class="data-value" style="font-weight: bold; color: #0B3B60;">
                {{ $reclamation->categorie->nom ?? 'Prestations & Pensions Générales' }}
            </td>
        </tr>
        <tr>
            <td class="data-label">Date & Heure de dépôt</td>
            <td class="data-value">{{ $reclamation->created_at->format('d/m/Y à H:i:s') }}</td>
        </tr>
        <tr>
            <td class="data-label">Degré d'urgence</td>
            <td class="data-value">
                @if($reclamation->priorite == 'urgente')
                    <span style="color: #b91c1c; font-weight: bold;">Urgente (Hospitalisation AMO / Cas critique)</span>
                @elseif($reclamation->priorite == 'normale')
                    <span style="color: #1e40af; font-weight: bold;">Normale (Délai standard 48h-72h)</span>
                @else
                    <span style="color: #475569; font-weight: bold;">Faible (Demande d'information)</span>
                @endif
            </td>
        </tr>
        <tr>
            <td class="data-label">État d'instruction</td>
            <td class="data-value">
                @if($reclamation->statut == 'en_attente')
                    <span class="status-badge status-en_attente">En attente d'instruction administrative</span>
                @elseif($reclamation->statut == 'en_cours')
                    <span class="status-badge status-en_cours">Instruction technique en cours</span>
                @elseif($reclamation->statut == 'traitee')
                    <span class="status-badge status-traitee">Dossier Traité et Clôturé</span>
                @else
                    <span class="status-badge status-rejetee">Dossier Rejeté</span>
                @endif
            </td>
        </tr>
    </table>

    <!-- Section 3 : Objet & Contenu Détaillé -->
    <div class="section-header">3. Objet du Dossier & Exposé des Faits</div>
    <div style="font-size: 9pt; font-weight: bold; color: #0B3B60; margin-top: 4px;">
        Objet : {{ $reclamation->objet }}
    </div>
    <div class="content-box">
        {!! nl2br(e($reclamation->description)) !!}
    </div>

    <!-- Notice d'engagement légal -->
    <div class="notice-box">
        <strong>&bull; Information importante pour l'usager :</strong>
        Le présent récépissé officiel atteste de l'enregistrement effectif de votre réclamation dans le système d'information de la CMSS. 
        Conformément à la Charte d'Accueil et d'Écoute de la CMSS, votre dossier fait l'objet d'un examen sous un délai réglementaire de <strong>48h à 72h ouvrables</strong>.
        Pour toute démarche ou demande d'information au guichet, veuillez vous munir de votre référence officielle : <strong>{{ $reclamation->reference }}</strong>.
    </div>

    <!-- Signatures & Cachet Officiel -->
    <table class="signatures-table">
        <tr>
            <td>
                <div class="stamp-box">
                    <div class="official-seal-text">Le Requérant / L'Assuré</div>
                    <div class="official-seal-sub">Signature électronique certifiée</div>
                    <div style="margin-top: 16px; font-weight: bold; font-size: 8pt; color: #334155;">
                        {{ $reclamation->user->name ?? 'L\'Assuré' }}
                    </div>
                </div>
            </td>
            <td>
                <div class="stamp-box">
                    <div class="official-seal-text">Pour le Directeur Général &amp; P.D.</div>
                    <div class="official-seal-sub">Le Chef de Service Accueil &amp; Réclamations</div>
                    <div>
                        <span class="certified-pill">Cachet Électronique CMSS</span>
                    </div>
                    <div style="margin-top: 4px; font-size: 7pt; color: #64748b;">
                        Réf. Sécurité : {{ $securityHash }}
                    </div>
                </div>
            </td>
        </tr>
    </table>

    <!-- Pied de Page Institutionnel -->
    <div class="footer-note">
        <strong>Caisse Malienne de Sécurité Sociale (CMSS)</strong> &mdash; Établissement Public National à Caractère Administratif<br>
        Siège Social : Square Patrice Lumumba, BP 53, Bamako (République du Mali) &bull; Tél : (+223) 20 22 45 00 / 20 22 45 01<br>
        Portail Numérique Officiel : <strong>cmss.ml</strong> &bull; Assistance Usagers : <strong>support@cmss.danayaplus.com</strong>
    </div>

</body>
</html>