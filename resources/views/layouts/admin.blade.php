<!doctype html>
<html lang="en">
<style>
    .metismenu-icon {
        color: black !important;
    }

    #upload {
        display: none
    }
</style>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <!--
    =========================================================
    * ArchitectUI HTML Theme Dashboard - v1.0.0
    =========================================================
    * Product Page: https://dashboardpack.com
    * Copyright 2019 DashboardPack (https://dashboardpack.com)
    * Licensed under MIT (https://github.com/DashboardPack/architectui-html-theme-free/blob/master/LICENSE)
    =========================================================
    * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
    -->
</head>
<link href="{{url('assets/arsitek/main.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{url('assets/arsitek/Pe-icon-7-stroke.css')}}">
<link href="/{{url('assets/fontawesome/css/all.css')}}" rel="stylesheet">
<!--load all styles -->
<link href="{{url('assets/fontawesome/css/fontawesome.css')}}" rel="stylesheet">
<link href="{{url('assets/fontawesome/css/brands.css')}}" rel="stylesheet">
<link href="{{url('assets/fontawesome/css/solid.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow">
            <div class="app-header__logo">
                <div class="logo-src">
                    @if($settings =='')
                    <h5> Aspirasi Ku </h5>
                    @else
                    <h5> {{$settings->nama_aplikasi}} </h5>
                    @endif
                </div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>
            <div class="app-header__content">
                <div class="app-header-right">
                    <div class="dropdown dropleft">
                        <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown" class="btn btn-lg">
                            <i class="fa fa-bell" style="font-size: 18px;" id="notifikasi_icon"></i>
                        </button>
                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu">
                            <h6 class="dropdown-header" id="notifikasi_header">Daftar Notifikasi</h6>
                        </div>
                    </div>
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                            @if(Auth::user()->foto_profil == '0')
                                            <img width="42" class="rounded-circle" src="{{url('/assets/img/avatar.png')}}" alt="">
                                            @else
                                            <img width="42" class="rounded-circle" src="{{url('database/foto_profil/'. Auth::user()->foto_profil)}}" alt="">
                                            @endif
                                            <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                            <button type="button" tabindex="0" class="dropdown-item" data-toggle="modal" data-target="#modalAkunUsers"><i class="fas fa-users"></i> &nbsp; Foto Profil</button>
                                            <button type="button" tabindex="0" class="dropdown-item" data-toggle="modal" data-target="#modalIdentitas"><i class="fas fa-address-card"></i> &nbsp; Identitas</button>
                                            <button type="button" tabindex="0" class="dropdown-item" data-toggle="modal" data-target="#modalGantiPassword"><i class="fas fa-unlock-alt"></i> &nbsp; Ganti Password</button>

                                            @if(Auth::user()->level == 'petugas')
                                            @else
                                            <button data-toggle="modal" data-target="#modalSettings" type="button" tabindex="0" class="dropdown-item"><i class="fas fa-cogs"></i> &nbsp; Pengaturan</button>
                                            @endif
                                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                <i class="fas fa-sign-out-alt"></i> &nbsp;{{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content-left  ml-3 header-user-info">
                                    <div class="widget-heading">
                                        {{Auth::user()->nama}}
                                    </div>
                                    <div class="widget-subheading">
                                        Division
                                        @if(Auth::user()->level == 'admin')
                                        Admin
                                        @else
                                        Petugas
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="app-main">
            <div class="app-sidebar sidebar-shadow">
                <div class="app-header__logo">
                    <div class="logo-src"></div>
                    <div class="header__pane ml-auto">
                        <div>
                            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="app-header__mobile-menu">
                    <div>
                        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="app-header__menu">
                    <span>
                        <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                            <span class="btn-icon-wrapper">
                                <i class="fa fa-ellipsis-v fa-w-6"></i>
                            </span>
                        </button>
                    </span>
                </div>
                <div class="scrollbar-sidebar">
                    <div class="app-sidebar__inner">
                        <ul class="vertical-nav-menu">
                            <li class="app-sidebar__heading">Dashboards</li>
                            <li>
                                @if(Auth::user()->level == 'admin')
                                <a href="/admin" class="mm-active">
                                    <i class="metismenu-icon fas fa-server"></i>
                                    Dashboard
                                </a>
                                @elseif(Auth::user()->level == 'petugas')
                                <a href="/dashboard_petugas" class="mm-active">
                                    <i class="metismenu-icon fas fa-server"></i>
                                    Dashboard
                                </a>
                                @else
                                <a href="/masyarakat" class="mm-active">
                                    <i class="metismenu-icon fas fa-server"></i>
                                    Dashboard
                                </a>
                                @endif
                            </li>
                            <li class="app-sidebar__heading">Others</li>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="metismenu-icon fas fa-database"></i>
                                    Pengaduan
                                    <i class="metismenu-state-icon fas fa-angle-down caret-left"></i>
                                </a>
                                <ul>
                                    <li>
                                        <a href="/pengajuan">
                                            <i class="metismenu-icon"></i>
                                            Pengaduan
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/aspirasi">
                                            <i class="metismenu-icon"></i>
                                            Aspirasi
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            @if(Auth::user()->level == 'petugas')
                            @else
                            <li>
                                <a href="/petugas">
                                    <i class="metismenu-icon fas fa-users"></i>
                                    Petugas
                                </a>
                            </li>
                            @endif

                            @if(Auth::user()->level == 'petugas')
                            @else
                            <li>
                                <a href="/masyarakat">
                                    <i class="metismenu-icon fas fa-globe-asia"></i>
                                    Masyarakat
                                </a>
                            </li>
                            @endif
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="metismenu-icon fas fa-database"></i>
                                    Laporan
                                    <i class="metismenu-state-icon fas fa-angle-down caret-left"></i>
                                </a>
                                <ul>
                                    <li>
                                        <a href="/laporan_pengajuan">
                                            <i class="metismenu-icon"></i>
                                            Pengaduan
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/laporan_aspirasi">
                                            <i class="metismenu-icon"></i>
                                            Aspirasi
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            @if(Auth::user()->level == 'petugas')
                            @else
                            <li class="app-sidebar__heading">App</li>
                            <li>
                                <a href="/settings" data-toggle="modal" data-target="#modalSettings">
                                    <i class="metismenu-icon fas fa-cogs"></i>
                                    Pengaturan
                                </a>
                            </li>
                            @endif

                        </ul>
                    </div>
                </div>
            </div>
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="fas fa-database icon-gradient bg-mean-fruit"></i>
                                </div>
                                <div>
                                    @if(Auth::user()->level == 'admin')
                                    <a href="/admin" class="text-secondary">Dashboard</a>
                                    @else
                                    <a href="/dashboard_petugas" class="text-secondary">Dashboard</a>
                                    @endif
                                    <div class="page-title-subheading"></div>
                                </div>
                            </div>
                            <div class="page-title-actions">
                                <?php
                                $tanggal = date('d-m-Y');
                                $day = date('D', strtotime($tanggal));
                                $dayList = array(
                                    'Sun' => 'Minggu',
                                    'Mon' => 'Senin',
                                    'Tue' => 'Selasa',
                                    'Wed' => 'Rabu',
                                    'Thu' => 'Kamis',
                                    'Fri' => 'Jumat',
                                    'Sat' => 'Sabtu'
                                );
                                ?>

                                <button type='button' data-toggle='tooltip' title='<?php echo  $dayList[$day] . ', ' . $tanggal ?>' data-placement='bottom' class='btn-shadow mr-3 btn btn-dark'>
                                    <i class="fas fa-calendar-times"></i>
                                </button>
                                <div class="d-inline-block dropdown">
                                    <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
                                        <span class="btn-icon-wrapper pr-2 opacity-7">
                                            <i class="fa fa-business-time fa-w-20"></i>
                                        </span>
                                        Pengaduan
                                    </button>
                                    <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a href="javascript:void(0);" class="nav-link text-dark">
                                                    <i class="nav-link-icon lnr-inbox"></i>
                                                    <span>
                                                        Belum di proses
                                                    </span>
                                                    <div class="ml-auto badge badge-pill badge-warning">{{$pengajuan_belum->count()}}</div>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="javascript:void(0);" class="nav-link text-dark">
                                                    <i class="nav-link-icon lnr-book"></i>
                                                    <span>
                                                        Sedang di proses
                                                    </span>
                                                    <div class="ml-auto badge badge-pill badge-primary">{{$pengajuan_proses->count()}}</div>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="javascript:void(0);" class="nav-link text-dark">
                                                    <i class="nav-link-icon lnr-book"></i>
                                                    <span>
                                                        Diterima
                                                    </span>
                                                    <div class="ml-auto badge badge-pill badge-success">{{$pengajuan_diterima->count()}}</div>
                                                </a>
                                            </li>

                                            <li class="nav-item">
                                                <a href="javascript:void(0);" class="nav-link text-dark">
                                                    <i class="nav-link-icon lnr-book"></i>
                                                    <span>
                                                        Ditolak
                                                    </span>
                                                    <div class="ml-auto badge badge-pill badge-danger">{{$pengajuan_ditolak->count()}}</div>
                                                </a>
                                            </li>

                                            <li class="nav-item">
                                                <a href="javascript:void(0);" class="nav-link text-dark">
                                                    <i class="nav-link-icon lnr-book"></i>
                                                    <span>
                                                        Selesai
                                                    </span>
                                                    <div class="ml-auto badge badge-pill badge-danger">{{$pengajuan_selesai->count()}}</div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="d-inline-block dropdown">
                                    <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
                                        <span class="btn-icon-wrapper pr-2 opacity-7">
                                            <i class="fa fa-business-time fa-w-20"></i>
                                        </span>
                                        Aspirasi
                                    </button>
                                    <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a href="javascript:void(0);" class="nav-link text-dark">
                                                    <i class="nav-link-icon lnr-inbox"></i>
                                                    <span>
                                                        Belum di proses
                                                    </span>
                                                    <div class="ml-auto badge badge-pill badge-warning">{{$aspirasi_belum->count()}}</div>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="javascript:void(0);" class="nav-link text-dark">
                                                    <i class="nav-link-icon lnr-book"></i>
                                                    <span>
                                                        Sedang di proses
                                                    </span>
                                                    <div class="ml-auto badge badge-pill badge-primary">{{$aspirasi_proses->count()}}</div>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="javascript:void(0);" class="nav-link text-dark">
                                                    <i class="nav-link-icon lnr-book"></i>
                                                    <span>
                                                        Diterima
                                                    </span>
                                                    <div class="ml-auto badge badge-pill badge-success">{{$aspirasi_diterima->count()}}</div>
                                                </a>
                                            </li>

                                            <li class="nav-item">
                                                <a href="javascript:void(0);" class="nav-link text-dark">
                                                    <i class="nav-link-icon lnr-book"></i>
                                                    <span>
                                                        Ditolak
                                                    </span>
                                                    <div class="ml-auto badge badge-pill badge-danger">{{$aspirasi_ditolak->count()}}</div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    @yield('content')
                    @include('sweetalert::alert')



                </div>
            </div>
        </div>
    </div>

    <!-- Modal Pengaturan-->
    <div class="modal fade mt-5" id="modalSettings" tabindex="-1" role="dialog" aria-labelledby="modalSettingsLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Settings</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/settings_update" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="nama_aplikasi">Nama Aplikasi : @error('nama_aplikasi') <span class="text-danger ">{{$message}}</span> @enderror</label>
                                    <input type="text" class="form-control @error('nama_aplikasi') is-invalid @enderror" name="nama_aplikasi" value="{{old('nama_aplikasi')}}" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="deskripsi_aplikasi">Deskripsi : @error('deskripsi_aplikasi') <span class="text-danger ">{{$message}}</span> @enderror</label>
                                    <input type="text" class="form-control @error('deskripsi_aplikasi') is-invalid @enderror" name="deskripsi_aplikasi" value="{{old('deskripsi_aplikasi')}}" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                    <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Modal Foto Profil -->
    <div class="modal fade mt-5" id="modalAkunUsers" tabindex="-1" role="dialog" aria-labelledby="modalAkunUsersLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Foto Profil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-center text-center">
                        @if(Auth::user()->foto_profil == '0')
                        <img src="{{url('assets/img/avatar.png')}}" alt="AdminLTE Logo" class="profile-user-img img-fluid img-circle">
                        @else
                        <img src="{{url('/database/foto_profil/'. Auth::user()->foto_profil)}}" alt="" class="profile-user-img img-fluid img-circle">
                        @endif
                        <div class="container-fluid mt-2">
                            <div class="row justify-content-center">
                                <p>
                                    <form action="/profil_foto_ubah" method="post" enctype="multipart/form-data" class="ml-5">
                                        @csrf
                                        <input type="hidden" name="id" value="{{Auth::user()->id}}">
                                        <input id="upload" type="file" onchange="this.form.submit()" name="foto" />
                                        <a href="" id="upload_link" class="btn btn-primary bg-gradient-primary opacity-8 text-white btn-sm" style="margin-right:100px;">Ubah</a>​
                                        <a href="/profil_foto_hapus/{{Auth::user()->id}}" class="btn btn-danger btn-sm delete-confirm mr-5">Hapus</a>​
                                    </form>
                                </p>
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal Identitas-->
    <div class="modal fade mt-5" id="modalIdentitas" tabindex="-1" role="dialog" aria-labelledby="modalIdentitasLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Identitas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/profil_ubah_data" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{Auth::user()->id}}">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="nik">NIK : @error('nik') <span class="text-danger">{{$message}} </span> @enderror </label>
                                    <input type="number" name="nik" value="{{Auth::user()->nik}}" onKeyPress="if(this.value.length == 16) return false;" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="nama">Nama : @error('nama') <span class="text-danger">{{$message}} </span> @enderror </label>
                                    <input type="text" name="nama" value="{{Auth::user()->nama}}" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="telp">Telp : @error('telp') <span class="text-danger">{{$message}} </span> @enderror </label>
                                    <input type="number" name="telp" value="{{Auth::user()->telp}}" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="email">Email : @error('email') <span class="text-danger">{{$message}} </span> @enderror </label>
                                    <input type="email" name="email" value="{{Auth::user()->email}}" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="username">Username : @error('username') <span class="text-danger">{{$message}} </span> @enderror </label>
                                    <input type="text" name="username" value="{{Auth::user()->username}}" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                    <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    </div>


    <!-- Modal Ganti Password -->
    <div class="modal fade mt-5" id="modalGantiPassword" tabindex="-1" role="dialog" aria-labelledby="modalGantiPasswordLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ganti Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('change.password') }}" method="POST">
                        @csrf
                        @foreach ($errors->all() as $error)
                        <p class="text-danger">{{ $error }}</p>
                        @endforeach

                        <input type="hidden" name="id" value="{{Auth::user()->id}}">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="password">Current Password </label>
                                    <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="password">New Password</label>
                                    <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="password">New Confirm Password</label>
                                    <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                    <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    </div>



    @yield('settings')
    <script type="text/javascript" src="{{url('assets/arsitek/scripts/main.js')}}"></script>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
@stack('scripts')

<script>
    $(function() {
        $("#upload_link").on('click', function(e) {
            e.preventDefault();
            $("#upload:hidden").trigger('click');
        });

        $.ajax(({
            url: '{{url("/notifikasi")}}',
            success: function(res) {
                const r = JSON.parse(res)
                const count_unread = r.filter(({
                    is_read
                }) => is_read === 0)
                if (count_unread.length > 0) {
                    $("#notifikasi_icon").after(`<div style="position: absolute; padding:2px 4px; background-color: red; top:5px; right:10px; border-radius:999px; font-size:8px; color: white;">${count_unread.length}</div>`)
                }

                let html = "<div/>"

                for (let i = 0; i < r.length; i++) {
                    html += `<a href="/pengajuan_lihat/${r[i].id_pengaduan}" class="dropdown-item ${!r[i].is_read&&'active'}" href="#">${r[i].deskripsi}, ${r[i].id_pengaduan}</a>`
                }

                $('#notifikasi_header').after(html);
            }
        }))
    });
</script>

</html>
