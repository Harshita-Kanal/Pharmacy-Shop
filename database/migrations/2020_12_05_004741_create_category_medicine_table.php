<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryMedicineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_medicine', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('medicine_id')->nullable();
            $table->foreign('medicine_id')->references('id')
                    ->on('medicines')->onDelete('cascade'); 
                
            $table->integer('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')
                    ->on('categories')->onDelete('cascade');
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
        Schema::dropIfExists('category_medicine');
    }
}