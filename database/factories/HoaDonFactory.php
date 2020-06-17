<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Manage\HoaDon;
use Faker\Generator as Faker;

$factory->define(HoaDon::class, function (Faker $faker) {

    return [
        'id_phong' => $faker->randomDigitNotNull,
        'tien_phong' => $faker->randomDigitNotNull,
        'tien_dien' => $faker->randomDigitNotNull,
        'tien_nuoc' => $faker->randomDigitNotNull,
        'thang' => $faker->randomDigitNotNull,
        'nam' => $faker->randomDigitNotNull,
        'trang_thai_thu_tien' => $faker->word,
        'ghi_chu' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
