@extends('layouts.admin')
@section('content')
<title>Detail Data Aspirasi | Layanan Pengaduan Masyarakat</title>
<div class="row">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" id="data-tab" data-toggle="tab" href="#data" role="tab" aria-controls="data" aria-selected="true">Data</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pengajuan-tab" data-toggle="tab" href="#pengajuan" role="tab" aria-controls="pengajuan" aria-selected="false">Pengajuan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tanggapan-tab" data-toggle="tab" href="#tanggapan" role="tab" aria-controls="tanggapan" aria-selected="false">Tanggapan</a>
                    </li>
                </ul>
                @foreach($pengaduan as $value)
                <div class="tab-content">
                    <div class="tab-pane active" id="data" role="tabpanel" aria-labelledby="data-tab">
                        <div class="card-body">     
                            <table class="table table-striped">
                                <tr>
                                    <th>Tanggal dibuat</th>
                                    <td>:</td>
                                    <td>{{$value->tgl_pengaduan}} </td>
                                </tr>
                                <tr>
                                    <th>NIK</th>
                                    <td>:</td>
                                    <td>{{$value->nik}} </td>
                                </tr>
                                <tr>
                                    <th>Nama Lengkap :</th>
                                    <td>:</td>
                                    <td>{{$value->nama}} </td>
                                </tr>
                                <tr>
                                    <th>Kategori Pengaduan</th>
                                    <td>:</td>
                                    <td>{{$value->kategori}} </td>
                                </tr>
                            </table>                                  
                        </div>
                    </div>
                    <div class="tab-pane" id="pengajuan" role="tabpanel" aria-labelledby="pengajuan-tab">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                <img src="{{url('/database/foto_pengaduan/'. $value->foto_pengaduan)}}" alt="" width="250">
                                </div>
                                <div class="col-lg-8">
                                <p>{{$value->isi_laporan}}</p></div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tanggapan" role="tabpanel" aria-labelledby="tanggapan-tab">
                        <div class="card-body">
                                @if($value->tanggapan == '0')
                                    <center>
                                    <i class="fas fa-exclamation-circle"> Tidak ada tanggapan</i> 
                                    </center>
                                @else
                                    <p> {{$value->tanggapan}} </p>
                                @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>


@push('scripts')
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
@endpush
@endsection