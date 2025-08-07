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
       Schema::create('country_contents', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('country_id');
    $table->text('description')->nullable();
    $table->string('youtube_iframe')->nullable();
    $table->string('button_name')->nullable();
    $table->string('button_link')->nullable();
    $table->string('button_target')->nullable(); // _self or _blank
    $table->enum('layout', ['left', 'right'])->default('left');
    $table->timestamps();

    $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('country_contents');
    }
};