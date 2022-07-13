<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Car;
use App\Models\Customer;
use App\Models\Rent;
use Faker\Generator as Faker;

$factory->define(Rent::class, function (Faker $faker) {
    return [
        'car_id' => factory(Car::class),
        'customer_id' => factory(Customer::class),
        'rent_date' => $faker->date(),
        'forecast_devolution_date' => $faker->date(),
        'devolution_date' => $faker->date(),
        'value' => $faker->randomDigit(1000),
        'km_traveled' => $faker->randomDigit(100),
        'km_finish' => $faker->randomDigit(100),
        'finished' => true,
        'description' => $faker->text(20),

    ];
});
