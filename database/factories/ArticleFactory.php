<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        //
        'title'=>$faker->name,
        'content'=>$faker->text(1000),
        'sticky'=>$faker->boolean,
        'cate_id'=>$faker->numberBetween(1,2)
    ];
});
