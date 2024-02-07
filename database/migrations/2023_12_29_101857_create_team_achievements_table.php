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
        Schema::create('team_achievements', function (Blueprint $table) {
            $table->id();
            $table->string('placement')->nullable();
            $table->string('achievement');
            $table->foreignId('team_id')->nullable()->constrained()->nullOnDelete();
            $table->string('year')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('team_achievements');
    }
};
