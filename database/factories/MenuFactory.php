<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Menu;
use Faker\Generator as Faker;

$factory->define(Menu::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraphs(2, true),
        'price' => $faker->numberBetween(99, 999),
        'resto_id' => 1,
        'category_id' => 1,
    ];
});
