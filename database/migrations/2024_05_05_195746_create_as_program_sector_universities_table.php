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
        Schema::create('as_program_sector_universities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('program_id');
            $table->unsignedBigInteger('sector_id');
            $table->unsignedBigInteger('university_id');
            $table->unsignedBigInteger('filial_id')->nullable();
            $table->timestamps();

            $table->foreignId('program_id')->constrained();
            $table->foreignId('university_id')->constrained();
            $table->foreignId('sector_id')->constrained();
            $table->foreignId('filial_id')->constrained();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('as_program_sector_universities');
    }
};
