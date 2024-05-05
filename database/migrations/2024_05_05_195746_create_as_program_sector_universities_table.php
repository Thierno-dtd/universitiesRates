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

            $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade');
            $table->foreign('university_id')->references('id')->on('universities')->onDelete('cascade');
            $table->foreign('sector_id')->references('id')->on('sectors')->onDelete('cascade');
            $table->foreign('filial_id')->references('id')->on('filials')->onDelete('cascade');

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
