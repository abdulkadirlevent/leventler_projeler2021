<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Cari;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserCarisTest extends TestCase
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
    public function it_gets_user_caris()
    {
        $user = User::factory()->create();
        $caris = Cari::factory()
            ->count(2)
            ->create([
                'user_id' => $user->id,
            ]);

        $response = $this->getJson(route('api.users.caris.index', $user));

        $response->assertOk()->assertSee($caris[0]->ticari_unvani);
    }

    /**
     * @test
     */
    public function it_stores_the_user_caris()
    {
        $user = User::factory()->create();
        $data = Cari::factory()
            ->make([
                'user_id' => $user->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.users.caris.store', $user),
            $data
        );

        $this->assertDatabaseHas('caris', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $cari = Cari::latest('id')->first();

        $this->assertEquals($user->id, $cari->user_id);
    }
}
