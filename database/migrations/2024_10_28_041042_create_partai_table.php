<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartaiTable extends Migration
{
    public function up()
    {
        Schema::create('partai', function (Blueprint $table) {
            $table->id(); // Menggunakan nama default 'id'
            $table->string('nama_partai');
            $table->string('ketua_partai');
            $table->text('alamat_partai');
            $table->string('nomor_sk', 50);
            $table->timestamps();
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('partai');
    }
}
