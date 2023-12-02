<?php

namespace Tests\Feature;

use App\Http\Controllers\VenteController;
use App\Http\Repositories\VenteRepository;
use App\Http\Requests\VenteRequest;
use App\Mail\UpdateVente;
use App\Models\User;
use App\Models\Vente;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Mail;
use Mockery;
use Silber\Bouncer\BouncerFacade as Bouncer;
use Tests\TestCase;

class VenteTest extends TestCase
{
    public function test_root_is_index_of_vente()
    {
        $user = User::factory()->create();
        Bouncer::refresh();

        $response = $this
            ->actingAs($user)
            ->get('/');

        $response->assertStatus(200);
        $response->assertViewIs('vente.index');
    }

    public function test_Index_Method_Returns_Correct_View()
    {
        $user = User::factory()->create();
        Bouncer::refresh();

        $response = $this
            ->actingAs($user)
            ->get('/vente');

        $response->assertStatus(200);
        $response->assertViewIs('vente.index');
    }

    public function test_show_vente_for_user(): void
    {
        $user = User::factory()->create();
        $vente = Vente::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get('/vente/' . $vente->id);

        $response->assertOk();
    }

    public function test_access_vente_create_for_user_without_abilities(): void
    {
        $user = User::factory()->create();
        Bouncer::refresh();

        $response = $this
            ->actingAs($user)
            ->get('/vente/create');

        $response->assertStatus(401);
    }

    public function test__access_create_vente_for_user(): void
    {
        $user = User::factory()->create();
        Bouncer::assign('gerant')->to($user);
        Bouncer::allow('gerant')->to('vente-create');
        Bouncer::refresh();
        $response = $this
            ->actingAs($user)
            ->get('/vente/create');

        $response->assertOk();
    }

    public function test_users_can_create_vente(): void
    {
        $user = User::factory()->create();
        Bouncer::assign('gerant')->to($user);
        Bouncer::allow('gerant')->to('vente-create');
        Bouncer::refresh();

        $response = $this;
        $this->actingAs($user);
        $response = $this->post('/vente', [
            'quantite' => '3',
            'produit_id' => '3',
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/vente');
    }
    public function test_access_edit_vente_for_user_without_abilities(): void
    {
        $user = User::factory()->create();
        Bouncer::refresh();

        $vente = Vente::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get("/vente/{$vente->id}/edit");

        $response->assertStatus(401);
    }

    public function test_users_can_update_vente(): void
    {
        $user = User::factory()->create();
        Bouncer::assign('gerant')->to($user);
        Bouncer::allow('gerant')->to('vente-update');
        Bouncer::refresh();

        $vente = Vente::factory()->create();

        $response = $this;
        $this->actingAs($user);
        $response = $this->patch("/vente/{$vente->id}", [
            'quantite' => '3',
            'produit_id' => '3',
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/vente');
    }

    public function test_access_vente_cant_be_destroyed_for_user_without_abilities(): void
    {

        // Création d'un utilisateur avec les rôles nécessaires
        $user = User::factory()->create();
        Bouncer::refresh();

        // Création d'une vente
        $vente = Vente::factory()->create();

        // Requête DELETE pour détruire la vente
        $response = $this
            ->actingAs($user)
            ->delete("/vente/{$vente->id}");

        $response->assertStatus(302);
    }

    public function test_vente_can_be_destroyed(): void
    {

        // Création d'un utilisateur avec les rôles nécessaires
        $user = User::factory()->create();
        Bouncer::assign('gerant')->to($user);
        Bouncer::allow('gerant')->to('vente-retrieve');
        Bouncer::refresh();

        // Création d'une vente
        $vente = Vente::factory()->create();

        // Vérification que la vente existe avant la destruction
        $this->assertDatabaseHas('ventes', ['id' => $vente->id]);

        // Requête DELETE pour détruire la vente
        $response = $this
            ->actingAs($user)
            ->delete("/vente/{$vente->id}");

        // Assurer une redirection après la destruction
        $response->assertRedirect('/vente');

        // Vérification que la colonne deleted_at de la vente supprimée s'actualise
        $this->assertNotNull(Vente::withTrashed()->find($vente->id)->deleted_at);
    }
}
