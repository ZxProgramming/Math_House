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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lesson_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('question');
            $table->string('q_url');
            $table->string('q_code');
            $table->string('q_month');
            $table->string('q_year');
            $table->string('q_num');
            $table->enum('section', ['Blank', '1', '2', '3', '4']);
            $table->enum('q_type', ['trail', 'extra', 'parallel']);
            $table->enum('difficulty', ['1', '2', '3', '4']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
