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
        Schema::create('leerlingen', function (Blueprint $table) {
            $table->id('leerling_id');
            $table->string('voornaam');
            $table->string('achternaam');
            $table->date('geboortedatum');
            $table->string('diploma');
            $table->unsignedBigInteger('ouder_id');
            $table->timestamps();

            $table->foreign('ouder_id')->references('id')->on('ouders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leerlingen');
    }
};
