<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('vendor_id')->nullable();
            $table->integer('shop_id')->nullable();

            $table->string('image')->nullable();
            $table->integer('category_id');
            $table->integer('subcategory_id')->nullable();
            $table->float('price');
            $table->float('comission');
            $table->float('price_after_comission');

            $table->integer('qty')->nullable();
            $table->integer('featured')->nullable();
            $table->integer('top_rated')->nullable();
            $table->integer('Iscustomized')->default(0);

            $table->integer('bestseller')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_descr')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->text('descr')->nullable();
            $table->text('short_desc')->nullable();
            $table->text('front')->nullable();
            $table->text('back')->nullable();
            $table->text('left')->nullable();
            $table->text('right')->nullable();
            $table->text('term')->nullable();
            $table->text('material')->nullable();
            $table->varchar('recipt')->nullable();





            $table->integer('sku')->nullable();
            $table->integer('delivery_time')->nullable();
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
        Schema::dropIfExists('products');
    }
}
