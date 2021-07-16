<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->integer('vendor_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('tracking_code');
            $table->integer('ispaid')->default(0);
            $table->string('payment_type');
            $table->string('payment_id');
            $table->float('total');
            $table->float('coupon');
            $table->float('coupon_value');
            $table->float('cart_value');
            $table->float('tax')->nullable();
            $table->float('shipping_charge');
            $table->string('status')->default(0);

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
