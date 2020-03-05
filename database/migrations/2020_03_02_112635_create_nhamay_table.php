<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNhamayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhamays', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Ten');
            $table->string('Kyhieu');
            $table->tinyInteger('Active');
            $table->float('Congsuat_dm',2,1);
            $table->float('MNH_thapnhat',3,2);
            $table->float('MNH_binhthuong',3,2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nhamays');
    }
}
