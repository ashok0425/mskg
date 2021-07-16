<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('websites', function (Blueprint $table) {
            $table->id()->nullable();
            $table->float('comission')->default(0);
            $table->string('title')->nullable();
            $table->string('descr')->nullable();
            $table->string('keyword')->nullable();
            $table->string('url')->nullable();
            $table->string('image')->nullable();

            $table->string('phone1')->nullable();
            $table->string('email1')->nullable();
            $table->string('address1')->nullable();
            $table->string('facebook1')->nullable();
            $table->string('twitter1')->nullable();
            $table->string('instagram1')->nullable();
            $table->string('other1')->nullable();

            $table->string('phone2')->nullable();
            $table->string('email2')->nullable();
            $table->string('address2')->nullable();
            $table->string('facebook2')->nullable();
            $table->string('twitter2')->nullable();
            $table->string('instagram2')->nullable();
            $table->string('other2')->nullable();


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
        Schema::dropIfExists('websites');
    }
}
