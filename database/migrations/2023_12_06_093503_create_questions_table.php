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
        Schema::create("questions", function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->text("question");
            $table->integer("position");
            $table
                ->foreignUuid("question_type_id")
                ->constrained("question_types");
            $table
                ->foreignUuid("nfl_match_id")
                ->nullable()
                ->constrained("nfl_matches");
            $table->foreignUuid("form_id")->nullable()->constrained("forms");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("questions");
    }
};
