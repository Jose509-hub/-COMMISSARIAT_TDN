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
        Schema::create('piece_convictions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('affaire_id')->constrained('affaires')->onDelete('cascade');
            $table->foreignId('agent_saisie_id')->constrained('personnels');
            $table->string('code_scelle')->unique();
            $table->text('description');
            $table->string('emplacement');
            $table->dateTime('date_saisie');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('piece_convictions');
    }
};
