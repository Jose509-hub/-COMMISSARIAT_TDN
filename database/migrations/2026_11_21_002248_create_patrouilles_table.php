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
        Schema::create('patrouilles', function (Blueprint $table) {
            $table->id();
            $table->string('numero_mission')->unique();
            $table->foreignId('commissaire_id')->constrained('personnels');
            $table->foreignId('vehicule_id')->constrained('equipements');
            $table->string('secteur');
            $table->dateTime('date_heure_debut');
            $table->dateTime('date_heure_fin');
            $table->text('rapport')->nullable();
            $table->enum('statut', ['PLANIFIEE', 'EN_COURS', 'TERMINEE'])->default('PLANIFIEE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patrouilles');
    }
};
