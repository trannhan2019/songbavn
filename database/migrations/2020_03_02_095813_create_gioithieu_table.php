<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGioithieuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gioithieus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('menucap2_id')->unsigned();
            $table->foreign('menucap2_id')->references('id')->on('menucap2s');
            $table->integer('menucap3_id')->unsigned()->nullable();
            $table->foreign('menucap3_id')->references('id')->on('menucap3s');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('Tieude');
            $table->string('TieudeSlug');
            $table->tinyInteger('Active');
            $table->longText('Noidung')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('gioithieus');
    }
}
