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
        Schema::create('auditions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('affaire_id')->constrained('affaires')->onDelete('cascade');
            $table->foreignId('personne_id')->constrained('personnes');
            $table->foreignId('policier_id')->constrained('personnels');
            $table->dateTime('date_audition');
            $table->enum('qualite_personne', ['VICTIME', 'TEMOIN', 'SUSPECT']);
            $table->text('compte_rendu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auditions');
    }
};
