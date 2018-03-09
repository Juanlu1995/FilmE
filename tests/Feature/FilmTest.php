<?php

namespace Tests\Feature;

use App\Contribute;
use App\Film;
use App\User;
use Faker\Factory;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class filmTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Un test de creación y ver la película creada.
     *
     * GET /films/show/{film}
     */
    public function testCreateAndShow()
    {
        $user = Factory(User::class)->create();

        $this->post('/login', ['email' => $user->email, 'password' => $user->password]);

        $film = Factory(Film::class)->create(['user_id' => $user->id]);

        $response = $this->get('/films/show/' . $film->id);

        $response->assertStatus(200);
        $response->assertSee($film->name);
    }

    /**
     * Se prueba que la página de creación no pueda entrar sin estar logueado (status 302)
     * Se prueba que la página de creación carga una vez logueados (status 200).
     *
     * GET /films/create
     */
    public function testPaginaCreacion()
    {
        $response = $this->get('/films/create');

        $response->assertStatus(302);

        $user = Factory(User::class)->create();
        $this->post('/login', ['email' => $user->email, 'password' => $user->password]);

        $response = $this->actingAs($user)->get('/films/create');

        $response->assertStatus(200);
    }

    /**
     *
     * POST /films
     */
//    public function testCreacion(){
//        $user = Factory(User::class)->create();
////        $directors = Factory(Contribute::class, 1)->create();
////        $actors = Factory(Contribute::class, 3)->create();
//
//        $this->post('/login',['email' => $user->email, 'password' => $user->password]);
//
//        $film = Factory(Film::class)->make(['user_id' => $user->id]);
//
//        $response = $this->actingAs($user)->post('/films',[
//            'film' => $film
//        ])->assertStatus(200);
//
//        $response->assertSee($film->name);
//    }

}
