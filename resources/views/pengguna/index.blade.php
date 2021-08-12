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
                            <th>NK</th>
                            <th>Nama</th>
                            <th>No telepon</th>
                            <th>Username</th>
                            <th>Alamat</th>
                            <th>Email</th>
                            <th>Level</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $no = 0;?>
                        @foreach($users as $value)
                        <?php $no++ ;?>

                        <tr>
                            <th scope="row"><?php echo $no;?></th>
                            <td>{{$value->nik}}</td>
                            <td>{{$value->nama}}</td>
                            <td>{{$value->telp}}</td>
                            <td>{{$value->username}}</td>
                            <td>{{$value->alamat}}</td>
                            <td>{{$value->email}}</td>
                            
                            <td>
                                <a href="/masyarakat_lihat/{{$value->id}}"><i class="fas fa-eye text-primary"></i></a>
                                <a href="/masyarakat_hapus/{{$value->id}}" class="button delete-confirm"><i class="fas fa-trash text-danger"></i></a>
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