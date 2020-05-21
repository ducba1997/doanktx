<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Manage\Users;
use Faker\Generator as Faker;

$factory->define(Users::class, function (Faker $faker) {

    return [
        'email' => $faker->word,
        'password' => $faker->word,
        'trang_thai' => $faker->word,
        'remember_token' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
