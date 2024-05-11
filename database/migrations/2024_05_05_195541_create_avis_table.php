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
        Schema::create('avis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('university_id');
            $table->unsignedBigInteger('critere_id');
            $table->unsignedBigInteger('filial_id')->nullable();
            $table->integer('note');
            $table->timestamps();

            $table->foreignId('user_id')->constrained();
            $table->foreignId('university_id')->constrained();
            $table->foreignId('critere_id')->constrained();
            $table->foreignId('filial_id')->constrained();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avis');
    }
};
