<?php

use App\Models\User;
use App\Models\Token;
use Faker\Generator;
use Illuminate\Support\Str;

$factory->define(User::class, function (Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'address' => $faker->streetName,
        'housenumber' => $faker->numberBetween($min = 1, $max = 100),
        'city' => $faker->city,
        'state' => $faker->state,
        'country' => $faker->country,
        'zipcode' => $faker->postcode,
        'phone' => $faker->numberBetween($min = 1, $max = 1000000),
        'mobile' => $faker->numberBetween($min = 1, $max = 1000000),
        'gender' => $faker->title($gender = null),
        'dateofbirth' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'ip_address' => $faker->ipv4,
        'password' => $password ?: $password = 'password',
        //'api_token' => Str::random(60),
        'api_token' => Token::generate(),
        'remember_token' => Str::random(10),
        'email_verified_at' => now()
    ];
});

$factory->state(User::class, 'user', function (Generator $faker) {
    return [
        'name' => config('values.roles.role_user_name'),
        'email' => config('values.roles.role_user_email')
    ];
});
