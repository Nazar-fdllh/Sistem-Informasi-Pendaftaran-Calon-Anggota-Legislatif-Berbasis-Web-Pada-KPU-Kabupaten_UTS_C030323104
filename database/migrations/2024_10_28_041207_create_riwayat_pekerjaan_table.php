<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatPekerjaanTable extends Migration
{
    public function up()
    {
        Schema::create('riwayat_pekerjaan', function (Blueprint $table) {
            $table->bigIncrements('id_pekerjaan'); // Primary key
            $table->unsignedBigInteger('id_calon'); // Pastikan tipe ini cocok dengan calon_legislatif.id_calon
            $table->string('nama_pekerjaan', 255);
            $table->string('tempat_kerja', 255);
            $table->year('tahun_mulai');
            $table->year('tahun_selesai')->nullable();
            $table->timestamps();

            // Definisikan foreign key dengan nama kolom yang benar
            $table->foreign('id_calon')
                  ->references('id_calon')
                  ->on('calon_legislatif')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('riwayat_pekerjaan');
    }
}
