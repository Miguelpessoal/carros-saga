<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Car;
use Faker\Generator as Faker;

$factory->define(Car::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'brand' => $faker->text(20),
        'color' => $faker->colorName,
        'board' => $faker->unique()->text(8),
        'year' => $faker->year(4),
        'km' => $faker->randomDigit(100),
        'value' => $faker->randomDigit(1000),
        'safe' => true, // quando não quiser passar, remover esta condição
        'insurance_company' => $faker->text(20),
        'car_situation' => $faker->text(20),
        'fuel' => $faker->text(20),
    ];
});
