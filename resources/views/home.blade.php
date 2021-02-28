@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <div class=" text-uppercase text-center">
                    <h3>welcome to paud teratai bukit harapan</h3>
                    <img src="{{ asset('/images/paud1.jpeg') }}" class="img-fluid" alt="logo" style="width:200px; heigth:200px;">
                </div>
                <hr>
                <div class="text-center">
                    <h4>Visi</h4>
                    <p style="padding-left: 100px; padding-right: 100px;">
                        "Mewujudkan anak usia dini yang beriman dan bertaqwa kepada Tuhan Yang Maha Esa, berakhlak mulia, cerdas, jujur, bertanggung jawab dan cinta tanah air"
                    </p>
                </div>
                <div class="text-center">
                    <h4>Misi</h4>
                </div>
                <div class="text-left" style="padding-left: 200px;">
                    a. Menumbuhkan kemampuan anak sesuai dengan aspek-aspek perkembangan. <br>
                    b. Membiasakan anak percaya diri. <br>
                    c. membiasakan anak untuk bersikap sopan santun.
                </div>
            </div>
        </div>
    </div>
    <!--- end row -->
@endsection
