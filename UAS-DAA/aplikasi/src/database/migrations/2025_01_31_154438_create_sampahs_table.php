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
        Schema::create('sampahs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_sampah');
            $table->foreignId('kategori_id')->constrained('kategori_sampahs')->onDelete('cascade');
            $table->text('deskripsi')->nullable();
            $table->enum('status', ['dapat didaur ulang', 'tidak dapat didaur ulang', 'belum diklasifikasikan']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sampahs');
    }
};
