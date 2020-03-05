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
            $table->increments('id');
            $table->integer('nhamay_id')->unsigned();
            $table->foreign('nhamay_id')->references('id')->on('nhamays');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->date('ngaysx')->nullable()->default(new DateTime());
            $table->string('Email_codong');
            $table->string('Diachi');
            $table->string('Phone');
            $table->mediumText('Noidung_codong');
            $table->tinyInteger('Traloi');
            $table->longText('Noidung_traloi')->nullable();
            $table->tinyInteger('Active');
            $table->string('Tacgia');
            $table->integer('Views')->unsigned()->default(0);
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
