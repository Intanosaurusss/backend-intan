<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanPeminjaman extends Model
{
    use HasFactory;

    protected $table = 'laporan_peminjaman';

    protected $fillable = [
        'user_id',
        'nama',
        'kelas',
        'nama_barang',
        'merek',
        'kode',
        'status',
        'tanggal_pinjam',
        'tanggal_kembali',
    ];

    public function user()
    {
    return $this->belongsTo(User::class);
    }

}
