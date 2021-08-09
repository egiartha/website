
@extends('layouts.layout')
@section('content') 
<style>
</style>
<title>Home | Layanan Pengaduan Masyarat</title>
<!-- Jumbotron -->
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    @if($aplikasi=='')
      <h1 class="display-4">Layanan Pengaduan Masyarakat</h1>
      <a href="/lapor" class="btn btn-primary lapor">Sampaikan Pengaduan Disini</a>
    @else
      <h1 class="display-4">{{$aplikasi->deskripsi_aplikasi}}</h1>
      <a href="/lapor" class="btn btn-primary lapor">Sampaikan Pengaduan Disini</a>
    @endif
  </div>
</div>
<!-- akhir Jumbotron -->

@endsection