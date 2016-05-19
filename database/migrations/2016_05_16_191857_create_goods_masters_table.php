<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Creategoods_mastersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_masters', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyint(1)('type');
            $table->varchar(50)('goods_name');
            $table->JSON('goods_spec');
            $table->int(11)('shop_id');
            $table->int(11)('fund_product_id');
            $table->tinyint(1)('platform_approve');
            $table->decimal(10('payout_rate', 6));
            $table->decimal(10('downpayment_rate', 6));
            $table->decimal(16('downpayment_amount', 0));
            $table->decimal(10('handling_fee_rate', 6));
            $table->decimal(16('handling_fee_rate', 0));
            $table->decimal(16('handling_fee', 0));
            $table->tinyint(1)('repay_times');
            $table->decimal(10('repay_pct', 6));
            $table->decimal(16('repay_amount', 0));
            $table->decimal(16('order_limit', 0));
            $table->tinyint(1)('blocked_on_creation');
            $table->tinyint(1)('refund_available');
            $table->time('trade_time_start');
            $table->time('trade_time_end');
            $table->tinyint(1)('activated');
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
        Schema::drop('goods_masters');
    }
}
