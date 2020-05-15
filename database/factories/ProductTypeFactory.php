<?php

use App\Models\ProductType;
use App\Models\User;
use Faker\Generator;

$factory->define(ProductType::class, function (Generator $faker) {
    return [
        'title' => $faker->unique()->randomElement($array = array ('Imported','Second Hand', 'New', 'Refurbished', 'Discontinued', 'Premium', 'Unsupervised', 'Used', 'Unavailable', 'Available')),
        'content' => $faker->paragraph,
        'posted_at' => now(),
        'author_id' => function () {
            return factory(User::class)->create()->id;
        }
    ];
});
