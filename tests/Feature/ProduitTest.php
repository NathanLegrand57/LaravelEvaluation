<?php

namespace Tests\Feature;

use App\Models\Produit;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Silber\Bouncer\BouncerFacade as Bouncer;
use Tests\TestCase;

class ProduitTest extends TestCase
{

    public function test_Index_Method_Returns_Correct_View()
    {
        $user = User::factory()->create();
        Bouncer::refresh();

        $response = $this
            ->actingAs($user)
            ->get('/produit');

        $response->assertStatus(200);
        $response->assertViewIs('produit.index');
    }

    public function test_show_produit_for_user(): void
    {
        $user = User::factory()->create();
        $produit = Produit::factory()->create();
        Bouncer::refresh();

        $response = $this
            ->actingAs($user)
            ->get('/produit/' . $produit->id);

        $response->assertOk();
    }

    public function test_access_produit_create_for_user_without_abilities(): void
    {
        $user = User::factory()->create();
        Bouncer::refresh();

        $response = $this
            ->actingAs($user)
            ->get('/produit/create');

        $response->assertStatus(401);
    }

    public function test_access_produit_create_for_user(): void
    {
        $user = User::factory()->create();
        Bouncer::assign('gerant')->to($user);
        Bouncer::allow('gerant')->to('produit-create');
        Bouncer::refresh();

        $response = $this
            ->actingAs($user)
            ->get('/produit/create');

        $response->assertOk();
    }

    public function test_users_can_create_produit(): void
    {
        $user = User::factory()->create();
        Bouncer::assign('gerant')->to($user);
        Bouncer::allow('gerant')->to('produit-create');
        Bouncer::refresh();

        $response = $this;
        $this->actingAs($user);
        $response = $this->post('/produit', [
            'nom' => 'Sneakers',
            'prix' => '12',
            'reference' => 'sneak3154',
            'marque_id' => '1',
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/produit');
    }

    public function test_access_edit_produit_for_user_without_abilities(): void
    {
        $user = User::factory()->create();
        Bouncer::refresh();

        $produit = Produit::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get("/produit/{$produit->id}/edit");

        $response->assertStatus(401);
    }

    public function test_users_can_update_produit(): void
    {
        $user = User::factory()->create();
        Bouncer::assign('gerant')->to($user);
        Bouncer::allow('gerant')->to('produit-update');
        Bouncer::refresh();

        $produit = Produit::factory()->create();

        $response = $this;
        $this->actingAs($user);
        $response = $this->patch("/produit/{$produit->id}", [
            'nom' => 'Sneakers',
            'prix' => '12',
            'reference' => 'sneak3154',
            'marque_id' => '3',
        ]);

        $response->assertSessionHasNoErrors();
        // $response->assertRedirect('/produit');
    }

    public function test_access_produit_cant_be_destroyed_for_user_without_abilities(): void
    {

        // Création d'un utilisateur avec les rôles nécessaires
        $user = User::factory()->create();
        Bouncer::refresh();

        // Création d'une produit
        $produit = Produit::factory()->create();

        // Requête DELETE pour détruire la produit
        $response = $this
            ->actingAs($user)
            ->delete("/produit/{$produit->id}");

        $response->assertStatus(302);
    }

    public function test_produit_can_be_destroyed(): void
    {

        // Création d'un utilisateur avec les rôles nécessaires
        $user = User::factory()->create();
        Bouncer::assign('gerant')->to($user);
        Bouncer::allow('gerant')->to('produit-retrieve');
        Bouncer::refresh();

        // Création d'une produit
        $produit = Produit::factory()->create();

        // Vérification que la produit existe avant la destruction
        $this->assertDatabaseHas('produits', ['id' => $produit->id]);

        // Requête DELETE pour détruire la produit
        $response = $this
            ->actingAs($user)
            ->delete("/produit/{$produit->id}");

        // Assurer une redirection après la destruction
        $response->assertRedirect('/produit');

        // Vérification que la colonne deleted_at de la produit supprimée s'actualise
        $this->assertNotNull(Produit::withTrashed()->find($produit->id)->deleted_at);
    }
}
