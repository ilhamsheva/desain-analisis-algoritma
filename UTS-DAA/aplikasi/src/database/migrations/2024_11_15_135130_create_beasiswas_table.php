<?php

// database/migrations/xxxx_xx_xx_create_beasiswas_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeasiswasTable extends Migration
{
    public function up()
    {
        Schema::create('beasiswas', function (Blueprint $table) {
            $table->id();
            $table->integer('kuota');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->text('syarat');
            $table->string('nama_beasiswa', 100);
            $table->string('jenis_beasiswa', 50);
            $table->string('periode', 20);
            $table->enum('status', ['aktif', 'nonaktif']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('beasiswas');
    }
}
