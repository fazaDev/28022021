@extends('layouts.app')

@section('title')
    Data Halaman
@endsection

@section('content')
<div class="row">
    <div class="col-md-8">
        <a
        href="{{ route('halaman.create') }}"
        class="btn btn-primary">
        <i class="mdi mdi-plus-circle-outline"></i>
        Tambah Halaman
        </a>
    </div><!-- end col -->
    {{-- <div class="col-md-2">
        <select wire:model="status" id="" class="form-control">
            <option value="">-- Status Siswa --</option>
            <option value="aktif">Aktif</option>
            <option value="nonaktif">Tidak Aktif</option>
        </select>
    </div> --}}
    <div class="col-md-4">
        <input type="text"  class="form-control mb-2" placeholder="Cari halaman ..." wire:model="search" />
    </div>
</div>
<!-- end row -->

<div class="row">
    <div class="col-lg-12">
        <div class="card-box">

            <div class="table-responsive">
                <table class="table mb-0 table-striped">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th>#</th>
                            <th>Judul</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($halaman as $index => $item)
                        <tr>
                            <th scope="row">{{ ($halaman->currentPage() - 1) * $halaman->perPage() + $loop->index + 1 }}</th>
                            <td>{{ $item->judul }}</td>
                            <td>
                                @if($item->status == 1)
                                    Published
                                @else
                                    Draft
                                @endif
                            </td>
                            <td>{{ $item->date_formatted }}</td>
                            <td class="text-center">
                                <a href="{{ route('halaman.edit', $item->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                {{-- <a href="{{ route('halaman.destroy', $item->id) }}" class="btn btn-sm btn-danger">Hapus</a> --}}
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="100%" class="text-center">
                                    <strong>Data halaman tidak tersedia!</strong>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="mt-2">
                    {{ $halaman->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
