<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerifikasiTable extends Migration
{
    public function up()
    {
        Schema::create('verifikasi', function (Blueprint $table) {
            $table->id('id_verifikasi');
            $table->foreignId('id_calon')->constrained('calon_legislatif', 'id_calon')->onDelete('cascade');
            $table->foreignId('id_petugas')->constrained('petugas', 'id_petugas')->onDelete('cascade');
            $table->dateTime('tanggal_verifikasi');
            $table->text('catatan')->nullable();
            $table->enum('status', ['Diterima', 'Ditolak'])->default('Diterima');
            $table->timestamps();
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('verifikasi');
    }
}
