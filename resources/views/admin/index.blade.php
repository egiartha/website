@extends('layouts.admin')
@section('content')
<title>Dashboard Admin | Layanan Pengaduan Masyarakat</title>
        <div class="row">
            <div class="col-md-6 col-xl-6">
                <div class="card mb-3 widget-content bg-midnight-bloom">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Total Pengaduan</div>
                            <div class="widget-subheading">Pengajuan dan Aspirasi</div>
                        </div>
                        <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span>{{$pengaduan->count()}}</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-6">
            <div class="card mb-3 widget-content bg-grow-early">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Total Akun</div>
                        <div class="widget-subheading">Jumlah Pengguna</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span>{{$akun->count()}}</span></div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 col-xl-6">
            <div class="card mb-3 widget-content bg-arielle-smile">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Petugas</div>
                        <div class="widget-subheading">Jumlah Petugas</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span>{{$petugas->count()}}</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-6">
            <div class="card mb-3 widget-content bg-primary">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Masyarakat</div>
                        <div class="widget-subheading">Jumlah Masyarakat</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span>{{$masyarakat->count()}}</span></div>
                    </div>
                </div>
            </div>
        </div>
        
          
            </div>
        </div>
        <div class="app-footer">
                            <div class="app-footer__inner">
                                <div class="app-footer-right">
                                    <ul class="nav">
                                        <li class="nav-item">
                                            <a href="javascript:void(0);" class="nav-link">
                                                Copyright &copy; 2021 DISHUB SAMBAS
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>    </div>
 
    </div>    
</div>
@endsection