<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Cari;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CariControllerTest extends TestCase
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
    public function it_displays_index_view_with_caris()
    {
        $caris = Cari::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('caris.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.caris.index')
            ->assertViewHas('caris');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_cari()
    {
        $response = $this->get(route('caris.create'));

        $response->assertOk()->assertViewIs('app.caris.create');
    }

    /**
     * @test
     */
    public function it_stores_the_cari()
    {
        $data = Cari::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('caris.store'), $data);

        $this->assertDatabaseHas('caris', $data);

        $cari = Cari::latest('id')->first();

        $response->assertRedirect(route('caris.edit', $cari));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_cari()
    {
        $cari = Cari::factory()->create();

        $response = $this->get(route('caris.show', $cari));

        $response
            ->assertOk()
            ->assertViewIs('app.caris.show')
            ->assertViewHas('cari');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_cari()
    {
        $cari = Cari::factory()->create();

        $response = $this->get(route('caris.edit', $cari));

        $response
            ->assertOk()
            ->assertViewIs('app.caris.edit')
            ->assertViewHas('cari');
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

        $response = $this->put(route('caris.update', $cari), $data);

        $data['id'] = $cari->id;

        $this->assertDatabaseHas('caris', $data);

        $response->assertRedirect(route('caris.edit', $cari));
    }

    /**
     * @test
     */
    public function it_deletes_the_cari()
    {
        $cari = Cari::factory()->create();

        $response = $this->delete(route('caris.destroy', $cari));

        $response->assertRedirect(route('caris.index'));

        $this->assertSoftDeleted($cari);
    }
}
