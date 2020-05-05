<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
            'title' => $faker->sentence(6),
            'slug' => $faker->slug,
            'image' => 'blogpost_'.$faker->numberBetween($min = 1, $max = 20).'.jpg',
            'extract' => $faker->paragraph,
            'body' => $faker->paragraph(30),
            'published_at' => \Carbon\Carbon::now(),
            'user_id' => factory(\App\User::class)
    ];
});
