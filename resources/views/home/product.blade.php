@extends('layouts.template')
@section ('content')

<!--<div class="jumbotron bg-cover text-white"
    style="background-image: linear-gradient(to bottom, rgba(0,0,0,0.6) 0%,rgba(0,0,0,0.6) 100%), url(/img/product/product.jpg); padding: 120px; width: 100%;">
    <div class="container">
        <h1 class="display-7">Produk</h1>
    </div>
</div> -->
<div  style="border-top: 10px solid black;"></div>
<div class="container">
    <div class="pt-3">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach ($products as $products)
                    <div class="col" data-aos="fade-down" data-aos-duration="1000">
                        <div class="h-100 border-0">
                            <img src={{$products->gambar}} class="card-img-top" id="gambar" alt="...">
                            <div class="card-body mt-3">
                                <h5 class="card-title">{{ $products->nama_produk }}</h5>
                                <p class="card-text">{!! \Illuminate\Support\Str::limit($products->deskripsi, 60, '...') !!}</p>
                              	<a href="/products/{{ $products->slug }}" class="btn btn-dark" id="button">Lebih lanjut</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
          </div>
        </div>
</div>
{{-- <div class="container">
    <div class="row isi-header">
        <!-- <div class="col-md-6">
            <img src="/img/product/GP.png" class="header-produk pb-4" alt="GP">
        </div> -->
        <div class="col-md-12">
            <article class="artikel1">
                <h3 class="fw-bold">Informasi Produk</h3>
                <p>
                    Lembaran akrilik dari Akrilik Laser Cutting dibuat dari 100%
                    MMA murni (metil metrakrilat monomer) yang menjamin
                    produk akrilik yang dihasilkan memiliki kualitas tertinggi.
                    Bahan ini juga memastikan tingkat
                    kejernihan yang sangat baik, ketahanan terhadap cuaca dan
                    kekuatan tinggi. Laboratorium Penjamin
                    Pelaksana (Underwriters) telah memberikan produk sertifikasi
                    UL-94HB, yang merupakan ambang bakar
                    tertinggi untuk lembaran akrilik dengan transmisi cahaya
                    92%. Produk ini dapat dibentuk dalam
                    temperatur tinggi (thermoformed), dipotong, dibor,
                    dilengkungkan, diolah dengan mesin CNC, diukir,
                    diasah dan dilem.
                </p>
                <p>
                    Kualitas ASTARIGLAS® GP mengikuti standar-standar kualitas
                    yang ada di dunia yang menuntut kualitas
                    tinggi, memberikan karakteristik optis yang sangat baik,
                    stabilitas cahaya dan tingkat tekanan
                    internal yang rendah untuk performa yang konsisten.
                </p>
                <p>
                    ASTARIGLAS® GP tersedia dalam berbagai macam standar ukuran
                    dan ketebalan, bening maupun berwarna.
                </p>
            </article>
            <article class="artikel2">
                <h3 class="fw-bold">Karakteristik</h3>
                <p>
                    ASTARIGLAS® GP adalah bahan termoplastik yang ringan dan
                    kaku, dengan resistensi kerusakan (pecah)
                    yang lebih tinggi dibandingkan kaca biasa dan sangat tahan
                    kondisi cuaca. ASTARIGLAS® GP dapat
                    dengan mudah digergaji mesin, dibentuk dalam suhu tinggi dan
                    disemen, serta sedikit menyerap sinar
                    ultraviolet.
                </p>
            </article>
        </div>
    </div>
</div>
<div class="container">
    <h3 class="mt-5 varian-produk">Varian Produk</h3>
    <div class="background-produk daftar-produk">
        <ul class="nav nav-pills mb-3 justify-content-center align-items-center p-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-bening-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-bening" type="button" role="tab" aria-controls="pills-bening"
                    aria-selected="true">BENING</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-putih-tab" data-bs-toggle="pill" data-bs-target="#pills-putih"
                    type="button" role="tab" aria-controls="pills-putih" aria-selected="false">PUTIH SUSU DAN PUTIH
                    SOLID</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-transparan-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-transparan" type="button" role="tab" aria-controls="pills-transaparan"
                    aria-selected="false">WARNA TRANSPARAN</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-tinted-tab" data-bs-toggle="pill" data-bs-target="#pills-tinted"
                    type="button" role="tab" aria-controls="pills-tinted" aria-selected="false">WARNA TINTED</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-wsb-tab" data-bs-toggle="pill" data-bs-target="#pills-wsb"
                    type="button" role="tab" aria-controls="pills-wsb" aria-selected="false">WARNA SOLID DAN
                    BURAM</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-neon-tab" data-bs-toggle="pill" data-bs-target="#pills-neon"
                    type="button" role="tab" aria-controls="pills-neon" aria-selected="false">WARNA FLUORESCENT /
                    NEON</button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-bening" role="tabpanel" aria-labelledby="pills-bening-tab">
                <div class="container">
                    <div class="card mt-3 border-0 shadow-lg">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h4 class="fw-bold card-title">Bening</h4>
                                    <article>
                                        <p class="card-text">Lembaran kilap yang bening, tidak berwarna
                                            dan memiliki tingkat transparansi yang
                                            tinggi, yang memungkinkan untuk
                                            menghantarkan cahaya hingga 92%. Kualitas
                                            lain yang juga terdapat pada acrylic kami
                                            adalah ketahanan terhadap kondisi cuaca dan
                                            ketahanan terhadap keretakan. Menjadikan
                                            Astariglas® pilihan yang tepat bagi para
                                            pengguna produk acrylic yang membutuhkan
                                            bahan/materi tembus pandang, seperti
                                            akuarim, peredam suara, dan pembatas
                                            keamanan untuk teller di bank.</p>
                                        <hr>
                                        <p class="card-text">Tersedia dalam ketebalan : 1.5mm - 24mm</p>
                                        <hr>
                                        <p class="card-text">Tersedia dalam ukuran : 920mm x 1830mm hingga 2050mm x
                                            3050mm (terdapat
                                            15
                                            ukuran
                                            berbeda).</p>
                                        <hr>
                                        <p class="card-text mb-4">Tersedia dalam jenis masking : kertas dan film</p>
                                    </article>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <img src="img/product/bening.jpg"
                                    class="img-thumbnail rounded mx-auto d-block mt-3 mb-4" alt="Akrilik Bening">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-putih" role="tabpanel" aria-labelledby="pills-putih-tab">
                <div class="container">
                    <div class="card mt-3 border-0 shadow-lg">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h4 class="fw-bold card-title">Putih Susu dan Putih Solid</h4>
                                    <article>
                                        <p class="card-text">Lembaran kilap dalam warna putih susu dan putih solid
                                            memiliki efek penyebaran cahaya, memberikan berbagai macam pilihan tingkat
                                            kepadatan warna. Penggunaan terbesar produk acrylic ini yaitu untuk papan
                                            reklame, dan sering digunakan bersama huruf-huruf berbahan vinyl.</p>
                                        <hr>
                                        <p class="card-text">Tersedia dalam ketebalan : 2mm hingga 20mm</p>
                                        <hr>
                                        <p class="card-text">Tersedia dalam ukuran : 1220mm x 1830mm hingga 2050mm x
                                            3050mm (terdapat 7 ukuran berbeda).</p>
                                        <hr>
                                        <p class="card-text">Tersedia dalam jenis masking : kertas dan film</p>
                                        <hr>
                                        <p class="card-text mb-4">Warna yang tersedia : variant warna untuk opals dan
                                            whites dengan tingkat hantaran cahaya yang berbeda</p>
                                    </article>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <img src="img/product/putih.jpg" class="img-thumbnail rounded mx-auto d-block mt-3 mb-4"
                                    alt="Akrilik Putih">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-transparan" role="tabpanel" aria-labelledby="pills-transparan-tab">
                <div class="container">
                    <div class="card mt-3 border-0 shadow-lg">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h4 class="fw-bold card-title">Warna Transparan</h4>
                                    <article>
                                        <p class="card-text">Lembaran berwarna yang transparan dan mengkilap, memiliki
                                            tingkat tembus cahaya yang tinggi namun memiliki rentang warna yang
                                            mencolok. Sangat cocok untuk papan reklame, display toko, dan dekorasi
                                            arsitektural disamping banyak kegunaan lainnya.</p>
                                        <hr>
                                        <p class="card-text">Tersedia dalam ketebalan : 2mm hingga 6mm</p>
                                        <hr>
                                        <p class="card-text">Tersedia dalam ukuran : 1220mm x 1830mm, 1220mm x 2440mm,
                                            dan 2050mm x 3050mm</p>
                                        <hr>
                                        <p class="card-text">Tersedia dalam jenis masking : kertas dan film</p>
                                        <hr>
                                        <p class="card-text mb-4">Warna yang tersedia : Tersedia variant atraktif warna
                                            yang ada, seperti merah, kuning, hijau, biru, ungu, oranye, hijau
                                            transparan, dan lain-lain</p>
                                    </article>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <img src="img/product/transparan.jpg"
                                    class="img-thumbnail rounded mx-auto d-block mt-3 mb-4" alt="Akrilik Transparan">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-tinted" role="tabpanel" aria-labelledby="pills-tinted-tab">
                <div class="container">
                    <div class="card mt-3 border-0 shadow-lg">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h4 class="fw-bold card-title">Warna Tinted</h4>
                                    <article>
                                        <p class="card-text">Lembaran kilap berwarna tinted atau rayban dapat memberikan
                                            karakteristik penampilan yang mengkilap dengan kemampuan yang dapat
                                            menyaring cahaya. Sering digunakan untuk penutup jendela kendaraan dan
                                            produk lain seperti jendela kapal, dan penghalang cahaya matahari untuk
                                            menghindari silau.</p>
                                        <hr>
                                        <p class="card-text">Tersedia dalam ketebalan : 3mm x 6mm</p>
                                        <hr>
                                        <p class="card-text">Tersedia dalam ukuran : 1220mm x 1830mm, 1220mm x 2440mm,
                                            2050mm x 3050mm</p>
                                        <hr>
                                        <p class="card-text">Tersedia dalam jenis masking : kertas dan film</p>
                                        <hr>
                                        <p class="card-text mb-4">Warna yang tersedia : tersedia banyak variant warna
                                            untuk transparent abu-abu, dan warna perunggu</p>
                                    </article>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <img src="img/product/tinted.jpg"
                                    class="img-thumbnail rounded mx-auto d-block mt-3 mb-4" alt="Akrilik Transparan">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-wsb" role="tabpanel" aria-labelledby="pills-wsb-tab">
                <div class="container">
                    <div class="card mt-3 border-0 shadow-lg">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h4 class="fw-bold card-title">Warna Solid dan Buram</h4>
                                    <article>
                                        <p class="card-text">Lembaran kilap dalam warna-warna buram yang sangat menarik,
                                            dapat menyaring dan menyebarkan cahaya yang melewatinya. Manfaat tersebut
                                            membuatnya cocok untuk papan reklame, furniture, bilik pameran, display
                                            toko, iluminasi dan dekorasi arsitektural.</p>
                                        <p>Lembaran kilap dalam warna-warna solid yang tidak menembuskan cahaya sama
                                            sekali, namun tetap mempertahankan karakteristik permukaan kilap yang
                                            menarik. Sangat tepat untuk berbagai penggunaan yang tidak membutuhkan daya
                                            tembus cahaya.</p>
                                        <hr>
                                        <p class="card-text">Tersedia dalam ketebalan : 2mm hingga 6mm</p>
                                        <hr>
                                        <p class="card-text">Tersedia dalam ukuran : 1220mm x 1830mm, 1220mm x 2440mm,
                                            2050mm x 3050mm</p>
                                        <hr>
                                        <p class="card-text">Tersedia dalam jenis masking : kertas dan film</p>
                                        <hr>
                                        <p class="card-text mb-4">Warna yang tersedia : terdapat banyak varian warna
                                            yang indah, seperti merah, kuning, hijau, oranye, biru, ungu, coklat, hitam,
                                            dan lain-lain</p>
                                    </article>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <img src="img/product/wsb.jpg" class="img-thumbnail rounded mx-auto d-block mt-3 mb-4"
                                    alt="Akrilik Transparan">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-neon" role="tabpanel" aria-labelledby="pills-neon-tab">
                <div class="container">
                    <div class="card mt-3 border-0 shadow-lg">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h4 class="fw-bold card-title">Warna Fluorescent / Neon</h4>
                                    <article>
                                        <p class="card-text">Tampilan Fluorescent High Gloss yang jelas dan eye-catching
                                            langsung menarik perhatian karena bersinar di bawah cahaya sekitar. Ini
                                            adalah pilihan favorit untuk perlengkapan toko, pajangan tempat penjualan,
                                            dan aplikasi dalam ruangan lainnya.</p>
                                        <hr>
                                        <p class="card-text">Tersedia dalam ketebalan : 3mm hingga 6mm</p>
                                        <hr>
                                        <p class="card-text">Tersedia dalam ukuran : 1220mm x 2440mm & 2050mm x 3050mm
                                        </p>
                                        <hr>
                                        <p class="card-text">Tersedia dalam jenis masking : kertas dan film</p>
                                        <hr>
                                        <p class="card-text mb-4">Warna yang tersedia : warna fluorescent oranye, merah,
                                            pink dan hijau yang menonjol</p>
                                    </article>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <img src="img/product/neon.jpg" class="img-thumbnail rounded mx-auto d-block mt-3 mb-4"
                                    alt="Akrilik Transparan">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@stop
