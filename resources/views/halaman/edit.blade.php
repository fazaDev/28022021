@extends('layouts.app')

@section('title')
    Data Halaman
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="m-t-0 header-title">Form Edit Halaman</h4>
            <div class="row">
                <div class="col-12">
                    <div class="p-2">
                        <form class="form-horizontal" role="form" action="{{ route('halaman.update', $halaman->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                            <div class="form-group row">
                                <label class="col-sm-2  col-form-label" for="simpleinput">Judul</label>
                                <div class="col-sm-10">
                                    <input type="text" id="simpleinput" name="judul" class="form-control @error('judul') parsley-error @enderror" placeholder="Judul..." value="{{ $halaman->judul }}">
                                    @error('judul')
                                    <ul class="parsley-errors-list filled" id="parsley-id-5"><li class="parsley-required">{{ $message }}</li></ul>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2  col-form-label" for="example-textarea">Deskripsi</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control @error('deskripsi') parsley-error @enderror"" name="deskripsi" rows="10" id="example-textarea">
                                    {{ $halaman->deskripsi }}
                                    </textarea>
                                    @error('deskripsi')
                                    <ul class="parsley-errors-list filled" id="parsley-id-5"><li class="parsley-required">{{ $message }}</li></ul>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2  col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <select name="status" class="form-control">
                                        <option value="0">Draft</option>
                                        <option value="1">Publish</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2  col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <!-- end row -->

        </div> <!-- end card-box -->
    </div><!-- end col -->
</div>
<!-- end row -->
@endsection
