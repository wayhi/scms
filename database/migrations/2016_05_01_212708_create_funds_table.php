<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatefundsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funds', function (Blueprint $table) {
            $table->increments('id');
            $table->text('fund_code');
            $table->varchar(50)('fund_name');
            $table->decimal(16('credit_limit', 0));
            $table->varchar(10)('currency');
            $table->varchar(255)('contact_info');
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
        Schema::drop('funds');
    }
}
