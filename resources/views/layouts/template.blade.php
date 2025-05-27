<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  	<!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-PBWQWTS');</script>
    <!-- End Google Tag Manager -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-VVFZ7ZGY01"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-VVFZ7ZGY01');
  </script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="_fgc5AaqtqXnBl3p3kAfgF9RzNTtt3ih8cRr7VJXSHc" />
    <title>{{ $title }} | MEKAR LASER CUTTING DIGITAL</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/fontawesome/css/all.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="icon" href="/img/icon.png">

</head>

<body>
  	<!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PBWQWTS"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    @include('layouts.navbar')
    @yield('content')

    <footer class="bd-footer py-2 py-md-3 mt-3 bg-light">
        <div class="container py-2 py-md-3 px-4 px-md-3">
            <div class="row">
                <div class="col-lg-3 mb-3 text-dark">
                    <h5>Mekar Laser <span class="badge bg-dark text-white">Cutting Digital</span></h5>
                    <p>Dunia terus bergerak, Kami percaya bahwa perubahan dalam bisnis adalah satu hal yang niscaya.
                        Mekar Laser hadir untuk menjadi Solusi.</p>
                </div>
                <div class="col-12 col-lg-3 mb-3">
                    <hr class="line">
                    <h5>LAYANAN</h5>
                    <ul class="list-unstyled style-a">
                        <li class="mb-2 mt-3">
                            <div id="services">Memuat..</div>
                            {{-- Pembuatan Website --}}
                        </li>
                        <hr>
                    </ul>
                </div>
                <div class="col-12 col-lg-3 mb-3 text-dark">
                    <hr class="line">
                    <h5>LINK BERMANFAAT</h5>
                    <ul class="list-unstyled style-a">
                        <li class="mb-2"><a href="/portfolio" class="nav-link">Hasil Kerja</a></li>
                        <li class="mb-2"><a href="/profile" class="nav-link">Tentang Kami</a></li>
                        <li class="mb-2"><a href="/workphase" class="nav-link">Bagaimana cara pesan?</a></li>
                        <li class="mb-2"><a href="/faq" class="nav-link">Ruang Pertanyaan</a></li>
                        <li class="mb-2"><a href="/privacy-policy" class="nav-link">Kebijakan dan Privacy</a></li>
                        <li class="mb-2"><a href="/terms-condition" class="nav-link">Syarat kondisi</a></li>
                    </ul>
                </div>
                <div class="col-12 col-lg-3 mb-3 text-dark">
                    <hr class="line">
                    <h5>Mitra</h5>
                    <ul class="list-unstyled style-a">
                        <li class="mb-2"><a href="#" class="nav-link">Bima Helm</a></li>
                        <li class="mb-2"><a href="#" class="nav-link">Softdev Community</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <footer class="m-3 text-center">
        <strong>Copyright &copy {{ now()->format('Y') }} by CV. Mekar Cutting Digital</strong>
    </footer>

    <script src="/bootstrap/js/bootstrap.bundle.min.js"></script>
    <a class="whatsapp" href="https://wa.me/6285728060268" target="_blank" title="Whatsapp"><i class="fa-brands fa-whatsapp"></i></a>
    <button onclick="topFunction()" class="back-to-top" id="myBtn" title="Go to top"><i class="fa fa-arrow-up"></i></button>

    <!-- scroll top button -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

    <script>
        //Get the button:
        mybutton = document.getElementById("myBtn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        }


        // Ambil data dari API
        fetch('/api/get-services')
            .then(response => response.json())
            .then(data => {
                const layanan = document.getElementById('services');
                layanan.innerHTML = ''; // Kosongkan dulu

                data.forEach(layanan => {
                    const layananDiv = document.createElement('div');
                    layananDiv.className = 'layanan';
                    layananDiv.innerHTML = `
                        ${layanan.judul_service}<br>
                    `;
                    services.appendChild(layananDiv);
                });
            })
            .catch(error => {
                document.getElementById('services').innerText = 'Gagal mengambil data.';
                console.error('Terjadi kesalahan:', error);
            });
    </script>
    <script src="/javascript/animation.js"></script>
    <script src="/javascript/search.js"></script>
    <script>
        AOS.init({
            once: false
        });
    </script>

</body>

</html>
