<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Slide extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('slide', function (Blueprint $table) {
            $table->Increments('id_slide');
            $table->string('ten_slide');
            $table->string('tieu_de')->nullable();
            $table->string('hinh');
            $table->boolean('trangthai');
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
        Schema::drop('slide');
    }
}
