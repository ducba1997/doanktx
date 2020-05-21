<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Manage\ThuePhong;
use Faker\Generator as Faker;

$factory->define(ThuePhong::class, function (Faker $faker) {

    return [
        'id_sinh_vien' => $faker->randomDigitNotNull,
        'id_phong' => $faker->randomDigitNotNull,
        'ngay_dang_ky' => $faker->word,
        'trang_thai' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
