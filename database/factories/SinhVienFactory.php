<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Manage\SinhVien;
use Faker\Generator as Faker;

$factory->define(SinhVien::class, function (Faker $faker) {

    return [
        'ma_sinh_vien' => $faker->word,
        'ten' => $faker->word,
        'lop' => $faker->word,
        'dia_chi' => $faker->text,
        'id_gioi_tinh' => $faker->randomDigitNotNull,
        'id_khoa' => $faker->randomDigitNotNull,
        'id_users' => $faker->randomDigitNotNull,
        'dien_thoai' => $faker->word,
        'cmnd' => $faker->word,
        'dan_toc' => $faker->word,
        'quoc_gia' => $faker->word,
        'ngay_sinh' => $faker->word,
        'ghi_chu' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
