<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCocauTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cocaus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gioithieu_id')->unsigned();
            $table->foreign('gioithieu_id')->references('id')->on('gioithieus');
            $table->integer('phongban_id')->unsigned();
            $table->foreign('phongban_id')->references('id')->on('phongbans');
            $table->string('Hoten');
            $table->text('Hinh')->nullable();
            $table->string('Chucvu');
            $table->text('Trinhdo')->nullable();
            $table->string('Email')->nullable();
            $table->string('Phone')->nullable();
            $table->text('Ghichu')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cocaus');
    }
}
