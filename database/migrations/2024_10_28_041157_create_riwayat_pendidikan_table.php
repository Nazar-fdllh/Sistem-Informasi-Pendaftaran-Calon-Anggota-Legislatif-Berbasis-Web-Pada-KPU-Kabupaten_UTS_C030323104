<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatPendidikanTable extends Migration
{
    public function up()
    {
        Schema::create('riwayat_pendidikan', function (Blueprint $table) {
            $table->id('id_pendidikan'); // Primary key
            $table->unsignedBigInteger('id_calon'); // Foreign key dengan tipe yang cocok
            $table->string('jenjang', 50);
            $table->string('institusi', 255);
            $table->date('tahun_masuk');
            $table->date('tahun_lulus')->nullable();
            $table->timestamps();

            // Definisikan foreign key yang sesuai
            $table->foreign('id_calon')
                  ->references('id_calon')
                  ->on('calon_legislatif')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('riwayat_pendidikan');
    }
}
