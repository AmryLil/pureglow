<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 10px;
        }

        .periode {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
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

        .total {
            font-weight: bold;
            text-align: right;
            padding-right: 8px;
        }

        .total-amount {
            font-weight: bold;
            text-align: right;
        }
    </style>
</head>

<body>
    <h1>Laporan Penjualan</h1>

    <div class="periode">
        <p>Periode: {{ request('start_date') }} s/d {{ request('end_date') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pelanggan</th>
                <th>Tanggal</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksis as $transaksi)
                <tr>
                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2">{{ $transaksi->pelanggan->name_222290 ?? 'Nama Tidak Ditemukan' }}
                    <td>{{ $transaksi->tanggal_transaksi_222290 }}</td>
                    <td class="px-4 py-2">
                        @foreach ($transaksi->products as $product)
                            <div>{{ $product->nama_222290 }}</div>
                        @endforeach
                    </td>
                    <td>{{ $transaksi->jumlah_222290 }}</td>
                    <td class="px-4 py-2">Rp
                        {{ number_format($transaksi->harga_total_222290 / $transaksi->jumlah_222290, 2) }}</td>
                    <td>Rp {{ number_format($transaksi->harga_total_222290, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6" class="total">Total Pendapatan</td>
                <td class="total-amount">Rp {{ number_format($totalTransaksi, 0, ',', '.') }}</td>
            </tr>
        </tfoot>
    </table>
</body>

</html>
