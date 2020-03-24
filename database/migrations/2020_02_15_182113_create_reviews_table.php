<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->date('review_date');
            $table->string('review_text',1000);
            $table->integer('client_id')->unsigned();
            $table->integer('product_id')->unsigned()->nullable();
            $table->integer('shop_id')->unsigned()->nullable();
            $table->string('name',1000);
            $table->string('email',1000);
            $table->integer('stars_rank');
            $table->integer('review_type');
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
        Schema::dropIfExists('reviews');
    }
}
