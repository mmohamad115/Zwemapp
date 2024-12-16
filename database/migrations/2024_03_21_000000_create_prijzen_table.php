<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prijzen', function (Blueprint $table) {
            $table->id('prijs_id');
            $table->string('naam');
            $table->string('beschrijving');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prijzen');
    }
};