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
            $table->bigInteger('order_amount')->default(0);
            $table->bigInteger('total_tax')->default(0);
            $table->bigInteger('extra_discount')->default(0);
            $table->bigInteger('coupon_discount')->default(0);
            $table->bigInteger('paid_amount')->default(0);
            $table->bigInteger('collected_amount')->default(0);
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
