@extends('layouts.template')
@section('content')

<div class="jumbotron bg-cover text-white" style="background-image: linear-gradient(to bottom, rgba(0,0,0,0.6) 0%,rgba(0,0,0,0.6) 100%), url(/img/about/profile.jpg); padding: 120px; width: 100%;">
    <div class="container">
        <h1 class="display-7">Profil</h1>
        <!-- <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to
            featured content or information.</p> -->
    </div>
</div>
<div class="container">
    <!--<div class="profile-p"> -->
    {{-- <article class="article-1 article">
        <p> <b>CV. Mekar Cutting Digital</b> adalah perusahaan Advertising dan Digital Marketing yang berbasis di
            kota Purbalingga.
            <b>CV. Mekar Cutting Digital</b> sudah berpengalaman dan memiliki ratusan portfolio dalam bidang
            periklanan, promosi dan branding
            selama lebih dari 5 tahun. Spesialis Jasa Pembuatan Reklame Huruf Timbul, Neon Box, Baliho dan Branding
            instansi yang selalu mengutamakan
            kualitas dan mengedepankan sikap profesional dalam bekerja serta berkomitmen memberikan harga yang realistis bagi
            klien. Selain produksi Reklame, <b>CV. Mekar Cutting Digital</b> juga melayani kebutuhan Digital
            Marketing sebagai solusi pemasaran digital. Kami menawarkan beberapa macam kebutuhan akan jasa digital
            marketing antara lain, pembuatan website, optimasi website, audit dan analisa website / social media,
            pengelolaan social media, foto produk, pembuatan logo, personal / politik branding.
        </p>
    </article>
    <article class="article-2">
        <p>
        <h3 class="fw-bold">Dukungan Mesin dan Tenaga Ahli</h3>
        </p>
        <p class="article">Perusahaan kami didukung oleh mesin cutting laser dan mesin bending dengan teknologi modern, tenaga ahli
            yang berpengalaman dan material yang berkualitas yang menjadikan kami unggul dalam segi harga, kualitas
            dan kuantitas produksi.</p>
    </article>
    <article class="article-3">
        <p>
        <h3 class="fw-bold">Service Area</h3>
        </p>
        <p class="article">Kami melayani order pengerjaan huruf timbul maupun cutting laser dan segala bentuk kebutuhan produk
            selain reklame. Area service kami adalah seluruh daerah di Negara Kesatuan Republik Indonesia, khususnya
            daerah Jawa Tengah, Banyumas, Purwokerto, dan Purbalingga.</p>
    </article>
    <article class="article-4">

      <p><h3 class="fw-bold">Visi & Misi Mekar Cutting Digital</h3></p>
        <div class="row justify-content-center">
          <div class="col-sm-4">
            <div class="card h-100 shadow">
              <div class="card-body">
                <h5 class="card-title text-center">VISI</h5>
                <p class="card-text">Menjadi perusahaan dalam bidang Costum Creative yang terbaik dengan mengedepankan semangat kreatif dan
                        inovatif</p>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="card h-100 shadow">
              <div class="card-body">
                <h5 class="card-title text-center">MISI</h5>
                <p class="card-text">
                  <ol>
                      <li>Memberikan pelayanan yang terbaik kepada konsumen dalam bidang Costum Creative</li>
                      <li>Menjadikan semangat kreatif dan inovatif menjadi modal dasar untuk selalu bisa berkembang</li>
                      <li>Menghasilkan produk produk yang inovatif yang sesuai dan bermanfaat bagi masyarakat</li>
                      <li>Menciptakan suasana yang baik dalam bekerja, sebagai kebanggaan dalam bekerja.</li>
                      <li>Memberikan kontribusi dan peningkatan nilai bagi masyarakat sekitar </li>
                  </ol>
                </p>
              </div>
            </div>
          </div>
        </div>
    </article>
    <article class="article-5 pt-2">
        <p>
        <h3 class="fw-bold">Aktivitas Desain Komunikasi Visual/ Desain Grafis</h3>
        </p>
        <p class="article">Kelompok ini mencakup kegiatan penyediaan jasa desain komunikasi visual/desain grafis secara manual
            maupun digital, serta statis (tidak bergerak) maupun dinamis (bergerak, interaktif), pada media cetak,
            layar (gawai, tv, komputer, layar LED dan sejenisnya), luring, daring atau virtual, yang berhubungan
            dengan pembuatan materi dengan fungsi identifikasi, informasi dan persuasi yang diimplementasikan pada
            identitas jenama (brand), logo, desain iklan, infografik, dan stasioneri.</p>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col" data-aos="fade-right" data-aos-duration="1000">
                    <div class="h-100 border-0">
                        <img src="/img/profil/desain1.jpeg" class="card-img-top" id="img-profil-desain" alt="...">
                    </div>
                </div>
                <div class="col" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="100">
                    <div class="h-100 border-0">
                        <img src="/img/profil/desain2.png" class="card-img-top" id="img-profil-desain" alt="...">
                    </div>
                </div>
                <div class="col" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="250">
                    <div class="h-100 border-0">
                        <img src="/img/profil/desain3.jpg" class="card-img-top" id="img-profil-desain" alt="...">
                    </div>
                </div>
			</div>
        </article>
    	<article class="article-6 pt-2">
        <p>
        <h3 class="fw-bold">Aktivitas Konsultasi dan Perancangan Internet of Things (IoT)</h3>
        </p>
        <p class="article">Kelompok ini mencakup kegiatan layanan konsultasi, perancangan dan pembuatan solusi sistem terintegrasi
            berdasarkan pesanan (bukan siap pakai) dengan cara memodifikasi perangkat keras (hardware) yang sudah
            ada, seperti sensor, microcontroller, dan perangkat keras (hardware) lainnya. Modifikasi tersebut
            dilakukan pada perangkat keras (hardware) IoT dan/atau perangkat lunak (software) yang tertanam
            didalamnya. Kelompok ini tidak mencakup aktivitas manufaktur chip (26120) dan aktivitas
            penerbitan/pengembangan perangkat lunak IoT (58200 dan 62019).</p>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col" data-aos="fade-right" data-aos-duration="1000">
                    <div class="h-100 border-0">
                        <img src="/img/profil/iot1.jpeg" class="card-img-top" id="img-profil" alt="...">
                    </div>
                </div>
                <div class="col" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="100">
                    <div class="h-100 border-0">
                        <img src="/img/profil/iot2.jpeg" class="card-img-top" id="img-profil" alt="...">
                    </div>
                </div>
                <div class="col" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="250">
                    <div class="h-100 border-0">
                        <img src="/img/profil/iot3.jpeg" class="card-img-top" id="img-profil" alt="...">
                    </div>
                </div>
            </div>
            =============================================================================== --}}
                {!! $profil->deskripsi !!}
        </div>
        </article>

<!--</div>-->
</div>


@stop
