<?php

use Faker\Generator as Faker;
use App\Product;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'type_id' => 1,
        'value' => $faker->randomNumber(2, false),
        'description' => $faker->sentence(2),
        'image' => "productplacehorlder.png"
    ];
});