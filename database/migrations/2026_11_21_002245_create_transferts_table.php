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
        Schema::create('transferts', function (Blueprint $table) {
            $table->id();
            $table->string('numero_ordre')->unique();
            $table->foreignId('garde_a_vue_id')->constrained('garde_a_vues');
            $table->foreignId('vehicule_id')->constrained('equipements');
            $table->string('destination');
            $table->dateTime('date_heure_prevue');
            $table->enum('statut', ['PLANIFIE', 'EN_COURS', 'TERMINE'])->default('PLANIFIE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transferts');
    }
};
