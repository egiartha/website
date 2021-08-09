@extends('layouts.layout')
@section('content')
<body>

<style>
    .card{
        border: none !important;
    }
    body{
        background-color: #f2f5f4;
    }
 .geser{
        margin-top: 50px !important;
    }
.jumbotron{
  position: relative;
}
</style>
<title>Detail Data Laporan | Aplikasi Pengaduan Masyarakat</title>
 
<!-- Jumbotron -->
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Detail Pengaduan</h1>
    <a href="javascript::void(0)" class="btn btn-primary lapor">Detail data pengaduan Anda</a>
  </div>
</div>
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
           <div class="card">
                <div class="card-body shadow">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" id="pengaduan-tab" data-toggle="tab" href="#pengaduan" role="tab" aria-controls="pengaduan" aria-selected="true">Pengaduan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tanggapan-tab" data-toggle="tab" href="#tanggapan" role="tab" aria-controls="tanggapan" aria-selected="false">Tanggapan</a>
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
                    <td><b>Kategori<span style="margin-left: 45px">:</span></b> <span style="margin-left: 50px">{{$value->tgl_pengaduan}}</span> </td>
                  </tr>
                  
                  <tr class="">
                    <td><b>Status<span style="margin-left: 59px">:</span></b> <span style="margin-left: 50px">@if($value->status =='0') Belum di proses @else {{$value->status}} @endif </span> </td>
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
                <table class="table ">
                    <thead class="">
                    @if($value->tanggapan == '0')
                    
                        <center><b>Tidak ada tanggapan</b></center>
                    @else
                    <tr class="">
                        <td><b>Tanggal<span style="margin-left: 50px">:</span></b> <span style="margin-left: 50px">{{$value->tgl_tanggapan}}</span> </td>
                    </tr>
                    
                    <tr class="">
                        <td><b>Tanggapan<span style="margin-left: 70px">:</span></b> <span style="margin-left: 50px">{{$value->tanggapan}}</span> </td>
                    </tr>
                    @endif
                    </thead>
                </table>
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