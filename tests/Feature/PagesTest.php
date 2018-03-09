<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PagesTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Test de conexión a la página de inicio.
     *
     * @return void
     */
    public function testHome()
    {
        $response  = $this->get('/');
        $response->assertStatus(200);
    }
}
