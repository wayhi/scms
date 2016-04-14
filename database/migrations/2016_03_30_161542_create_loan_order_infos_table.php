<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Createloan_order_infosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_order_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('loan_order_id');
            $table->string('loan_order_code');
            $table->number('product_price');
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
        Schema::drop('loan_order_infos');
    }
}
