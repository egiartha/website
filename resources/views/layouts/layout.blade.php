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


    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
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
                <div class="navbar-nav ml-auto">
                    <a class="nav-item nav-link active" href="/index">Home <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="/visi">Visi Misi</a>
                    <a class="nav-item nav-link" href="/lapor">Lapor</a>
                    <a class="nav-item nav-link" href="/data_laporan">Data Laporan</a>
                    <a class="nav-item nav-link" href="/profil">Profil</a>
                    <a class="nav-item nav-link" href="/tentang">Kontak Kami</a>
                 
                    <a class="nav-item nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i> &nbsp;{{ __('Logout') }}
                    </a>

                    <a class="nav-item nav-link-ya">
                        @if(Auth::user()->foto_profil == '0')
                        <img src="{{url('/assets/img/avatar.png')}}" class="img-fluid" width="42" hight="1410">
                        @else
                        <img src="{{url('/database/foto_profil/'. Auth::user()->foto_profil)}}" class="img-fluid mt-2" width="42" hight="1410">
                        @endif
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </nav>
    <!-- akhir Navbar -->


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
                            <p>
                                Jl. Pembangunan Sambas <br>
                                Kecamatan Sambas<br>
                                Kabupaten Sambas <br>
                                <strong>Phone:</strong> 0899 5592 781<br>
                                <strong>Email:</strong> dishubsambas@gmail.com<br>
                            </p>
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
