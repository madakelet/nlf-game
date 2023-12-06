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
            $table->text('question');
            $table->foreignId('question_type_id')->constrained('question_types');
            $table->foreignId('nfl_match_id')->constrained('nfl_matches')->nullable();
            $table->foreignId('correct_answer_id')->constrained('correct_answers')->nullable();
            $table->foreignId('survey_id')->constrained('surveys');
            $table->timestamps();
            $table->softDeletes();
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
