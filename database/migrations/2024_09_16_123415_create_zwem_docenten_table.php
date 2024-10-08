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
        Schema::create('zwem_docenten', function (Blueprint $table) {
            $table->id('zwem_docent_id');
            $table->string('voornaam');
            $table->string('achternaam');
            $table->foreignId('user_id')->constrained('users');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zwem_docenten');
    }
};
