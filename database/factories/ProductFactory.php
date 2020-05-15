<?php

use App\Models\Product;
use App\Models\ProductType;
use App\Models\Company;
use App\Models\User;
use Faker\Generator;

$factory->define(Product::class, function (Generator $faker) {
    return [
        'title' =>
                $faker->randomElement($array = array ('Car','Computer', 'Printer', 'Lamp', 'Microwave', 'Fridge', 'Hairdryer')) . ' ' .
                $faker->optional(0.5)->randomElement($array = array ('Model ','Version ', 'Ref ', 'Type ')) .
                $faker->randomElement($array = array ('','A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I')) .
                $faker->unique()->numberBetween($min = 1, $max = 1000) . strtoupper($faker->optional(0.3)->lexify('??')) .
                $faker->optional(0.7)->randomElement($array = array (' Orange', ' Blue', ' Silver', ' Black', ' White')),
        'content' => $faker->paragraph,
        'price' => $faker->randomFloat(2, 1, 99),
        'quantity' => $faker->numberBetween(1,99),
        'sku' => $faker->bothify('sku-####??-???'),
        'posted_at' => now(),
        'product_type_id' => ProductType::all()->random()->id,
        'company_id' => Company::all()->random()->id,
        'author_id' => function () {
            return factory(User::class)->create()->id;
        }
    ];
});
