@extends('layouts.admin')
@section('content')
<title>Data Masyarakat | Layanan Pengaduan Masyarakat</title>

<div class="row">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body"> 
            <div class="card-title">
                    <h5>Data Masyarakat 
            </div>
            <br>
                <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>No telepon</th>
                            <th>Username</th>
                            <th>Email</th>
                        </tr>
                        </thead>
                        <tbody>
                          <?php $no = 0;?>
                        @foreach($users as $value)
                        <?php $no++;?>
                        <tr>
                            <th scope="row"><?php echo $no?></th>
                            <td>{{$value->nik}}</td>
                            <td>{{$value->nama}}</td>
                            <td>{{$value->telp}}</td>
                            <td>{{$value->username}}</td>
                            <td>{{$value->email}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
@endpush