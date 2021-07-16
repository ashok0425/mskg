<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductreportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productreports', function (Blueprint $table) {
            $table->id();
            $table->integer('vendor_id');
            $table->integer('user_id');
            $table->integer('product_id');
            $table->text('reason');
            $table->integer('status')->default(0);

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
        Schema::dropIfExists('productreports');
    }
}
