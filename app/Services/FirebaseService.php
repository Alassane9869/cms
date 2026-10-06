<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class FirebaseService
{
    public function sendReclamationTraitee(User $user, string $reference): void
    {
        $serviceAccountPath = config('services.firebase.credentials');

        if (!$user->fcm_token || !is_file($serviceAccountPath)) {
            return;
        }

        $serviceAccount = json_decode(file_get_contents($serviceAccountPath), true);
        $accessToken = $this->accessToken($serviceAccount);

        $response = Http::withToken($accessToken)
            ->post("https://fcm.googleapis.com/v1/projects/{$serviceAccount['project_id']}/messages:send", [
                'message' => [
                    'token' => $user->fcm_token,
                    'notification' => [
                        'title' => 'Réclamation traitée',
                        'body' => "Votre dossier {$reference} est prêt à être récupéré à la CMSS.",
                    ],
                    'data' => ['reference' => $reference],
                ],
            ]);

        if ($response->failed()) {
            Log::warning('Échec de notification push FCM', ['response' => $response->json()]);
        }
    }

    private function accessToken(array $serviceAccount): string
    {
        $issuedAt = time();
        $header = rtrim(strtr(base64_encode(json_encode(['alg' => 'RS256', 'typ' => 'JWT'])), '+/', '-_'), '=');
        $claims = rtrim(strtr(base64_encode(json_encode([
            'iss' => $serviceAccount['client_email'],
            'scope' => 'https://www.googleapis.com/auth/firebase.messaging',
            'aud' => $serviceAccount['token_uri'],
            'iat' => $issuedAt,
            'exp' => $issuedAt + 3600,
        ])), '+/', '-_'), '=');

        openssl_sign("{$header}.{$claims}", $signature, $serviceAccount['private_key'], OPENSSL_ALGO_SHA256);
        $jwt = "{$header}.{$claims}." . rtrim(strtr(base64_encode($signature), '+/', '-_'), '=');

        return Http::asForm()->post($serviceAccount['token_uri'], [
            'grant_type' => 'urn:ietf:params:oauth:grant-type:jwt-bearer',
            'assertion' => $jwt,
        ])->throw()->json('access_token');
    }
}
