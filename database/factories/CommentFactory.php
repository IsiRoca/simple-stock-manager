<?php

use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use Faker\Generator;

$factory->define(Comment::class, function (Generator $faker) {
    return [
        'content' => $faker->paragraph,
        'author_id' => fn () => factory(User::class)->create()->id,
        'product_id' => fn () => factory(Product::class)->create()->id
    ];
});
