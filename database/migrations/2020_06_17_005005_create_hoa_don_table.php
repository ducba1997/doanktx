<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoaDonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoa_don', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_phong');
            $table->foreign('id_phong')->references('id')->on('phong')->onDelete('cascade');
            $table->double('tien_phong');
            $table->double('tien_dien');
            $table->double('tien_nuoc');
            $table->integer('thang');
            $table->integer('nam');
            $table->tinyInteger('trang_thai_thu_tien');
            $table->text('ghi_chu')->nullable();
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
        Schema::dropIfExists('hoa_don');
    }
}
