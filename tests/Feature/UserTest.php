<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Probamos que se pueda ver la vista detalle de un usuario
     *
     * GET /users/show/{username}
     */
    public function testShowUser()
    {
        $user = Factory(User::class)->create();
        $response = $this->get('/users/show/'.$user->username);

        $response->assertSee($user->username);
    }
}
