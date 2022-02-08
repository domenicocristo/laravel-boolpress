<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;

use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'author' => $faker -> name(),
        'img' => 'https://picsum.photos/400/300',
        'title' => $faker -> word(),
        'date' => $faker -> date(),
    ];
});