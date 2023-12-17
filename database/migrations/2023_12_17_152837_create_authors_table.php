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
        Schema::create('authors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // Inserir registros padrão
        $data = [
            ['name' => 'Norberto Bobbio'],
            ['name' => 'Scott Turow'],
            ['name' => 'Franz Kafka'],
            ['name' => 'Guilherme de Souza Nucci'],
            ['name' => 'Fernando Capez'],
            ['name' => 'Pedro Lenza'],
            ['name' => 'Vicente Paulo'],
            ['name' => 'Marcelo Alexandrino'],
            ['name' => 'Maria Sylvia Zanella Di Pietro'],
            ['name' => 'Maria Helena Diniz'],
            ['name' => 'Silvio de Salvo Venosa'],
            ['name' => 'Marisa Ferreira dos Santos'],
            ['name' => 'Fabio Zambitte Ibrahim'],
            ['name' => 'Eduardo Sabbag'],
            ['name' => 'Hugo de Brito Machado'],
            ['name' => 'Carla Romar'],
            ['name' => 'Francisco Ferreira Jorge Neto'],
            ['name' => 'Jouberto de Quadros Pessoa Cavalcante'],
            ['name' => 'Edilson Enedino'],
            ['name' => 'Gladston Mamede']
        ];

        DB::table('authors')->insert($data);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('authors');
    }
};
