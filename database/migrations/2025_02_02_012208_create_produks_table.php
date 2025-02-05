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
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->decimal('harga',10,2);
            $table->foreignId('liga_id')->constrained('ligas')->cascadeOnDelete();
            $table->boolean('is_ready')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->boolean('on_sale')->default(false);
            $table->json('gambar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
