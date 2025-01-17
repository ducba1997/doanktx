<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Manage\NguoiQuanLy;
use Faker\Generator as Faker;

$factory->define(NguoiQuanLy::class, function (Faker $faker) {

    return [
        'ten' => $faker->word,
        'so_dien_thoai' => $faker->word,
        'cmnd' => $faker->word,
        'thong_tin' => $faker->word,
        'id_users' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
