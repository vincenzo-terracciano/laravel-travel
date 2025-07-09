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
        Schema::table('itinerary_steps', function (Blueprint $table) {
            $table->foreignId('place_id')->nullable()->after('travel_id')->constrained()->onDelete('set null');
            $table->time('estimated_time')->nullable()->after('description');
            $table->string('activity_type')->nullable()->after('estimated_time');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('itinerary_steps', function (Blueprint $table) {
            $table->dropForeign(['place_id']);
            $table->dropColumn(['place_id', 'estimated_time', 'activity_type']);
        });
    }
};
