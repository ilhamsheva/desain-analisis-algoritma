<?php

// database/migrations/xxxx_xx_xx_create_pengumumans_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengumumansTable extends Migration
{
    public function up()
    {
        Schema::create('pengumumans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_beasiswa')->constrained('beasiswas')->onDelete('cascade');
            $table->text('isi');
            $table->string('judul', 200);
            $table->dateTime('tanggal_post');
            $table->enum('status', ['draft', 'published']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengumumans');
    }
}
