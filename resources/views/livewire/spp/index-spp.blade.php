@section('title')
    Pembayaran SPP
@endsection

@section('styles')
    <link href="assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="assets/libs/switchery/switchery.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
<div>
    {{-- <div class="row">
        <div class="col-md-8">
            <button
            type="button"
            class="btn btn-primary"
            data-toggle="modal"
            data-target="#modal_create_siswa">
            <i class="mdi mdi-plus-circle-outline"></i>
            Tambah Siswa
            </button>
        </div><!-- end col --> --}}
        {{-- <div class="col-md-2">
            <select wire:model="status" id="" class="form-control">
                <option value="">-- Status Siswa --</option>
                <option value="aktif">Aktif</option>
                <option value="nonaktif">Tidak Aktif</option>
            </select>
        </div> --}}
        {{-- <div class="col-md-4">
            <input type="text"  class="form-control mb-2" placeholder="Cari siswa ..." wire:model="search" />
        </div> --}}
    {{-- </div> --}}
    <!-- end row -->

    <div class="row">
        <div class="col-lg-9">

            <div class="card-box">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="mt-0 header-title">Data Pembayaran SPP</h4>
                        <hr>
                    </div><!-- end col -->
                    {{-- <div class="col-md-2">
                        <select wire:model="status" id="" class="form-control">
                            <option value="">-- Status Siswa --</option>
                            <option value="aktif">Aktif</option>
                            <option value="nonaktif">Tidak Aktif</option>
                        </select>
                    </div> --}}
                    <div class="col-md-4">
                        <input type="text"  class="form-control mb-2" placeholder="Cari siswa ..." wire:model="search" />
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table mb-0 table-striped">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th>#</th>
                                <th>IND</th>
                                <th>Nama</th>
                                <th>Bulan</th>
                                <th>Tgl. Bayar</th>
                                <th>Jumlah Bayar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pembayaran as $index => $item)
                            <tr>
                                <td>{{ ($pembayaran->currentPage() - 1) * $pembayaran->perPage() + $loop->index + 1 }}</td>
                                <td>{{ $item->ind }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->spp_bulan }}</td>
                                <td>{{ date('d M Y', strtotime($item->tanggal_bayar)) }}</td>
                                <td>{{ number_format($item->jumlah_bayar, 0, ',', '.' )}}</td>
                                <td class="text-center">
                                    <a href="{{ route('cetak', $item->uuid) }}"
                                        class="btn btn-xs btn-md btn-success btn-icon waves-effect waves-light"
                                        target="_blank"
                                    >
                                        <i class="mdi mdi-printer"></i>
                                    </a>
                                    <button
                                        wire:click="$emitTo('siswa.update-siswa', 'updateSiswa', {{ $item->id }})"
                                        data-toggle="modal"
                                        data-target="#modal_update_siswa"
                                        class="btn btn-xs btn-md btn-info btn-icon waves-effect waves-light"
                                    >
                                    <i class="mdi mdi-pencil"></i>
                                    </button>
                                </td>
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
                    <div class="mt-2">
                        {{ $pembayaran->links() }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card-box">
                <h4 class="mt-0 header-title">Form Pembayaran SPP</h4>
                <hr>
                <form wire:submit.prevent="store">

                    <div class="form-group">
                        <label for="">Siswa</label>
                        <select wire:model="siswa_id" class="form-control select2">
                            <option value="">Pilih Siswa</option>
                            @foreach ($siswa as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                        @error($siswa_id) <small class="text-danger">{{$message}}</small>@enderror
                    </div>
                    <div class="form-group">
                        <label for="">Bulan</label>
                        <select wire:model="spp_bulan" id="" class="form-control select2">
                            <option value="">Pilih Bulan</option>
                            <option value="Januari">Januari</option>
                            <option value="Februari">Februari</option>
                            <option value="Maret">Maret</option>
                            <option value="April">April</option>
                            <option value="Mei">Mei</option>
                            <option value="Juni">Juni</option>
                            <option value="Juli">Juli</option>
                            <option value="Agustus">Agustus</option>
                            <option value="September">September</option>
                            <option value="Oktober">Oktober</option>
                            <option value="November">November</option>
                            <option value="Desember">Desember</option>
                        </select>
                        {{-- @error($spp_bulan) <small class="text-danger">{{$message}}</small>@enderror --}}
                        @error($spp_bulan) <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Bayar</label>
                        <input wire:model="tanggal_bayar" data-date-format="DD/MMM/YYYY" type="date" class="form-control">
                        @error($tanggal_bayar) <small class="text-danger">{{$message}}</small>@enderror
                    </div>
                    <div class="form-group">
                        <label for="">Jumlah Bayar</label>
                        <input wire:model="jumlah_bayar" type="text" class="form-control">
                        @error($jumlah_bayar) <small class="text-danger">{{$message}}</small>@enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-primary">Bayar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@section('scripts')
    <script src="assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
    <script src="assets/libs/switchery/switchery.min.js"></script>
    <script src="assets/libs/multiselect/jquery.multi-select.js"></script>
    <script src="assets/libs/jquery-quicksearch/jquery.quicksearch.min.js"></script>
    <script src="{{ asset('assets/libs/select2/select2.min.js') }}"></script>
    {{-- <script src="assets/js/pages/form-advanced.init.js"></script> --}}
@endsection
