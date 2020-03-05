<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenucap1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menucap1s', function (Blueprint $table) {
            $table->increments('id');
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
        Schema::dropIfExists('menucap1s');
    }
}
