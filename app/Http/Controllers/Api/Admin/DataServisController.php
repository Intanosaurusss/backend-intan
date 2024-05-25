<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataServis;
use App\Http\Resources\DataServisResource;

class DataServisController extends Controller
{
    public function index()
    {
        $dataServis = DataServisResource::collection(DataServis::all());
        return response()->json(['data' => $dataServis], 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_barang' => 'required|string',
            'kode_barang' => 'required|integer',
            'kerusakan' => 'required|string',
            'deskripsi' => 'required|string',
            'mulai' => 'nullable|date_format:Y-m-d',
            'selesai' => 'nullable|date_format:Y-m-d',
            'teknisi' => 'nullable|string',
            'biaya' => 'nullable|string',
        ]);

        $dataServis = Dataservis::create($validatedData);
        return response()->json(['message' => 'Data servis berhasil ditambahkan.', 'data' => new DataservisResource($dataServis)], 201);
    }

    public function show(DataServis $dataServis)
    {
        return response()->json(['data' => new DataServisResource($dataServis)], 200);
    }

    public function update(Request $request, $id )
    {
        $validatedData = $request->validate([
            'nama_barang' => 'required|string',
            'kode_barang' => 'required|integer',
            'kerusakan' => 'required|string',
            'deskripsi' => 'required|string',
            'mulai' => 'nullable|date_format:Y-m-d',
            'selesai' => 'nullable|date_format:Y-m-d',
            'teknisi' => 'nullable|string',
            'biaya' => 'nullable|string',
        ]);

        $dataServis = dataServis::findOrFail($id);
        $dataServis->update($validatedData);
        return response()->json(['message' => 'Data servis berhasil diperbarui.', 'data' => new DataServisResource($dataServis)], 200);
    }

    public function destroy(dataServis $dataServis, $id)
    {
        $dataServis = dataServis::findOrFail($id);

        if ($dataServis) {
            $dataServis->forceDelete();
            return response()->json([
                'message' => 'Data servis berhasil dihapus'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Data servis tidak ditemukan'
            ], 404);
        }
    }
}
