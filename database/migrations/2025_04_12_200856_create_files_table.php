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
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('size')->nullable();
            $table->unsignedBigInteger('uploadable_by')->nullable(); // uploader user id
            $table->string('identifier')->nullable(); // custom identifier tag (e.g. 'avatar', 'certificate')
            $table->string('url'); // file storage path or URL

            // Polymorphic relation
            $table->morphs('uploadable'); // creates uploadable_id (unsignedBigInteger) + uploadable_type (string)

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};
