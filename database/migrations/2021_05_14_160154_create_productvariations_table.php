<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductvariationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productvariations', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->integer('vendor_id')->nullable();
            $table->string('variation')->nullable();
            $table->string('image')->nullable();
            $table->string('price')->nullable();
            $table->string('comission')->nullable();
            $table->integer('price_after_comission')->nullable();
            $table->string('sku')->nullable();
            $table->integer('status')->default(1);

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
        Schema::dropIfExists('productvariations');
    }
}
