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
       Schema::create('inclusivity_pulses', function (Blueprint $table) {
            $table->id();

            // Section 1: Banner
            $table->string('banner_title')->nullable();
            $table->text('banner_subdescription')->nullable();
            $table->string('banner_image')->nullable();

            // Section 2: Content
            $table->string('content_title')->nullable();
            $table->text('content_description')->nullable();
            $table->string('content_image')->nullable();
            $table->string('content_layout')->nullable(); // left/right

            // Section 4: Timeline
            $table->string('timeline_title')->nullable();
            $table->string('timeline_image')->nullable();

            // Section 6: SEO
            $table->string('meta_title')->nullable();
            $table->string('meta_tags')->nullable();
            $table->text('meta_description')->nullable();

            $table->timestamps();
        });

        // Advanced editors table
        Schema::create('inclusivity_pulse_editors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inclusivity_pulse_id')->constrained()->onDelete('cascade');
            $table->string('editor_layout')->nullable();
            $table->text('editor_content')->nullable();
            $table->timestamps();
        });

        // Pivot for team members
       Schema::create('inclusivity_pulse_team', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('inclusivity_pulse_id');
    $table->unsignedBigInteger('team_id');
    
    $table->foreign('inclusivity_pulse_id')->references('id')->on('inclusivity_pulses')->onDelete('cascade');
    $table->foreign('team_id')->references('id')->on('team')->onDelete('cascade');
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inclusivity_pulse_team');
        Schema::dropIfExists('inclusivity_pulse_editors');
        Schema::dropIfExists('inclusivity_pulses');
    }
};