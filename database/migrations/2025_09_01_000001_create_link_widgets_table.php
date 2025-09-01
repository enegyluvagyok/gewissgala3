<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('link_widgets', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('url');
            $table->text('excerpt')->nullable();         // OG description
            $table->string('image')->nullable();         // tárolt kép: storage/app/public/linkwidgets/...
            $table->unsignedInteger('sort')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamp('fetched_at')->nullable(); // mikor húztuk le a metát
            $table->timestamps();
            $table->index(['is_active','sort']);
        });
    }
    public function down(): void { Schema::dropIfExists('link_widgets'); }
};