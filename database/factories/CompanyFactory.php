<?php

use App\Models\Company;
use App\Models\User;
use Faker\Generator;

$factory->define(Company::class, function (Generator $faker) {
    return [
        'name' => $faker->company,
        'description' => $faker->paragraph,
        'country_id' => config('values.app_config.country_id_by_default'),
        'city_id' => config('values.app_config.city_id_by_default'),
        'email' => $faker->unique()->safeEmail,
        'address' => $faker->streetName . ' ' . $faker->numberBetween($min = 1, $max = 100),
        'contact_person' => $faker->name,
        'phone' => $faker->numberBetween($min = 1, $max = 1000000),
        'notes' => $faker->sentence,
        'posted_at' => now(),
        'author_id' => function () {
            return factory(User::class)->create()->id;
        }
    ];
});
