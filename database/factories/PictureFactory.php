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

$factory->define(App\Picture::class, function (Faker $faker) {
    return [
        'images_url' => $faker->imageUrl(),
        'gallery_id' => $faker->numberBetween(1,30),
    ];
});
