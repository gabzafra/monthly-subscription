<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    $title = $faker->realText(20);
    $slug  = str_slug($title, '-');
    return [
        'user_id' => function() { return factory(App\User::class)->create()->id;},
        'title'   => $title,
        'slug'    => $slug,
        'image'   => $faker->imageUrl(1200, 600, 'animals'),
        'content' => $faker->paragraphs(10 , true),
        'premium' => rand(0, 1)
    ];
});
