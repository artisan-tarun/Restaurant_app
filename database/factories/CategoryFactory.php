<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'title' => rtrim($faker->unique()->word),
        'description' => rtrim($faker->sentence(rand(2,5)),"."),
    ];
});
