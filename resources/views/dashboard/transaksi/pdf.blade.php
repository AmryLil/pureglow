<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th,
        table td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        table th {
            background-color: #f0f0f0;
        }

        h1 {
            text-align: center;
        }

        .filter-info {
            text-align: center;
            margin-bottom: 20px;
        }

        .filter-info span {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h1>Daftar Transaksi - {{ ucfirst($filter) }}</h1>

    <div class="filter-info">
        <p>Filter: <span>{{ ucfirst($filter) }}</span></p>
    </div>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>ID Pelanggan</th>
                <th>Jumlah</th>
                <th>Harga Total</th>
                <th>Status</th>
                <th>Tanggal Transaksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksis as $transaksi)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $transaksi->pelanggan->name_222290 ?? 'Nama Tidak Ditemukan' }}</td>
                    <td>{{ $transaksi->jumlah_222290 }}</td>
                    <td>Rp {{ number_format($transaksi->harga_total_222290, 2, ',', '.') }}</td>
                    <td>{{ $transaksi->status_222290 }}</td>
                    <td>{{ \Carbon\Carbon::parse($transaksi->tanggal_transaksi_222290)->format('d-m-Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
