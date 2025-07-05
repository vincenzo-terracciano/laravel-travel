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
        Schema::create('itinerary_steps', function (Blueprint $table) {
            $table->id();

            // definisco le colonne della tabella tags con i relativi tipi di dato
            $table->foreignId('travel_id')->constrained('travels')->onDelete('cascade');
            $table->string('title');
            $table->text('description')->nullable();
            $table->integer('day_number');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itinerary_steps');
    }
};
