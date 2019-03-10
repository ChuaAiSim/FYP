<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CartItems', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsinged();
            $table->foreign('product_id')->references('id')->on('products');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('order_id')->unsinged()->nullable();
            $table->foreign('order_id')->references('id')->on('orders');
            $table->integer('quantity');
            $table->string('size',10);
            $table->integer('isCustomize');
            $table->string('topping')->nullable();
            $table->string('flavor')->nullable();
            $table->string('ingredient')->nullable();
            $table->string('creamFlavor')->nullable();
            $table->string('specialRequest')->nullable();
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
        Schema::dropIfExists('CartItems');
    }
}
