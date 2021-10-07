<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Tesisatlar;

use App\Models\Projeler;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TesisatlarTest extends TestCase
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
    public function it_gets_tesisatlars_list()
    {
        $tesisatlars = Tesisatlar::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.tesisatlars.index'));

        $response->assertOk()->assertSee($tesisatlars[0]->tesisat_no);
    }

    /**
     * @test
     */
    public function it_stores_the_tesisatlar()
    {
        $data = Tesisatlar::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.tesisatlars.store'), $data);

        $this->assertDatabaseHas('tesisatlars', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_tesisatlar()
    {
        $tesisatlar = Tesisatlar::factory()->create();

        $projeler = Projeler::factory()->create();

        $data = [
            'tesisat_no' => $this->faker->text(255),
            'baslama_tarihi' => $this->faker->dateTime,
            'teslim_tarihi' => $this->faker->dateTime,
            'birim_fiyati' => $this->faker->randomNumber(2),
            'projeler_id' => $projeler->id,
        ];

        $response = $this->putJson(
            route('api.tesisatlars.update', $tesisatlar),
            $data
        );

        $data['id'] = $tesisatlar->id;

        $this->assertDatabaseHas('tesisatlars', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_tesisatlar()
    {
        $tesisatlar = Tesisatlar::factory()->create();

        $response = $this->deleteJson(
            route('api.tesisatlars.destroy', $tesisatlar)
        );

        $this->assertSoftDeleted($tesisatlar);

        $response->assertNoContent();
    }
}
