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
      Schema::create('investments', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('sub_description')->nullable();
        $table->longtext('todo_list')->nullable(); // title + description array
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
        Schema::dropIfExists('investments');
    }
};