<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\TruckType;
use Faker\Generator as Faker;

$factory->define(TruckType::class, function (Faker $faker) {

    return [
        'TruckID' => $faker->word,
        'Description' => $faker->word,
        'Capacity' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
