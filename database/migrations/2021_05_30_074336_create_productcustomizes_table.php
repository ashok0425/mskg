<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductcustomizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productcustomizes', function (Blueprint $table) {
            $table->id();
            $table->integer('vendor_id');
            $table->integer('user_id');
            $table->integer('product_id');
            $table->string('image')->nullable();
            $table->text('descr');
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
        Schema::dropIfExists('productcustomizes');
    }
}
