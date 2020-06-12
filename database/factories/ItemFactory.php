<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Item;
use App\Category;
use Faker\Generator as Faker;

$factory->define(Item::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->paragraph(1),
        'category_id' => factory(Category::class)->create()->id,
    ];
});
