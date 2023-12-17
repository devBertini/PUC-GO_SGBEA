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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('copy_id')->constrained('copies');
            $table->foreignId('collaborator_id')->constrained('collaborators');
            $table->dateTime('reservation_date');
            $table->dateTime('limit_date');
            $table->foreignId('reservation_status_id')->constrained('reservation_statuses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
