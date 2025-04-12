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
        Schema::create('exchange_offer_order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exchange_offer_order_id')->constrained('exchange_offer_orders')->onDelete('cascade');
            $table->foreignId('store_product_id')->constrained('store_products')->onDelete('cascade');
            $table->integer('quantity')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exchange_offer_order_items');
    }
};
