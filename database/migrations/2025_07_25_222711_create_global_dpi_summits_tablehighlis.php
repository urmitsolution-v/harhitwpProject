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
       Schema::create('global_dpi_summits_highlights', function (Blueprint $table) {
    $table->id();
    $table->string('title')->nullable();
    $table->string('logo')->nullable();
    $table->string('button_name')->nullable();
    $table->string('button_url')->nullable();
    $table->string('button_target')->default('_self');
    $table->longText('todos')->nullable(); // YouTube todo list
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('global_dpi_summits_tablehighlis');
    }
};