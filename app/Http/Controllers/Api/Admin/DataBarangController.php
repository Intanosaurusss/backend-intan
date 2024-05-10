<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataBarang;

class DataBarangController extends Controller
{
    public function index()
    {
        $dataBarang = DataBarang::all();
        return view('databarang.index', compact('dataBarang'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_barang' => 'required|string',
            'merek' => 'required|string',
            'jumlah' => 'required|integer',
        ]);

        DataBarang::create($validatedData);
        return redirect()->route('databarang.index')->with('success', 'Data barang berhasil ditambahkan.');
    }

    public function show(DataBarang $dataBarang)
    {
        return view('databarang.show', compact('dataBarang'));
    }

    public function update(Request $request, DataBarang $dataBarang)
    {
        $validatedData = $request->validate([
            'nama_barang' => 'required|string',
            'merek' => 'required|string',
            'jumlah' => 'required|integer',
        ]);

        $dataBarang->update($validatedData);
        return redirect()->route('data-barang.index')->with('success', 'Data barang berhasil diperbarui.');
    }

    public function destroy(DataBarang $dataBarang)
    {
        $dataBarang->delete();
        return redirect()->route('data-barang.index')->with('success', 'Data barang berhasil dihapus.');
    }
}

