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
        Schema::create('packing_items', function (Blueprint $table) {
            $table->id();

            // definisco le colonne della tabella tags con i relativi tipi di dato
            $table->foreignId('travel_id')->constrained('travels')->onDelete('cascade');
            $table->string('item_name');
            $table->boolean('is_mandatory')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packing_items');
    }
};
