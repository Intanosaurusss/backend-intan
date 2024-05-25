<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataServis extends Model
{
    use HasFactory;

    //tambah ini 
    protected $fillable = [
        'nama_barang', 'kode_barang', 'kerusakan', 'deskripsi', 'mulai', 'selesai', 'teknisi', 'biaya'
    ];
}
