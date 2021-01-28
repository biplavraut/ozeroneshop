<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order__details', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->integer('product_id');
            $table->string('product_title');
            $table->string('unit_price');
            $table->string('discount');
            $table->string('quantity');
            $table->string('tax');
            $table->string('sub_total');
            $table->string('shipping_price')->default(0);
            $table->string('image')->nullable();
            $table->string('color')->nullable();
            $table->string('storage')->nullable();
            $table->timestamp('order_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->tinyInteger('updated')->default(0);
            $table->timestamp('updated_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->tinyInteger('removed')->default(0);
            $table->tinyInteger('product_status')->default(0);
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
        Schema::dropIfExists('order__details');
    }
}
