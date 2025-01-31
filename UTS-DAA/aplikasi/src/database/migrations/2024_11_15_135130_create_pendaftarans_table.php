<?php

// database/migrations/xxxx_xx_xx_create_pendaftarans_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftaransTable extends Migration
{
    public function up()
    {
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_beasiswa');
            $table->foreignId('nim');
            $table->date('tanggal_daftar');
            $table->decimal('penghasilan_ortu', 12, 3);
            $table->integer('semester_saat_daftar');
            $table->float('ipk_saat_daftar',  3);
            $table->enum('status_verifikasi', ['pending', 'diterima', 'ditolak']);
            $table->enum('status_seleksi', ['belum', 'lulus', 'tidak_lulus']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pendaftarans');
    }
}
