<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->increments('id');
            $table->string('en_name');
            $table->string('ar_name');
            $table->string('logo',1000);
            $table->string('main_img',1000);
            $table->string('slogan',1000);
            $table->text('description');
            $table->text('business_type');
            $table->text('total_revenue_annual')->nullable();
            $table->string('block1_image',1000);
            $table->string('block2_image',1000);
            $table->string('block3_image',1000);
            $table->string('block4_image',1000);
            $table->string('block1_text');
            $table->string('block2_text');
            $table->string('block3_text');
            $table->string('block4_text');
            $table->integer('default_curr')->unsigned();
            $table->string('location',1000)->nullable();
             $table->string('facebook_url');
            $table->string('twitter_url');
            $table->string('instgram_url');
            $table->string('whatsapp_num',50);
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
        Schema::dropIfExists('shops');
    }
}
