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
        Schema::create('publishers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // Inserir registros padrão
        $data = [
            ['name' => 'Saraiva'],
            ['name' => 'Grupo Editorial Nacional'],
            ['name' => 'Revista dos Tribunais'],
            ['name' => 'Fórum'],
            ['name' => 'Lumen Juris'],
            ['name' => 'Juruá'],
            ['name' => 'Malheiros Editores'],
            ['name' => 'Del Rey'],
            ['name' => 'Rideel'],
            ['name' => 'Lex Magister'],
            ['name' => 'Edijur'],
            ['name' => 'Quartier Latin'],
        ];

        DB::table('publishers')->insert($data);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publishers');
    }
};
