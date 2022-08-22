<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {

    return [
        'company_id' => $faker->word,
        'CompanyName' => $faker->word,
        'Address' => $faker->word,
        'email' => $faker->word,
        'ContactPerson' => $faker->word,
        'TaxId' => $faker->word,
        'Cellphone' => $faker->word,
        'Telephone' => $faker->word,
        'FaxNumber' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
