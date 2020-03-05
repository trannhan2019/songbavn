<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLienheTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lienhes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('menucap1_id')->unsigned();
            $table->foreign('menucap1_id')->references('id')->on('menucap1s');
            $table->string('Tieude');
            $table->string('TieudeSlug');
            $table->tinyInteger('Active');
            $table->longText('Noidung')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lienhes');
    }
}
