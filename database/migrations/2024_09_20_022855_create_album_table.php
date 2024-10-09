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
        Schema::create('albums', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('song_number');
            $table->string('total_time');
            $table->json('credits')->nullable();
            $table->unsignedBigInteger('label_id');
            $table->unsignedBigInteger('artist_id');
            $table->date('release_date');
            $table->string('cover_image_path')->nullable();
            $table->decimal('price', 8, 2);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('label_id')->references('id')->on('labels');
            $table->foreign('artist_id')->references('id')->on('artists');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('albums');
    }
};
