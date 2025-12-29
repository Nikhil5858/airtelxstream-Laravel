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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->integer('release_year')->nullable();
            $table->string('language')->nullable();
            $table->enum('type', ['movie', 'series'])->default('movie');

            $table->string('movie_url')->nullable();
            $table->string('trailer_url')->nullable();
            $table->string('banner_url')->nullable();
            $table->string('poster_url')->nullable();

            $table->boolean('is_free')->default(false);
            $table->boolean('is_new_release')->default(false);
            $table->boolean('is_feature')->default(false);
            $table->boolean('is_banner')->default(false);

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
        Schema::dropIfExists('movies');
    }
};
