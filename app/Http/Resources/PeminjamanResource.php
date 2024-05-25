<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DataPeminjamanResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id, // Add this line
            'nama' => $this->nama,
            'kelas' => $this->kelas,
            'nama_barang' => $this->nama_barang,
            'merek' => $this->merek,
            'kode' => $this->kode,
            'status' => $this->status,
            'tanggal_pinjam' => $this->tanggal_pinjam,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
