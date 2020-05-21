<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Manage\Phong;
use Faker\Generator as Faker;

$factory->define(Phong::class, function (Faker $faker) {

    return [
        'ten' => $faker->word,
        'id_tang' => $faker->randomDigitNotNull,
        'id_loai_phong' => $faker->randomDigitNotNull,
        'id_khu' => $faker->randomDigitNotNull,
        'gia' => $faker->randomDigitNotNull,
        'thong_tin' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'id_gioi_tinh' => $faker->randomDigitNotNull,
        'so_luong_nguoi' => $faker->randomDigitNotNull
    ];
});
