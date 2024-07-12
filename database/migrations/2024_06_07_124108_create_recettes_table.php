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
        Schema::create('recettes', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->text('image')->nullable();
            $table->text('video')->nullable();
            $table->text('description')->nullable();
            $table->integer('preparationTime');
            $table->integer('cookingTime');
            $table->integer('nbCalories');
            $table->string('difficulte');
            $table->string('nbPersonnes')->default(0);
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recettes');
    }
};
