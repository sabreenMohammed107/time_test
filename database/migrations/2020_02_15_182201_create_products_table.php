<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('main_image',1000);
            $table->string('en_name');
            $table->string('ar_name');
            $table->text('en_description');
            $table->text('ar_description');
            $table->integer('shop_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->integer('brand_id')->unsigned();
            $table->integer('gender_id')->unsigned();
            $table->integer('unitmeasur_id')->unsigned();
            $table->integer('qty_per_unit');
            $table->integer('qty_in_stock');
            $table->string('unit_desc');
            $table->double('price', 8, 2);
             $table->double('discount_perc', 8, 2);
            $table->integer('total_stars_rate');
            $table->date('created_date');
            $table->integer('new_flag');
            $table->integer('upcoming_flag');
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
        Schema::dropIfExists('products');
    }
}
