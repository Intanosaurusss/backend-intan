<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBarang extends Model
{
    use HasFactory;

    //tambah ini 
    protected $fillable = [
        'nama_barang', 'merek', 'jumlah'
    ];
}
