@extends('layouts.layout')
@section('content')

<body>

    <style>
        .card {
            border: none !important;
        }

        body {
            background-color: #f2f5f4;
        }

        .geser {
            margin-top: 50px !important;
        }

        .jumbotron {
            position: relative;
        }
    </style>
    <title>Detail Data Laporan | Aplikasi Pengaduan Masyarakat</title>

    <!-- Jumbotron -->
    <!-- <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Detail Pengaduan</h1>
            <a href="javascript::void(0)" class="btn btn-primary lapor">Detail data pengaduan Anda</a>
        </div>
    </div> -->
    <!-- akhir Jumbotron -->
    <!-- ======= Mobile Menu ======= -->
    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icofont-close js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>


    <main id="main">
        <section class="section geser">
            <div class="container">
                <div class="row\">
                    <div class="card mb-5">
                        <div class="card-body shadow">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link" id="pengaduan-tab" data-toggle="tab" href="#pengaduan" role="tab" aria-controls="pengaduan" aria-selected="true">Pengaduan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tanggapan-tab" data-toggle="tab" href="#tanggapan" role="tab" aria-controls="tanggapan" aria-selected="false">Tanggapan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="komentar-tab" data-toggle="tab" href="#komentar" role="tab" aria-controls="tanggapan" aria-selected="false">Komentar</a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane active" id="pengaduan" role="tabpanel" aria-labelledby="pengaduan-tab">
                                    <div class="card-body">
                                        <br>
                                        @foreach($data as $value)
                                        <table class="table ">
                                            <thead class="">
                                                <tr class="">
                                                    <td><b>Tanggal<span style="margin-left: 50px">:</span></b> <span style="margin-left: 50px">{{$value->tgl_pengaduan}}</span> </td>
                                                </tr>

                                                <tr class="">
                                                    <td><b>Kode<span style="margin-left: 70px">:</span></b> <span style="margin-left: 50px">{{$value->kode_pengaduan}}</span> </td>
                                                </tr>

                                                <tr class="">
                                                    <td><b>Kategori<span style="margin-left: 45px">:</span></b> <span style="margin-left: 50px">{{$value->kategori}}</span> </td>
                                                </tr>

                                                <tr class="">
                                                    <td><b>Status<span style="margin-left: 59px">:</span></b> <span style="margin-left: 50px">@if($value->status =='0') Belum di proses @else {{$value->status}} @endif </span> </td>
                                                </tr>
                                                <tr class="">
                                                    <td><b>Laporan<span style="margin-left: 45px">:</span></b> <span style="margin-left: 50px">{{$value->isi_laporan}}</span> </td>
                                                </tr>
                                                <tr class="">
                                                    <td><b>Laporan<span style="margin-left: 45px">:</span></b> <span style="margin-left: 50px">{{$value->alamat}}, {{$value->desa}}, Kec. {{$value->kecamatan}}</span> </td>
                                                    <td><a target="_blank" href="http://maps.google.com/maps?q={{$value->latitude}},{{$value->longitude}}">Lihat di Google Maps</a></td>
                                                </tr>

                                                

                                                <tr class="">
                                                    <td><b>Foto<span style="margin-left: 73px">:</span></b> <span style="margin-left: 50px">
                                                            <img src="{{url('/database/foto_pengaduan/'.$value->foto_pengaduan)}}" alt="Image" class="img-fluid" style="height: 100px; width: 150px;">
                                                        </span> </td>
                                                </tr>
                                            </thead>
                                        </table>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane" id="tanggapan" role="tabpanel" aria-labelledby="tanggapan-tab">
                                    <div class="card-body">
                                        @foreach($data as $value)
                                        <table class="table">
                                            <tbody>
                                                @if($value->tanggapan == '0')

                                                <center><b>Tidak ada tanggapan</b></center>
                                                @else
                                                <tr class="">
                                                    <td><b>Tanggal</b></td>
                                                    <td><b>:</b></td>
                                                    <td>{{$value->tgl_tanggapan}}</td>
                                                </tr>
                                                <tr class="">
                                                    <td><b>Tanggapan</b></td>
                                                    <td><b>:</b></td>
                                                    <td>{{$value->tanggapan}}</td>
                                                </tr>
                                                <tr class="">
                                                    <td><b>Petugas</b></td>
                                                    <td><b>:</b></td>
                                                    <td>{{$petugas->nama}}</td>
                                                </tr>
                                                <tr class="">
                                                    <td><b>Foto Perbaikan</b></td>
                                                    <td><b>:</b></td>
                                                    <td><img style="width:500px;" src="{{ asset('database/foto_selesai').'/'. $value->foto_selesai}}" alt="foto selesai"> </td>
                                                </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane" id="komentar" role="tabpanel" aria-labelledby="tanggapan-tab">
                                    <p class="text-center mt-4"><b>Komentar Masyarakat</b></p>
                                    <div class="card-body">
                                        @foreach($komentar as $value)
                                        <div style="border: 1px solid #DEE2E6; padding:15px;margin:5px">
                                            <p><b>{{$value->users->nama}}</b>, {{date_format($value->created_at,'d/m/Y')}}</p>
                                            <span>{{$value->komentar}}</span>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
        </section>
        <div class="container">


        </div>


</body>

</html>
@endsection
