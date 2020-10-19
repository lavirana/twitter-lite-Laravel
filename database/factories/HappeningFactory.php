

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Happening;
use Faker\Generator as Faker;

$factory->define(Happening::class, function (Faker $faker) {
    return [
           'title' => $faker->name,
        'description' => $faker->text,
    ];
});
