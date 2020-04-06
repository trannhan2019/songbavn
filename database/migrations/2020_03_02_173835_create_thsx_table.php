<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThsxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thsxs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('muctieunam_id')->unsigned();
            $table->foreign('muctieunam_id')->references('id')->on('muctieunams');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->date('date');
            $table->float('power');
            $table->float('quantity');
            $table->float('MNH');
            $table->float('rain');
            $table->string('device');
            $table->tinyInteger('status');
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
        Schema::dropIfExists('thsxs');
    }
}
