<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Sanpham extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('sanpham', function (Blueprint $table) {
            $table->Increments('id_sanpham');
            $table->integer('sanpham_id_nsx')->unsigned();
            $table->foreign('sanpham_id_nsx')->references('id_nsx')->on('nsx')->onDelete('cascade');
            $table->string('sanpham_ten');
            $table->string('sanpham_hinh');
            $table->float('sanpham_gia',20);
            $table->integer('sanpham_soluong');
            $table->boolean('sanpham_trangthai');
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
        Schema::drop('sanpham');
    }
}
