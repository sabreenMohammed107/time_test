<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Relations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         //  This is Realations for the shops Table ..
         Schema::table('shops', function (Blueprint $table) {
            $table->foreign('default_curr')->references('id')->on('currencies')->onDelete('cascade');
           
        });
         //  This is Realations for the images__sliders Table ..
         Schema::table('images_sliders', function (Blueprint $table) {
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade');
           
        });
         //  This is Realations for the clients Table ..
         Schema::table('clients', function (Blueprint $table) {
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
           
        });
        //  This is Realations for the shipping__contacts Table ..
        Schema::table('shipping_contacts', function (Blueprint $table) {
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
           
        });
         //  This is Realations for the favorites__products Table ..
        //  Schema::table('favorites_products', function (Blueprint $table) {
        //    $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
        //      $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
           
        // });
         //  This is Realations for the client_product Table ..
         Schema::table('client_products', function (Blueprint $table) {
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
              $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            
         });
         //  This is Realations for the cities Table ..
         Schema::table('cities', function (Blueprint $table) {
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
           
        });
         //  This is Realations for the carts Table ..
         Schema::table('carts', function (Blueprint $table) {
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
           
        });
        //  This is Realations for the cart_details Table ..
        Schema::table('cart_details', function (Blueprint $table) {
            $table->foreign('cart_id')->references('id')->on('carts')->onDelete('cascade');
              $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            
         });
          //  This is Realations for the reviews Table ..
        Schema::table('reviews', function (Blueprint $table) {
            $table->foreign('client_id')->references('id')->on('clients');
              $table->foreign('product_id')->references('id')->on('products');
              $table->foreign('shop_id')->references('id')->on('shops');

            
         });
           //  This is Realations for the products Table ..
        Schema::table('products', function (Blueprint $table) {
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade');
              $table->foreign('category_id')->references('id')->on('categories');
              $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
              $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
              $table->foreign('unitmeasur_id')->references('id')->on('unit_measures')->onDelete('cascade');
            
         });
          //  This is Realations for the products_sizes Table ..
        Schema::table('products_sizes', function (Blueprint $table) {
            $table->foreign('size_id')->references('id')->on('sizes')->onDelete('cascade');
              $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

            
         });
         //  This is Realations for the wholesale_offers Table ..
        Schema::table('wholesale_offers', function (Blueprint $table) {
              $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

            
         });
          //  This is Realations for the orders Table ..
        Schema::table('orders', function (Blueprint $table) {
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('order_status_id')->references('id')->on('order_statuses')->onDelete('cascade');
            $table->foreign('order_shipping_id')->references('id')->on('orders_shippings')->onDelete('cascade');

          
       });
        //  This is Realations for the order_details Table ..
        Schema::table('order_details', function (Blueprint $table) {
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
              $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

            
         });
          //  This is Realations for the orders_shippings Table ..
        Schema::table('orders_shippings', function (Blueprint $table) {
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
           
        });
         //  This is Realations for the related_products Table ..
         Schema::table('related_products', function (Blueprint $table) {
            $table->foreign('related_product_id')->references('id')->on('products')->onDelete('cascade');
           
        });
         //  This is Realations for the product_sliders Table ..
         Schema::table('product_sliders', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
           
        });
         //  This is Realations for the shop_categories Table ..
         Schema::table('shop_category', function (Blueprint $table) {
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade');
              $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            
         });
         //  This is Realations for the product_features Table ..
         Schema::table('product_features', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
              $table->foreign('feature_id')->references('id')->on('category_features')->onDelete('cascade');

            
         });
          //  This is Realations for the categories Table ..
          Schema::table('categories', function (Blueprint $table) {
            $table->foreign('parent_category_id')->references('id')->on('categories');
           
        });
        //  This is Realations for the category_features Table ..
        Schema::table('category_features', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
           
        });
         //  This is Realations for the shop_contacts Table ..
         Schema::table('shop_contacts', function (Blueprint $table) {
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
