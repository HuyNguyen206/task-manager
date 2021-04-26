<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Todo;
use Faker\Generator as Faker;

$factory->define(Todo::class, function (Faker $faker) {
    $name = $faker->sentence(3);
    return [
        //
        'name' => $name,
        'description' => $faker->paragraph(4),
        'completed' => false,
        'slug' => \Illuminate\Support\Str::slug($name)
    ];
});
