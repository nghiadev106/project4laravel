<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shippings', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('name');          
            $table->string('address');
            $table->string('email');
            $table->string('mobile');
            $table->string('message'); 
            $table->integer('order_id')->unsigned();
            $table->foreign('order_id')->references('id')->on('tbl_order')->onDelete('cascade');         
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
        Schema::dropIfExists('shippings');
    }
}
