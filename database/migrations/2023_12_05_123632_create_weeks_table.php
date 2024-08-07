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
        Schema::create("weeks", function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("week");
            $table->dateTime("start_date");
            $table->dateTime("end_date");
            $table->boolean("is_current")->default(false);
            $table->integer("season");
            $table->integer("type");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("weeks");
    }
};
