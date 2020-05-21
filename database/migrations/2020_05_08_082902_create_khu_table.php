<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKhuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khu', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten');
            $table->string('thong_tin')->nullable();
            $table->unsignedInteger('id_nguoi_quan_ly');
            $table->foreign('id_nguoi_quan_ly')->references('id')->on('nguoi_quan_ly')->onDelete('cascade');
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
        Schema::dropIfExists('khu');
    }
}
