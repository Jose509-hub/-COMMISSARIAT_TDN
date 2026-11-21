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
        Schema::create('plainte_temoin', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plainte_id')->constrained('plaintes')->onDelete('cascade');
            $table->foreignId('personne_id')->constrained('personnes')->onDelete('cascade');
            $table->text('deposition')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plainte_temoin');
    }
};
