<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('menucap2_id')->unsigned();
            $table->foreign('menucap2_id')->references('id')->on('menucap2s');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->text('Tieude');
            $table->text('TieudeSlug');
            $table->text('Trichyeu')->nullable();
            $table->text('Hinh_file');
            $table->longText('Noidung');
            $table->tinyInteger('Noibat')->default(0);
            $table->integer('Views')->unsigned()->default(0);
            $table->tinyInteger('Active');
            $table->text('Tacgia');
            $table->string('Nguongoc')->nullable();
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
        Schema::dropIfExists('posts');
    }
}
