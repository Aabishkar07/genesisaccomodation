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
        Schema::create('display', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // accommodation, blog, testimonial
            $table->boolean('status')->default(0); // 0 = hidden, 1 = visible
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('display');
    }
};
