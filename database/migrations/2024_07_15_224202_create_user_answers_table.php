<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("user_answers", function (Blueprint $table) {
            $table->foreignUuid("response_id")->constrained("responses");
            $table->foreignUuid("question_id")->constrained("questions");
            $table
                ->foreignUuid("question_answer_id")
                ->constrained("question_answers")
                ->nullable();
            $table->text("answer")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("user_answers");
    }
};
