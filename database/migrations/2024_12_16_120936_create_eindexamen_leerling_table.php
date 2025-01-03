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
        Schema::create('eindexamen_leerling', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('eindexamen_id');
            $table->unsignedBigInteger('leerling_id');
            $table->enum('status', ['aangemeld', 'geslaagd', 'gezakt'])->default('aangemeld');
            $table->unsignedBigInteger('prijs_id')->nullable();
            $table->timestamps();

            $table->foreign('eindexamen_id')
                  ->references('eindexamen_id')
                  ->on('eindexamen')
                  ->onDelete('cascade');

            $table->foreign('leerling_id')
                  ->references('leerling_id')
                  ->on('leerlingen')
                  ->onDelete('cascade');

            $table->foreign('prijs_id')
                  ->references('prijs_id')
                  ->on('prijzen')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eindexamen_leerling');
    }
};