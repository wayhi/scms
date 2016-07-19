<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRoleidToGoodsmasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('goods_master', function (Blueprint $table) {
            $table->integer('role_id')->after('trade_time_end')->comment('关联的角色id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('goods_master', function (Blueprint $table) {
            //
        });
    }
}
