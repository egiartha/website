@extends('layouts.admin')
@section('content')
<title>Data Pengaduan | Layanan Pengaduan Masyarakat</title>

<div class="row">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Data Pengaduan</h5>
                <button class="btn btn-primary mb-3" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Filter Data
                </button>
                <div class="collapse" id="collapseExample">
                    <form method="GET" action="/pengajuan">
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <select name="status" id="status" class="form-control" value="{{app('request')->input('status')}}">
                                    <option value="" <?= !app('request')->input('status') ? 'selected' : null ?> disabled>~ Status Pengaduan ~</option>
                                    <option value="0" <?= app('request')->input('status') === 0 || app('request')->input('status') === '0' ? 'selected' : null ?>>Belum di proses</option>
                                    <option value="proses" <?= app('request')->input('status') === 'proses' ? 'selected' : null ?>>Sedang di proses</option>
                                    <option value="diterima" <?= app('request')->input('status') === 'diterima' ? 'selected' : null ?>>Diterima</option>
                                    <option value="ditolak" <?= app('request')->input('status') === 'ditolak' ? 'selected' : null ?>>Ditolak</option>
                                    <option value="selesai" <?= app('request')->input('status') === 'selesai' ? 'selected' : null ?>>Selesai Diperbaiki</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select name="kecamatan" id="status" class="form-control">
                                    <option value="" <?= !app('request')->input('kecamatan') ? 'selected' : null ?> disabled>~ Kecamatan ~</option>
                                    <option value="Sambas" <?= app('request')->input('kecamatan') === 'Sambas' ? 'selected' : null ?>>Sambas</option>
                                    <option value="Sebawi" <?= app('request')->input('kecamatan') === 'Sebawi' ? 'selected' : null ?>>Sebawi</option>
                                    <option value="Tebas" <?= app('request')->input('kecamatan') === 'Tebas' ? 'selected' : null ?>>Tebas</option>
                                    <option value="Semapruk" <?= app('request')->input('kecamatan') === 'Semapruk' ? 'selected' : null ?>>Semparuk</option>
                                    <option value="Pemangkat" <?= app('request')->input('kecamatan') === 'Pemangkat' ? 'selected' : null ?>>Pemangkat</option>
                                    <option value="Selakau" <?= app('request')->input('kecamatan') === 'Selakau' ? 'selected' : null ?>>Selakau</option>
                                    <option value="Jawai" <?= app('request')->input('kecamatan') === 'Jawai' ? 'selected' : null ?>>Jawai</option>
                                    <option value="Tekarang" <?= app('request')->input('kecamatan') === 'Tekarang' ? 'selected' : null ?>>Tekarang</option>
                                    <option value="Paloh" <?= app('request')->input('kecamatan') === 'Paloh' ? 'selected' : null ?>>Paloh</option>
                                    <option value="Teluk Keramat" <?= app('request')->input('kecamatan') === 'Teluk Keramat' ? 'selected' : null ?>>Teluk Keramat</option>
                                    <option value="Subah" <?= app('request')->input('kecamatan') === 'Subah' ? 'selected' : null ?>>Subah</option>
                                </select>
                            </div>
                            <div class="col-md-3 ">
                                <input name="bulan" value="<?= app('request')->input('bulan') ?>" type="month" class="form-control">
                            </div>
                            <div class="col-md-3 ">
                                <button class="btn btn-info" type="submit">Submit</button>
                                <a class="btn btn-warning" href="/pengajuan">Reset</a>
                            </div>
                            <div class="col-md-12">
                                <hr>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="table-responsive">
                    <table class="mb-0 table" id="example">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kode Pengaduan</th>
                                <th>Tanggal</th>
                                <th>Foto</th>
                                <th>Alamat</th>
                                <th>Desa</th>
                                <th>Kecamatan</th>
                                <th>Tanggapan</th>
                                <th>Kategori</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0; ?>
                            @foreach($pengaduan as $value)
                            <?php $no++; ?>
                            <tr>
                                <td><?php echo $no ?></td>
                                <td>{{$value->kode_pengaduan}}</td>
                                <td>{{$value->tgl_pengaduan}}</td>
                                <td> <img src="{{url('/database/foto_pengaduan/'. $value->foto_pengaduan )}}" width="100" alt=""> </td>
                                <td>{{$value->alamat}}</td>
                                <td>{{$value->desa}}</td>
                                <td>{{$value->kecamatan}}</td>
                                <td>
                                    @if($value->tanggapan == '0')
                                    <i class="fas fa-exclamation text-danger"></i>
                                    @else
                                    <i class="fas fa-check text-success"></i>
                                    @endif
                                </td>
                                <td>{{$value->kategori}}</td>
                                <td>
                                    @if($value->status == '0')
                                    Belum di proses
                                    @elseif($value->status == 'proses')
                                    Sedang di proses
                                    @elseif($value->status == 'diterima')
                                    Diterima
                                    @elseif($value->status == 'ditolak')
                                    Ditolak
                                    @else
                                    Selesai
                                    @endif
                                </td>
                                <td>
                                    <a title="Print" href="/pengajuan_print/{{$value->kode_pengaduan}}"> <i class="fas fa-print text-warning"></i> </a>
                                    <a title="Lihat" href="/pengajuan_lihat/{{$value->kode_pengaduan}}"> <i class="fas fa-eye"></i> </a>
                                    <a title="Edit" href="/pengajuan_edit/{{$value->kode_pengaduan}}"> <i class="fas fa-edit text-success"></i> </a>
                                    <a title="Hapus" href="/pengajuan_hapus/{{$value->kode_pengaduan}}" class="button delete-confirm"> <i class="fas fa-trash text-danger"></i> </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@push('scripts')
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });


    $('.delete-confirm').on('click', function(e) {
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
    });
</script>
@endpush
@endsection
