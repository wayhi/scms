<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateordersTable extends Migration
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
            $table->varchar(50)('order_number');
            $table->varchar(50)('agent');
            $table->int(11)('shop_id');
            $table->int(11)('customer_id');
            $table->int(11)('bankcard_id');
            $table->int(11)('goods_id');
            $table->tinyint(1)('order_type');
            $table->varchar(20)('terminal_type');
            $table->varchar(10)('currency');
            $table->decimal(11('apply_amount', 2));
            $table->decimal(11('credit_amount', 2));
            $table->decimal(11('platform_payout', 2));
            $table->decimal(11('downpayment_amount', 2));
            $table->decimal(11('repay_target', 2));
            $table->decimal(11('repay_actual', 2));
            $table->decimal(11('handling_fees', 2));
            $table->decimal(11('bank_charges', 2));
            $table->decimal(11('refund_amount', 2));
            $table->decimal(11('adjustment_amount', 2));
            $table->tinyint(1)('process_status');
            $table->tinyint(1)('fund_status');
            $table->tinyint(1)('risk_level');
            $table->JSON('goods_info');
            $table->JSON('supporting_doc');
            $table->timestamp('effective_date');
            $table->varchar(255)('memo');
            $table->varchar(255)('modified_by');
            $table->varchar(255)('ip_address');
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
        Schema::drop('orders');
    }
}
