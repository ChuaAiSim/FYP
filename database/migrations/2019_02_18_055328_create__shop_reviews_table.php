<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ShopReviews', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rating');
            $table->text('review');
            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('Customers');
            $table->integer('order_id')->unsigned();
            $table->foreign('order_id')->references('id')->on('orders');
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
        Schema::dropIfExists('ShopReviews');
    }
}
