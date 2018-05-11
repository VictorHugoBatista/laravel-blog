<?php

use Faker\Generator as Faker;

$factory->define(\App\Comment::class, function (Faker $faker) {
    return [
        'post_id' => rand(1, 40),
        'subject' => $faker->word,
        'body' => $faker->paragraph,
    ];
});
