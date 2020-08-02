<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'category_id' => $faker->numberBetween($min = 1, $max = 3),
        'name' => 'Product ' . Str::random(6),
        'price' => $faker->numberBetween($min = 1000, $max = 9000),
        'desc' => $faker->paragraph(4),
        // 'img' => $faker->imageUrl($width = 300, $height = 300),
    ];
});
