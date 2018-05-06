<?php

use Faker\Generator as Faker;

$factory->define(\App\Post::class, function (Faker $faker) {
    return [
        'user_id' => rand(1, 40),
	    'title' => $faker->word,
	    'content' => $faker->paragraph,
    ];
});
