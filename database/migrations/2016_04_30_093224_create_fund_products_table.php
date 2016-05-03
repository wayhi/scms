<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Createfund_productsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fund_products', function (Blueprint $table) {
            $table->increments('id');
            $table->text('product_code');
            $table->text('product_name');
            $table->int('fund_id');
            $table->Decimal(16('credit_limit', 0));
            $table->Decimal(16('limit_per_order', 0));
            $table->varchar(50)('repay_method');
            $table->tinyint(1)('repay_times');
            $table->decimal(10('repay_pct', 6));
            $table->varchar(50)('clearing_acct_name');
            $table->varchar(50)('clearing_acct_bank');
            $table->varchar(50)('clearing_acct_code');
            $table->varchar(50)('controller_name');
            $table->varchar(50)('contact_email');
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
        Schema::drop('fund_products');
    }
}
