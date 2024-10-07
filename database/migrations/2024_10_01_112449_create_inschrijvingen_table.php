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
        Schema::create('inschrijvingen', function (Blueprint $table) {
            $table->unsignedBigInteger('groep_id');

            // $table->unsignedBigInteger('zwem_docent_id');
            $table->unsignedBigInteger('zwemles_id');
            $table->timestamps();

            $table->foreign('groep_id')->references('groep_id')->on('groepen')->onDelete('cascade');
       
            // $table->foreign('zwem_docent_id')->references('zwem_docent_id')->on('zwem_docenten')->onDelete('cascade');
            $table->foreign('zwemles_id')->references('zwemles_id')->on('zwemlessen')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inschrijvingen');
    }
};
