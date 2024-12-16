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
        Schema::create('zwemlessen', function (Blueprint $table) {
            $table->id('zwemles_id');
            $table->string('naam');
            $table->string('beschrijving');
            $table->string('duurtijd');
            $table->date('datum');
            $table->string('tijd');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zwemlessen');
    }
};
