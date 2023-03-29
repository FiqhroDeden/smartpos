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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->unique();
            $table->integer('brand_id')->nullable();
            $table->bigInteger('quantity');
            $table->integer('unit_id');
            $table->bigInteger('unit_value');
            $table->integer('category_id')->nullable();
            $table->integer('subcategory_id');
            $table->bigInteger('selling_price');
            $table->bigInteger('purchase_price');
            $table->boolean('discount_type')->default(true);
            $table->bigInteger('discount_value')->nullable();
            $table->integer('tax')->nullable();
            $table->integer('supplier_id')->nullable();
            $table->string('image')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
