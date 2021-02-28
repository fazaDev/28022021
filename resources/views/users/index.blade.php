@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8">
            {{-- <button
            type="button"
            class="btn btn-primary"
            data-toggle="modal"
            data-target="#modal_create_siswa">
            <i class="mdi mdi-plus-circle-outline"></i>
            Sync Data Siswa
            </button> --}}
            {{-- <a href="{{ route('users.sync') }}" class="btn btn-primary"><i class="mdi mdi-plus-circle-outline"></i> Sync User dari data siswa</a> --}}
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
    <!-- end row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <div class="table-responsive">
                    <table class="table mb-0 table-striped">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $index => $item)
                            <tr>
                                <th scope="row">{{ ($users->currentPage() - 1) * $users->perPage() + $loop->index + 1 }}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->role }}</td>
                                <td class="text-center">
                                    <a href="{{ url('user/ganti-password', $item->id) }}">Reset Password</a>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="100%" class="text-center">
                                        <strong>Data users tidak tersedia!</strong>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mt-2">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--- end row -->
    {{-- <script>
    @if(Session::has('message'))
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
        }

        toastr.success("{{ session('message') }}");
    @endif --}}


    </script>
@endsection

{{-- @push('scripts') --}}
    <script>
    @if(Session::has('message'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.success("{{ session('message') }}");
    @endif


    </script>
{{-- @endpush --}}
