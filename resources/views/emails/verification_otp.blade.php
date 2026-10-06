<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Code de confirmation - CMSS Mali</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f1f5f9; color: #1e293b; margin: 0; padding: 20px; }
        .wrapper { max-width: 580px; margin: 0 auto; background: #ffffff; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.06); border: 1px solid #e2e8f0; }
        .tricolor { height: 6px; width: 100%; display: flex; }
        .tricolor-green { width: 33.33%; background: #15803d; }
        .tricolor-gold { width: 33.33%; background: #eab308; }
        .tricolor-red { width: 33.33%; background: #dc2626; }
        .header { background: #0B3B60; color: #ffffff; padding: 28px 24px; text-align: center; }
        .header h1 { margin: 0; font-size: 20px; font-weight: 800; letter-spacing: 0.5px; }
        .header p { margin: 6px 0 0; font-size: 13px; color: #93c5fd; }
        .content { padding: 32px 28px; }
        .greeting { font-size: 16px; font-weight: 600; color: #0B3B60; margin-bottom: 12px; }
        .text { font-size: 14px; line-height: 1.6; color: #475569; margin-bottom: 24px; }
        .otp-container { background: #f8fafc; border: 2px dashed #0B3B60; border-radius: 12px; padding: 20px; text-align: center; margin: 24px 0; }
        .otp-label { font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; color: #64748b; margin-bottom: 8px; }
        .otp-code { font-size: 36px; font-weight: 900; letter-spacing: 8px; color: #0B3B60; font-family: 'Courier New', Courier, monospace; }
        .otp-validity { font-size: 12px; color: #d97706; font-weight: 600; margin-top: 8px; }
        .notice { background: #eff6ff; border-left: 4px solid #3b82f6; padding: 12px 16px; border-radius: 6px; font-size: 12px; color: #1e40af; line-height: 1.5; margin-bottom: 24px; }
        .footer { background: #06182a; color: #94a3b8; text-align: center; padding: 20px; font-size: 11px; line-height: 1.5; }
        .footer a { color: #facc15; text-decoration: none; }
    </style>
</head>
<body>

<div class="wrapper">
    <!-- Drapeau tricolore national -->
    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="height: 6px;">
        <tr>
            <td width="33.33%" bgcolor="#15803d" style="height: 6px;"></td>
            <td width="33.33%" bgcolor="#eab308" style="height: 6px;"></td>
            <td width="33.33%" bgcolor="#dc2626" style="height: 6px;"></td>
        </tr>
    </table>

    <div class="header">
        <h1>CAISSE MALIENNE DE SÉCURITÉ SOCIALE</h1>
        <p>Portail Officiel des Réclamations & Requêtes</p>
    </div>

    <div class="content">
        <div class="greeting">Bonjour {{ $nom }},</div>

        <p class="text">
            Pour activer votre <strong>Espace Assuré CMSS</strong> et soumettre vos réclamations officielles en toute sécurité, veuillez confirmer votre adresse email à l'aide de votre code temporaire à usage unique (OTP).
        </p>

        <div class="otp-container">
            <div class="otp-label">Votre Code de Vérification (OTP)</div>
            <div class="otp-code">{{ $otpCode }}</div>
            <div class="otp-validity">⏱ Ce code est valable pendant 15 minutes</div>
        </div>

        <div class="notice">
            <strong>⚠️ Consigne de sécurité étatique :</strong><br>
            Ne communiquez jamais ce code à un tiers. Aucun agent de la CMSS ne vous demandera votre mot de passe ni ce code par téléphone.
        </div>

        <p class="text" style="font-size: 12px; color: #64748b;">
            Si vous n'êtes pas à l'origine de cette demande de création de compte, vous pouvez ignorer cet email en toute sécurité.
        </p>
    </div>

    <div class="footer">
        &copy; {{ date('Y') }} Caisse Malienne de Sécurité Sociale (CMSS) &bull; République du Mali<br>
        Hamdallaye ACI 2000, BP 247, Bamako &bull; <a href="https://cmss.ml" target="_blank">www.cmss.ml</a>
    </div>
</div>

</body>
</html>
