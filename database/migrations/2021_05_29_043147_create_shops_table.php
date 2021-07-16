<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->integer('vendor_id');
            $table->string('name');
            $table->text('descr');
            $table->string('image')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('address')->nullable();
            $table->string('contact')->nullable();
            $table->string('cover')->nullable();

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
        Schema::dropIfExists('shops');
    }
}
