<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Project;
use Faker\Generator as Faker;

$factory->define(App\Project::class, function (Faker $faker) {
     return [
        'title' => $faker->sentence(4),
        'description' => $faker->text,
        'notes' => $faker->text,
        'user_id'=> factory(App\User::class)
        
    ];
});
