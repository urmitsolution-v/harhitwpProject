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
          Schema::create('global_dpi_summits', function (Blueprint $table) {
            $table->id();

            // Section 1 - Banner
            $table->string('banner_title')->nullable();
            $table->text('banner_sub_description')->nullable();
            $table->string('banner_button_name')->nullable();
            $table->string('banner_link')->nullable();
            $table->string('banner_link_target')->default('_self');
            $table->string('banner_image')->nullable();

            // Section 3 - Content Section 1
            $table->string('content1_title')->nullable();
            $table->text('content1_description')->nullable();
            $table->string('content1_image')->nullable();
            $table->enum('content1_style', ['left', 'right'])->default('left');

            // Section 4 - Image Section
            $table->string('image_section')->nullable();

            // Section 5 - Content Section 2
            $table->string('content2_title')->nullable();
            $table->text('content2_description')->nullable();
            $table->string('content2_image')->nullable();
            $table->enum('content2_style', ['left', 'right'])->default('left');

            $table->timestamps();
        });

        // Related Logos Table
        Schema::create('global_dpi_summit_logos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('summit_id')->constrained('global_dpi_summits')->onDelete('cascade');
            $table->string('logo_name');
            $table->string('logo_image');
            $table->timestamps();
        });
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       Schema::dropIfExists('global_dpi_summit_logos');
        Schema::dropIfExists('global_dpi_summits');
    }
};