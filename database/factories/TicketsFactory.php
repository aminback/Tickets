<?php

use App\User;
use Illuminate\Support\Str;
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

$factory->define(\App\tickets::class, function (Faker $faker) {
    return [
        'summary' => $faker->sentence,
        'description' => $faker->paragraph,
        'status' =>$faker->word

    ];
});