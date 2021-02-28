@extends('layouts.app')

@section('title')
    History Pembayaran SPP
@endsection

@section('content')
<div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <div class="table-responsive">
                    <table class="table mb-0 table-striped">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th>#</th>
                                <th>IND</th>
                                <th>Nama Lengkap</th>
                                <th>Bulan</th>
                                <th>Tgl. Bayar</th>
                                <th>Jumlah Bayar (Rp)</th>
                                <th>Diterima Oleh</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($spp as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->siswa->ind }}</td>
                                <td>{{ $item->siswa->nama }}</td>
                                <td>{{ $item->spp_bulan }}</td>
                                <td>{{ date('d M Y', strtotime($item->tanggal_bayar)) }}</td>
                                <td>{{ number_format($item->jumlah_bayar, 0, ',', '.' )}}</td>
                                <td>{{ $item->created_by }}</td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="100%" class="text-center">
                                        <strong>Data pembayaran SPP siswa tidak tersedia!</strong>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
