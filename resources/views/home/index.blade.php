@extends('layouts.template')
@section('content')

<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div id="carousel-gambar">
                <img src="/img/carousel/4.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <div class="carousel-item">
            <div id="carousel-gambar">
                <img src="/img/carousel/5.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <div class="carousel-item">
            <div id="carousel-gambar">
                <img src="/img/carousel/6.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<div class="container py-5">
    <article>
        <div id="judul" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="300">
            <h1>Tentang Akrilik Laser Cutting</h1>
        </div>
        <div class="py-3 article" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="300">
            {!! Str::before($profil['deskripsi'], '</p>') . '</p>' !!}
        </div>
    </article>
    <article>
        <div id="judul" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="300">
            <h3 class="headline">Layanan</h3>
            <p>Layanan terbaik di Purbalingga</p>
        </div>
        <div class="py-3 text-justify" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="300">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach ($services as $services)
                <div class="col card">
                    <div class="h-100 border-0">
                        <img src="{{ $services->gambar }}" class="card-img-top" id="gambar" alt="...">
                        <div class="card-body mt-3">
                            <h5 class="card-title">{{ $services->judul_service }}</h5>
                            <p class="card-text">{!! \Illuminate\Support\Str::limit($services->deskripsi, 60, '...') !!}</p>
                            <a href="/services/{{ $services->slug }}" class="btn btn-dark" id="button">Lebih lanjut</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </article>
</div>
<div class="bg-light">
    <article data-aos="fade-down" data-aos-duration="1000" data-aos-delay="300">
        <div id="judul">
            <h3 class="headline">Hasil Kerja</h3>
            <p>Baca tentang proyek terbaru kami</p>
        </div>
        <div class="py-5 container text-justify">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @if ($portfolio)
                @foreach ($portfolio as $p)
                <div class="col-md-4">
                    <div class="card bg-black text-white border-0 h-100 image-box1 position-relative equal-box" style="height: 250px; object-fit: cover; width: 100%;">
                        <img src="{{ $p->gambar }}" alt="Foto Bali">

                        <div class="overlay overlay-1 d-flex flex-column justify-content-center align-items-center text-white text-center">
                            <div class="overlayinn1">
                                <h2>{{ $p->judul_portfolio }}</h2>
                                {{-- <p>Huruf Timbul</p> --}}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <p>Baca tentang proyek terbaru kami</p>
                @endif

            </div>
        </div>

    </article>
    <article>
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
            <div class="carousel-inner penawaran">
                <div class="carousel-item active">
                    <img src="/img/carousel/2.jpg" class="d-block w-100" alt="..." style="height: 610px;">
                    <div class="carousel-caption d-md-block">
                        <div class="text-dark" style=" margin-bottom: 170px; font-weight:1000;">
                            <h1 class="shadow"><span class="badge bg-dark text-white">Mekar Laser Cutting Digital</span>
                            </h1>
                            <p>- Saatnya mengembangkan bisnis dengan tim yang tepat -</p>
                            <a href="telp:+6285728060268" type="button" class="btn-penawaran">Dapatkan Penawaran</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>

    {{-- <div class="bg-light mt-3">
        <article data-aos="fade-down" data-aos-duration="1000" data-aos-delay="300">
            <div id="judul">
                <h3 class="headline">Galeri</h3>
                <p>Kegitan kami</p>
            </div>
            <div class="container">
                <div class="row row-cols-1 row-cols-md-3 g-4 py-5">
                    <div class="col">
                        <div class="h-100 border-0">
                            <img src="/img/insight1.jpg" class="card-img-top" id="gambar" alt="...">
                            <div class="card-body mt-3">
                                <h5 class="card-title">Pengelasan kerangka Neon Box</h5>
                                <p class="card-text">Ini adalah kegiatan proses pengelasan kerangka untuk neon box
                                    sebelum
                                    dipasang neon box tersebut.</p>
                                <a href="#" class="btn btn-dark" id="button">Lebih lanjut</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="h-100 border-0">
                            <img src="/img/insight2.jpg" class="card-img-top" id="gambar" alt="...">
                            <div class="card-body mt-3">
                                <h5 class="card-title">Pemasangan desain Neon Box</h5>
                                <p class="card-text">Ini adalah kegiatan pemasangan neon box sebelum di satukan dengan
                                    kerangka neon box</p>
                                <a href="#" class="btn btn-dark" id="button">Lebih lanjut</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="h-100 border-0">
                            <img src="/img/insight3.jpg" class="card-img-top" id="gambar" alt="...">
                            <div class="card-body mt-3">
                                <h5 class="card-title">Pemasangan Huruf Timbul</h5>
                                <p class="card-text">Ini adalah kegiatan pemasangan tulisan timbul. Di gambar tersebut
                                    adalah contoh kegiatan pemasangan tulisan timbul untuk penamaan suatu ruangan.</p>
                                <a href="#" class="btn btn-dark" id="button">Lebih lanjut</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </div> --}}
</div>
<div class="container py-3">
    <article>
        <div id="judul" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="300">
            <h3 class="headline">Our Online Shop</h3>
            {{-- <p>Alasan untuk memilih kami</p> --}}
        </div>
        <div class="py-5 article" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="300">
            <div class="container">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    @foreach ($sosmed as $s)
                        <div class="col">
                            <a href="{{ $s->url }}" target="_blank" class="text-decoration-none text-dark">
                                <div class="card h-100 shadow-sm border-0 hover-shadow">
                                    <div class="card-body d-flex align-items-center">
                                        <img src="{{ $s->icon }}" alt="{{ $s->name }} Logo" class="me-3 rounded" width="40" height="40">
                                        <div>
                                            <h5 class="card-title mb-0">{{ $s->name }}</h5>
                                            @if($s->url)
                                                <small class="text-muted">{{ $s->url }}</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </article>
</div>

<div class="bg-light mb-5">
    <div class="justify-content-center align-items-center">
        <center>
            <img src="/img/community.png" alt="" style="width: 150px;" class="py-5">
        </center>
    </div>
</div>
@stop
