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
        Schema::create('groepen', function (Blueprint $table) {
            $table->id('groep_id');
            $table->string('groepNaam');
            $table->unsignedBigInteger('zwem_docent_id');
            $table->timestamps();

            $table->foreign('zwem_docent_id')->references('zwem_docent_id')->on('zwem_docenten')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groepen');
    }
};
