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
        Schema::create('loan_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->timestamps();
        });

        // Inserir registros padrão
        $data = [
            ['description' => 'Em Andamento'],
            ['description' => 'Concluído'],
            ['description' => 'Atrasado']
        ];

        DB::table('loan_statuses')->insert($data);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_statuses');
    }
};
