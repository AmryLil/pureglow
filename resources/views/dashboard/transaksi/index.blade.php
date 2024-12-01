@extends('layouts.dashboard-layout')

@section('content')
    <div class="container mx-auto py-6 rounded-md pt-20">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6 bg-slate-50 p-4 rounded-lg shadow-sm">
            <h1 class="text-2xl font-bold text-slate-800">Kelola Semua Transaksi</h1>
            {{-- <form action="{{ route('transaksi.exportPdf', ['filter' => $filter]) }}" method="GET" class="inline-block">
                <button type="submit"
                    class="px-6 py-2 bg-green-600 text-white font-semibold rounded-md shadow-md hover:bg-green-700 transition duration-300">
                    Export PDF
                </button>
            </form> --}}
        </div>

        <!-- Filter Form -->
        {{-- <div class="bg-white p-4 rounded-lg shadow-md mb-6">
            <form action="{{ route('transaksi.showAll') }}" method="GET" class="flex gap-4 items-center h-full">
                <!-- Filter Dropdown -->
                <div class="flex-1">

                    <select name="filter" id="filter" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        <option value="semua" {{ is_null($filter) ? 'selected' : '' }}>Semua Transaksi</option>
                        <option value="hari" {{ $filter == 'hari' ? 'selected' : '' }}>Hari Ini</option>
                        <option value="minggu" {{ $filter == 'minggu' ? 'selected' : '' }}>Minggu Ini</option>
                        <option value="bulan" {{ $filter == 'bulan' ? 'selected' : '' }}>Bulan Ini</option>
                    </select>
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit"
                        class="px-6 py-2  bg-blue-600 text-white font-semibold rounded-md shadow-md hover:bg-blue-700 transition duration-300">
                        Terapkan Filter
                    </button>
                </div>
            </form>
        </div> --}}



        <!-- Transaksi Table -->
        <div class="overflow-x-auto bg-slate-50 p-2 rounded-lg shadow-sm">
            <table class="table-auto w-full text-sm text-gray-600">
                <thead class="bg-slate-200 text-gray-800">
                    <tr>
                        <th class="px-4 py-2 text-left">#</th>
                        <th class="px-4 py-2 text-left">Nama Pelanggan</th>
                        <th class="px-4 py-2 text-left">Jumlah</th>
                        <th class="px-4 py-2 text-left">Harga Total</th>
                        <th class="px-4 py-2 text-left">Status</th>
                        <th class="px-4 py-2 text-left">Tanggal Transaksi</th>
                        <th class="px-4 py-2 text-left">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($transaksis as $transaksi)
                        <tr class="border-t border-slate-300">
                            <td class="px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2">{{ $transaksi->pelanggan->name_222290 ?? 'Nama Tidak Ditemukan' }}</td>
                            <td class="px-4 py-2">{{ $transaksi->jumlah_222290 }}</td>
                            <td class="px-4 py-2">Rp {{ number_format($transaksi->harga_total_222290, 2) }}</td>
                            <td class="px-4 py-2">{{ $transaksi->status_222290 }}</td>
                            <td class="px-4 py-2">{{ $transaksi->tanggal_transaksi_222290 }}</td>
                            <td class="px-4 py-2">
                                <form action="{{ route('transaksi.destroy', $transaksi->id_transaksi_222290) }}"
                                    method="POST"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4">Tidak ada data transaksi</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
