<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk - {{ ucfirst($filter) }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>

    <h2>Daftar Produk - Filter: {{ ucfirst($filter) }}</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $index => $product)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $product->nama_222290 }}</td>
                    <td>{{ Str::words($product->deskripsi_222290, 5, '...') }}</td>
                    <td>{{ $product->category->nama_222290 ?? 'Tidak ada kategori' }}</td>
                    <td>Rp {{ $product->harga_222290 }}</td>
                    <td>{{ $product->jumlah_222290 }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
