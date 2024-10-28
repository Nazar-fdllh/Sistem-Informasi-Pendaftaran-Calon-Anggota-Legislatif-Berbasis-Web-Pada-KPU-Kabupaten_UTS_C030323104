<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalonLegislatifTable extends Migration
{
    public function up()
    {
        Schema::create('calon_legislatif', function (Blueprint $table) {
            $table->bigIncrements('id_calon'); // Gunakan bigIncrements untuk id_calon sebagai primary key
            $table->string('nama_lengkap', 255);
            $table->string('tempat_lahir', 255);
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->text('alamat');
            $table->string('no_telepon', 20);
            $table->string('email', 255)->unique();
            $table->foreignId('id_partai')->constrained('partai')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('calon_legislatif');
    }
}
