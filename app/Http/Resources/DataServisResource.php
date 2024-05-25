<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DataServisResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);

        return [
            'id' => $this->id,
            'nama_barang' => $this->nama_barang,
            'kode_barang' => $this->kode_barang,
            'kerusakan' => $this->kerusakan,
            'deskripsi' => $this->deskripsi,
            'mulai' => $this->mulai,
            'selesai' => $this->selesai,
            'teknisi' => $this->teknisi,
            'biaya' => $this->biaya,
        ];
    }
}
