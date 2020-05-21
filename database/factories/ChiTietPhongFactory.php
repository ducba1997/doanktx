<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Manage\ChiTietPhong;
use Faker\Generator as Faker;

$factory->define(ChiTietPhong::class, function (Faker $faker) {

    return [
        'id_phong' => $faker->randomDigitNotNull,
        'ten_do_dung' => $faker->word,
        'so_luong' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
