<?php

namespace Tests\Feature;

use App\Models\Car;
use App\Models\Rent;
use App\Traits\RefreshTenantDatabase;
use Tests\TestCase;
use App\User;

class CarTest extends TestCase
{
    use RefreshTenantDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = factory(User::class)->create();

        $this->actingAs($this->user);
    }

    public function test_should_be_able_to_list_cars()
    {
        factory(Car::class, 10)->create();

        $this->get(route('cars.index'))
            ->assertOk()->assertViewIs('Cars.index')
            ->assertViewHas('cars')
            ->assertViewHas('customers');
    }

    public function test_should_be_able_to_show_create_view()
    {
        $this->get(route('cars.create'))->assertOk()
            ->assertViewIs('Cars.create');
    }

    public function test_should_be_able_to_store_car()
    {
        $car = factory(Car::class)->make();

        $this->post(route('cars.store'), $car->toArray())->assertRedirect(route('cars.index'));

        $this->assertDatabaseHas('cars', $car->toArray());
    }

    public function test_should_be_able_to_show_car()
    {
        $car = factory(Car::class)->create();

        $this->get(route('cars.show', $car->id))->assertOk()
            ->assertViewIs('Cars.show')
            ->assertViewHas('car')
            ->assertViewHas('documents');
    }

    public function test_should_be_able_to_edit_car()
    {
        $car = factory(Car::class)->create();

        $this->get(route('cars.edit', $car->id))->assertOk()
            ->assertViewIs('Cars.edit')
            ->assertViewHas('car');
    }

    public function test_should_be_able_to_update_car()
    {
        $car = factory(Car::class)->create();

        $this->put(route('cars.update', $car->id), $car->toArray())->assertRedirect(route('cars.index'));

        $this->assertDatabaseHas('cars', $car->toArray());
    }

    public function test_should_be_able_to_destroy_car()
    {
        $car = factory(Car::class)->create();

        $this->delete(route('cars.destroy', $car->id))->assertRedirect(route('cars.index'));

        $this->assertDatabaseMissing('cars', $car->toArray());
    }

    public function test_should_not_be_able_to_destroy_car_when_has_unfinished_rents()
    {
        $car = factory(Car::class)->create();

        factory(Rent::class)->create([

            'car_id' => $car->id,
        ]);

        $this->delete(route('cars.destroy', $car))
            ->assertRedirect(route('cars.index'))
            ->assertSessionHas('aviso');
        $this->assertDatabaseHas('cars', $car->toArray());
    }
}
