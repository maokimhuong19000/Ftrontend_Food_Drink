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
        Schema::create('food_menu', function (Blueprint $table) {
            $table->id('food_id');
            $table->string('food_img');
            $table->string('food_name')->unique();
            $table->float('price', 8, 2);
            $table->enum('food_status', ['0', '1'])->default(1);
            $table->string('food_desc')->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('food_category_id');

            $table->foreign('food_category_id')
                    ->references('food_category_id')
                    ->on('food_category')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('food_menu');
    }
};
