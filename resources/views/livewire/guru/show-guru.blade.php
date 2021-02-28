<div>
    <div class="row">
        <div class="col-md-8">
            <button
            type="button"
            class="btn btn-primary"
            data-toggle="modal"
            data-target="#modal_create_guru">
            <i class="mdi mdi-plus-circle-outline"></i>
            Tambah Guru
            </button>
        </div><!-- end col -->
        <div class="col-md-4">
            <input type="text"  class="form-control mb-2" placeholder="Cari guru ..." wire:model="search" />
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
                                <th>NUPTK</th>
                                <th>Nama Lengkap</th>
                                <th>Tempat/Tgl Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($guru as $index => $item)
                            <tr>
                                <th scope="row">{{ ($guru->currentPage() - 1) * $guru->perPage() + $loop->index + 1 }}</th>
                                <td>{{ $item->nuptk }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->tempat_lahir }}, {{ $item->date_formatted }}</td>
                                <td>{{ $item->jk }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td class="text-center">
                                    <button
                                        wire:click="$emitTo('guru.update-guru', 'updateGuru', {{ $item->id }})"
                                        data-toggle="modal"
                                        data-target="#modal_update_guru"
                                        class="btn btn-xs btn-md btn-info btn-icon waves-effect waves-light"
                                    >
                                    <i class="mdi mdi-pencil"></i>
                                    </button>
                                    <button
                                        wire:click="$emitTo('guru.delete-guru', 'deleteGuru', {{ $item->id }})"
                                        data-toggle="modal"
                                        data-target="#modal_delete_guru"
                                        class="btn btn-xs btn-md btn-danger btn-icon waves-effect waves-light"
                                    >
                                    <i class="mdi mdi-delete-forever"></i>
                                    </button>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="100%" class="text-center">
                                        <strong>Data guru tidak tersedia!</strong>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mt-2">
                        {{ $guru->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
