<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Projeler;

use App\Models\Cari;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjelerTest extends TestCase
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
    public function it_gets_projelers_list()
    {
        $projelers = Projeler::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.projelers.index'));

        $response->assertOk()->assertSee($projelers[0]->proje_adi);
    }

    /**
     * @test
     */
    public function it_stores_the_projeler()
    {
        $data = Projeler::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.projelers.store'), $data);

        $this->assertDatabaseHas('projelers', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_projeler()
    {
        $projeler = Projeler::factory()->create();

        $cari = Cari::factory()->create();

        $data = [
            'proje_adi' => $this->faker->text(255),
            'sozlezme_no' => $this->faker->text(255),
            'baslama_tarihi' => $this->faker->dateTime,
            'teslim_tarihi' => $this->faker->dateTime,
            'birim_fiyati' => $this->faker->randomNumber(2),
            'cari_id' => $cari->id,
        ];

        $response = $this->putJson(
            route('api.projelers.update', $projeler),
            $data
        );

        $data['id'] = $projeler->id;

        $this->assertDatabaseHas('projelers', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_projeler()
    {
        $projeler = Projeler::factory()->create();

        $response = $this->deleteJson(
            route('api.projelers.destroy', $projeler)
        );

        $this->assertSoftDeleted($projeler);

        $response->assertNoContent();
    }
}
