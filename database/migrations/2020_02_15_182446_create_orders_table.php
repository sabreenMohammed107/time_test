<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_no');
            $table->integer('client_id')->unsigned();
            $table->double('order_value', 8, 2);
            $table->double('vat_value', 8, 2);
            $table->double('shipping_value', 8, 2);
            $table->double('net_value', 8, 2);
            $table->date('order_date');
            $table->integer('order_status_id')->unsigned();
            $table->date('deleivery_date');
            $table->integer('order_shipping_id')->unsigned();
            $table->text('client_note');
            $table->text('shop_note');
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
        Schema::dropIfExists('orders');
    }
}
