<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
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
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->integer('buyer_id')->unsigned();
            $table->foreign('buyer_id')->references('id')->on('buyers');
            $table->integer('seller_id')->unsigned();
            $table->foreign('seller_id')->references('id')->on('sellers');
            $table->integer('status_id');
            $table->integer('id_order_status')->unsigned();
            $table->foreign('id_order_status')->references('id')->on('order_status');
            $table->integer('value');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
