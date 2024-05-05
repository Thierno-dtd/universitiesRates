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

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('university_id')->references('id')->on('universities')->onDelete('cascade');
            $table->foreign('critere_id')->references('id')->on('criteres')->onDelete('cascade');
            $table->foreign('filial_id')->references('id')->on('filials')->onDelete('cascade');

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
