<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVehiclesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('company');
            $table->string('website');
            $table->double('stock_price', 15, 9);
            $table->integer('shares_amount');
            $table->double('company_stock_price', 15, 9);
            $table->integer('company_shares_amount');
            $table->string('email');
            $table->string('contact');
            $table->string('phone');
            $table->integer('fund_id')->unsigned();
            $table->timestamps();
            $table->foreign('fund_id')->references('id')->on('funds');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('vehicles');
    }
}
