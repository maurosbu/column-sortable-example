<?php

use App\UserDetail;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name'  => $faker->name,
        'email' => $faker->unique()->safeEmail,
    ];
});

$factory->define(App\UserDetail::class, function (Faker $faker) {
    return [
        'phone_number' => $faker->phoneNumber,
        'address' => $faker->address
    ];
});

$factory->define(App\Project::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'rating' => rand(1,5)
    ];
});
