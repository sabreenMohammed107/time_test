<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWholesaleOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wholesale_offers', function (Blueprint $table) {
            $table->increments('id');
            $table->text('offer_text');
            $table->integer('product_id')->unsigned();
            $table->integer('order');
            $table->double('discount_perc', 8, 2);
            $table->integer('off_qty');
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
        Schema::dropIfExists('wholesale_offers');
    }
}
