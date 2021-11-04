<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Hoadon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('hoadon', function (Blueprint $table) {
            $table->Increments('id_hoadon');
            $table->integer('hoadon_id_kh')->unsigned()->nullable();
            $table->foreign('hoadon_id_kh')->references('id_khachhang')->on('khachhang');
            $table->string('hoadon_tennguoinhan');
            $table->string('hoadon_diachi');
            $table->string('hoadon_email');
            $table->integer('hoadon_sdt');
            $table->float('hoadon_tongtien',20);
            $table->string('hoadon_ghichu')->nullable();
            $table->boolean('hoadon_trangthai');
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
        //
        Schema::drop('hoadon');
    }
}
