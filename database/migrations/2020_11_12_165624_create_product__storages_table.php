<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductStoragesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product__storages', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->string('storage');
            $table->string('ram');
            $table->string('price');
            $table->tinyInteger('available')->default(0)->nullable();
            $table->integer('quantity')->default(0)->nullable();
            $table->integer('ordered_item')->default(0)->nullable();
            $table->integer('sold_item')->default(0)->nullable();
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
        Schema::dropIfExists('product__storages');
    }
}
