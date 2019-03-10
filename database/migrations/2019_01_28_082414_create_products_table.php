<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100)->index();
            $table->text('description',1000);
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->decimal('slide_price',8,2)->index();
            $table->decimal('whole_price',8,2)->index();
            $table->string('image',1000);
            $table->string('status',20)->index();
            $table->integer('quantity');
            $table->string('topping',100);
            $table->string('flavor',100);
            $table->string('ingredient',100);
            $table->string('cream',100);
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
        Schema::dropIfExists('products');
    }
}
