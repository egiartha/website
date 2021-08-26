<!doctype html>
<html lang="en">
<style>
    .img-fluid {
        max-width: 100%;
        height: auto;
    }

    .img-responsive {
        display: block;
        max-width: 100%;
        height: auto;
    }
</style>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{url('assets/landing-page/css/style.css')}}">
    @yield('css')
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="icon" href="">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Viga" rel="stylesheet">

    <link href="/{{url('assets/fontawesome/css/all.css')}}" rel="stylesheet">
    <!--load all styles -->
    <link href="{{url('assets/fontawesome/css/fontawesome.css')}}" rel="stylesheet">
    <link href="{{url('assets/fontawesome/css/brands.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('assets/arsitek/Pe-icon-7-stroke.css')}}">
    <link href="{{url('assets/fontawesome/css/solid.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">
                @if($aplikasi=='')
                Aspirasi Ku
                @else
                {{$aplikasi->nama_aplikasi}}
                @endif
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{url('/index')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/visi')}}">Visi Misi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/lapor')}}">Lapor Dan Aspirasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/data_laporan')}}">Data Laporan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/profil')}}">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/tentang')}}">Kontak Kami</a>
                    </li>
                    @if(Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i> &nbsp;{{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            <i class="fas fa-sign-out-alt"></i> Login
                        </a>
                    </li>
                    @endif
            </div>
            </ul>
        </div>
        </div>
    </nav>

    <section id="intro">
        <div class="intro-container">
            <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

                <ol class="carousel-indicators"></ol>

                <div class="carousel-inner" role="listbox">

                    <div class="carousel-item active">
                        <div class="carousel-background"><img src="{{asset('assets/img/11 (1).jpg')}}" alt=""></div>
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <h2>Selamat datang </h2>
                                <h1>Di Layanan Penerangan Jalan Umum </h1>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="carousel-background"><img src="{{asset('assets/img/6.jpeg ')}}" alt=""></div>
                        <div class="carousel-container">
                            <div class="carousel-content">

                                <h2>Pantang Pulang Sebelum Terang </h2>
                                <h1>Untuk Kabupaten Sambas Lebih Baik </h1>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="carousel-background"><img src="{{asset('assets/img/11 (3).jpg')}}" alt=""></div>
                        <div class="carousel-container">
                            <div class="carousel-content">

                                <h2>DINAS PERHUBUNGAN KABUPATEN SAMBAS</h2>

                            </div>
                        </div>
                    </div>

                </div>

                <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>

                <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>

            </div>
        </div>


        @yield('content')

        <footer>
            <!--==========================
    Footer
  ============================-->
            <footer id="footer">
                <div class="footer-top">
                    <div class="container">
                        <div class="row">

                            <div class="col-lg-4 col-md-6 footer-info">
                                <h3>Dinas Perhubungan Kabupaten Sambas</h3>
                                <p>Pantang Pulang Sebelum Terang</p>
                            </div>

                            <div class="col-lg-4 col-md-6 footer-links">
                                <h4>Useful Links</h4>
                                <ul>
                                    <li><a href="{{url('/index')}}">Home</a></li>
                                    <li class="menu-active"><a href="{{url('/visi')}}">Visi Misi</a></li>
                                    <li><a href="{{url('/lapor')}}">Lapor</a></li>
                                    <li><a href="{{url('/data_laporan')}}">Data Laporan</a></li>
                                    <li><a href="{{url('/profil')}}">Profil</a></li>
                                    <li><a href="{{url('/tentang')}}">Kontak Kami</a></li>
                                </ul>
                            </div>

                            <div class="col-lg-4 col-md-6 footer-contact">
                                <h4>Contact Us</h4>
                                <p1>

                                    Jl. Pembangunan Sambas <br>
                                    Desa Dalam Kaum,br>
                                    Kecamatan Sambas<br>
                                    Kabupaten Sambas <br>
                                    Kalimantan Barat (79462)<br>
                                    <strong>Phone:</strong> +1 5589 55488 55 <br>
                                    <strong>Email:</strong> dishubsambas@gmail.com<br>
                                </p1>
                            </div>
                            <div class="col-lg-4 col-md-6 footer-contact">
                                <h4>FLLAJ SAMBAS</h4>
                                <p1>
                                    Forum Lalu Lintas dan Angkutan Jalan sebagaimana disebutkan pada Peraturan Pemerintah Republik Indonesia Nomor 37 Tahun 2011 Tentang Forum Lalu Lintas Dan Angkutan Jalan adalah wahana koordinasi antar instansi penyelenggara lalu lintas dan angkutan jalan.
                                </p1>
                            </div>
                            <div class="col-lg-4 col-md-6 footer-contact">
                                <h4>Jam Kerja</h4>
                                <p1>
                                    Senin - Kamis: 08.00 - 16.00<br>
                                    Jum'at: 08.00 - 11.00
                                </p1>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="copyright">
                        &copy; Copyright <strong>Dishub Sambas</strong>. All Rights Reserved
                    </div>

                </div>
            </footer><!-- #footer -->
        </footer>

        @include('sweetalert::alert')


        <script type="text/javascript" src="{{url('assets/arsitek/scripts/main.js')}}"></script>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
@stack('scripts')
</body>

</html>
