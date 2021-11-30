<?php

namespace Tests\Feature;

use App\Models\Car;
use App\Models\Customer;
use App\Models\Rent;
use Tests\TestCase;
use App\Traits\RefreshTenantDatabase;
use App\User;

class RentTest extends TestCase
{
    use RefreshTenantDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = factory(User::class)->create();

        $this->actingAs($this->user);
    }

    public function test_should_be_able_to_list_rent()
    {
        $rents = Rent::all();

        $this->get(route('rents.index'))
            ->assertOk()->assertViewIs('Rents.index')
            ->assertViewHas('rents', $rents);
    }

    public function test_should_be_able_to_show_create_view()
    {
        $car = factory(Car::class)->create();

        $this->get(route('cars.rents.create', $car->id))->assertOk()
            ->assertViewIs('Rents.create');
    }
    public function test_should_be_able_to_rent_car()
    {
        $car = factory(Car::class)->create();

        $customer = factory(Customer::class)->create();

        $rent = factory(Rent::class)->create([

            'car_id' => $car->id,
            'customer_id' => $customer->id,
        ]);

        $this->post(route('cars.rents.store', $car->id), $rent->toArray())
            ->assertRedirect(route('cars.index'));

        $this->assertDatabaseHas('rents', $rent->toArray());
    }

    public function test_should_be_able_to_edit_rent()
    {
        $car = factory(Car::class)->create();

        $customer = factory(Customer::class)->create();

        $rent = factory(Rent::class)->create([

            'car_id' => $car->id,
            'customer_id' => $customer->id,
        ]);

        $this->get(route('rents.edit', $rent->id))->assertOk()
            ->assertViewIs('Rents.edit')
            ->assertViewHas('rent');
    }
    public function test_should_be_able_to_destroy_rent()
    {
        $car = factory(Car::class)->create();

        $rent = factory(Rent::class)->create();

        $this->delete(route('rents.destroy', [$car->id, $rent->id]))
            ->assertRedirect(route('cars.index'))
            ->assertSessionHas('aviso');
    }
}
