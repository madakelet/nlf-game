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
        Schema::create("responses", function (Blueprint $table) {
            $table->uuid("id");
            $table->foreignUuid("user_id")->constrained("users");
            $table->foreignUuid("form_id")->constrained("forms");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("responses");
    }
};
