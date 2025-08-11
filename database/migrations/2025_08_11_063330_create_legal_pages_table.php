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
        Schema::create('legal_pages', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['privacy_policy', 'terms_conditions']);
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->longText('content');
            $table->boolean('is_active')->default(true);
            $table->timestamp('last_updated')->nullable();
            $table->timestamps();

            // Ensure only one active page per type
            $table->unique(['type', 'is_active'], 'unique_active_legal_page');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('legal_pages');
    }
};
