@extends('layouts.layout')
@section('content')
<title>Profil | Layanan Pengaduan Masyarat</title>

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
#upload{
    display:none
}

#hapus{
    display:none
}
</style>

<!-- Jumbotron -->
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <marquee behavior="scroll" scrollamount="6" onmouseover="this.stop();" onmouseout="this.start();" direction="left">
        <h1 class="display-4">Biodata Mu  </h1>
        </marquee>  
   
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
                    <div class="card-header">Foto Profil</div>
                    <div class="card-body">
                        @if(Auth::user()->foto_profil == '0')
                            <img src="{{url('assets/img/avatar.png')}}" alt="AdminLTE Logo" class="profile-user-img img-fluid img-circle">
                        @else
                            <img src="{{url('/database/foto_profil/'. Auth::user()->foto_profil)}}" alt="" class="profile-user-img img-fluid img-circle">
                        @endif
                        <div class="container-fluid mt-4">
                            <div class="row">
                                <p><form action="/profil_foto_ubah" method="post" enctype="multipart/form-data" class="ml-5">
                                @csrf
                                <input type="hidden" name="id" value="{{Auth::user()->id}}">
                                <input id="upload" type="file" onchange="this.form.submit()" name="foto"/>
                                <a href="" id="upload_link" class="btn btn-primary bg-gradient-primary opacity-8 text-white btn-sm">Ubah</a>​
                            </form>
                                <a href="/profil_foto_hapus/{{Auth::user()->id}}" class="btn btn-danger btn-sm ml-5 delete-confirm ">Hapus</a>​</p>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-4">
                <div class="card">
                    <div class="card-header">Identitas</div>
                    <div class="card-body">
                        <form action="/profil_ubah_data" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{Auth::user()->id}}">
                            <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nik">NIK : @error('nik') <span class="text-danger">{{$message}} </span> @enderror </label>
                                    <input type="number" name="nik" value="{{Auth::user()->nik}}" onKeyPress="if(this.value.length == 16) return false;" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama">Nama : @error('nama') <span class="text-danger">{{$message}} </span> @enderror </label>
                                    <input type="text" name="nama" value="{{Auth::user()->nama}}" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="telp">Telp : @error('telp') <span class="text-danger">{{$message}} </span> @enderror </label>
                                    <input type="number" name="telp" value="{{Auth::user()->telp}}" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email : @error('email') <span class="text-danger">{{$message}} </span> @enderror </label>
                                    <input type="email" name="email" value="{{Auth::user()->email}}" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="alamat">Alamat: @error('alamat') <span class="text-danger">{{$message}} </span> @enderror </label>
                                    <input type="text" name="alamat" value="{{Auth::user()->alamat}}" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="username">Username : @error('username') <span class="text-danger">{{$message}} </span> @enderror </label>
                                    <input type="text" name="username" value="{{Auth::user()->username}}" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6 mt-2"><br>
                            <button class="btn btn-primary btn-sm btn-block">Ubah</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-4">
                <div class="card">
                    <div class="card-header">Ganti Password</div>
                    <div class="card-body">
                        <form action="/ubah_password" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{Auth::user()->id}}">
                            <div class="form-group">
                                <label for="password_lama">Password Lama  @error('password_lama') <span class="text-danger">{{$message}} </span> @enderror </label>
                                <input type="password" name="password_lama" id="password_lama" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="password">Password Lama @error('password') <span class="text-danger">{{$message}} </span> @enderror </label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="password_confirmation">Konfirmasi Password </label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                            </div>
                        <button class="btn btn-primary btn-sm btn-block">Ubah</button>
                        </form>
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
$(function(){
    $("#upload_link").on('click', function(e){
        e.preventDefault();
        $("#upload:hidden").trigger('click');
    });
});

$(function(){
    $("#hapus_link").on('click', function(e){
        e.preventDefault();
        $("#hapus:hidden").trigger('click');
    });
});
</script>
@endpush
@endsection