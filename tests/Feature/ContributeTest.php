<?php

namespace Tests\Feature;

use App\Contribute;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContributeTest extends TestCase
{
    use DatabaseTransactions;

    private function createContribute()
    {
         $contribute = Factory(Contribute::class)->create(['updated_at' => Carbon::now()->timestamp]);
         return $contribute;
    }

    /**
     * Muestra la lista de contributes
     *
     * GET /contributes
     */
    public function testShowContributeList()
    {
        $contribute = $this->createContribute();

        $response = $this->get('/contributes');

        $response->assertStatus(200);

        $response->assertSee($contribute->name);
    }


    /**
     * Muestra la vista detalle de un contribute
     *
     * GET /contributes/show/{slug}
     */
    public function testShowContributeDetail()
    {
        $contribute = $this->createContribute();

        $response = $this->get('/contributes/show/'.$contribute->slug);

        $response->assertStatus(200);

        $response->assertSee($contribute->name);
    }
}
