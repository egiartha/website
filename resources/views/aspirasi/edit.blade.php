@extends('layouts.admin')
@section('content')
<title>Edit Data Aspirasi | Layanan Pengaduan Masyarakat</title>
<div class="row">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" id="data-tab" data-toggle="tab" href="#data" role="tab" aria-controls="data" aria-selected="true">Data</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="aspirasi-tab" data-toggle="tab" href="#aspirasi" role="tab" aria-controls="aspirasi" aria-selected="false">Aspirasi</a>
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
                    <div class="tab-pane" id="aspirasi" role="tabpanel" aria-labelledby="aspirasi-tab">
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
                        <form action="/aspirasi_update" method="post">
                                    @csrf
                            <div class="row">
                                
                                    <input type="hidden" value="{{$value->kode_pengaduan}}" name="kode_pengaduan">
                                    @if($value->tanggapan == '0')
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="tanggapan"><b>Tanggapan :</b></label>
                                        <textarea name="tanggapan" id="tanggapan" class="form-control">

                                        </textarea>
                                    </div>
                                </div>
                                @else
                                
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="tanggapan"><b>Tanggapan :</b></label>
                                        <textarea name="tanggapan" id="tanggapan" class="form-control">
                                            {{$value->tanggapan}}
                                        </textarea>
                                    </div>
                                </div>
                                @endif
                                
                                <div class="col-lg-12">
                                    <label for="status"><b>Status Pengaduan :</b> </label>
                                    <select name="status" id="status" class="form-control">
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
                                    </select>
                                </div>
                                <br>
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
        $('#example').DataTable();
    } );
</script>
@endpush
@endsection