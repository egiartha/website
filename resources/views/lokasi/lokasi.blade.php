@extends('layouts.layout')
@section('content') 
<style>
</style>
<title>Kontak Kami | Layanan Pengaduan Mayarakat</title>
<!-- Jumbotron -->
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <div id="runningtext">
        <marquee behavior="scroll" scrollamount="6" onmouseover="this.stop();" onmouseout="this.start();" direction="left">

            <h2 class="display-4">Informasi Dinas Perhubungan Kabupaten Sambas</h2>
            </marquee>   
    </div>
   
    <font color="Informasi dan Kontak Dishub Sambas_black">
      <a href="/lapor" class="btn btn-primary lapor">Informasi dan Kontak Dishub Sambas<a/>
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

          
          </div>

        </div>

        <div class="row">

        
        <div class="col-md-6 ml-auto order-2" data-aos="fade-left">
            <img src="{{url('assets/fitur/assets/img/undraw_svg_4.svg')}}" alt="Image" class="img-fluid">
        </div>

        </div>
      </div>
        
            
            <div id="isi">
                <div class="isipostingall">
                <h2> <font color="red">Kontak Kami</font><br> </h2><br>
                
                <table class="table">
                    <tr>
                        <td> Nama Lengkap </td>
                        <td> : Erfan Fa'i Sutekno </td>
                    </tr>
                    <tr>
                        <td> Jenis Kelamin </td>
                        <td> : Laki-laki </td>
                    </tr>
                    <tr>
                        <td> Agama </td>
                        <td> : Islam </td>
                    </tr>
                    <tr>
                        <td> Tempat/Tanggal Lahir </td>
                        <td> : Batam/25 Januari 1997 </td>
                    </tr>
                    <tr>
                        <td> Alamat </td>
                        <td> : Tiban Lama RT02 RW12 </td>
                    </tr>
                    <tr>
                        <td> Universitas </td>
                        <td> : Universitas Batam </td>
                    </tr>
                    <tr>
                        <td> NPM </td>
                        <td> : 15115005 </td>
                    </tr>
                    <tr>
                        <td> Fakultas </td>
                        <td> : Teknik </td>
                    </tr>
                    <tr>
                        <td> Program Studi </td>
                        <td> : Sistem Informasi (S1) </td>
                    </tr>
                    <tr>
                        <td> Angkatan </td>
                        <td> : 2015 </td>
                    </tr>
                    <tr>
                        <td> Moto Hidup </td>
                        <td> : Looking Forward! Never Give Up! </td>
                    </tr>
                </table>
                </div>
            </div>
           
    </body>
    </html>
         

        </div>
      </div>
    </section>
</body>

</html>
  </div>
</div>
<!-- akhir Jumbotron -->
@endsection
