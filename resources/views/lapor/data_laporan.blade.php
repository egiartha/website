@extends('layouts.layout')
@section('content')
<title>Data Laporan | Layanan Pengaduan Masyarat</title>

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

<!-- Jumbotron -->
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <marquee behavior="scroll" scrollamount="6" onmouseover="this.stop();" onmouseout="this.start();" direction="left">
        <h1 class="display-4">Data Laporan  </h1>
      </marquee>
 
    <a href="javascript::void(0)" class="btn btn-primary lapor">Kumpulan data pengaduan Anda </a>
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
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
            <br>
                <div class="card">
                    <div class="card-body">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="v-pills-all-tab" data-toggle="pill" href="#v-pills-all" role="tab" aria-controls="v-pills-all" aria-selected="true">All</a>
                            <a class="nav-link" id="v-pills-belum-tab" data-toggle="pill" href="#v-pills-belum" role="tab" aria-controls="v-pills-belum" aria-selected="false">Belum</a>
                            <a class="nav-link" id="v-pills-proses-tab" data-toggle="pill" href="#v-pills-proses" role="tab" aria-controls="v-pills-proses" aria-selected="false">Sedang Diproses</a>
                            <a class="nav-link" id="v-pills-diterima-tab" data-toggle="pill" href="#v-pills-diterima" role="tab" aria-controls="v-pills-diterima" aria-selected="false">Diterima</a>
                            <a class="nav-link" id="v-pills-ditolak-tab" data-toggle="pill" href="#v-pills-ditolak" role="tab" aria-controls="v-pills-ditolak" aria-selected="false">Ditolak</a>
                            <a class="nav-link" id="v-pills-ditolak-tab" data-toggle="pill" href="#v-pills-selesai" role="tab" aria-controls="v-pills-ditolak" aria-selected="false">Selesai</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-all" role="tabpanel" aria-labelledby="v-pills-all-tab">
                @foreach($all as $value)
                <br>
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title float-right">
                            
                            <a href="/data_laporan_print/{{$value->kode_pengaduan}}" class="btn-sm btn-shadow btn-warning" data-toggle='tooltip' title="print">
                                <i class="fas fa-print"></i>
                            </a> <br><br>
                            <a href="/data_laporan_lihat/{{$value->kode_pengaduan}}" class="btn-sm btn-shadow btn-info" data-toggle='tooltip' title="lihat">
                                <i class="fas fa-eye"></i>
                            </a> <br><br>
                            <a href="/data_laporan_hapus/{{$value->kode_pengaduan}}" class="button delete-confirm">
                                <i class="fas fa-times-circle text-danger"></i>
                            </a>
                            </h3>
                                <div class="col-md-6" data-aos="fade-left">
                                    <div class="row">
                                        <img src="{{url('/database/foto_pengaduan/'.$value->foto_pengaduan)}}" alt="Image" class="img-fluid" style="height: 100px; width: 150px;">
                                            
                                    <div class="col-md-5">
                                        <div class="row">
                                            <h5 class="mt-2 ml-4">
                                                @if($value->kategori == 'pengajuan')
                                                    Pengaduan
                                                @else
                                                    Aspirasi
                                                @endif
                                            </h5>
                                            <span>
                                            <p class="ml-4">{{$value->kode_pengaduan}} <br>
                                            @if($value->status == '0')
                                                Belum di proses
                                            @elseif($value->status == 'proses')
                                                Sedang di proses
                                            @elseif($value->status == 'diterima')
                                                Diterima
                                            @elseif($value->status == 'ditolak')
                                                Ditolak
                                            @elseif($value->status == 'selesai')
                                                Selesai
                                            @endif
                                            </p>
                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <br>			  				
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <div class="tab-pane fade show" id="v-pills-belum" role="tabpanel" aria-labelledby="v-pills-belum-tab">
                @foreach($belum as $value)
                <br>
                    <div class="card">
                        <div class="card-body">
                        <h3 class="card-title float-right">
                            
                            <a href="/data_laporan_print/{{$value->kode_pengaduan}}" class="btn-sm btn-shadow btn-warning" data-toggle='tooltip' title="print">
                                <i class="fas fa-print"></i>
                            </a> <br><br>
                            <a href="/data_laporan_lihat/{{$value->kode_pengaduan}}" class="btn-sm btn-shadow btn-info" data-toggle='tooltip' title="lihat">
                                <i class="fas fa-eye"></i>
                            </a> <br><br>
                            <a href="/data_laporan_hapus/{{$value->kode_pengaduan}}" class="button delete-confirm">
                                <i class="fas fa-times-circle text-danger"></i>
                            </a>
                        </h3>
                                <div class="col-md-6" data-aos="fade-left">
                                    <div class="row">
                                        <img src="{{url('/database/foto_pengaduan/'.$value->foto_pengaduan)}}" alt="Image" class="img-fluid" style="height: 100px; width: 150px;">
                                            
                                    <div class="col-md-5">
                                        <div class="row">
                                            <h5 class="mt-2 ml-4">
                                                @if($value->kategori == 'pengajuan')
                                                    Pengaduan
                                                @else
                                                    Aspirasi
                                                @endif
                                            </h5>
                                            <span>
                                            <p class="ml-4">{{$value->kode_pengaduan}} <br>
                                            @if($value->status == '0')
                                                Belum di proses
                                            @elseif($value->status == 'proses')
                                                Sedang di proses
                                            @elseif($value->status == 'diterima')
                                                Diterima
                                            @elseif($value->status == 'ditolak')
                                                Ditolak
                                            @elseif($value->status == 'selesai')
                                                Selesai
                                            @endif
                                            </p>
                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <br>			  				
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="tab-pane fade show" id="v-pills-proses" role="tabpanel" aria-labelledby="v-pills-proses-tab">
                @foreach($proses as $value)
                    <br>
                    <div class="card">
                        <div class="card-body">
                        <h3 class="card-title float-right">
                            
                            <a href="/data_laporan_print/{{$value->kode_pengaduan}}" class="btn-sm btn-shadow btn-warning" data-toggle='tooltip' title="print">
                                <i class="fas fa-print"></i>
                            </a> <br><br>
                            <a href="/data_laporan_lihat/{{$value->kode_pengaduan}}" class="btn-sm btn-shadow btn-info" data-toggle='tooltip' title="lihat">
                                <i class="fas fa-eye"></i>
                            </a> <br><br>
                            <a href="/data_laporan_hapus/{{$value->kode_pengaduan}}" class="button delete-confirm">
                                <i class="fas fa-times-circle text-danger"></i>
                            </a>
                        </h3>
                                <div class="col-md-6" data-aos="fade-left">
                                    <div class="row">
                                        <img src="{{url('/database/foto_pengaduan/'.$value->foto_pengaduan)}}" alt="Image" class="img-fluid" style="height: 100px; width: 150px;">
                                            
                                    <div class="col-md-5">
                                        <div class="row">
                                            <h5 class="mt-2 ml-4">
                                                @if($value->kategori == 'pengajuan')
                                                    Pengaduan
                                                @else
                                                    Aspirasi
                                                @endif
                                            </h5>
                                            <span>
                                            <p class="ml-4">{{$value->kode_pengaduan}} <br>
                                            @if($value->status == '0')
                                                Belum di proses
                                            @elseif($value->status == 'proses')
                                                Sedang di proses
                                            @elseif($value->status == 'diterima')
                                                Diterima
                                            @elseif($value->status == 'ditolak')
                                                Ditolak
                                            @elseif($value->status == 'selesai')
                                                Selesai
                                            @endif
                                            </p>
                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <br>			  				
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="tab-pane fade show" id="v-pills-diterima" role="tabpanel" aria-labelledby="v-pills-diterima-tab">
                @foreach($diterima as $value)
                    <br>
                    <div class="card">
                        <div class="card-body">
                        <h3 class="card-title float-right">
                            
                            <a href="/data_laporan_print/{{$value->kode_pengaduan}}" class="btn-sm btn-shadow btn-warning" data-toggle='tooltip' title="print">
                                <i class="fas fa-print"></i>
                            </a> <br><br>
                            <a href="/data_laporan_lihat/{{$value->kode_pengaduan}}" class="btn-sm btn-shadow btn-info" data-toggle='tooltip' title="lihat">
                                <i class="fas fa-eye"></i>
                            </a> <br><br>
                            <a href="/data_laporan_hapus/{{$value->kode_pengaduan}}" class="button delete-confirm">
                                <i class="fas fa-times-circle text-danger"></i>
                            </a>
                        </h3>
                                <div class="col-md-6" data-aos="fade-left">
                                    <div class="row">
                                        <img src="{{url('/database/foto_pengaduan/'.$value->foto_pengaduan)}}" alt="Image" class="img-fluid" style="height: 100px; width: 150px;">
                                            
                                    <div class="col-md-5">
                                        <div class="row">
                                            <h5 class="mt-2 ml-4">
                                                @if($value->kategori == 'pengajuan')
                                                    Pengaduan
                                                @else
                                                    Aspirasi
                                                @endif
                                            </h5>
                                            <span>
                                            <p class="ml-4">{{$value->kode_pengaduan}} <br>
                                            @if($value->status == '0')
                                                Belum di proses
                                            @elseif($value->status == 'proses')
                                                Sedang di proses
                                            @elseif($value->status == 'diterima')
                                                Diterima
                                            @elseif($value->status == 'ditolak')
                                                Ditolak
                                            @elseif($value->status == 'selesai')
                                                Selesai
                                            @endif
                                            </p>
                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <br>			  				
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="tab-pane fade show" id="v-pills-ditolak" role="tabpanel" aria-labelledby="v-pills-ditolak-tab">
                @foreach($ditolak as $value)
                        <br>
                    <div class="card">
                        <div class="card-body">
                        <h3 class="card-title float-right">
                            
                            <a href="/data_laporan_print/{{$value->kode_pengaduan}}" class="btn-sm btn-shadow btn-warning" data-toggle='tooltip' title="print">
                                <i class="fas fa-print"></i>
                            </a> <br><br>
                            <a href="/data_laporan_lihat/{{$value->kode_pengaduan}}" class="btn-sm btn-shadow btn-info" data-toggle='tooltip' title="lihat">
                                <i class="fas fa-eye"></i>
                            </a> <br><br>
                            <a href="/data_laporan_hapus/{{$value->kode_pengaduan}}" class="button delete-confirm">
                                <i class="fas fa-times-circle text-danger"></i>
                            </a>
                        </h3>
                                <div class="col-md-6" data-aos="fade-left">
                                    <div class="row">
                                        <img src="{{url('/database/foto_pengaduan/'.$value->foto_pengaduan)}}" alt="Image" class="img-fluid" style="height: 100px; width: 150px;">
                                            
                                    <div class="col-md-5">
                                        <div class="row">
                                            <h5 class="mt-2 ml-4">
                                                @if($value->kategori == 'pengajuan')
                                                    Pengaduan
                                                @else
                                                    Aspirasi
                                                @endif
                                            </h5>
                                            <span>
                                            <p class="ml-4">{{$value->kode_pengaduan}} <br>
                                            @if($value->status == '0')
                                                Belum di proses
                                            @elseif($value->status == 'proses')
                                                Sedang di proses
                                            @elseif($value->status == 'diterima')
                                                Diterima
                                            @elseif($value->status == 'ditolak')
                                                Ditolak
                                            @elseif($value->status == 'selesai')
                                                Selesai
                                            @endif
                                            </p>
                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <br>			  				
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="tab-pane fade show" id="v-pills-selesai" role="tabpanel" aria-labelledby="v-pills-selesai-tab">
                    @foreach($selesai as $value)
                            <br>
                        <div class="card">
                            <div class="card-body">
                            <h3 class="card-title float-right">
                                
                                <a href="/data_laporan_print/{{$value->kode_pengaduan}}" class="btn-sm btn-shadow btn-warning" data-toggle='tooltip' title="print">
                                    <i class="fas fa-print"></i>
                                </a> <br><br>
                                <a href="/data_laporan_lihat/{{$value->kode_pengaduan}}" class="btn-sm btn-shadow btn-info" data-toggle='tooltip' title="lihat">
                                    <i class="fas fa-eye"></i>
                                </a> <br><br>
                                <a href="/data_laporan_hapus/{{$value->kode_pengaduan}}" class="button delete-confirm">
                                    <i class="fas fa-times-circle text-danger"></i>
                                </a>
                            </h3>
                                    <div class="col-md-6" data-aos="fade-left">
                                        <div class="row">
                                            <img src="{{url('/database/foto_pengaduan/'.$value->foto_pengaduan)}}" alt="Image" class="img-fluid" style="height: 100px; width: 150px;">
                                                
                                        <div class="col-md-5">
                                            <div class="row">
                                                <h5 class="mt-2 ml-4">
                                                    @if($value->kategori == 'pengajuan')
                                                        Pengaduan
                                                    @else
                                                        Aspirasi
                                                    @endif
                                                </h5>
                                                <span>
                                                <p class="ml-4">{{$value->kode_pengaduan}} <br>
                                                @if($value->status == '0')
                                                    Belum di proses
                                                @elseif($value->status == 'proses')
                                                    Sedang di proses
                                                @elseif($value->status == 'diterima')
                                                    Diterima
                                                @elseif($value->status == 'ditolak')
                                                    Ditolak
                                                @elseif($value->status == 'selesai')
                                                    Selesai
                                                @endif
                                                </p>
                                                
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <br>			  				
                            </div>
                        </div>
                        @endforeach
                    </div>

            </div>
            </div>
        </div>
        <br>
        
    </div>
</section>
@push('scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
 
$('.delete-confirm').on('click', function (e) {
    event.preventDefault();
    const url = $(this).attr('href');
    swal({
        title: 'Apakah Anda yakin?',
        text: 'Data akan dihapus secara permanen!',
        icon: 'warning',
        buttons: ["Cancel", "Yes!"],
    }).then(function(value) {
        if (value) {
            window.location.href = url;
        }
    });
});
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
@endpush
@endsection