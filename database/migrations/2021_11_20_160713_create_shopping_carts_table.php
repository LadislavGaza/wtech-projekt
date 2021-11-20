<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShoppingCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopping_carts', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_bought')->default(false);

            $table->integer('transport')->unsigned();
            $table->integer('payment')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('delivery_place_id')->unsigned();
            
            $table->foreign('transport')->references('id')->on('shopping_options');
            $table->foreign('payment')->references('id')->on('shopping_options');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('delivery_place_id')->references('id')->on('delivery_places');

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
        Schema::dropIfExists('shopping_carts');
    }
}
