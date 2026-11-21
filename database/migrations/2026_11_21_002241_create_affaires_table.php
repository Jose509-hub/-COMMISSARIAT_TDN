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
        Schema::create('affaires', function (Blueprint $table) {
            $table->id();
            $table->string('numero_affaire')->unique();
            $table->foreignId('enqueteur_id')->constrained('personnels');
            $table->foreignId('commissaire_id')->nullable()->constrained('personnels');
            $table->string('titre');
            $table->string('qualification_penale');
            $table->dateTime('date_ouverture');
            $table->enum('statut', ['OUVERTE', 'EN_COURS_INSTRUCTION', 'TRANSMISE_PARQUET', 'CLOTUREE'])->default('OUVERTE');
            $table->text('note_cloture')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('affaires');
    }
};
