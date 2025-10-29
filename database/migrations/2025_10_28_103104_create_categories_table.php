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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');          // pl. 'arculat', 'kiadványok' stb.
            $table->string('slug')->unique(); // SEO-barát egyedi slug
            $table->string('subtitle');
            $table->text('description')->nullable();
            $table->string('image_path')->nullable();
            $table->boolean('status')->default(1); // aktív/inaktív státusz kezelése
            $table->integer('order_priority')->nullable(); // sorrendezés megadása a megjelenítéshez
            $table->tinyInteger('featured')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
