<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Manage\Quyen;
use Faker\Generator as Faker;

$factory->define(Quyen::class, function (Faker $faker) {

    return [
        'ten' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
