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
        Schema::create('collaborator_types', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->timestamps();
        });

        // Inserir registros padrão
        $data = [
            ['description' => 'Funcionário'],
            ['description' => 'Recepcionista'],
            ['description' => 'Estagiário'],
            ['description' => 'Advogado']
        ];

        DB::table('collaborator_types')->insert($data);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collaborator_types');
    }
};
