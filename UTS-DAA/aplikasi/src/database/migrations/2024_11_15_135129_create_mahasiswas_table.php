<?php

// database/migrations/xxxx_xx_xx_create_mahasiswas_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswasTable extends Migration
{
    public function up()
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->integer('semester');
            $table->float('ipk',  3);
            $table->text('alamat');
            $table->string('nim', 20)->unique();
            $table->string('nama', 100);
            $table->string('prodi', 50);
            $table->string('no_telp', 15);
            $table->string('email', 100);
            $table->string('angkatan', 4);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mahasiswas');
    }
}
