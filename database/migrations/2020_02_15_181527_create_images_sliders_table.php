<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images_sliders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image',1000);
            $table->text('main_text');
            $table->text('sub_text');
            $table->integer('order');
            $table->string('url',1000);
            $table->integer('shop_id')->unsigned();
            $table->integer('active');
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
        Schema::dropIfExists('images_sliders');
    }
}
