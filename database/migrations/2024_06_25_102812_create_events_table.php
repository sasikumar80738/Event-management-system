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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Event name
            $table->dateTime('event_date_time'); // Event date & time
            $table->string('location'); // Event location
            $table->decimal('latitude', 10, 7); // Event latitude
            $table->decimal('longitude', 10, 7); // Event longitude
            $table->string('status'); // Event status
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
