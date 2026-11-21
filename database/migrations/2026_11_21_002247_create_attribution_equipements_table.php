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
        Schema::create('attribution_equipements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personnel_id')->constrained('personnels');
            $table->foreignId('equipement_id')->constrained('equipements');
            $table->dateTime('date_sortie');
            $table->dateTime('date_retour')->nullable();
            $table->integer('kilometrage_depart')->nullable();
            $table->integer('kilometrage_retour')->nullable();
            $table->text('observation_retour')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attribution_equipements');
    }
};
