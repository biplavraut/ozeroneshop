<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevmenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devmenus', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('image')->default('no-image.png')->nullable();
            $table->string('icon')->nullable();
            $table->tinyInteger('type')->default(0);
            $table->tinyInteger('display')->default(0);
            $table->tinyInteger('child')->default(0);
            $table->bigInteger('order_item')->nullable();
            $table->longText('excerpt')->nullable();
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
        Schema::dropIfExists('devmenus');
    }
}
