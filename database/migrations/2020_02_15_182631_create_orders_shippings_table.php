<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersShippingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_shippings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('mobile1',50);
            $table->string('mobile2',50);
            $table->string('phone',50);
            $table->integer('country_id')->unsigned();
             $table->integer('city_id')->unsigned();
             $table->text('street_address');
             $table->string('postal_cost');
             $table->text('address_marks');
             $table->string('map_location',1000);
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
        Schema::dropIfExists('orders_shippings');
    }
}
