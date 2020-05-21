<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Manage\Khu;
use Faker\Generator as Faker;

$factory->define(Khu::class, function (Faker $faker) {

    return [
        'ten' => $faker->word,
        'thong_tin' => $faker->word,
        'id_nguoi_quan_ly' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
