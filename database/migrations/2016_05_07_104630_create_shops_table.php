<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateshopsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->increments('id');
            $table->int(11)('merchant_id');
            $table->varchar(50)('shop_code');
            $table->varchar(50)('shop_name');
            $table->varchar(50)('shop_address');
            $table->varchar(20)('contact_name');
            $table->varchar(20)('line_phone');
            $table->varchar(20)('mobile_phone');
            $table->tinyint(1)('status');
            $table->varchar(50)('account_name');
            $table->varchar(50)('bank_name');
            $table->varchar(50)('account_code');
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
        Schema::drop('shops');
    }
}
