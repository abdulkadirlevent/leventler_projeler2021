<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Cari;
use App\Models\Projeler;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CariProjelersTest extends TestCase
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
    public function it_gets_cari_projelers()
    {
        $cari = Cari::factory()->create();
        $projelers = Projeler::factory()
            ->count(2)
            ->create([
                'cari_id' => $cari->id,
            ]);

        $response = $this->getJson(route('api.caris.projelers.index', $cari));

        $response->assertOk()->assertSee($projelers[0]->proje_adi);
    }

    /**
     * @test
     */
    public function it_stores_the_cari_projelers()
    {
        $cari = Cari::factory()->create();
        $data = Projeler::factory()
            ->make([
                'cari_id' => $cari->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.caris.projelers.store', $cari),
            $data
        );

        $this->assertDatabaseHas('projelers', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $projeler = Projeler::latest('id')->first();

        $this->assertEquals($cari->id, $projeler->cari_id);
    }
}
