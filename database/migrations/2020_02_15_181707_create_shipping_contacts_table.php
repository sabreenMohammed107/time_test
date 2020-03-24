<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id')->unsigned();
            $table->string('name');
            $table->string('mobile1',50);
            $table->string('mobile2',50);
            $table->integer('country_id')->unsigned();
             $table->integer('city_id')->unsigned();
            $table->string('street_address',1000);
            $table->string('postal_code');
            $table->string('address_feature',1000);
            $table->string('map_location',1000);
            $table->integer('default');
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
        Schema::dropIfExists('shipping_contacts');
    }
}
