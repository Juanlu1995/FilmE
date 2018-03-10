<?php

namespace Tests\Feature;

use App\Category;
use App\Contribute;
use App\Film;
use App\Producer;
use App\User;
use Faker\Factory;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class filmTest extends TestCase
{
    use DatabaseTransactions;


    private function createUser()
    {
        $user = Factory(User::class)->create();
        $this->post('/login', ['email' => $user->email, 'password' => $user->password]);
        return $user;
    }


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
     * Ruta de creación de una película
     *
     * POST /films
     */
    public function testCreacion()
    {
        $user = $this->createUser();

        $actors = "hola, que, tal";
        $directors = "hola, aqui, estoy";
        $producer = Factory(Producer::class)->create();
        $category = Factory(Category::class)->create();


        $film = Factory(Film::class)->create([
            'user_id' => $user->id,
            'producer_id' => $producer->id,
            'category_id' => $category->id,
            'nationality_id' => 1
        ]);



        $response = $this->actingAs($user)->post('/films', [
            'user_id' => $film->user_id,
            'name' => $film->name,
            'synopsis' => $film->synopsis,
            'cover' => $film->cover,
            'date' => $film->date,
            'duration' => $film->duration,
            'rating' => $film->rating,
            'producer' => $producer->id,
            'category' => $category->id,
            'nationality' => 1,
            'actors' => $actors,
            'directors' => $directors
        ]);


        $response->assertStatus(302);

        $response = $this->get('/films/show/'.$film->id);

        $response->assertSee($film->name);
    }

}
