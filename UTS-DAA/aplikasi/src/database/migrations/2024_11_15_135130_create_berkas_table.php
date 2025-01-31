<?php

// database/migrations/xxxx_xx_xx_create_berkas_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBerkasTable extends Migration
{
    public function up()
    {
        Schema::create('berkas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pendaftaran');
            $table->dateTime('tanggal_upload');
            $table->string('jenis_berkas', 50);
            $table->string('nama_file', 255);
            $table->enum('status_verifikasi', ['pending', 'valid', 'invalid']);
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('berkas');
    }
}
