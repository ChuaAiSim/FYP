<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cateogory',30)->index();
            $table->text('description',1000);
            $table->string('status',20)->index();
            $table->timestamps();
        });

        DB::table('categories')->insert(
            array(
                'cateogory' => 'Mille Crepe',
                'description' => 'A Mille Crepe Cake is cake with several crepe layers. In between each layer is freshly-made cream, custard or sauces. The crepes, itself, are made with flour, eggs, sugar, and milk. In French, mille means a thousand, and it often refers to the many layers found within the crepe cake. Crepe cake layers can vary from 30 to even a hundred layers. It all depends on the recipe and the chef. Crepe cakes are a popular treat across the United States, especially in New York City. Crepe cakes can range from different creams, layers, and even different styles.',
                'status' => 'ok',
            )
        );

        DB::table('categories')->insert(
            array(
                'cateogory' => 'Cheese Crepe',
                'description' => 'A sweet dessert consisting of one or more layers. The main, and thickest layer, consists of a mixture of soft, fresh cheese (typically cream cheese or ricotta), eggs, and sugar. If there is a bottom layer, it often consists of a crust or base made from crushed cookies (or digestive biscuits), graham crackers, pastry, or sometimes sponge cake. It may be baked or unbaked (usually refrigerated).',
                'status' => 'ok',
            )
        );

        DB::table('categories')->insert(
            array(
                'cateogory' => 'Sponge Cake',
                'description' => 'A cake based on flour (usually wheat flour), sugar, butter and eggs, and is sometimes leavened with baking powder.[1] In the United Kingdom a sponge cake is produced using the batter method, while in the US cakes made using the batter method are known as butter or pound cakes. Two common British batter-method sponge cakes are the layered Victoria sponge cake and Madeira cake. The Victorian creation of baking powder by English food manufacturer Alfred Bird in 1843 enabled the sponge to rise higher than cakes made previously.',
                'status' => 'ok',
            )
        );

        DB::table('categories')->insert(
            array(
                'cateogory' => 'Cup Cake',
                'description' => 'A cupcake (also British English: fairy cake; Hiberno-English: bun; Australian English: fairy cake or patty cake) is a small cake designed to serve one person, which may be baked in a small thin paper or aluminum cup. As with larger cakes, icing and other cake decorations such as fruit and candy may be applied.',
                'status' => 'ok',
            )
        );

        DB::table('categories')->insert(
            array(
                'cateogory' => 'Mousse Cake',
                'description' => 'A mousse (French foam /ˈmuːs/) is a soft prepared food that incorporates air bubbles to give it a light and airy texture. It can range from light and fluffy to creamy and thick, depending on preparation techniques. A mousse may be sweet or savoury.',
                'status' => 'ok',
            )
        );

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
