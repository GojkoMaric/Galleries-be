<?php

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

$factory->define(App\Gallery::class, function (Faker $faker) {
    return [
        'name' => $faker->text(20),
        'description' => $faker->text(140),
        // 'images_url' => $faker->imageUrl(),
        'user_id' => $faker->numberBetween(1,10),
        'created_at' => $faker->date(),
    ];
});
