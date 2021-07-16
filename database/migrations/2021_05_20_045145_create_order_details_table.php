<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->integer('vendor_id')->nullable();      
            $table->integer('shop_id')->nullable();      
            $table->integer('product_id');      
            $table->string('color')->nullable();
            $table->string('uid')->nullable();

            $table->string('size')->nullable();
            $table->string('qty')->nullable();
            $table->string('price');
            $table->string('comission');
            $table->string('coupon')->nullabe();
            $table->string('coupon_value')->nullable();
            $table->string('price_after_comission');
            $table->string('price_after_coupon');

            

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
        Schema::dropIfExists('order_details');
    }
}
