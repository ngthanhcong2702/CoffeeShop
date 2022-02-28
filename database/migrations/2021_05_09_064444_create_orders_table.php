<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('staff_id')->constrained('staffs');
            $table->datetime('create_order_at');
            $table->unsignedBigInteger('order_online_id');
            $table->foreign('order_online_id')->references('id')->on('order_onlines')->nullable();
            $table->foreignId('payment_id')->constrained('payments');
            $table->foreignId('user_id')->constrained('users')->nullable();
            $table->boolean('status')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
