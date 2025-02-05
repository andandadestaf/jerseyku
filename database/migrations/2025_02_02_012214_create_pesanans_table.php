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
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->string('matauang')->nullable();
            $table->string('metode_pembayaran')->nullable();
            $table->string('status_pembayaran')->nullable();
            $table->enum('status',['new', 'proses', 'dikirim', 'diterima', 'cancel'])->default('new');
            $table->decimal('total_harga',10,2)->nullable();
            $table->decimal('biaya_pengiriman',10, 2)->nullable();
            $table->string('metode_pengiriman')->nullable();
            $table->foreignId('user_id')->constrained('users')->CascadeOnDelete();
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
