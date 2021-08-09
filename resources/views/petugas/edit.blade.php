@extends('layouts.admin')
@section('content')
<title>Edit Data Petugas | Layanan Pengaduan Masyarakat</title>

<div class="row">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body"> 
                <div class="card-title">
                        <h5>Edit Data
                </div>
                @foreach($users as $value)
                    <form action="/petugas_update" method="post">
                    <input type="hidden" name="id" value="{{$value->id}}">
                    @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama">Nama : @error('nama') <span class="text-danger">{{$message}}</span>  @enderror </label>
                                <input type="text" name="nama" value="{{$value->nama}}" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label for="telp">telp : @error('telp') <span class="text-danger">{{$message}}</span>  @enderror </label>
                                <input type="text" name="telp" value="{{$value->telp}}" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label for="username">username : @error('username') <span class="text-danger">{{$message}}</span>  @enderror </label>
                                <input type="text" name="username" value="{{$value->username}}" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label for="email">email : @error('email') <span class="text-danger">{{$message}}</span>  @enderror </label>
                                <input type="text" name="email" value="{{$value->email}}" class="form-control">
                            </div>
                                <label for="level">Level :</label>
                            <select name="level" id="level" class="form-control">
                                @if($value->level == 'petugas')
                                    <option value="petugas" selected>Petugas</option>
                                @else
                                    <option value="petugas">Petugas</option>
                                @endif
                                
                                @if($value->level == 'admin')
                                    <option value="admin" selected>Admin</option>
                                @else
                                    <option value="admin">Admin</option>
                                @endif

                            </select>
                            <br>
                            <button class="btn btn-primary ">Update</button>
                        </div>
                    </form>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
@endpush