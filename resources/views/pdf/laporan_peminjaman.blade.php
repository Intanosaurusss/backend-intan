<!DOCTYPE html>
<html>
<head>
    <title>Laporan Peminjaman</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <h1>Laporan Peminjaman</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Nama Barang</th>
                <th>Merek</th>
                <th>Kode</th>
                <th>Status</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
            </tr>
        </thead>
        <tbody>
            @foreach($laporan_peminjaman as $laporan)
                <tr>
                    <td>{{ $laporan->id }}</td>
                    <td>{{ $laporan->nama }}</td>
                    <td>{{ $laporan->kelas }}</td>
                    <td>{{ $laporan->nama_barang }}</td>
                    <td>{{ $laporan->merek }}</td>
                    <td>{{ $laporan->kode }}</td>
                    <td>{{ $laporan->status }}</td>
                    <td>{{ $laporan->tanggal_pinjam }}</td>
                    <td>{{ $laporan->tanggal_kembali }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
