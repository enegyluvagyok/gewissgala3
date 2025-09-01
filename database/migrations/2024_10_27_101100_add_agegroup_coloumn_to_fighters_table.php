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
        Schema::table('fighters', function (Blueprint $table) {
            $table->string('agegroup')->after('date_of_birth');
            $table->string('active')->after('agegroup')->default('1');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fighters', function (Blueprint $table) {
            $table->dropColumn('agegroup');
            $table->dropColumn('active');
        });
    }
};
