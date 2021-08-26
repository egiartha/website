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
                <h1 class="display-4">Form Pengaduan dan Aspirasi </h1>
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

            <h2>Form Lapor Pengaduan Dan Aspirasi</h2>
            <button type="submit" class="btn btn-primary lapor">
                    <h5>Sampaikan Pengaduan dan Aspirasi Anda Disini</h5>
					</button>	
          </div>

        

                </div>

                <div class="row">



                    <div class="col-md-6 mb-5 mb-md-0" data-aos="fade-up">
                        <form action="/lapor_store" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-md-12 form-group">
                                    <label for="isi_laporan`">Isi Laporan :</label>
                                    <textarea class="form-control" name="isi_laporan" cols="30" rows="10">{{ old('isi_laporan') }}</textarea>
                                    <div class="validate"></div>
                                </div>

                                <div class="col-md-12 form-group">
                                    <label for="isi_laporan`">Alamat Lokasi Pengaduan:</label>
                                    <input class="form-control" name="alamat" cols="30" rows="10">{{ old('alamat') }}</input>
                                    <div class="validate"></div>
                                </div>

                                <div class="col-md-12 form-group">
                                    <label for="isi_laporan`">Desa:</label>
                                    <input class="form-control" name="desa" cols="30" rows="10">{{ old('desa') }}</input>
                                    <div class="validate"></div>
                                </div>

                                <div class="col-md-12 form-group">
                                    <label for="isi_laporan`">Kecamatan:</label>
                                    <select class="form-control" name="kecamatan" cols="30" rows="10">
                                        <option value="Sambas" {{ (old('kecamatan')=='Sambas') ? 'selected' : '' }}>Sambas</option>
                                        <option value="Sebawi" {{ (old('kecamatan')=='Sebawi') ? 'selected' : '' }}>Sebawi</option>
                                        <option value="Tebas" {{ (old('kecamatan')=='Tebas') ? 'selected' : '' }}>Tebas</option>
                                        <option value="Semapruk" {{ (old('kecamatan')=='Semparuk') ? 'selected' : '' }}>Semparuk</option>
                                        <option value="Pemangkat" {{ (old('kecamatan')=='Pemangkat') ? 'selected' : '' }}>Pemangkat</option>
                                        <option value="Selakau" {{ (old('kecamatan')=='Selakau') ? 'selected' : '' }}>Selakau</option>
                                        <option value="Jawai" {{ (old('kecamatan')=='Jawai') ? 'selected' : '' }}>Jawai</option>
                                        <option value="Tekarang" {{ (old('kecamatan')=='Tekarang') ? 'selected' : '' }}>Tekarang</option>
                                        <option value="Paloh" {{ (old('kecamatan')=='Paloh') ? 'selected' : '' }}>Paloh</option>
                                        <option value="Teluk Keramat" {{ (old('kecamatan')=='Teluk Keramat') ? 'selected' : '' }}>Teluk Keramat</option>
                                        <option value="Subah" {{ (old('kecamatan')=='Subah') ? 'selected' : '' }}>Subah</option>
                                    </select>
                                    <div class="validate"></div>
                                </div>


                                <div class="col-md-12 form-group">
                                    <label for="foto_pengaduan">Foto Pengaduan :</label>
                                    <input type="file" class="form-control" name="foto_pengaduan" id="foto_pengaduan" required />
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
                                        <input type="radio" name="kategori" id="pengajuan" value="pengajuan" @if(old('kategori')=='pengajuan' ) checked @else @endif required />
                                        <label for="pengajuan">Pengaduan
                                            <input type="radio" name="kategori" id="aspirasi" value="aspirasi" @if(old('kategori')=='aspirasi' ) checked @else @endif required />
                                            <label for="aspirasi">Aspirasi <br>
                                            </label>
                                            <div class="validate"></div>
                                </div>

                                <div class="col-md-12 mb-5">
                                    <label for="">Pilih Lokasi</label>
                                    <div id="mapId"></div>
                                </div>
                                <input type="hidden" id="longitude" name="longitude" />
                                <input type="hidden" id="latitude" name="latitude" />

                                <div class="col-md-12 form-group">
                                    <input type="submit" class="btn btn-primary btn-block" value="Kirim">
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

    const map = L.map('mapId', {
        center: [-1.0197544, 116.0493844],
        zoom: 4
    })

    getLocation()

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                const mark = [position.coords.latitude, position.coords.longitude]
                marker = L.marker(mark).addTo(map)
                map.setView(mark, 16)

                $("#latitude").val(mark[0])
                $("#longitude").val(mark[1])
            })
        } else {
            alert("Failed automatic location")
        }
    }

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
