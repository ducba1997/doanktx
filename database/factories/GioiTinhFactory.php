<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Manage\GioiTinh;
use Faker\Generator as Faker;

$factory->define(GioiTinh::class, function (Faker $faker) {

    return [
        'ten' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});