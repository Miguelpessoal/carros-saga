<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Customer;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'cpf' => $faker->unique()->randomNumber(),
        'cnpj' => $faker->unique()->randomNumber(),
        'address' => $faker->text(20),
        'district' => $faker->text(20),
        'address_number' => $faker->randomDigit(),
        'phone' => $faker->phoneNumber(),
        'email' => $faker->safeEmail,
    ];
});
