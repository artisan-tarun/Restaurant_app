<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Role;
use Faker\Generator as Faker;

$factory->define(Role::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'description' => $faker->text($maxNbChars = 10),
    ];
});
