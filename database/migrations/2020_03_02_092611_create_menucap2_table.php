<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenucap2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menucap2s', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('menucap1_id')->unsigned();
            $table->foreign('menucap1_id')->references('id')->on('menucap1s');
            $table->string('Ten');
            $table->string('TenSlug');
            $table->smallInteger('Vitri');
            $table->tinyInteger('Active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menucap2s');
    }
}
