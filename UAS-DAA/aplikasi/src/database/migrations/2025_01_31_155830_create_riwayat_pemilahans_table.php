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
        Schema::create('riwayat_pemilahans', function (Blueprint $table) {
            $table->id();
            $table->foreignId(('user_id'))->constrained('users')->onDelete('cascade');
            $table->foreignId('sampah_id')->constrained('sampahs')->onDelete('cascade');
            $table->date('tanggal_pemilahan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_pemilahans');
    }
};
