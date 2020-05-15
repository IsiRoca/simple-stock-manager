<?php

use App\Models\Like;
use App\Models\Product;
use App\Models\User;
use Faker\Generator;

$factory->define(Like::class, function (Generator $faker) {
    return [
      'likeable_type' => 'App\Models\Product',
      'likeable_id' => function () {
          return factory(Product::class)->create()->id;
      },
      'author_id' => function () {
          return factory(User::class)->create()->id;
      }
    ];
});
