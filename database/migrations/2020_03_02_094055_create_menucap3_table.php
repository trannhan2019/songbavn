<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenucap3Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menucap3s', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('menucap2_id')->unsigned();
            $table->foreign('menucap2_id')->references('id')->on('menucap2s');
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
        Schema::dropIfExists('menucap3s');
    }
}
