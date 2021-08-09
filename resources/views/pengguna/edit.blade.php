@extends('layouts.admin')
@section('content')

<title>Edit Data Masyarakat | Layanan Pengaduan Masyarakat</title>
<div class="row">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body"> 
                <div class="card-title">
                        <h5>Edit Data
                </div>
                @foreach($users as $value)
                    <form action="/masyarakat_update" method="post">
                    <input type="hidden" name="id" value="{{$value->id}}">
                    @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nik">NIK : @error('nik') <span class="text-danger">{{$message}}</span>  @enderror </label>
                                <input type="number" onKeyPress="if(this.value.length==16) return false;" name="nik" value="{{$value->nik}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama : @error('nama') <span class="text-danger">{{$message}}</span>  @enderror </label>
                                <input type="text" name="nama" value="{{$value->nama}}" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label for="username">username : @error('username') <span class="text-danger">{{$message}}</span>  @enderror </label>
                                <input type="text" name="username" value="{{$value->username}}" class="form-control">
                            </div>
                            
                            
                            <div class="form-group">
                                <label for="telp">telp : @error('telp') <span class="text-danger">{{$message}}</span>  @enderror </label>
                                <input type="number" name="telp" value="{{$value->telp}}" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label for="email">email : @error('email') <span class="text-danger">{{$message}}</span>  @enderror </label>
                                <input type="email" name="email" value="{{$value->email}}" class="form-control">
                            </div>
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