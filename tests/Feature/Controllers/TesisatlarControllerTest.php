<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Tesisatlar;

use App\Models\Projeler;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TesisatlarControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_tesisatlars()
    {
        $tesisatlars = Tesisatlar::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('tesisatlars.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.tesisatlars.index')
            ->assertViewHas('tesisatlars');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_tesisatlar()
    {
        $response = $this->get(route('tesisatlars.create'));

        $response->assertOk()->assertViewIs('app.tesisatlars.create');
    }

    /**
     * @test
     */
    public function it_stores_the_tesisatlar()
    {
        $data = Tesisatlar::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('tesisatlars.store'), $data);

        $this->assertDatabaseHas('tesisatlars', $data);

        $tesisatlar = Tesisatlar::latest('id')->first();

        $response->assertRedirect(route('tesisatlars.edit', $tesisatlar));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_tesisatlar()
    {
        $tesisatlar = Tesisatlar::factory()->create();

        $response = $this->get(route('tesisatlars.show', $tesisatlar));

        $response
            ->assertOk()
            ->assertViewIs('app.tesisatlars.show')
            ->assertViewHas('tesisatlar');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_tesisatlar()
    {
        $tesisatlar = Tesisatlar::factory()->create();

        $response = $this->get(route('tesisatlars.edit', $tesisatlar));

        $response
            ->assertOk()
            ->assertViewIs('app.tesisatlars.edit')
            ->assertViewHas('tesisatlar');
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

        $response = $this->put(route('tesisatlars.update', $tesisatlar), $data);

        $data['id'] = $tesisatlar->id;

        $this->assertDatabaseHas('tesisatlars', $data);

        $response->assertRedirect(route('tesisatlars.edit', $tesisatlar));
    }

    /**
     * @test
     */
    public function it_deletes_the_tesisatlar()
    {
        $tesisatlar = Tesisatlar::factory()->create();

        $response = $this->delete(route('tesisatlars.destroy', $tesisatlar));

        $response->assertRedirect(route('tesisatlars.index'));

        $this->assertSoftDeleted($tesisatlar);
    }
}
