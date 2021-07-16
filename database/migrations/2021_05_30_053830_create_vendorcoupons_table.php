<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorcouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendorcoupons', function (Blueprint $table) {
            $table->id();
            $table->integer('vendor_id');
            $table->integer('Isapplied')->default(0);

            $table->string('coupon');
            $table->float('price');
            $table->date('expire_at');
            $table->float('card_value');
            $table->string('image')->nullable();
            $table->string('status')->default(1);
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
        Schema::dropIfExists('vendorcoupons');
    }
}
