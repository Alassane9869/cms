<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test que la page d'accueil officielle CMSS est accessible.
     */
    public function test_home_page_is_accessible(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Caisse Malienne de Sécurité Sociale');
    }

    /**
     * Test que le guide des réclamations est accessible.
     */
    public function test_guide_page_is_accessible(): void
    {
        $response = $this->get('/guide-reclamation');
        $response->assertStatus(200);
        $response->assertSee('Comment faire une Réclamation');
    }

    /**
     * Test que le dépôt de réclamation redirige un usager non-connecté vers l'inscription.
     */
    public function test_unauthenticated_user_is_redirected_to_register_for_reclamation(): void
    {
        $response = $this->get('/soumettre-reclamation');
        $response->assertRedirect(route('register'));
    }

    /**
     * Test qu'un assuré connecté avec email vérifié accède au formulaire officiel de réclamation.
     */
    public function test_verified_user_can_access_reclamation_form(): void
    {
        $citoyen = User::factory()->create([
            'role'              => 'utilisateur',
            'email_verified_at' => now(),
        ]);

        $response = $this->actingAs($citoyen)->get('/soumettre-reclamation');
        $response->assertStatus(200);
        $response->assertSee('Formulaire de Réclamation Usager');
    }

    /**
     * Test du flux de vérification par code OTP.
     */
    public function test_user_can_verify_email_with_otp_code(): void
    {
        $user = User::factory()->create([
            'email_verified_at' => null,
            'otp_code'          => '123456',
            'otp_expires_at'    => now()->addMinutes(15),
        ]);

        $response = $this->actingAs($user)->post('/verify-otp', [
            'otp_code' => '123456',
        ]);

        $response->assertRedirect(route('reclamation.publique'));
        $this->assertNotNull($user->fresh()->email_verified_at);
    }

    /**
     * Test que l'espace citoyen particulier fonctionne pour un assuré.
     */
    public function test_citizen_dashboard_is_accessible_for_utilisateur(): void
    {
        $citoyen = User::factory()->create([
            'role' => 'utilisateur',
        ]);

        $response = $this->actingAs($citoyen)->get('/dashboard');
        $response->assertStatus(200);
        $response->assertSee('Espace Assuré Social');
    }

    /**
     * Test que le tableau de bord d'administration fonctionne pour un agent/admin.
     */
    public function test_admin_dashboard_is_accessible_for_admin(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
        ]);

        $response = $this->actingAs($admin)->get('/dashboard');
        $response->assertStatus(200);
    }
}
