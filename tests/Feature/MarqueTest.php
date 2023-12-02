<?php

namespace Tests\Feature;

use App\Models\Marque;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Silber\Bouncer\BouncerFacade as Bouncer;
use Tests\TestCase;

class MarqueTest extends TestCase
{
    public function test_Index_Method_Returns_Correct_View()
    {
        $user = User::factory()->create();
        Bouncer::refresh();

        $response = $this
            ->actingAs($user)
            ->get('/marque');

        $response->assertStatus(200);
        $response->assertViewIs('marque.index');
    }

    public function test_show_marque_for_user(): void
    {
        $user = User::factory()->create();
        $marque = Marque::factory()->create();
        Bouncer::refresh();

        $response = $this
            ->actingAs($user)
            ->get('/marque/' . $marque->id);

        $response->assertOk();
    }

    public function test_access_marque_create_for_user_without_abilities(): void
    {
        $user = User::factory()->create();
        Bouncer::refresh();

        $response = $this
            ->actingAs($user)
            ->get('/marque/create');

        $response->assertStatus(401);
    }

    public function test_access_marque_create_for_user(): void
    {
        $user = User::factory()->create();
        Bouncer::assign('gerant')->to($user);
        Bouncer::allow('gerant')->to('marque-create');
        Bouncer::refresh();

        $response = $this
            ->actingAs($user)
            ->get('/marque/create');

        $response->assertOk();
    }

    public function test_users_can_create_marque(): void
    {
        $user = User::factory()->create();
        Bouncer::assign('gerant')->to($user);
        Bouncer::allow('gerant')->to('marque-create');
        Bouncer::refresh();

        $response = $this;
        $this->actingAs($user);
        $response = $this->post('/marque', [
            'nom' => 'Adidas',
            'pays' => 'France',
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/marque');
    }

    public function test_access_edit_marque_for_user_without_abilities(): void
    {
        $user = User::factory()->create();
        Bouncer::refresh();

        $marque = Marque::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get("/marque/{$marque->id}/edit");

        $response->assertStatus(401);
    }

    public function test_users_can_update_marque(): void
    {
        $user = User::factory()->create();
        Bouncer::assign('gerant')->to($user);
        Bouncer::allow('gerant')->to('marque-update');
        Bouncer::refresh();

        $marque = Marque::factory()->create();

        $response = $this;
        $this->actingAs($user);
        $response = $this->patch("/marque/{$marque->id}", [
            'nom' => 'Adidas',
            'pays' => 'France',
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/marque');
    }

    public function test_access_marque_cant_be_destroyed_for_user_without_abilities(): void
    {

        // Création d'un utilisateur avec les rôles nécessaires
        $user = User::factory()->create();
        Bouncer::refresh();

        // Création d'une marque
        $marque = Marque::factory()->create();

        // Requête DELETE pour détruire la marque
        $response = $this
            ->actingAs($user)
            ->delete("/marque/{$marque->id}");

        $response->assertStatus(302);
    }

    public function test_marque_can_be_destroyed(): void
    {

        // Création d'un utilisateur avec les rôles nécessaires
        $user = User::factory()->create();
        Bouncer::assign('gerant')->to($user);
        Bouncer::allow('gerant')->to('marque-retrieve');
        Bouncer::refresh();

        // Création d'une marque
        $marque = Marque::factory()->create();

        // Vérification que la marque existe avant la destruction
        $this->assertDatabaseHas('marques', ['id' => $marque->id]);

        // Requête DELETE pour détruire la marque
        $response = $this
            ->actingAs($user)
            ->delete("/marque/{$marque->id}");

        // Assurer une redirection après la destruction
        $response->assertRedirect('/marque');

        // Vérification que la colonne deleted_at de la marque supprimée s'actualise
        $this->assertNotNull(Marque::withTrashed()->find($marque->id)->deleted_at);
    }
}
