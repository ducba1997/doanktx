<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phong', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten');
            $table->unsignedInteger('id_tang');
            $table->unsignedInteger('id_loai_phong');
            $table->unsignedInteger('id_khu');
            $table->unsignedInteger('id_gioi_tinh');
            $table->foreign('id_tang')->references('id')->on('tang')->onDelete('cascade');
            $table->foreign('id_loai_phong')->references('id')->on('loai_phong')->onDelete('cascade');
            $table->foreign('id_khu')->references('id')->on('khu')->onDelete('cascade');
            $table->foreign('id_gioi_tinh')->references('id')->on('gioi_tinh')->onDelete('cascade');
            $table->integer('so_luong_nguoi');
            $table->double('gia');
            $table->tinyInteger('trang_thai');
            $table->text('thong_tin')->nullable();
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
        Schema::dropIfExists('phong');
    }
}
