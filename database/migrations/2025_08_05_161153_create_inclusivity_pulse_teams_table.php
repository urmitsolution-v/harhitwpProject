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
         Schema::create('inclusivity_pulse_teams', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inclusivity_pulse_id');
            $table->string('name');
            $table->string('position')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();

            $table->foreign('inclusivity_pulse_id')->references('id')->on('inclusivity_pulses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inclusivity_pulse_teams');
    }
};
