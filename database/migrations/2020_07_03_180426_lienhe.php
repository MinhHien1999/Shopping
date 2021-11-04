<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Lienhe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('lienhe', function (Blueprint $table) {
            $table->Increments('id_lienhe');
            $table->string('lienhe_hoten')->nullable();
            $table->integer('lienhe_sdt')->nullable();
            $table->string('lienhe_email')->nullable();
            $table->text('lienhe_noidung')->nullable();
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
        Schema::drop('lienhe');
    }
}
