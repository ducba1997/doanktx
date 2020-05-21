<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSoluongPhongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('phong', function (Blueprint $table) {
            $table->unsignedInteger('id_gioi_tinh');
            $table->foreign('id_gioi_tinh')->references('id')->on('gioi_tinh')->onDelete('cascade');
            $table->integer('so_luong_nguoi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
