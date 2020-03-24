<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();;
            $table->string('password');
            $table->string('name');
            $table->integer('country_id')->unsigned();
            $table->integer('city_id')->unsigned();
            $table->string('mobile1',50);
            $table->string('mobile2',50);
            $table->string('job_title',255);
            $table->string('company',255);
            $table->string('postal_code',20);
            $table->enum('gender', ['F', 'M'])->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('clients');
    }
}
