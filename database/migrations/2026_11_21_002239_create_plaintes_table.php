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
        Schema::create('plaintes', function (Blueprint $table) {
            $table->id();
            $table->string('numero_pv')->unique()->nullable(); // Généré à la validation
            $table->foreignId('policier_id')->constrained('personnels');
            $table->foreignId('victime_id')->constrained('personnes');
            $table->dateTime('date_depot');
            $table->dateTime('date_faits');
            $table->string('lieu_faits');
            $table->string('nature_infraction');
            $table->text('description');
            $table->enum('statut', ['BROUILLON', 'ENREGISTREE', 'EN_COURS_INSTRUCTION'])->default('BROUILLON');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plaintes');
    }
};
