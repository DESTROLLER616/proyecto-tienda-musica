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
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('number_track');
            $table->integer('duration');
            $table->json('credits');
            $table->unsignedBigInteger('artist_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('quality_id');
            $table->unsignedBigInteger('album_id');
            $table->string('audio_path');
            $table->date('release_date');
            $table->string('image_cover_path');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('album_id')->references('id')->on('albums');
            $table->foreign('artist_id')->references('id')->on('artists');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('quality_id')->references('id')->on('qualities');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('songs');
    }
};
