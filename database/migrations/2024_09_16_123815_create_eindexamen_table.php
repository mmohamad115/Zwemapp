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
        Schema::create('eindexamen', function (Blueprint $table) {
            $table->id('eindexamen_id');
            $table->string('examen_naam');
            $table->string('beschrijving');
            $table->integer('duur');
            $table->date('tijdstip');
            $table->unsignedBigInteger('leerling_id')->nullable();
            $table->timestamps();

            $table->foreign('leerling_id')->references('leerling_id')->on('leerlingen')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eindexamen');
    }
};
