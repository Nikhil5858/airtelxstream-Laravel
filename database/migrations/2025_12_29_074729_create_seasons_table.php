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
        Schema::create('seasons', function (Blueprint $table) {
            $table->id();
            $table->integer('season_number');
            $table->integer('episode_number');
            $table->string('release_year', 50);
            $table->foreignId('movie_id')->nullable()->constrained('movies');
            $table->foreignId('genre_id')->nullable()->constrained('genre');
            $table->foreignId('ott_id')->nullable()->constrained('ott_providers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seasons');
    }
};
