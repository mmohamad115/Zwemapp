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
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('leerling_id');
            $table->unsignedBigInteger('zwem_docent_id');
            $table->text('content');
            $table->date('aanmaakdatum');
            $table->timestamps();

            $table->foreign('leerling_id')->references('id')->on('leerlingen')->onDelete('cascade');
            $table->foreign('zwem_docent_id')->references('id')->on('zwem_docenten')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }
};
