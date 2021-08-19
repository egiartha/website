@extends('layouts.admin')
@section('content')
<title>Detail Data Pengajuan | Layanan Pengaduan Masyarakat</title>
<div class="row">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" id="data-tab" data-toggle="tab" href="#data" role="tab" aria-controls="data" aria-selected="true">Data</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pengajuan-tab" data-toggle="tab" href="#pengajuan" role="tab" aria-controls="pengajuan" aria-selected="false">Pengaduan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tanggapan-tab" data-toggle="tab" href="#tanggapan" role="tab" aria-controls="tanggapan" aria-selected="false">Tanggapan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tanggapan-tab" data-toggle="tab" href="#komentar" role="tab" aria-controls="tanggapan" aria-selected="false">Komentar</a>
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
                                <tr>
                                    <th>Status</th>
                                    <td>:</td>
                                    <td>{{$value->status==="0"?'belum diproses':$value->status}} </td>
                                </tr>
                                <tr>
                                    <th>Longitude</th>
                                    <td>:</td>
                                    <td>{{$value->longitude}} </td>
                                </tr>
                                <tr>
                                    <th>Latitude</th>
                                    <td>:</td>
                                    <td>{{$value->latitude}} </td>
                                </tr>
                                <tr>
                                    <th style="vertical-align: top;">Lokasi</th>
                                    <td style="vertical-align: top;">:</td>
                                    <td>
                                        <div style="height: 400px; width: 100%;" id="mapId"></div>
                                    </td>
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
                                    <p>Laporan: {{$value->isi_laporan}}</p>
                                    <p>Alamat Lokasi Laporan: {{$value->alamat}}</p>
                                    <p>Desa: {{$value->desa}}</p>
                                    <p>Kecamatan: {{$value->kecamatan}}</p>
                                </div>
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
                            <table class="table table-striped">
                                <tr>
                                    <th>Tanggapan</th>
                                    <td>:</td>
                                    <td>{{$value->tanggapan}} </td>
                                </tr>
                                <tr>
                                    <th>Petugas</th>
                                    <td>:</td>
                                    <td>{{$petugas?$petugas->nama:''}} </td>
                                </tr>
                                <tr>
                                    <th style="vertical-align: top;">Foto Perbaikan</th>
                                    <td style="vertical-align: top;">:</td>
                                    <td><img style="width:500px;" src="{{ asset('database/foto_selesai').'/'. $value->foto_selesai}}" alt="foto selesai"></td>
                                </tr>
                            </table>
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane" id="komentar" role="tabpanel" aria-labelledby="tanggapan-tab">
                        <p class="text-center mt-3"><b>Komentar masyarakat</b></p>
                        @foreach($komentar as $value)
                        <div style="border: 1px solid #DEE2E6; padding:15px;margin:5px">
                            <p><b>{{$value->users->nama}}</b>, {{date_format($value->created_at,'d/m/Y')}}</p>
                            <span>{{$value->komentar}}</span>
                        </div>
                        @endforeach
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


        const mark = ["{{$pengaduan[0]->latitude}}", "{{$pengaduan[0]->longitude}}"]

        const map = L.map('mapId', {
            center: mark,
            zoom: 16
        })


        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map)

        L.popup({
                closeButton: false
            })
            .setLatLng(mark)
            .setContent('<p><b>{{$pengaduan[0]->alamat}}, {{$pengaduan[0]->desa}}, Kec. {{$pengaduan[0]->kecamatan}}</b></p><a target="_blank" href="http://maps.google.com/maps?q={{$pengaduan[0]->latitude}},{{$pengaduan[0]->longitude}}">Lihat di Google Maps</a>')
            .openOn(map);
    });
</script>
@endpush
@endsection
