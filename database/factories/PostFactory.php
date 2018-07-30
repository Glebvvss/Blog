<?php

use Faker\Generator as Faker;
use App\Models\Eloquent\Post;
use App\Models\Eloquent\User;

$factory->define(Post::class, function (Faker $faker) {
	$user = User::inRandomOrder()->select('id')->first();
    return [
        'title' => $faker->word,
        'sub_title' => $faker->words(5, true),
        'post' => $faker->text,
        'user_id' => $user->id,
        'date_post' => $faker->date()
    ];
});
