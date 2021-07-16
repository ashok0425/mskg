<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shippings', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->integer('vendor_id')->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('state')->nullable();
            $table->string('district')->nullable();
            $table->string('city')->nullable();
            $table->string('zip')->nullable();
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
        Schema::dropIfExists('shippings');
    }
}
