<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuynowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buynows', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('product_id');
            $table->integer('qty');
            $table->integer('price');
            $table->integer('actual_price');
            $table->integer('price_after_comission');

            $table->integer('size')->nullable();
            $table->integer('color')->nullable();


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
        Schema::dropIfExists('buynows');
    }
}
