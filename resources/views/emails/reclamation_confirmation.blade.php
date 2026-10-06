<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; color: #333; padding: 20px; }
        .header { background: linear-gradient(135deg, #1e3a5f, #2d6a9f); color: white; padding: 30px; border-radius: 8px; margin-bottom: 20px; text-align: center; }
        .header h1 { margin: 0; font-size: 24px; }
        .header p { margin: 5px 0 0; opacity: 0.8; }
        .reference { background: #eff6ff; padding: 20px; border-radius: 8px; text-align: center; margin-bottom: 20px; }
        .reference strong { font-size: 24px; color: #1e3a5f; }
        .content { background: #f9fafb; padding: 20px; border-radius: 8px; margin-bottom: 20px; }
        .etape { display: flex; align-items: center; margin-bottom: 15px; }
        .numero { background: #1e3a5f; color: white; width: 30px; height: 30px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; margin-right: 15px; min-width: 30px; }
        .footer { text-align: center; color: #9ca3af; font-size: 12px; margin-top: 20px; border-top: 1px solid #e5e7eb; padding-top: 20px; }
        .btn { display: inline-block; background: #1e3a5f; color: white; padding: 12px 30px; border-radius: 8px; text-decoration: none; margin-top: 15px; }
    </style>
</head>
<body>

    <div class="header">
        <h1>✅ Réclamation Enregistrée</h1>
        <p>CMSS - Caisse Malienne de Sécurité Sociale</p>
    </div>

    <p>Bonjour <strong>{{ $nom }}</strong>,</p>
    <p>Nous avons bien reçu votre réclamation et nous vous en remercions. Voici votre numéro de référence :</p>

    <div class="reference">
        <p style="color: #6b7280; margin: 0 0 5px;">Votre référence</p>
        <strong>{{ $reference }}</strong>
        <p style="color: #6b7280; margin: 5px 0 0; font-size: 13px;">Conservez ce numéro pour le suivi de votre réclamation</p>
    </div>

    <div class="content">
        <p style="font-weight: bold; color: #1e3a5f; margin-bottom: 15px;"> Détail de votre réclamation</p>
        <p><strong>Objet :</strong> {{ $objet }}</p>
    </div>

    <div class="content">
        <p style="font-weight: bold; color: #1e3a5f; margin-bottom: 15px;">📌Prochaines étapes</p>

        <div class="etape">
            <div class="numero">1</div>
            <div>Votre réclamation est enregistrée et sera examinée par nos agents.</div>
        </div>

        <div class="etape">
            <div class="numero">2</div>
            <div>Un agent CMSS vous contactera dans les <strong>48 heures</strong> ouvrables.</div>
        </div>

        <div class="etape">
            <div class="numero">3</div>
            <div>Vous recevrez un email de réponse à votre adresse : <strong>{{ $nom }}</strong>.</div>
        </div>

    </div>

    <p style="color: #6b7280; font-size: 13px;">
        Si vous avez des questions, vous pouvez nous contacter directement en mentionnant votre référence <strong>{{ $reference }}</strong>.
    </p>

    <div class="footer">
        <p>© {{ date('Y') }} CMSS - Caisse Malienne de Sécurité Sociale</p>
        <p>Cet email a été envoyé automatiquement, merci de ne pas y répondre directement.</p>
    </div>

</body>
</html>