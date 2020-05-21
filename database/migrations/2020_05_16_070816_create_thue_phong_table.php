<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThuePhongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thue_phong', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_sinh_vien');
            $table->unsignedInteger('id_phong');
            $table->foreign('id_sinh_vien')->references('id')->on('sinh_vien')->onDelete('cascade');
            $table->foreign('id_phong')->references('id')->on('phong')->onDelete('cascade');
            $table->date('ngay_dang_ky');
            $table->tinyInteger('trang_thai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thue_phong');
    }
}
