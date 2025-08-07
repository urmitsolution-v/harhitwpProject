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
       Schema::create('careers', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('description')->nullable();
        $table->json('lists')->nullable(); // store todo list as JSON
        $table->enum('media_type', ['youtube', 'file'])->nullable();
        $table->string('youtube_link')->nullable();
        $table->string('media_file')->nullable(); // for file upload
        $table->enum('page_design', ['left_content_right_media', 'right_content_left_media'])->nullable();
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
        Schema::dropIfExists('careers');
    }
};