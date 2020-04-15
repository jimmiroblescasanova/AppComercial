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
        'name'          => $faker->name,
        'email'         => $faker->unique()->safeEmail,
        'password'      => 'password',
        'rfc'           => Str::random(13),
        'agent_id'      => rand(1,5),
        'price_list'    => rand(1,3),
        'active'        => 1,
    ];
});
