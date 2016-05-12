<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatemerchantsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchants', function (Blueprint $table) {
            $table->increments('id');
            $table->varchar(50)('merchant_name');
            $table->varchar(20)('short_name');
            $table->varchar(50)('merchant_code');
            $table->varchar(100)('address');
            $table->varchar(20)('contact_person');
            $table->varchar(50)('phone');
            $table->json('merchant_cert');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('merchants');
    }
}
