<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'uid' => $faker->randomDigit(),
        'title' => $faker->sentence(),
        'content' => $faker->paragraph(),
        'likes' => $faker->randomDigit(),
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now()
    ];
});
