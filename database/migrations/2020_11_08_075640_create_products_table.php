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
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('sku')->unique();
            $table->string('model')->nullable();
            $table->tinyInteger('display')->default(0)->nullable();
            $table->tinyInteger('featured')->default(0)->nullable();
            $table->bigInteger('order_item')->nullable();
            $table->string('price')->nullable();
            $table->integer('discount')->default(0)->nullable();
            $table->integer('total_quantity')->default(0)->nullable();
            $table->longText('brand')->nullable();
            $table->integer('brand_id')->nullable();
            $table->longText('sub_brand')->nullable();
            $table->integer('sub_brand_id')->nullable();
            $table->longText('shop_category')->nullable();
            $table->text('screen_detail')->nullable();
            $table->text('operating_system')->nullable();
            $table->text('main_camera')->nullable();
            $table->text('selfie_camera')->nullable();
            $table->text('sensor')->nullable();
            $table->text('battery')->nullable();
            $table->longText('excerpt')->nullable();
            $table->longText('meta_keywords')->nullable();
            $table->longText('meta_tags')->nullable();
            $table->longText('meta_categories')->nullable();
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
