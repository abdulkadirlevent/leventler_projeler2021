<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Tesisatlar;
use App\Models\TesisatIsAdimlari;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TesisatlarTesisatIsAdimlarisTest extends TestCase
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
    public function it_gets_tesisatlar_tesisat_is_adimlaris()
    {
        $tesisatlar = Tesisatlar::factory()->create();
        $tesisatIsAdimlaris = TesisatIsAdimlari::factory()
            ->count(2)
            ->create([
                'tesisatlar_id' => $tesisatlar->id,
            ]);

        $response = $this->getJson(
            route('api.tesisatlars.tesisat-is-adimlaris.index', $tesisatlar)
        );

        $response->assertOk()->assertSee($tesisatIsAdimlaris[0]->title);
    }

    /**
     * @test
     */
    public function it_stores_the_tesisatlar_tesisat_is_adimlaris()
    {
        $tesisatlar = Tesisatlar::factory()->create();
        $data = TesisatIsAdimlari::factory()
            ->make([
                'tesisatlar_id' => $tesisatlar->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.tesisatlars.tesisat-is-adimlaris.store', $tesisatlar),
            $data
        );

        unset($data['tesisatlar_id']);

        $this->assertDatabaseHas('tesisat_is_adimlaris', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $tesisatIsAdimlari = TesisatIsAdimlari::latest('id')->first();

        $this->assertEquals($tesisatlar->id, $tesisatIsAdimlari->tesisatlar_id);
    }
}
