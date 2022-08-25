<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\TestIdType;
use Faker\Generator as Faker;

$factory->define(TestIdType::class, function (Faker $faker) {

    return [
        'description' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
