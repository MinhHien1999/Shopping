<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Chitiethd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
            Schema::create('chitiethd', function (Blueprint $table) {
            $table->Increments('id_chitiet_hoadon');
            $table->integer('chitiethd_id_sanpham')->unsigned();
            $table->foreign('chitiethd_id_sanpham')->references('id_sanpham')->on('sanpham');
            $table->float('chitiethd_gia',20);
            $table->integer('chitiethd_soluong');
            $table->integer('chitiethd_id_hd')->unsigned();
            $table->foreign('chitiethd_id_hd')->references('id_hoadon')->on('hoadon')->onDelete('cascade');
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
        Schema::drop('chitiethd');
    }
}
