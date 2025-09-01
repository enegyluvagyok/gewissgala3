<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('schedule_items', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('day')->comment('1=Hétfő ... 5=Péntek'); // 1..5
            $table->time('start_time');
            $table->time('end_time');
            $table->string('title');       // pl. BOX, KEZDŐ MUAY THAI
            $table->string('subtitle')->nullable(); // pl. (KEZDŐ ÉS HALADÓ)
            $table->unsignedSmallInteger('sort')->default(0);
            $table->timestamps();
            $table->index(['day', 'start_time']);
        });
    }
    public function down(): void {
        Schema::dropIfExists('schedule_items');
    }
};

?>