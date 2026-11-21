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
        Schema::create('avenant_plaintes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plainte_id')->constrained('plaintes')->onDelete('cascade');
            $table->foreignId('policier_id')->constrained('personnels');
            $table->string('numero_avenant')->unique();
            $table->dateTime('date_ajout');
            $table->text('contenu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avenant_plaintes');
    }
};
