<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('title');
            $table->integer('price');
            $table->integer('discount_price')->nullable();
            $table->integer('categories_id');
            $table->string('img')->nullable();
            $table->string('description_img')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('describe')->nullable();
            $table->string('status')->default('available'); //có sẵn
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
};
