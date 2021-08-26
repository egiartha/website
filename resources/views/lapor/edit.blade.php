@extends('layouts.layout')
@section('content')
<title>Lapor | Layanan Pengaduan Masyarat</title>

<body>
    <style>
        #idfoto_pengaduan {
            background-image: url('');
            background-size: cover;
            background-position: center;
            height: 250px;
            width: 250px;
            border: 1px solid #bbb;
        }

        .jumbotron {
            position: relative;
        }

        #mapId {
            height: 300px;
        }
    </style>


    <!-- Jumbotron -->
    <!-- <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <marquee behavior="scroll" scrollamount="6" onmouseover="this.stop();" onmouseout="this.start();" direction="left">
                <h1 class="display-4">Form Edit Pengaduan </h1>
            </marquee>

            <a href="javascript::void(0)" class="btn btn-primary lapor">Sampaikan pengaduan melalui form dibawah</a>
        </div>
    </div> -->
    <!-- akhir Jumbotron -->

    <!-- ======= Mobile Menu ======= -->
    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icofont-close js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    <br><br>
    <main id="main">

    <section class="section">
      <div class="container">
        <div class="row mb-5 align-items-end">
          <div class="col-md-6" data-aos="fade-up">

            <h2>From Edit Laporan</h2>
          </div>

        </div>

        <div class="row">

                <div class="row">



                    <div class="col-md-6 mb-5 mb-md-0" data-aos="fade-up">
                        <form action="/lapor_edit_store" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="kode_pengaduan" value="{{$pengaduan->kode_pengaduan}}" />
                            <div class="row">

                                <div class="col-md-12 form-group">
                                    <label for="isi_laporan`">Isi Laporan :</label>
                                    <textarea class="form-control" name="isi_laporan" required cols="30" rows="10">{{ $pengaduan->isi_laporan }}</textarea>
                                    <div class="validate"></div>
                                </div>

                                <div class="col-md-12 form-group">
                                    <label for="isi_laporan`">Alamat Lokasi Pengaduan:</label>
                                    <input class="form-control" name="alamat" cols="30" rows="10" value="{{ $pengaduan->alamat }}" required></input>
                                    <div class="validate"></div>
                                </div>

                                <div class="col-md-12 form-group">
                                    <label for="isi_laporan`">Desa:</label>
                                    <input class="form-control" name="desa" cols="30" rows="10" value="{{ $pengaduan->desa }}" required></input>
                                    <div class="validate"></div>
                                </div>

                                <div class="col-md-12 form-group">
                                    <label for="isi_laporan`">Kecamatan:</label>
                                    <select class="form-control" name="kecamatan" cols="30" rows="10" required>
                                        <option value="Sambas" <?= $pengaduan->kecamatan === 'Sambas' ? 'selected' : null ?>>Sambas</option>
                                        <option value="Sebawi" <?= $pengaduan->kecamatan === 'Sebawi' ? 'selected' : null ?>>Sebawi</option>
                                        <option value="Tebas" <?= $pengaduan->kecamatan === 'Tebas' ? 'selected' : null ?>>Tebas</option>
                                        <option value="Semapruk" <?= $pengaduan->kecamatan === 'Semapruk' ? 'selected' : null ?>>Semparuk</option>
                                        <option value="Pemangkat" <?= $pengaduan->kecamatan === 'Pemangkat' ? 'selected' : null ?>>Pemangkat</option>
                                        <option value="Selakau" <?= $pengaduan->kecamatan === 'Selakau' ? 'selected' : null ?>>Selakau</option>
                                        <option value="Jawai" <?= $pengaduan->kecamatan === 'Jawai' ? 'selected' : null ?>>Jawai</option>
                                        <option value="Tekarang" <?= $pengaduan->kecamatan === 'Tekarang' ? 'selected' : null ?>>Tekarang</option>
                                        <option value="Paloh" <?= $pengaduan->kecamatan === 'Paloh' ? 'selected' : null ?>>Paloh</option>
                                        <option value="Teluk Keramat" <?= $pengaduan->kecamatan === 'Teluk Keramat' ? 'selected' : null ?>>Teluk Keramat</option>
                                        <option value="Subah" <?= $pengaduan->kecamatan === 'Subah' ? 'selected' : null ?>>Subah</option>
                                    </select>
                                    <div class="validate"></div>
                                </div>


                                <div class="col-md-12 form-group">
                                    <label for="foto_pengaduan">Foto Pengaduan :</label>
                                    <input type="file" class="form-control" name="foto_pengaduan" id="foto_pengaduan" />
                                    <!-- <div id='idfoto_pengaduan'></div> -->
                                    <div class="validate"></div>
                                </div>
                                @error('foto_pengaduan')
                                <div class="col-sm-12">
                                    <div class="col-sm-12">
                                        <div class="alert bg-danger">
                                            <strong class="text-white">{{ $message }}</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                @enderror

                                <div class="col-md-12 form-group">
                                    <label for="kategori">Kategori : <br>
                                        <input <?= $pengaduan->kategori === 'pengajuan' ? 'checked' : '' ?> type="radio" name="kategori" id="pengajuan" value="pengajuan" @if(old('kategori')=='pengajuan' ) checked @else @endif required />
                                        <label for="pengajuan">Pengaduan
                                            <input <?= $pengaduan->kategori === 'aspirasi' ? 'checked' : '' ?> type="radio" name="kategori" id="aspirasi" value="aspirasi" @if(old('kategori')=='aspirasi' ) checked @else @endif required />
                                            <label for="aspirasi">Aspirasi <br>
                                            </label>
                                            <div class="validate"></div>
                                </div>

                                <div class="col-md-12 mb-5">
                                    <label for="">Pilih Lokasi</label>
                                    <div id="mapId"></div>
                                </div>
                                <input type="hidden" value="{{$pengaduan->longitude}}" id="longitude" name="longitude" />
                                <input type="hidden" value="{{$pengaduan->latitude}}" id="latitude" name="latitude" />

                                <div class="col-md-12 form-group">
                                    <input type="submit" class="btn btn-primary btn-block" value="Ubah">  
                                    <a href = "javascript:history.back()"class="btn btn-primary btn-block" >Kembali</a>
                                </div>
                    
                            </div>

                        </form>
                    </div>

                    <div class="col-md-6 mb-5 mb-md-0" data-aos="fade-up">

<div class="card">
    <h5 class="card-header">Petunjuk Pengaduan</h5>
    <div class="card-body">

        <p class="card-text">
            <p>1. Anda diwajibkan untuk mengisikan kolom isi laporan pada formulir pengaduan dan aspirasi.</p>
            <p>2. Pelapor diharapkan untuk mengisikan laporan lokasi lampu PJU yang mati secara lengkap dan jelas guna mempercepat proses perbaikan.</p>
            <p>3. Pelapor dimohon untuk mengisi formulir pengaduan dengan lengkap dan benar</p>
            <p>4. Pelapor diwajibkan melampirkan foto/file dapat sebagai file pendukung.</p>
            <p>5. Pelapor dapat mencari alamat saat melapor di maps yang tersedia.</p>
            <p>6. Perbaikan lampu PJU akan dilaksanakan secepat mungkin setelah laporan kami terima..</p>
        </p>
    </div>
    <div class="card">
    <h5 class="card-header">Petunjuk Aspirasi</h5>
    <div class="card-body">

        <p class="card-text">
            <p>Perhatian! Harap mengisikan formulir aspirasi dengan benar karena aspirasi yang anda masukan akan menjadi dasar perencanaan kegiatan kami.</p>
            <p>**** Contoh: Jalan Desa Nagur Kecamatan Sambas Sebelah Jembatan Batu, Belum terdapat lampu PJU mohon untuk dipasang lampu pju dikarenakan mobilitas masyarakat diwilayah tersebut ramai</p>
            
        </p>
         </div>
                        </div>
                    </div>



                </div>

            </div>
            </div>
        </section>
</body>

</html>
@endsection

@push('scripts')
<script>
    // document.getElementById('pengaduan').addEventListener('change', readURL, true);

    // function readURL() {
    //     var file = document.getElementById("pengaduan").files[0];
    //     var reader = new FileReader();
    //     reader.onloadend = function() {
    //         document.getElementById('idpengaduan').style.backgroundImage = "url(" + reader.result + ")";
    //     }
    //     if (file) {
    //         reader.readAsDataURL(file);
    //     } else {}
    // }

    let marker

    const mark = ["{{$pengaduan->latitude}}", "{{$pengaduan->longitude}}"]

    const map = L.map('mapId', {
        center: mark,
        zoom: 16
    })

    marker = L.marker(mark).addTo(map)

    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map)

    map.on('click', function(pos) {
        if (marker) {
            map.removeLayer(marker);
        }
        const mark = [pos.latlng.lat, pos.latlng.lng]
        map.setView(mark, 16)
        marker = new L.marker(mark).addTo(map)

        $("#latitude").val(mark[0])
        $("#longitude").val(mark[1])
    })
</script>
</script>
@endpush
