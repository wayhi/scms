<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatepayablesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payables', function (Blueprint $table) {
            $table->increments('id');
            $table->int(11)('order_id');
            $table->tinyint(1)('type');
            $table->int(11)('shop_id');
            $table->decimal(11('amount_scheduled', 2));
            $table->decimal(11('amount_actual', 2));
            $table->decimal(11('adjustment_amount', 2));
            $table->tinyint(11)('serial_no');
            $table->Date('pd_scheduled');
            $table->Date('pd_actual');
            $table->varchar(255)('handled_by');
            $table->varchar(255)('ip_address');
            $table->varchar(255)('memo');
            $table->tinyint(1)('status');
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
        Schema::drop('payables');
    }
}
