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
        Schema::create('product_delivery_statuses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_transaction_log_id')->constrained('product_transaction_logs')->onDelete('cascade');
            $table->enum('status', ['pending', 'completed'])->default('pending');
            $table->date('transaction_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_delivery_statuses');
    }
};
