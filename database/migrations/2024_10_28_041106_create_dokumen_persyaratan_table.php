<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokumenPersyaratanTable extends Migration
{
    public function up()
    {
        Schema::create('dokumen_persyaratan', function (Blueprint $table) {
            $table->id('id_dokumen');
            $table->string('nama_dokumen', 255);
            $table->text('deskripsi')->nullable();
            $table->boolean('wajib')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dokumen_persyaratan');
    }
}
