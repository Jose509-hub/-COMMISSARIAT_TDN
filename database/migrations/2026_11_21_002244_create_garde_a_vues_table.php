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
        Schema::create('garde_a_vues', function (Blueprint $table) {
            $table->id();
            $table->string('numero_ecrou')->unique();
            $table->foreignId('affaire_id')->constrained('affaires');
            $table->foreignId('suspect_id')->constrained('personnes');
            $table->foreignId('policier_id')->constrained('personnels');
            $table->dateTime('date_heure_debut');
            $table->dateTime('date_heure_fin_legale'); // Debut + 48h
            $table->string('motif');
            $table->boolean('droits_notifies')->default(false);
            $table->text('inventaire_fouille')->nullable();
            $table->string('numero_cellule');
            $table->enum('statut', ['EN_GAV', 'LIBERE', 'DEFERE_PARQUET', 'DETENTION_PROVISOIRE'])->default('EN_GAV');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('garde_a_vues');
    }
};
