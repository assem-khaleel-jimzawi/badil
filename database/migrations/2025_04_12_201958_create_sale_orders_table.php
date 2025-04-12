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
        Schema::create('salee_orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number');
            $table->foreignId('laboratory_id')->constrained('laboratories')->onDelete('cascade');
            $table->enum('status', ['cancel', 'complete'])->default('complete');
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salee_orders');
    }
};
