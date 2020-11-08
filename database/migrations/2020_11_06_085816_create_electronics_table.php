<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElectronicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('electronics', function (Blueprint $table) {
            $table->id();
            $table->integer('section_id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('image')->default('no-image.png')->nullable();
            $table->text('icon')->nullable();
            $table->tinyInteger('type')->default(0);
            $table->tinyInteger('display')->default(0);
            $table->bigInteger('parent_id')->default(0);
            $table->tinyInteger('child')->default(0);
            $table->bigInteger('order_item')->nullable();
            $table->longText('excerpt')->nullable();
            $table->timestamps();
            $table->foreignId('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('electronics');
    }
}
