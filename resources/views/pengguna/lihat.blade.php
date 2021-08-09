@extends('layouts.admin')
@section('content')
<title>Detail Data Petugas | Layanan Pengaduan Masyarakat</title>

<div class="row">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body"> 
                <div class="card-title">
                        <h5>Detail Data
                </div>
                @foreach($users as $value)
                <div class="card-body">
                    <div class="form-group">
                        <label for="nik">NIK : @error('nik') <span class="text-danger">{{$message}}</span>  @enderror </label>
                        <input type="text" name="nik" value="{{$value->nik}}" class="form-control">
                    </div>
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
                    <a href="/masyarakat" class="btn btn-primary ">Kembali</a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
@endpush