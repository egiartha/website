@extends('layouts.admin')
@section('content')

<title>Laporan Aspirasi | Layanan Pengaduan Masyarakat</title>
<div class="row">
    <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        Filter Laporan Aspirasi
                    </div>
                </div>
        <div class="main-card mb-3 card">
            <div class="card-body">
                <form action="/cetak_laporan_aspirasi" method="POST">
                @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">    
                                <input type="date" class="form-control" name="dari" data-toggle='tooltip' title="Dari tanggal">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">    
                                <input type="date" class="form-control" name="ke" data-toggle='tooltip' title="Ke tanggal">
                            </div>
                        </div>
                        <div class="col-md-4">
                            
                        <div class="form-group" style="margin-top:2px;">
                            <button class="btn btn-primary">Filter</button>
                        </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <br>
        @if(request('dari') !='')
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th></th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        @else
        @endif
    </div>
</div>

@endsection

@push('scripts')

<script>

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