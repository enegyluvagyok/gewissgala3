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
        Schema::create('fights', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fighter1_id')->constrained('fighters');
            $table->foreignId('fighter2_id')->constrained('fighters');
            $table->tinyInteger('winner_id')->nullable();
            $table->dateTime('date');
            $table->string('duration');
            $table->string('fighting_style');
            $table->string('agegroup');
            $table->string('weight');
            $table->tinyInteger('title_fight');
            $table->tinyInteger('ko');
            $table->tinyInteger('tko');
            $table->string('judges')->nullable();
            $table->string('photo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fights');
    }
};
