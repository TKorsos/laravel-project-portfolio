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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // A szerző azonosítója, kapcsolt users táblához

            $table->string('title', 255);             // A bejegyzés címe
            $table->string('slug')->unique();          // SEO-barát URL azonosító
            $table->text('excerpt')->nullable();       // Kivonat, rövid összefoglaló
            $table->longText('content');                // A teljes tartalom HTML/kód formában
            $table->string('image_url')->nullable();   // Kiemelt kép elérési útja
            $table->string('image_medium_url')->nullable();
            $table->boolean('is_published')->default(false); // Publikálás státusza
            $table->timestamp('published_at')->nullable();   // Megjelenés dátuma

            $table->timestamps();                       // created_at és updated_at 
            $table->softDeletes();                      // soft delete támogatás (nem valódi törlés)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
