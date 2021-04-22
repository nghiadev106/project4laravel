<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_order', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('customer_name');
            $table->string('customer_address');
            $table->string('customer_email');
            $table->string('customer_mobile');
            $table->string('customer_message');          
            $table->string('payment_method');
            $table->string('payment_status');
            $table->float('order_total');
            $table->integer('status');
            $table->integer('customer_id');
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
        Schema::dropIfExists('tbl_order');
    }
}
