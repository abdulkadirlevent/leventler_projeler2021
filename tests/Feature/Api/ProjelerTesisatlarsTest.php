<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Projeler;
use App\Models\Tesisatlar;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjelerTesisatlarsTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create(['email' => 'admin@admin.com']);

        Sanctum::actingAs($user, [], 'web');

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_projeler_tesisatlars()
    {
        $projeler = Projeler::factory()->create();
        $tesisatlars = Tesisatlar::factory()
            ->count(2)
            ->create([
                'projeler_id' => $projeler->id,
            ]);

        $response = $this->getJson(
            route('api.projelers.tesisatlars.index', $projeler)
        );

        $response->assertOk()->assertSee($tesisatlars[0]->tesisat_no);
    }

    /**
     * @test
     */
    public function it_stores_the_projeler_tesisatlars()
    {
        $projeler = Projeler::factory()->create();
        $data = Tesisatlar::factory()
            ->make([
                'projeler_id' => $projeler->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.projelers.tesisatlars.store', $projeler),
            $data
        );

        $this->assertDatabaseHas('tesisatlars', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $tesisatlar = Tesisatlar::latest('id')->first();

        $this->assertEquals($projeler->id, $tesisatlar->projeler_id);
    }
}
