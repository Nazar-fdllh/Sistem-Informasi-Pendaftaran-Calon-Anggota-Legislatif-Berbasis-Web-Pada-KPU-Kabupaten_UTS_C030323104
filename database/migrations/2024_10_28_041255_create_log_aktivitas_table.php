<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogAktivitasTable extends Migration
{
    public function up()
    {
        Schema::create('log_aktivitas', function (Blueprint $table) {
            $table->bigIncrements('id_log'); // Primary key
            $table->unsignedBigInteger('id_petugas'); // Foreign key dengan tipe yang cocok
            $table->text('aktivitas');
            $table->dateTime('tanggal_aktivitas');
            $table->timestamps();

            // Definisikan foreign key dengan referensi yang benar
            $table->foreign('id_petugas')
                  ->references('id_petugas')
                  ->on('petugas')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('log_aktivitas');
    }
}
