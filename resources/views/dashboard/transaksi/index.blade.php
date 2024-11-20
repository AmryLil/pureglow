@extends('layouts.dashboard-layout')

@section('content')
    <div class="container mx-auto py-6 rounded-md pt-20">
        <div class="flex justify-between items-center mb-2 bg-slate-50 p-2">
            <div
                class="flex bg-slate-900 text-xl text-slate-50 justify-between items-center rounded font-semibold w-full p-4 py-2 rounded-xl">
                <div>Kelola Semua Transaksi Disini</div>

            </div>
        </div>

        <div class="overflow-x-auto bg-slate-50 p-2">
            <table class="table table-zebra">
                <thead class="font-bold text-base">
                    <tr>
                        <th class="">#</th>
                        <th class="">ID Pelanggan</th>
                        <th class="">Jumlah</th>
                        <th class="">Harga Total</th>
                        <th class="">Status</th>
                        <th class="">Tanggal Transaksi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($transaksis as $transaksi)
                        <tr>
                            <td class="">{{ $loop->iteration }}</td>
                            <td class="">{{ $transaksi->pelanggan->name_222290 ?? 'Nama Tidak Ditemukan' }}</td>
                            <td class="">{{ $transaksi->jumlah_222290 }}</td>
                            <td class="">Rp {{ number_format($transaksi->harga_total_222290, 2) }}</td>
                            <td class="">{{ $transaksi->status_222290 }}</td>
                            <td class="">{{ $transaksi->tanggal_transaksi_222290 }}</td>
                            <td>
                                <ul class="menu menu-horizontal bg-base-100 rounded-box p-0">

                                    <li>
                                        <form action="{{ route('transaksi.destroy', $transaksi->id_transaksi_222290) }}"
                                            method="POST"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="tooltip" data-tip="Delete">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14"
                                                    class="w-5 h-5 " id="Recycle-Bin-2--Streamline-Core" height="14"
                                                    width="14">
                                                    <desc>Recycle Bin 2 Streamline Icon: https://streamlinehq.com</desc>
                                                    <g id="recycle-bin-2--remove-delete-empty-bin-trash-garbage">
                                                        <path id="Subtract" fill="#dd1515" fill-rule="evenodd"
                                                            d="M5.76256 2.01256C6.09075 1.68437 6.53587 1.5 7 1.5c0.46413 0 0.90925 0.18437 1.23744 0.51256 0.20736 0.20737 0.35731 0.46141 0.43961 0.73744h-3.3541c0.0823 -0.27603 0.23225 -0.53007 0.43961 -0.73744ZM3.78868 2.75c0.10537 -0.67679 0.42285 -1.30773 0.91322 -1.798097C5.3114 0.34241 6.13805 0 7 0c0.86195 0 1.6886 0.34241 2.2981 0.951903 0.49037 0.490367 0.8079 1.121307 0.9132 1.798097H13c0.4142 0 0.75 0.33579 0.75 0.75 0 0.41422 -0.3358 0.75 -0.75 0.75h-1v8.25c0 0.3978 -0.158 0.7794 -0.4393 1.0607S10.8978 14 10.5 14h-7c-0.39783 0 -0.77936 -0.158 -1.06066 -0.4393C2.15804 13.2794 2 12.8978 2 12.5V4.25H1c-0.414214 0 -0.75 -0.33578 -0.75 -0.75 0 -0.41421 0.335786 -0.75 0.75 -0.75h2.78868ZM5 5.87646c0.34518 0 0.625 0.27983 0.625 0.625V10.503c0 0.3451 -0.27982 0.625 -0.625 0.625s-0.625 -0.2799 -0.625 -0.625V6.50146c0 -0.34517 0.27982 -0.625 0.625 -0.625Zm4.625 0.625c0 -0.34517 -0.27982 -0.625 -0.625 -0.625s-0.625 0.27983 -0.625 0.625V10.503c0 0.3451 0.27982 0.625 0.625 0.625s0.625 -0.2799 0.625 -0.625V6.50146Z"
                                                            clip-rule="evenodd" stroke-width="1"></path>
                                                    </g>
                                                </svg>
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center py-4">Tidak ada data transaksi</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
