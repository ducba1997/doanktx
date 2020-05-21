<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNguoiQuanLyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nguoi_quan_ly', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten');
            $table->string('so_dien_thoai')->nullable();
            $table->string('cmnd')->nullable();
            $table->string('thong_tin')->nullable();
            $table->unsignedInteger('id_users');
            $table->foreign('id_users')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('nguoi_quan_ly');
    }
}
