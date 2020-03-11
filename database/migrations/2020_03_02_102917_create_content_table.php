<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('menu_id')->unsigned();
            $table->foreign('menu_id')->references('id')->on('menus');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->text('title')->nullable();
            $table->text('slug')->nullable();
            $table->text('abstract')->nullable();
            $table->text('imageorfile')->nullable();
            $table->longText('content')->nullable();
            $table->tinyInteger('highlights')->default(0);
            $table->integer('views')->unsigned()->default(0)->nullable();
            $table->tinyInteger('status');
            $table->mediumText('author')->nullable();
            $table->mediumText('source')->nullable();
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
        Schema::dropIfExists('contents');
    }
}
