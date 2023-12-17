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
        Schema::create('copy_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->timestamps();
        });

        // Inserir registros padrão
        $data = [
            ['description' => 'Disponível'],
            ['description' => 'Emprestado'],
            ['description' => 'Reservado'],
            ['description' => 'Perdido'],
            ['description' => 'Com Defeito']
        ];

        DB::table('law_areas')->insert($data);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('copy_statuses');
    }
};
