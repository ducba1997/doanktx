<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSinhVienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {//Sinh viên: id, tên, lớp, địa chỉ, giới tính, id khoa, điện thoại,
        //cmnd, mã sinh viên, dân tộc, quốc gia, tôn giáo, ngày sinh, ghi chú, timestamps
        Schema::create('sinh_vien', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ma_sinh_vien')->unique();
            $table->string('ten');
            $table->string('lop');
            $table->text('dia_chi')->nullable();
            $table->unsignedInteger('id_gioi_tinh');
            $table->unsignedInteger('id_khoa');
            $table->unsignedInteger('id_users');
            $table->foreign('id_gioi_tinh')->references('id')->on('gioi_tinh')->onDelete('cascade');
            $table->foreign('id_khoa')->references('id')->on('khoa')->onDelete('cascade');
            $table->foreign('id_users')->references('id')->on('users')->onDelete('cascade');
            $table->string('dien_thoai')->nullable();
            $table->string('cmnd')->nullable();
            $table->string('dan_toc')->nullable();
            $table->string('quoc_gia')->nullable();
            $table->date('ngay_sinh')->nullable();
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
        Schema::dropIfExists('sinh_vien');
    }
}
