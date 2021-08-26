@extends('layouts.layout')
@section('content')
<title>Lapor | Layanan Pengaduan Masyarat</title>

<body>
<style>

#idfoto_pengaduan{
   background-image:url('');
   background-size:cover;
   background-position: center;
   height: 250px; width: 250px;
   border: 1px solid #bbb;
}
.jumbotron{
  position: relative;
}
</style>

 
<!-- Jumbotron -->
<!-- <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <marquee behavior="scroll" scrollamount="6" onmouseover="this.stop();" onmouseout="this.start();" direction="left">
      <h1 class="display-4">Visi Misi  </h1>
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

            <h2>Visi Misi dan Sasaran</h2>
          </div>

        </div>

        <div class="row">


          <div class="col-md-6 mb-5 mb-md-0" data-aos="fade-up">
            <p>
              Jalan sebagai penghubung antar lokasi sentra-sentra ekonomi, pariwisata, industri dan sebagainya merupakan salah satu bagian terpenting dari prasarana yang harus diperhatikan, oleh karena itu perlu dilakukan percepatan pembangunan untuk mendorong pertumbuhan ekonomi secara signifikan. Akan tetapi banyak permasalahan yang dihadapi pemerintah pusat maupun daerah dalam melakukan percepatan pembangunan tersebut.
            </p>
          </div>
          <div class="col-md-6 mb-5 mb-md-0" data-aos="fade-up">
            <p><img src="{{url('assets/fitur/assets/img/foto rapat mei.jpg')}}" alt="Image" class="img-fluid">
          </div>
          <div class="col-md-6 mb-5 mb-md-0" data-aos="fade-up">
            <p><img src="{{url('assets/fitur/assets/img/forum LLAJ.jpeg')}}" alt="Image" class="img-fluid">
          </div>
          <div class="col-md-6 mb-5 mb-md-0" data-aos="fade-up">
            <p>
              Jalan sebagai penghubung antar lokasi sentra-sentra ekonomi, pariwisata, industri dan sebagainya merupakan salah satu bagian terpenting dari prasarana yang harus diperhatikan, oleh karena itu perlu dilakukan percepatan pembangunan untuk mendorong pertumbuhan ekonomi secara signifikan. Akan tetapi banyak permasalahan yang dihadapi pemerintah pusat maupun daerah dalam melakukan percepatan pembangunan tersebut.
            </p>
          </div>
          <div class="col-md-6 mb-5 mb-md-0" data-aos="fade-up">
            <p>
            Forum Lalu Lintas dan Angkutan Jalan sebagaimana disebutkan pada Peraturan Pemerintah Republik Indonesia Nomor 37 Tahun 2011 Tentang Forum Lalu Lintas Dan Angkutan Jalan adalah wahana koordinasi antar instansi penyelenggara lalu lintas dan angkutan jalan. Forum Lalu Lintas dan Angkutan Jalan berfungsi sebagai wahana untuk menyinergikan tugas pokok dan fungsi setiap penyelenggara lalu lintas dan angkutan jalan dalam penyelenggaraan lalu lintas dan angkutan jalan.
            Fungsi menyinergikan dimaksudkan untuk:
1. Menganalisis permasalahan;
2. Menjembatani, menemukan solusi, dan meningkatkan kualitas pelayanan. Salah satu upaya Pemerintah untuk mengatasi masalah tersebut adalah dengan mendorong Pemerintah Daerah untuk meningkatkan peran dalam pembangunan insfrastruktur jalan melalui Program Hibah Peningkatan Kinerja dan Pemeliharaan Jalan Provinsi (PRIM).
          </p>
          </div>
          <div class="col-md-6 mb-5 mb-md-0" data-aos="fade-up">
           <p> <img src="{{url('assets/fitur/assets/img/laju.jpeg')}}" alt="Image" class="img-fluid">
          </div>
          </h2>
          </div>

        </div>
      </div>
    </section>
</body>

</html>
@endsection

@push('scripts')
<script>

document.getElementById('pengaduan').addEventListener('change', readURL, true);
function readURL(){
   var file = document.getElementById("pengaduan").files[0];
   var reader = new FileReader();
   reader.onloadend = function(){
      document.getElementById('idpengaduan').style.backgroundImage = "url(" + reader.result + ")";        
   }
   if(file){
      reader.readAsDataURL(file);
    }else{
    }
}
</script>
</script>
@endpush