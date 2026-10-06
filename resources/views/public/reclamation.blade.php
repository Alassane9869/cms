<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMSS - Soumettre une Réclamation</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #1e3a5f 0%, #2d6a9f 100%);
            min-height: 100vh;
            padding: 40px 20px;
        }
        .container {
            max-width: 700px;
            margin: 0 auto;
        }
        .header {
            text-align: center;
            color: white;
            margin-bottom: 30px;
        }
        .header img {
            width: 80px;
            height: 80px;
            background: white;
            border-radius: 50%;
            padding: 15px;
            margin-bottom: 15px;
        }
        .header h1 {
            font-size: 28px;
            margin-bottom: 8px;
        }
        .header p {
            opacity: 0.8;
            font-size: 15px;
        }
        .card {
            background: white;
            border-radius: 16px;
            padding: 40px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.2);
        }
        .success {
            background: #d1fae5;
            border-left: 4px solid #10b981;
            color: #065f46;
            padding: 16px 20px;
            border-radius: 8px;
            margin-bottom: 24px;
            font-size: 15px;
        }
        .error-box {
            background: #fee2e2;
            border-left: 4px solid #ef4444;
            color: #991b1b;
            padding: 16px 20px;
            border-radius: 8px;
            margin-bottom: 24px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-label {
            display: block;
            font-weight: 600;
            color: #374151;
            margin-bottom: 8px;
            font-size: 14px;
        }
        .form-control {
            width: 100%;
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            padding: 12px 16px;
            font-size: 15px;
            transition: all 0.3s;
            outline: none;
            font-family: 'Segoe UI', sans-serif;
        }
        .form-control:focus {
            border-color: #2d6a9f;
            box-shadow: 0 0 0 3px rgba(45,106,159,0.1);
        }
        .grid-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        @media (max-width: 640px) {
            .grid-2 {
                grid-template-columns: 1fr;
                gap: 12px;
            }
            .card {
                padding: 22px 18px !important;
            }
            .header h1 {
                font-size: 24px !important;
            }
        }
        .btn-submit {
            width: 100%;
            background: linear-gradient(135deg, #1e3a5f, #2d6a9f);
            color: white;
            border: none;
            padding: 14px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 10px;
        }
        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(30,58,95,0.4);
        }
        .footer {
            text-align: center;
            color: rgba(255,255,255,0.7);
            margin-top: 20px;
            font-size: 13px;
        }
        .info-box {
            background: #eff6ff;
            border-radius: 8px;
            padding: 16px;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 12px;
            color: #1e3a5f;
            font-size: 14px;
        }
        .section-title {
            font-size: 16px;
            font-weight: 700;
            color: #1e3a5f;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #eff6ff;
        }
    </style>
</head>
<body>

    <div class="container">

        <!-- Header -->
        <div class="header">
            <div style="background: white; border-radius: 50%; width: 80px; height: 80px; display: flex; align-items: center; justify-content: center; margin: 0 auto 15px;">
               <img src="{{ asset('images/logo.jpg') }}" alt="CMSS Logo" style="width: 80px; height: 80px; object-fit: contain;">
            </div>
            <h1>CMSS</h1>
            <p>Caisse Malienne de Sécurité Sociale</p>
            <p style="margin-top: 5px; font-size: 18px; font-weight: 600;">Portail de Réclamations en Ligne</p>
        </div>

        <!-- Card -->
        <div class="card">

            @if(session('success'))
                <div class="success">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="error-box">
                    <ul style="padding-left: 20px;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="info-box">
                <i class="fas fa-info-circle" style="font-size: 20px;"></i>
                <span>Soumettez votre réclamation en ligne sans vous déplacer. Vous recevrez une confirmation par email avec votre numéro de référence.</span>
            </div>

            <form action="{{ route('reclamation.publique.store') }}" method="POST">
                @csrf

                <!-- Informations personnelles -->
                <div class="section-title">
                    <i class="fas fa-user"></i> Vos Informations
                </div>

                <div class="grid-2">
                    <div class="form-group">
                        <label class="form-label">Nom complet *</label>
                        <input type="text" name="nom" value="{{ old('nom') }}"
                               class="form-control" placeholder="Votre nom complet">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Email *</label>
                        <input type="email" name="email" value="{{ old('email') }}"
                               class="form-control" placeholder="votre@email.com">
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Téléphone</label>
                    <input type="text" name="telephone" value="{{ old('telephone') }}"
                           class="form-control" placeholder="+223 XX XX XX XX">
                </div>

                <!-- Réclamation -->
                <div class="section-title" style="margin-top: 10px;">
                    <i class="fas fa-clipboard-list"></i> Votre Réclamation
                </div>

                <div class="form-group">
                    <label class="form-label">Catégorie</label>
                    <select name="categorie_id" class="form-control">
                        <option value="">-- Sélectionner une catégorie --</option>
                        @foreach($categories as $categorie)
                            <option value="{{ $categorie->id }}" {{ old('categorie_id') == $categorie->id ? 'selected' : '' }}>
                                {{ $categorie->nom }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label">Objet de la réclamation *</label>
                    <input type="text" name="objet" value="{{ old('objet') }}"
                           class="form-control" placeholder="Résumez votre réclamation en une ligne">
                </div>

                <div class="form-group">
                    <label class="form-label">Description détaillée *</label>
                    <textarea name="description" rows="6" class="form-control"
                              placeholder="Décrivez votre réclamation en détail...">{{ old('description') }}</textarea>
                </div>

                <button type="submit" class="btn-submit">
                    <i class="fas fa-paper-plane"></i> Envoyer ma Réclamation
                </button>

            </form>

        </div>

        <div class="footer">
            <p>© {{ date('Y') }} CMSS - Caisse Malienne de Sécurité Sociale</p>
            <p style="margin-top: 5px;">Vous avez un compte ? <a href="{{ route('login') }}" style="color: white; font-weight: 600;">Se connecter</a></p>
        </div>

    </div>

</body>
</html>