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
        Schema::create('product_transaction_logs', function (Blueprint $table) {
            $table->id();

            // Polymorphic relation for order source (sale order, exchange order, etc.)
            $table->unsignedBigInteger('orderable_id');
            $table->string('orderable_type');

            // Polymorphic relation for order items (sale item, exchange item, etc.)
            $table->unsignedBigInteger('itemable_id');
            $table->string('itemable_type');

            // The product being transferred
            $table->foreignId('product_id')->constrained('store_products')->onDelete('cascade');

            // Store movement
            $table->unsignedBigInteger('from_store_id')->nullable();
            $table->unsignedBigInteger('to_store_id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_transaction_logs');
    }
};
