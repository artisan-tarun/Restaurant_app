<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Item;
use Faker\Generator as Faker;

$factory->define(Item::class, function (Faker $faker) {
    return [
        'title' => rtrim($faker->unique()->word),
        'description' => rtrim($faker->sentence(rand(5,10)),"."),
        'category_id' => App\Category::pluck('id')->random(),
        'price' => $faker->numberBetween($min = 50, $max = 450),
        'status' => rand(0,1),
        'image' => 'food_image',
    ];
});
