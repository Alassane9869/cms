<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMSS - Connexion</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Segoe UI', sans-serif;
            min-height: 100vh;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        /* --- Image de fond en plein écran --- */
        .bg-photo {
            position: fixed;
            inset: 0;
            background-image: url('{{ asset('images/caisse.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            z-index: -2;
        }

        /* --- Voile sombre par-dessus la photo, pour la lisibilité --- */
        .bg-overlay {
            position: fixed;
            inset: 0;
            background: rgba(15, 23, 42, 0.55);
            z-index: -1;
        }

        /* --- Bloc logo + titre, au-dessus de la photo --- */
        .top-block {
            text-align: center;
            margin-bottom: 16px;
        }
        .top-block .logo {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            overflow: hidden;
            background: white;
            margin: 0 auto 10px auto;
            box-shadow: 0 8px 20px rgba(0,0,0,0.3);
        }
        .top-block .logo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .top-block h1 {
            color: white;
            font-size: 17px;
            font-weight: 700;
            margin-bottom: 4px;
        }
        .top-block p {
            color: rgba(255,255,255,0.85);
            font-size: 12px;
            max-width: 300px;
            margin: 0 auto;
            line-height: 1.35;
        }

        /* --- Carte du formulaire --- */
        .wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .card {
            background: rgba(255,255,255,0.97);
            border-radius: 14px;
            padding: 22px 22px;
            width: 100%;
            max-width: 300px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.35);
        }

        .form-group { margin-bottom: 14px; }
        .form-label {
            display: block;
            font-weight: 600;
            color: #374151;
            margin-bottom: 5px;
            font-size: 12px;
        }
        .input-wrapper { position: relative; }
        .input-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            font-size: 13px;
        }
        .form-control {
            width: 100%;
            border: 1.5px solid #e5e7eb;
            border-radius: 8px;
            padding: 9px 12px 9px 34px;
            font-size: 13px;
            transition: all 0.3s;
            outline: none;
            font-family: 'Segoe UI', sans-serif;
            background: #f9fafb;
        }
        .form-control:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 3px rgba(99,102,241,0.15);
            background: white;
        }

        .remember {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 16px;
        }
        .remember label {
            display: flex;
            align-items: center;
            gap: 5px;
            color: #6b7280;
            font-size: 11px;
            cursor: pointer;
        }
        .remember a {
            color: #6366f1;
            font-size: 11px;
            text-decoration: none;
        }

        .btn-submit {
            width: 100%;
            background: linear-gradient(135deg, #6366f1, #4f46e5);
            color: white;
            border: none;
            padding: 10px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }
        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(79,70,229,0.4);
        }

        .error {
            background: #fee2e2;
            border-left: 4px solid #ef4444;
            color: #991b1b;
            padding: 8px 12px;
            border-radius: 6px;
            margin-bottom: 14px;
            font-size: 12px;
        }

        .divider {
            text-align: center;
            margin: 14px 0;
            color: #9ca3af;
            font-size: 11px;
        }

        .public-link {
            display: block;
            text-align: center;
            background: #f3f4f6;
            color: #374151;
            padding: 9px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 12px;
            font-weight: 600;
            transition: all 0.3s;
        }
        .public-link:hover { background: #eef2ff; color: #4f46e5; }

        .footnote {
            text-align: center;
            color: #9ca3af;
            font-size: 10px;
            margin-top: 12px;
        }
    </style>
</head>
<body>

    <!-- Fond photo + voile -->
    <div class="bg-photo"></div>
    <div class="bg-overlay"></div>

    <div class="wrapper">

        <!-- Logo + titre au-dessus de la carte -->
        <div class="top-block">
            <div class="logo">
                <img src="{{ asset('images/logo.jpg') }}" alt="logo CMSS">
            </div>
            <h1>Caisse Malienne de Sécurité Sociale</h1>
            <p>Connectez-vous pour accéder au système de gestion des réclamations et du courrier.</p>
        </div>

        <!-- Carte du formulaire -->
        <div class="card">

            @if($errors->any())
                <div class="error">
                    <i class="fas fa-exclamation-circle"></i>
                    Ces identifiants ne correspondent pas à nos enregistrements.
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label class="form-label">Adresse email</label>
                    <div class="input-wrapper">
                        <i class="fas fa-envelope input-icon"></i>
                        <input type="email" name="email" value="{{ old('email') }}"
                               class="form-control" placeholder="votre@cmss.ml" required autofocus>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Mot de passe</label>
                    <div class="input-wrapper">
                        <i class="fas fa-lock input-icon"></i>
                        <input type="password" name="password"
                               class="form-control" placeholder="Votre mot de passe" required>
                    </div>
                </div>

                <div class="remember">
                    <label>
                        <input type="checkbox" name="remember">
                        Se souvenir de moi
                    </label>
                    <a href="{{ route('password.request') }}">Mot de passe oublié ?</a>
                </div>

                <button type="submit" class="btn-submit">
                    Se connecter <i class="fas fa-arrow-right"></i>
                </button>

                <div class="divider">ou</div>

                <a href="{{ route('reclamation.publique') }}" class="public-link">
                    <i class="fas fa-paper-plane"></i> Soumettre une réclamation sans compte
                </a>

            </form>

            <p class="footnote">Accès réservé aux agents autorisés de la CMSS.</p>
        </div>

    </div>

</body>
</html>