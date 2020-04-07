<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMuctieunamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('muctieunams', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('factory_id')->unsigned();
            $table->foreign('factory_id')->references('id')->on('factorys');
            $table->string('title');
            $table->integer('year')->unsigned();
            $table->float('ratedpower',8,2)->unsigned();
            $table->float('MNHlowest',8,2)->unsigned();
            $table->float('MNHnormal',8,2)->unsigned();
            $table->float('quantity',8,3)->unsigned();
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
        Schema::dropIfExists('muctieunams');
    }
}
