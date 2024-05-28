<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller; // Tambahkan ini
use Illuminate\Http\Request;
use App\Models\DataPeminjaman;
use App\Models\LaporanPeminjaman;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class PeminjamanController extends Controller
{
    public function index()
    {
        $data_peminjaman = DataPeminjaman::all();
        return response()->json($data_peminjaman);
    }

    public function store(Request $request, $userId)
    {
        $data_peminjaman = DataPeminjaman::create([
            'user_id' => $userId, // Menggunakan $userId yang diterima dari URI
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'nama_barang' => $request->nama_barang,
            'merek' => $request->merek,
            'kode' => $request->kode,
            'status' => 'Dipinjam',
            'tanggal_pinjam' => now(),
        ]);

        return response()->json($data_peminjaman);
    }

    public function returnItem($id)
    {
        $data_peminjaman = DataPeminjaman::findOrFail($id);

        LaporanPeminjaman::create([
            'user_id' => $data_peminjaman->user_id, // Add this line
            'nama' => $data_peminjaman->nama,
            'kelas' => $data_peminjaman->kelas,
            'nama_barang' => $data_peminjaman->nama_barang,
            'merek' => $data_peminjaman->merek,
            'kode' => $data_peminjaman->kode,
            'status' => 'Dikembalikan',
            'tanggal_pinjam' => $data_peminjaman->tanggal_pinjam,
            'tanggal_kembali' => now(),
        ]);

        $data_peminjaman->delete();

        return response()->json(['message' => 'Barang dikembalikan dan laporan dibuat']);
    }

    public function showAllLaporan()
    {
    $laporan_peminjaman = LaporanPeminjaman::all();
    return response()->json($laporan_peminjaman);
    }

    // New method to show peminjaman by user
    public function showByUser($userId)
    {
    $data_peminjaman = DataPeminjaman::where('user_id', $userId)->get();
    if ($data_peminjaman->isEmpty()) {
        return response()->json(['message' => 'Data peminjaman tidak ditemukan untuk pengguna dengan ID ' . $userId], 404);
    }
    return response()->json($data_peminjaman);
    }

    // New method to show laporan peminjaman by user
    public function showLaporanByUser($userId)
    {
    $laporan_peminjaman = LaporanPeminjaman::where('user_id', $userId)->get();
    return response()->json($laporan_peminjaman);
    }

    //function untuk generate laporan peminjaman to pdf 
    public function exportLaporanToPdf()
    {
    $laporan_peminjaman = LaporanPeminjaman::all(); // Mengambil semua data laporan peminjaman
    $pdf = Pdf::loadView('pdf.laporan_peminjaman', compact('laporan_peminjaman'));
    return $pdf->download('laporan_peminjaman.pdf');
    }

}
