<!doctype html>
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <title>Bukti pembayaran SPP</title>

    <!-- App css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <style>
      .page-break{
         page-break-after:always;
       }
      .text-center{
         text-align:center;
       }
      .text-header {
         font-size:1.1rem;
      }
      .size2 {
         font-size:1.4rem;
      }
      .border-bottom {
         border-bottom:1px black solid;
      }
      .border {
         border: 2px block solid;
      }
      .border-top {
         border-top:1px black solid;
      }
      .float-right {
         float:right;
      }
      .mt-4 {
         margin-top:4px;
       }
      .mx-1 {
         margin:1rem 0 1rem 0;
      }
      .mr-1 {
         margin-right:1rem;
      }
      .mt-1 {
         margin-top:1rem;
      }
      .ml-2 {
         margin-left:2rem;
      }
      .ml-min-5 {
         margin-left:-5px;
      }
      .text-uppercase {
         font:uppercase;
      }
      .d1 {
         font-size:2rem;
      }
      .img {
         position:absolute;
      }
      .link {
         font-style:underline;
      }
      .text-desc {
         font-size:14px;
      }
      .text-bold {
         font-style:bold;
      }
      .underline {
         text-decoration:underline;
      }

      /* table {
         font-family: Arial, Helvetica, sans-serif;
         color: #666;
         text-shadow: 1px 1px 0px #fff;
         background: #eaebec;
         border: #000 1px solid;
      } */
      /* table th {
           padding: 10px 15px;
           border-left:1px solid #e0e0e0;
           border-bottom: 1px solid #e0e0e0;
           background: #ededed;
       }
       table tr {
           text-align: center;
            padding-left: 20px;
       }
       table td {
             padding: 10px 15px;
             border-top: 1px solid #ffffff;
             border-bottom: 1px solid #e0e0e0;
             border-left: 1px solid #e0e0e0;
             background: #fafafa;
             background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa));
             background: -moz-linear-gradient(top, #fbfbfb, #fafafa);
      } */
      .table-center {
         margin-left:auto;
         margin-right:auto;
      }
      .mb-1 {
         margin-bottom:1rem;
      }
   </style>
</head>
<body onload="window.print()" style="background-color: #fff; color: #000;">


    <div class="container">
   <!-- header -->
   <img src="{{ asset('images/paud2.png') }}" class="img" alt="paud2.png" width="180">
   <div class="text-center">
        <div style="margin-left:6rem;">
            <span class="text-header text-bold">
                PEMERINTAH KABUPATEN BATANG HARI
                <br><span class="size2">DINAS PENDIDIKAN DAN KEBUDAYAAN</span>
                <br>PAUD TERATAI BUKIT HARAPAN
            </span>
            <span class="text-desc">
                <br>Jalan xxxxx Nomor xx Telepon (xxxx) xxxx-xxxx-xxxx
                <br>Desa Bukit Harapan Kec. Mersam Kab. Batang Hari 36654 <br>
            </span>
        </div>
    </div>
   <!-- /header -->

   <hr class="border">

   <!-- content -->

   <div class="size2 text-center mb-1">BUKTI PEMBAYARAN SPP</div>

   {{-- <div class="table-responsive">
        <table class="table mb-0 table-striped">
        </table>
    </div> --}}


        <div class="row">
            <div class="col-md-12">
                <table class="table table-center table-sm">
                    <tr>
                        <td colspan="3"> <strong> Data Siswa</strong></td>
                    </tr>
                    <tr>
                        <td>No. Pembayaran</td><td class="text-right">:</td><td class="text-left">{{ $pembayaran->uuid }}</td>
                    </tr>
                    <tr>
                        <td>Nama Siswa</td><td class="text-right">:</td><td class="text-left">{{ $pembayaran->siswa->nama }}</td>
                    </tr>
                    <tr>
                        <td>Nomor Induk</td><td class="text-right">:</td><td class="text-left">{{ $pembayaran->siswa->ind }}</td>
                    </tr>
                    <tr>
                        <td colspan="3"><strong> Data Pembayaran </strong></td>
                    </tr>
                    <tr>
                        <td>Bulan Bayar</td><td class="text-right">:</td><td class="text-left">{{ $pembayaran->spp_bulan }}</td>
                    </tr>
                    <tr>
                        <td>Jumlah Bayar</td><td class="text-right">:</td><td class="text-left">{{ $pembayaran->jumlah_bayar }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Bayar</td><td class="text-right">:</td><td class="text-left">{{ date('d M Y', strtotime($pembayaran->tanggal_bayar)) }}</td>
                    </tr>
                    <tr>
                        <td>Diterima Oleh</td><td class="text-right">:</td><td class="text-left">{{ $pembayaran->created_by }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <!-- footer -->
        <div>Dicetak Oleh : {{ auth()->user()->name }}</div>
        <div>Waktu : {{ date('d-m-Y H:i:s')  }}</div>
        <!-- /footer -->
    </div>



   <!-- /content -->


</body>
</html>
