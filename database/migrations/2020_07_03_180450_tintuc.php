<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tintuc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('tintuc', function (Blueprint $table) {
            $table->Increments('id_tintuc');
            $table->string('tintuc_tieude');
            $table->text('tintuc_noidung');
            $table->string('tintuc_hinh')->nullable();
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
        Schema::drop('tintuc');
    }
}
