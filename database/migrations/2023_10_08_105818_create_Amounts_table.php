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
        Schema::create('Amounts', function (Blueprint $table) {
            $table->id();
            $table->integer('rows')->default(3);
            $table->integer('collums')->default(5);
            $table->integer('width')->default(800);
            $table->integer('height')->default(800);
            $table->integer('radius')->default(30);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Amounts');
    }
};
