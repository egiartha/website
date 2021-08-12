@extends('layouts.admin')
@section('content')
<title>Data Petugas | Layanan Pengaduan Masyarakat</title>

<div class="row">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body"> 
            <div class="card-title">
                    <h5>Data Petugas 
                    <button type="button" class="btn btn-shadow btn-info float-right" data-toggle="modal" data-target="#exampleModal">
                        Tambah
                    </button></h5>
            </div>
            <br>
                <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>No telepon</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Level</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $no = 0;?>
                        @foreach($users as $value)
                        <?php $no++ ;?>

                        <tr>
                            <th scope="row"><?php echo $no;?></th>
                            <td>{{$value->nama}}</td>
                            <td>{{$value->telp}}</td>
                            <td>{{$value->username}}</td>
                            <td>{{$value->email}}</td>
                            <td>{{$value->level}}</td>
                            <td>
                                <a href="/petugas_lihat/{{$value->id}}"><i class="fas fa-eye text-primary"></i></a>
                                <a href="/petugas_edit/{{$value->id}}"><i class="fas fa-edit text-success"></i></a>
                                <a href="/petugas_hapus/{{$value->id}}" class="button delete-confirm"><i class="fas fa-trash text-danger"></i></a>
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

<!-- Modal -->
<div class="modal fade mt-5" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Petugas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/petugas_store" method="post">
                @csrf
                    <div class="row">
                    
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="nama">Nama : @error('nama') <span class="text-danger ">{{$message}}</span> @enderror</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{old('nama')}}" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="username">Username : @error('username') <span class="text-danger ">{{$message}}</span> @enderror</label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{old('username')}}" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="telp">No Telepon : @error('telp') <span class="text-danger ">{{$message}}</span> @enderror</label>
                                <input type="number" class="form-control @error('telp') is-invalid @enderror" name="telp" value="{{old('telp')}}" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="alamat">Alamat : @error('alamat') <span class="text-danger ">{{$message}}</span> @enderror</label>
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{old('alamat')}}" required>
                            </div>
                        </div>
                        
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="email">Email : @error('email') <span class="text-danger ">{{$message}}</span> @enderror</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="password">password : @error('password') <span class="text-danger ">{{$message}}</span> @enderror</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password :</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                            </div>
                        </div>
                        
                        <div class="col-lg-12">
                            <select name="level" id="level" class="form-control" required>
                                <option value="" selected disabled>~ Level ~</option>
                                <option value="petugas">Petugas</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>

                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
                <button class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
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