<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(\App\Models\Order::class, function (Faker\Generator $faker){
    $data = [
        'order_no' => $faker->uuid,
        'status' => rand(0, 5),
        'price' => $faker->randomFloat(2, 1000, 3000),
        'product_id' => $faker->randomNumber(2),
        'create_time' => time(),
    ];
    return $data;
});
