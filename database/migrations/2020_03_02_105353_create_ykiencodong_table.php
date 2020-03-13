<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYkiencodongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ykiencodongs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('menu_id')->unsigned()->nullable();
            $table->foreign('menu_id')->references('id')->on('menus');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('danhmucykien_id')->unsigned()->nullable();
            $table->foreign('danhmucykien_id')->references('id')->on('danhmucykiens');
            $table->integer('traloicodong_id')->unsigned()->nullable();
            $table->foreign('traloicodong_id')->references('id')->on('traloicodongs');
            $table->mediumText('ask_content');
            $table->tinyInteger('status');
            $table->integer('views')->unsigned()->default(0);
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
        Schema::dropIfExists('ykiencodongs');
    }
}
