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
        Schema::create('fighters', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('mothers_name')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('birth_place')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('trainer')->nullable();
            $table->string('club')->nullable();
            $table->string('weight')->nullable();
            $table->string('fighting_style')->nullable();
            $table->string('losses')->nullable();
            $table->string('wins')->nullable();
            $table->string('draws')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fighters');
    }
};
