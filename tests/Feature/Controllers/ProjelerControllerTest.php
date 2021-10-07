<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Projeler;

use App\Models\Cari;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjelerControllerTest extends TestCase
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
    public function it_displays_index_view_with_projelers()
    {
        $projelers = Projeler::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('projelers.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.projelers.index')
            ->assertViewHas('projelers');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_projeler()
    {
        $response = $this->get(route('projelers.create'));

        $response->assertOk()->assertViewIs('app.projelers.create');
    }

    /**
     * @test
     */
    public function it_stores_the_projeler()
    {
        $data = Projeler::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('projelers.store'), $data);

        $this->assertDatabaseHas('projelers', $data);

        $projeler = Projeler::latest('id')->first();

        $response->assertRedirect(route('projelers.edit', $projeler));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_projeler()
    {
        $projeler = Projeler::factory()->create();

        $response = $this->get(route('projelers.show', $projeler));

        $response
            ->assertOk()
            ->assertViewIs('app.projelers.show')
            ->assertViewHas('projeler');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_projeler()
    {
        $projeler = Projeler::factory()->create();

        $response = $this->get(route('projelers.edit', $projeler));

        $response
            ->assertOk()
            ->assertViewIs('app.projelers.edit')
            ->assertViewHas('projeler');
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

        $response = $this->put(route('projelers.update', $projeler), $data);

        $data['id'] = $projeler->id;

        $this->assertDatabaseHas('projelers', $data);

        $response->assertRedirect(route('projelers.edit', $projeler));
    }

    /**
     * @test
     */
    public function it_deletes_the_projeler()
    {
        $projeler = Projeler::factory()->create();

        $response = $this->delete(route('projelers.destroy', $projeler));

        $response->assertRedirect(route('projelers.index'));

        $this->assertSoftDeleted($projeler);
    }
}
