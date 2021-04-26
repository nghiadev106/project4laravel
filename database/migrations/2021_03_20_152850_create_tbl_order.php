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
            $table->bigInteger('user_id')->unsigned();
            $table->decimal('subtotal');
            $table->decimal('total');
            $table->decimal('discount')->default(0);
            $table->decimal('tax');
            $table->string('name');          
            $table->string('address');
            $table->string('email');
            $table->string('mobile');
            $table->string('message');          
            $table->string('payment_method');
            $table->string('payment_status');
            $table->enum('status',['ordered','delivered','canceled'])->default('ordered');           
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
        Schema::dropIfExists('tbl_order');
    }
}
