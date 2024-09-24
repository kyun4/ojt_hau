<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'role_id' => $faker->numberBetween(1, 4),
        'profile_id' => $faker->numberBetween(1, 100),
        'student_id' => $faker->unique()->numberBetween(1000, 9999),
        'username' => $faker->userName,
        'password' => bcrypt('password'),
        'status' => $faker->randomElement(['Active']),
        'stat' => $faker->randomElement([0, 1, 2]),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});

