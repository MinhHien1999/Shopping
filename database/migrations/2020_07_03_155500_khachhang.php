<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Khachhang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('khachhang', function (Blueprint $table) {
            $table->Increments('id_khachhang');
            $table->string('khachhang_tenkhachhang');
            $table->string('khachhang_diachi');
            $table->integer('khachhang_sdt');
            $table->string('khachhang_email')->unique();
            $table->string('khachhang_matkhau');
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
        Schema::drop('khachhang');
    }
}
