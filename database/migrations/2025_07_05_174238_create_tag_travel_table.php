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
        Schema::create('tag_travel', function (Blueprint $table) {
            $table->id();

            // definisco le colonne della tabella pivot tag_travel con i relativi tipi di dato
            $table->foreignId('travel_id')->constrained('travels')->onDelete('cascade');
            $table->foreignId('tag_id')->constrained()->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tag_travel');
    }
};
