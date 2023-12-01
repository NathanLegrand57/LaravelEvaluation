<?php

namespace Tests\Feature;

use App\Http\Controllers\VenteController;
use App\Http\Repositories\VenteRepository;
use App\Http\Requests\VenteRequest;
use App\Models\User;
use App\Models\Vente;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Mockery;
use Silber\Bouncer\BouncerFacade as Bouncer;
use Tests\TestCase;

class VenteTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testIndexMethodReturnsCorrectView()
    {
        $response = $this->get('/');
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

    public function test__access_create_vente_for_user(): void
    {
        $user = User::factory()->create();
        Bouncer::assign('gerant')->to($user);
        Bouncer::allow('gerant')->to('vente-create');
        Bouncer::refresh();
        dd($user->getAbilities());
        $response = $this
            ->actingAs($user)
            ->get('/vente/create');

        $response->assertOk();
    }

    // public function test_access_create_produit_for_user(): void
    // {
    //     $user = User::factory()->create();
    //     Bouncer::assign('gerant')->to($user);
    //     // Bouncer::allow('gerant')->to('produit-create');

    //     $response = $this
    //         ->actingAs($user)
    //         ->get('/produit/create');

    //     $response->assertOk();
    // }

    // public function test_access_create_marque_for_user(): void
    // {
    //     $user = User::factory()->create();
    //     Bouncer::assign('gerant')->to($user);
    //     // Bouncer::allow('gerant')->to('marque-create');

    //     $response = $this
    //         ->actingAs($user)
    //         ->get('/marque/create');

    //     $response->assertOk();
    // }


    // public function testCreateVenteMethodReturnsCorrectView()
    // {
    //     $response = $this->get(route('vente.index'));
    //     $response->assertStatus(200);
    //     $response->assertViewIs('vente.index');
    // }

    // public function testCheckAllInputFull()
    // {
    //     // Créer un mock du repository
    //     $mockRepository = Mockery::mock(VenteRepository::class);

    //     // Injecter le mock du repository dans le contrôleur
    //     $controller = new VenteController($mockRepository);

    //     // Créer une fausse requête avec les données que vous souhaitez tester
    //     $requestData = [
    //         'quantite' => 'test quantite',
    //         'user_id' => '1',
    //         // autres champs...
    //     ];

    //     $request = new VenteRequest($requestData);

    //     // Définir l'attente sur la méthode store du repository
    //     $mockRepository
    //         ->shouldReceive('store')
    //         ->once()
    //         ->with(Mockery::on(function ($arg) use ($requestData) {
    //             return $arg instanceof Request &&
    //                 $arg->input('quantite') === $requestData['quantite'] &&
    //                 $arg->input('user_id') === $requestData['user_id'];
    //             // Ajoutez d'autres conditions pour les autres champs si nécessaire
    //         }));

    //     // Appeler la méthode store du contrôleur
    //     $response = $controller->store($request);

    //     // Vérifier que la réponse est une instance de RedirectResponse
    //     $this->assertInstanceOf(\Illuminate\Http\RedirectResponse::class, $response);

    //     // Extraire l'URL de redirection de la réponse
    //     $redirectUrl = $response->getTargetUrl();

    //     // Vérifier que l'URL de redirection correspond à la route 'vente.index'
    //     $this->assertEquals(route('vente.index'), $redirectUrl);
    // }
}
