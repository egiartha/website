
<title>Print Pengajuan | Layanan Pengaduan Masyarakat</title>
<style>
    .hilang{
        list-style-type: none;
    }
</style>
<h1>Layanan Pengaduan Masyarakat</h1>

<h4>Laporan Pengaduan <span style="margin-left: 400px;">Tanggal : {{$pengaduan->tgl_pengaduan
}}  </span> </h4>

<hr>
<hr>


<h5>A. IDENTITAS</h5>
<table>
    <tr align="left">
        <th>NIK</th>
        <th>:</th>
        <th>{{$pengaduan->nik}}</th>
    </tr>
    <tr align="left">
        <th>Nama Lengkap</th>
        <th>:</th>
        <th>{{$pengaduan->nama}}</th>
    </tr>
    <tr align="left">
        <th>No. Telp</th>
        <th>:</th>
        <th>{{$pengaduan->telp}}</th>
    </tr>
</table>


<h5>B. PENGADUAN</h5>
<table>
    <tr align="left">
        <th>Kode Pengaduan</th>
        <th>:</th>
        <th>{{$pengaduan->kode_pengaduan}}</th>
    </tr>
    
    <tr align="left">
        <th>Kategori</th>
        <th>:</th>
        <th>{{$pengaduan->kategori}}</th>
    </tr>
    
    <tr align="left">
        <th>Status</th>
        <th>:</th>
        <th>
            @if($pengaduan->status=='0')
            Belum di proses
            @elseif($pengaduan->status=='proses')
            Sedang di proses
            @elseif($pengaduan->status=='diterima')
            Diterima
            @elseif($pengaduan->status=='ditolak')
            Ditolak
            @endif
        </th>
    </tr>
    
    <tr align="left">
        <th>Isi Pengaduan</th>
        <th>:</th>
        <th>{{$pengaduan->isi_laporan}}</th>
    </tr>

    <tr align="left">
        <th>Alamat Lokasi Laporan</th>
        <th>:</th>
        <th>{{$pengaduan->alamat}}</th>
    </tr>

    <tr align="left">
        <th>Desa</th>
        <th>:</th>
        <th>{{$pengaduan->desa}}</th>
    </tr>

    <tr align="left">
        <th>Kecamatan</th>
        <th>:</th>
        <th>{{$pengaduan->kecamatan}}</th>
    </tr>   
        

    <tr align="left">
        <th>Foto Pengaduan</th>
        <th>:</th>
        <th><img src="{{ public_path('database/foto_pengaduan/'). $pengaduan->foto_pengaduan}}" width="200" alt="BTS"></th>
    </tr>

    <tr align="left">
        <th>Tanggapan :</th>
        <th>:</th>
        <th>
            @if($pengaduan->tanggapan == '0')
                Tidak ada tanggapan
            @else
            {{$pengaduan->tanggapan}}
            @endif
        </th>
    </tr>
    
</table>
