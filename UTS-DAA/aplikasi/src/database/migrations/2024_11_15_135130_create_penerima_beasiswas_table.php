<?php

// database/migrations/xxxx_xx_xx_create_penerima_beasiswas_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenerimaBeasiswasTable extends Migration
{
    public function up()
    {
        Schema::create('penerima_beasiswas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pendaftaran')->constrained('pendaftarans')->onDelete('cascade');
            $table->date('tanggal_terima');
            $table->decimal('nominal_diterima', 12, 3);
            $table->string('periode_penerimaan', 20);
            $table->enum('status_pencairan', ['belum', 'sudah']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('penerima_beasiswas');
    }
}
