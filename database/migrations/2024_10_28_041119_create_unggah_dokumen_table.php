<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnggahDokumenTable extends Migration
{
    public function up()
    {
        Schema::create('unggah_dokumen', function (Blueprint $table) {
            $table->id('id_unggah');
            $table->foreignId('id_calon')->constrained('calon_legislatif', 'id_calon')->onDelete('cascade');
            $table->foreignId('id_dokumen')->constrained('dokumen_persyaratan', 'id_dokumen')->onDelete('cascade');
            $table->string('nama_file');
            $table->dateTime('tanggal_unggah');
            $table->enum('status_verifikasi', ['Pending', 'Diterima', 'Ditolak'])->default('Pending');
            $table->timestamps();
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('unggah_dokumen');
    }
}
