@php
$data = App\Models\Category::get();
@endphp

<nav class="navbar navbar-expand-lg bg-light sticky-top">
    <div class="container">
        <a class="navbar-brand" href="#">
        	<img src="/img/navbrand.png" alt="" width="250px">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ ($title === "Jasa Akrilik dan Neon Box - Purbalingga" ) ? 'active text-danger' : '' }}"href="/">Beranda</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Tentang
                    </a>
                    <ul class="dropdown-menu isi-dropdown" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item  {{ ($title === "PROFIL" ) ? 'active bg-dark' : '' }}" href="/profile">Profil</a></li>
                        {{-- <li><a class="dropdown-item  {{ ($title === "TIM" ) ? 'active bg-dark' : '' }}" href="/team">Tim</a></li> --}}
                        <li><a class="dropdown-item  {{ ($title === "FASE KERJA" ) ? 'active bg-dark' : '' }}" href="/work-phase">Fase Kerja</a></li>
                        <li><a class="dropdown-item  {{ ($title === "LINGKUP PEKERJAAN" ) ? 'active bg-dark' : '' }}" href="/scope-of-work">Lingkup Pekerjaan</a></li>
                        <li><a class="dropdown-item  {{ ($title === "RUANG PERTANYAAN" ) ? 'active bg-dark' : '' }}" href="/faq">Ruang Pertanyaan</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    {{-- <a class="nav-link {{ ($title === "PRODUK" ) ? 'active text-danger' : '' }}" href="/product">Produk</a> --}}
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        PRODUK
                    </a>
                    <ul class="dropdown-menu isi-dropdown" aria-labelledby="navbarDropdown">
                        @foreach ($data as $d)
                        <li><a class="dropdown-item  {{ ($title === "" ) ? 'active bg-dark' : '' }}" href="/product/category/{{$d->nama}}">{{$d->nama}}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($title === "LAYANAN" ) ? 'active text-danger' : '' }}" href="/services">Layanan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($title === "KONTAK" ) ? 'active text-danger' : '' }}" href="/talk">Kontak</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($title === "HASIL KERJA" ) ? 'active text-danger' : '' }}" href="/portfolio">Hasil Kerja</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="/blog"></a>
                </li> --}}
            </ul>
        </div>
    </div>
</nav>
