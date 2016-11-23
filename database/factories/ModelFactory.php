<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Author::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->unique()->name,
        'avatar' => $faker->imageUrl(52,52),
    ];
});

$factory->define(App\Tag::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->unique()->word,
    ];
});

$factory->define(App\Article::class, function (Faker\Generator $faker) {
    $content = <<<CONTENT
<p>{$faker->realText('500')}</p>
<p><img src="{$faker->imageUrl(500,300)}" width="500" height="300"/></p>
<p>{$faker->realText('500')}</p>
<p><img src="{$faker->imageUrl(500,300)}" width="500" height="300"/></p>
<p>{$faker->realText('500')}</p>
<p><img src="{$faker->imageUrl(500,300)}" width="500" height="300"/></p>
<p>{$faker->realText('500')}</p>
<p><img src="{$faker->imageUrl(500,300)}" width="500" height="300"/></p>
CONTENT;

    return [
        'title' => $faker->unique()->sentence,
        'content' => $content,
        'hits' => rand(1,1000),
        'likes' => rand(1,100),
        'author_id' => $faker->randomElement(\App\Author::all()->pluck('id')->toArray()),
        'category_id' => $faker->randomElement(\App\Category::all()->pluck('id')->toArray()),
    ];
});

$factory->define(App\ArticleTag::class, function (Faker\Generator $faker) {
   return [
       'article_id' => $faker->randomElement(\App\Article::all()->pluck('id')->toArray()),
       'tag_id' => $faker->randomElement(\App\Tag::all()->pluck('id')->toArray()),
   ];
});
