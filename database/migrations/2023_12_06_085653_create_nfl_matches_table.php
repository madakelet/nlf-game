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
        Schema::create("nfl_matches", function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->foreignUuid("home_team_id")->references("id")->on("teams");
            $table->foreignUuid("away_team_id")->references("id")->on("teams");
            $table->dateTime("start_time")->nullable();
            $table->string("week")->nullable();
            $table->foreignUuid("week_id")->constrained("weeks");
            $table->string("stadium")->nullable();
            $table->string("final_score")->nullable();
            $table->string("api_id")->unique()->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("nfl_matches");
    }
};
