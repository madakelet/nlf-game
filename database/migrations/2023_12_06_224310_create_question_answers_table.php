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
        Schema::create("question_answers", function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->text("answer")->nullable();
            $table->foreignUuid("question_id")->constrained("questions");
            $table->boolean("is_correct")->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("question_answers");
    }
};
