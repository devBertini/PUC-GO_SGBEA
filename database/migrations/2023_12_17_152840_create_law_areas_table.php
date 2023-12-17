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
        Schema::create('law_areas', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->timestamps();
        });

        // Inserir registros padrão
        $data = [
            ['description' => 'Civil'],
            ['description' => 'Ambiental'],
            ['description' => 'Empresarial'],
            ['description' => 'Tecnologia da Informação'],
            ['description' => 'Consumidor'],
            ['description' => 'Contratual'],
            ['description' => 'Penal'],
            ['description' => 'Trabalhista'],
            ['description' => 'Tributário'],
            ['description' => 'Digital'],
        ];

        DB::table('law_areas')->insert($data);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('law_areas');
    }
};
