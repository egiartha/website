@extends('layouts.admin')
@section('content')
<title>Data Aspirasi | Layanan Pengaduan Masyarakat</title>

<div class="row">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title">Data Aspirasi</h5><br>
                <div class="table-responsive">
                    <table class="mb-0 table" id="example">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Kode Pengaduan</th>
                            <th>Tanggal</th>
                            <th>Foto</th>
                            <th>tanggapan</th>
                            <th>Kategori</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $no = 0;?>
                        @foreach($pengaduan as $value)
                        <?php $no++ ;?>
                            <tr>
                                <td><?php echo $no?></td>
                                <td>{{$value->kode_pengaduan}}</td>
                                <td>{{$value->tgl_pengaduan}}</td>
                                <td> <img src="{{url('/database/foto_pengaduan/'. $value->foto_pengaduan )}}" width="100" alt=""> </td>
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
                                    @else
                                        Ditolak
                                    @endif
                                </td>
                                <td>
                                    <a title="Print" href="/pengajuan_print/{{$value->kode_pengaduan}}"> <i class="fas fa-print text-warning"></i> </a>
                                    <a title="Lihat" href="/aspirasi_lihat/{{$value->kode_pengaduan}}"> <i class="fas fa-eye text-primary"></i> </a>
                                    <a title="Edit" href="/aspirasi_edit/{{$value->kode_pengaduan}}"> <i class="fas fa-edit text-success"></i> </a>
                                    <a title="Hapus" href="/aspirasi_hapus/{{$value->kode_pengaduan}}"  class="button delete-confirm"> <i class="fas fa-trash text-danger"></i> </a>
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
    } );


       
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
</script>
@endpush
@endsection