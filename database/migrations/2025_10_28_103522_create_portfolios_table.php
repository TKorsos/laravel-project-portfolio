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
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->string('title');
            $table->string('slug')->unique();  // például 'arculat-minta'
            $table->string('subtitle')->nullable(); // ahol szükséges oda elhelyezhető bladbe
            $table->text('description')->nullable();
            $table->string('image_path');
            $table->string('link')->nullable();    // opcionális külső vagy belső link
            $table->boolean('status')->default(1); // aktív/inaktív státusz kezelése
            $table->string('tags'); // vagy címkék – ha további rugalmas kategorizálást szeretnél (ez egy külön tábla lehet, relációval) vagy pivot tábla many to many kapcsolat
            $table->integer('order_priority')->nullable(); // sorrendezés megadása a megjelenítéshez
            $table->integer('views_count')->default(0); // statisztikai mező, ha szeretnél alap statisztikát az elemek nézettségéről
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolios');
    }
};
