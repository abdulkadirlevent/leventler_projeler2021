<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Cari;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CariTest extends TestCase
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
    public function it_gets_caris_list()
    {
        $caris = Cari::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.caris.index'));

        $response->assertOk()->assertSee($caris[0]->ticari_unvani);
    }

    /**
     * @test
     */
    public function it_stores_the_cari()
    {
        $data = Cari::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.caris.store'), $data);

        $this->assertDatabaseHas('caris', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_cari()
    {
        $cari = Cari::factory()->create();

        $user = User::factory()->create();

        $data = [
            'ticari_unvani' => $this->faker->text(255),
            'cari_kodu' => $this->faker->text(255),
            'adi' => $this->faker->text(255),
            'soyadi' => $this->faker->text(255),
            'vergi_dairesi' => $this->faker->text(255),
            'vergi_no' => $this->faker->randomNumber(0),
            'user_id' => $user->id,
        ];

        $response = $this->putJson(route('api.caris.update', $cari), $data);

        $data['id'] = $cari->id;

        $this->assertDatabaseHas('caris', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_cari()
    {
        $cari = Cari::factory()->create();

        $response = $this->deleteJson(route('api.caris.destroy', $cari));

        $this->assertSoftDeleted($cari);

        $response->assertNoContent();
    }
}
