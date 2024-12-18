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
            $table->id(); // Primārā atslēga
            $table->string('title'); // Filmas nosaukums
            $table->string('director'); // Režisors
            $table->string('genre'); // Žanrs
            $table->date('release_date'); // Publicēšanas datums
            $table->timestamps(); // Automatizētie lauki: created_at un updated_at
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
