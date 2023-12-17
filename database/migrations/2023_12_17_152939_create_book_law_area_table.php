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
        Schema::create('book_law_area', function (Blueprint $table) {
            $table->foreignId('book_id')->constrained('books');
            $table->foreignId('law_area_id')->constrained('law_areas');
            $table->primary(['book_id', 'law_area_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_law_area');
    }
};
