<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProfileTest extends TestCase
{
   use DatabaseTransactions;

    private function createUserAndLogin(){
        $user = Factory(User::class)->create();
        $this->post('/login', ['email' => $user->mail, 'password' => $user->password]);

        return $user;
    }

    /**
     * Accedemos a la página de perfil
     *
     * GET /profile
     */
    public function testShowProfile()
    {
        $user = $this->createUserAndLogin();

        $response = $this->actingAs($user)->get('/profile');

        $response->assertStatus(200);
        $response->assertSee($user->name);
    }

    /**
     * Accedemos a la página edicion del perfil
     *
     * GET /profile/edit
     */
    public function testShowEditProfile(){
        $user = $this->createUserAndLogin();

        $response = $this->actingAs($user)->get('/profile/edit');

        $response->assertStatus(200);
        $response->assertSee('name');
        $response->assertDontSee('Password Confirmation');
    }

    /**
     * Accedemos a la página edicion del perfil de datos
     *
     * GET /profile/edit/data
     */
    public function testShowEditDataProfile(){
        $user = $this->createUserAndLogin();

        $response = $this->actingAs($user)->get('/profile/edit/data');

        $response->assertStatus(200);
        $response->assertSee('name');
        $response->assertDontSee('Password Confirmation');
    }


    /**
     * Accedemos a la página edicion del perfil de contraseña
     *
     * GET /profile/edit/password
     */
    public function testShowEditPasswordProfile(){
        $user = $this->createUserAndLogin();

        $response = $this->actingAs($user)->get('/profile/edit/password');

        $response->assertStatus(200);
        $response->assertSee('Password Confirmation');
        $response->assertDontSee('username');
    }

    /**
     * Accedemos a la página edicion del perfil de "sobre mi
     *
     * GET /profile/edit/about
     */
    public function testShowEditAboutProfile(){
        $user = $this->createUserAndLogin();

        $response = $this->actingAs($user)->get('/profile/edit/about');

        $response->assertStatus(200);
        $response->assertSee('phone');
        $response->assertDontSee('Password Confirmation');
    }


    public function testDeleteUser(){
        $user = $this->createUserAndLogin();

        $response = $this->actingAs($user)->delete('/profile');

        $response->assertStatus(302);
        $this->assertSoftDeleted('users', ['name' => $user->name]);
    }
}
