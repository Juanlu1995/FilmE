<?php

namespace Tests\Feature;

use App\Film;
use App\Review;
use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReviewsTest extends TestCase
{

    use DatabaseTransactions;


    private function createUser()
    {
        $user = Factory(User::class)->create();
        $this->post('/login', ['email' => $user->email, 'password' => $user->password]);
        return $user;
    }


    private function createFilm($user)
    {
        return Factory(Film::class)->create(['user_id' => $user->id]);

    }

    private function createReview($user, $film)
    {
        if (!$user) {
            $user = $this->createUser();

            $this->post('/login', ['email' => $user->email, 'password' => $user->password]);
        }
        $film ? null : $film = $this->createFilm($user);

        $review = Factory(Review::class)->create(['user_id' => $user->id, 'film_id' => $film->id]);

        return $review;
    }


    /**
     * Mostramos la lista de reviews
     *
     * GET /reviews
     */
    public function testShowReviewsList()
    {
        $this->get('/reviews')->assertStatus(200);
    }


    /**
     * Creamos y mostramos la vista detalle de una review
     *
     * GET /reviews/{review}
     */
    public function testCreateAndShowReviewDetail()
    {
        $review = $this->createReview(null, null);

        $response = $this->get('/reviews/' . $review->id);
        $response->assertStatus(200);
        $response->assertSee($review->title);
    }

    /**
     * Vemos las reviews de un usuario
     *
     * GET /reviews/user/{username}
     */
    public function testShowUserReview()
    {
        $user = $this->createUser();
        $response = $this->get('/reviews/user/' . $user->username);
        $response->assertStatus(200);
        $response->assertSee($user->name);
    }

    /**
     * Vemos las reviews de una película
     *
     * GET /reviews/film/{id}
     */
    public function testShowFilmReview()
    {
        $user = $this->createUser();
        $film = $this->createFilm($user);

        $this->createReview($user, $film);

        $response = $this->get('/reviews/film/' . $film->id);
        $response->assertStatus(200);
        $response->assertSee($film->name);
    }

    /**
     * Probamos acceder a la ruta de creacion de una review de una película
     *
     * GET /reviews/film/{film}
     */
    public function testShowCreateFilmReview()
    {
        $user = $this->createUser();
        $film = $this->createFilm($user);
        $response = $this->actingAs($user)->get('/reviews/create/'.$film->id);
        $response->assertStatus(200);
        $response->assertSee($film->cover);
    }
}
