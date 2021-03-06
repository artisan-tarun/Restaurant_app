<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Item;
use Faker\Generator as Faker;

$factory->define(Item::class, function (Faker $faker) {
    return [
        'title' => rtrim($faker->unique()->word),
        'description' => rtrim($faker->sentence(rand(4,6)),"."),
        'category_id' => App\Category::pluck('id')->random(),
        'price' => $faker->numberBetween($min = 50, $max = 250),
        'status' => rand(0,1),
        'image' => rand(1,5).'.jpg',
    ];
});
