<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id')->default(1);
            $table->string('order_code');
            $table->string('payment_method')->default('Cash');
            $table->bigInteger('order_amount');
            $table->bigInteger('total_tax')->nullable();
            $table->bigInteger('extra_discount')->nullable();
            $table->bigInteger('coupon_discount')->nullable();
            $table->bigInteger('paid_amount');
            $table->bigInteger('collected_amount')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
