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
       Schema::create('impact_stories', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->string('slug')->nullable();
        $table->string('short_description')->nullable();
        $table->longText('content')->nullable(); // summernote content
        $table->enum('status', ['active', 'inactive'])->default('active');
        $table->string('meta_title')->nullable();
        $table->string('meta_tags')->nullable();
        $table->text('meta_description')->nullable();

        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('impact_stories');
    }
};