
<title>Print Laporan Aspirasi | Layanan Pengaduan Masyarakat</title>
<style>
    .hilang{
        list-style-type: none;
    }
</style>
<h1>Layanan Pengaduan Masyarakat</h1>

<h4>Laporan Pengaduan <span style="margin-left: 300px;">Tanggal : {{$dari}} - {{$ke}} <br>
<span>Kategori : Aspirasi </span>  <span style="margin-left: 305px;">Total Pengaduan : {{$pengaduan->count()}} </span>  </span> </h4>

<hr>
<hr>

@foreach($pengaduan as $value)
<h5>A. IDENTITAS</h5>
<table>
    <tr align="left">
        <th>NIK</th>
        <th>:</th>
        <th>{{$value->nik}}</th>
    </tr>
    <tr align="left">
        <th>Nama Lengkap</th>
        <th>:</th>
        <th>{{$value->nama}}</th>
    </tr>
    <tr align="left">
        <th>No. Telp</th>
        <th>:</th>
        <th>{{$value->telp}}</th>
    </tr>
</table>


<h5>B. PENGADUAN</h5>
<table>
    <tr align="left">
        <th>Kode Pengaduan</th>
        <th>:</th>
        <th>{{$value->kode_pengaduan}}</th>
    </tr>
    
    <tr align="left">
        <th>Kategori</th>
        <th>:</th>
        <th>{{$value->kategori}}</th>
    </tr>
    
    <tr align="left">
        <th>Status</th>
        <th>:</th>
        <th>
            @if($value->status=='0')
            Belum di proses
            @elseif($value->status=='proses')
            Sedang di proses
            @elseif($value->status=='diterima')
            Diterima
            @elseif($value->status=='ditolak')
            Ditolak
            @endif
        </th>
    </tr>
    
    <tr align="left">
        <th>Isi Pengaduan</th>
        <th>:</th>
        <th>{{$value->isi_laporan}}</th>
    </tr>

    <tr align="left">
        <th>Foto Pengaduan</th>
        <th>:</th>
        <th><img src="{{ public_path('database/foto_pengaduan/'). $value->foto_pengaduan}}" width="200" alt="BTS"></th>
    </tr>
    
</table>

<hr>
<hr>

@endforeach