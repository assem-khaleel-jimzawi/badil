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
        Schema::create('laboratories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('mobile');
            $table->string('address');
            $table->string('postal_code')->nullable();
            $table->string('registration_number');
            $table->string('ministry_of_health_license_number');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->double('sale_percenatge')->default(0);
            $table->enum('status', ['inactive', 'pending', 'active'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laboratories');
    }
};
