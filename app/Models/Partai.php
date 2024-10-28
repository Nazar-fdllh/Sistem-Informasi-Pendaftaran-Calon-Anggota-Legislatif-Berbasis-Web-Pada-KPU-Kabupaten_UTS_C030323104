<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partai extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'partai';

    // Kolom yang boleh diisi (mass assignable)
    protected $fillable = [
        'nama_partai',
        'ketua_partai',
        'alamat_partai',
        'nomor_sk',
        'tanggal_terdaftar',
    ];

    /**
     * Format tanggal otomatis menggunakan Carbon.
     */
    protected $dates = [
        'tanggal_terdaftar',
        'created_at',
        'updated_at',
    ];
}
