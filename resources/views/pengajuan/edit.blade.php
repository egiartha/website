@extends('layouts.admin')
@section('content')
<title>Edit Data Pengaduan | Layanan Pengaduan Masyarakat</title>
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
                            <form action="/pengajuan_update" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                    <input type="hidden" value="{{$value->kode_pengaduan}}" name="kode_pengaduan">

                                    @if($value->tanggapan == '0')
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="tanggapan"><b>Tanggapan :</b></label>
                                            <textarea required name="tanggapan" id="tanggapan" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    @else

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="tanggapan"><b>Tanggapan :</b></label>
                                            <textarea required name="tanggapan" id="tanggapan" class="form-control">{{$value->tanggapan}}</textarea>
                                        </div>
                                    </div>
                                    @endif

                                    <div class="col-lg-12">
                                        <label for="status"><b>Status Pengaduan :</b> </label>
                                        <select required name="status" id="status" class="form-control">
                                            <option value="" selected disabled>~ Status Pengaduan ~</option>
                                            @if($value->status == '0')
                                            <option value="0" selected>Belum di proses</option>
                                            @else
                                            <option value="0">Belum di proses</option>
                                            @endif
                                            @if($value->status == 'proses')
                                            <option value="proses" selected>Sedang di proses</option>
                                            @else
                                            <option value="proses">Sedang di proses</option>
                                            @endif
                                            @if($value->status == 'diterima')
                                            <option value="diterima" selected>Diterima</option>
                                            @else
                                            <option value="diterima">Diterima</option>
                                            @endif
                                            @if($value->status == 'ditolak')
                                            <option value="ditolak" selected>Ditolak</option>
                                            @else
                                            <option value="ditolak">Ditolak</option>
                                            @endif
                                            @if($value->status == 'selesai')
                                            <option value="selesai" selected>Selesai Diperbaiki</option>
                                            @else
                                            <option value="selesai">Selesai Diperbaiki</option>
                                            @endif
                                        </select>
                                    </div>
                                    <br>
                                    <div class="col-lg-12 mt-3" id="foto_selesai_form">
                                    </div>

                                    <div class="col-lg-12 mt-4">
                                        <button class="btn btn-primary btn-block">Update</button>
                                    </div>
                                </div>
                            </form>

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
        const html = `<label for="foto_pengaduan"><b> Foto Perbaikan :</b></label> <input type="file" class="form-control" name="foto_selesai" id="foto_selesai" required />`

        $('#example').DataTable()

        $('#status').change(function() {
            const val = $(this).val()
            if (val === 'selesai') {
                $('#foto_selesai_form').html(html)
            } else {
                $('#foto_selesai_form').html("<div/>")
            }
        })

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
