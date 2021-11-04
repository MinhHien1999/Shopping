<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Chitietsp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('chitietsp', function (Blueprint $table) {
            $table->Increments('id_chitiet_sanpham');
            $table->integer('chitietsp_id_sp')->unsigned();
            $table->foreign('chitietsp_id_sp')->references('id_sanpham')->on('sanpham')->onDelete('cascade');
            $table->string('chitietsp_hedieuhanh')->nullable();
            $table->string('chitietsp_camera_truoc')->nullable();
            $table->string('chitietsp_camera_sau')->nullable();
            $table->string('chitietsp_cpu')->nullable();
            $table->string('chitietsp_ram')->nullable();
            $table->string('chitietsp_dungluongbonho')->nullable();
            $table->string('chitietsp_dungluongpin')->nullable();
            $table->text('chitietsp_mota')->nullable();
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
        Schema::drop('chitietsp');
    }
}
