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
     * Test que la page publique de dépôt de réclamation est accessible.
     */
    public function test_public_reclamation_page_is_accessible(): void
    {
        $response = $this->get('/soumettre-reclamation');
        $response->assertStatus(200);
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
