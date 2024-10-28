<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusPendaftaranTable extends Migration
{
    public function up()
    {
        Schema::create('status_pendaftaran', function (Blueprint $table) {
            $table->id('id_status');
            $table->unsignedBigInteger('id_calon'); // Sesuaikan tipe data agar sesuai dengan bigIncrements di calon_legislatif
            $table->enum('status_pendaftaran', ['Menunggu', 'Diverifikasi', 'Ditolak', 'Disetujui'])->default('Menunggu');
            $table->dateTime('tanggal_status');
            $table->text('catatan')->nullable();
            $table->timestamps();

            // Tambahkan foreign key dengan referensi id_calon di calon_legislatif
            $table->foreign('id_calon')
                  ->references('id_calon')
                  ->on('calon_legislatif')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('status_pendaftaran');
    }
}
