<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->unsigned()->nullable();
            $table->foreign('order_id')->references('id')
                    ->on('user_orders')->onUpdate('cascade')->onDelete('set null');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->foreign('product_id')->references('id')
                    ->on('medicines')->onUpdate('cascade')->onDelete('set null');  
                      
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
        Schema::dropIfExists('patient_orders');
    }
}
