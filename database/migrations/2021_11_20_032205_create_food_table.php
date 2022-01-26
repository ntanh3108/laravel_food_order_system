<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food', function (Blueprint $table) {
            $table->bigIncrements('food_id');
            $table->foreignId('category_id');
            $table->string('food_name');
            $table->longText('food_detail');
            $table->longText('food_image');
            $table->integer('food_status');
            $table->datetime('added_on');
            $table->float('price_size_m',10,2)->nullable();
            $table->float('price_size_l',10,2)->nullable();
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
        Schema::dropIfExists('food');
    }
}
