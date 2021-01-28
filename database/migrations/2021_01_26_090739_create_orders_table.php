<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('shipping_id');
            $table->string('order_code');
            $table->integer('delivered')->default(0);
            $table->tinyInteger('user')->default(0);
            $table->integer('customer_id')->default(0);
            $table->string('promo_code')->nullable();
            $table->string('payment_type');
            $table->tinyInteger('payment_verified')->default(0);
            $table->string('discount')->default(0);
            $table->string('shipping_cost')->default(0);
            $table->string('vat')->default(0);
            $table->string('service_charge')->default(0);
            $table->string('total_price');
            $table->timestamp('order_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('ship_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('transaction_status')->default(0);
            $table->integer('deleted')->default(0);
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
        Schema::dropIfExists('orders');
    }
}
