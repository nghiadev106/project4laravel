<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('order_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->enum('mode',['cod','cart','vnpay']);
            $table->enum('status',['pending','approved','declined','refunded'])->default('pending');
            $table->foreign('order_id')->references('id')->on('tbl_order')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');          
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
        Schema::dropIfExists('transactions');
    }
}
