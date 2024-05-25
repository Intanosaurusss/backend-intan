<?php

namespace App\Http\Controllers\Api\Admin;

use Illuminate\Http\Request;
use App\Models\DataBarang;
use App\Http\Controllers\Controller;
use App\Http\Resources\DataBarangResource;

class DataBarangController extends Controller
{
    public function index()
    {
        $dataBarang = DataBarangResource::collection(DataBarang::all());
        return response()->json(['data' => $dataBarang], 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_barang' => 'required|string',
            'merek' => 'required|string',
            'jumlah' => 'required|integer',
        ]);

        $dataBarang = DataBarang::create($validatedData);
        return response()->json(['message' => 'Data barang berhasil ditambahkan.', 'data' => new DataBarangResource($dataBarang)], 201);
    }

    public function show(DataBarang $dataBarang)
    {
        return response()->json(['data' => new DataBarangResource($dataBarang)], 200);
    }

    public function update(Request $request, $id )
    {
        $validatedData = $request->validate([
            'nama_barang' => 'required|string',
            'merek' => 'required|string',
            'jumlah' => 'required|integer',
        ]);

        $dataBarang = dataBarang::findOrFail($id);
        $dataBarang->update($validatedData);
        return response()->json(['message' => 'Data barang berhasil diperbarui.', 'data' => new DataBarangResource($dataBarang)], 200);
    }

    public function destroy(dataBarang $dataBarang, $id)
    {
        $dataBarang = dataBarang::findOrFail($id);

        if ($dataBarang) {
            $dataBarang->forceDelete();
            return response()->json([
                'message' => 'Data Barang berhasil dihapus'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Data Absensi tidak ditemukan'
            ], 404);
        }
    }
}
