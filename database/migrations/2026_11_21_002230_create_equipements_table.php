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
        Schema::create('equipements', function (Blueprint $table) {
            $table->id();
            $table->string('code_equipement')->unique();
            $table->enum('categorie', ['ARME', 'VEHICULE', 'RADIO', 'AUTRE']);
            $table->string('numero_serie_ou_plaque')->unique();
            $table->integer('kilometrage_actuel')->nullable();
            $table->enum('etat', ['OPERATIONNEL', 'EN_MAINTENANCE', 'HORS_SERVICE'])->default('OPERATIONNEL');
            $table->enum('statut', ['DISPONIBLE', 'ATTRIBUE'])->default('DISPONIBLE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipements');
    }
};
