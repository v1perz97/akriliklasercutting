@extends ('layouts/template')
@section ('content')
<div class="jumbotron bg-cover text-white" style="background-image: linear-gradient(to bottom, rgba(0,0,0,0.6) 0%,rgba(0,0,0,0.6) 100%), url(/img/services/service.png); padding: 120px; width: 100%;">
    <div class="container">
      <h1 class="display-7">{{ $services->judul_service }} </h1>
    </div>
</div>
<div class="container">
    <div class="row profile-p">
        <div class="col-md-8 pt-2">
            <article>
                <img src={{ $services->gambar }} class="card-img-top" alt="" style="min-width: 100%; max-height: 580px;">
            </article>
            <article class="pt-3">
                <!-- <p>Jasa Pembuatan Website Profesional, merupakan jasa bikin website yang terbaik berbasis di kota
                    Banyumas, Jawa Tengah.
                    Mekar Laser Cutting Digital melayani pembuatan website untuk semua kalangan, semua instansi dan
                    semua usaha tanpa kecuali. Kami juga telah berpengalaman membuat ratusan website untuk berbagai
                    usaha dan instansi. Kenapa Anda harus memiliki website sendiri? Hal yang harus tertanam dalam
                    pikiran Anda adalah, website itu merupakan sebuah investasi dan aset. Ibarat ruko, ya website itu
                    merupakan sebuah ruko dalam dunia maya. Berikut ini akan kami jabarkan mengapa anda butuh website
                    untuk pengembangan usaha.</p> -->
                <p>{{ $services->kutipan }}</p>
            </article>
            <article>
                <h3 class="mt-5">{{ $services->judul_service }}</h3>
                <p>{!! $services->deskripsi !!}</p>
                <!-- <p>Website dengan domain berbayar dapat meningkatkan kepercayaan konsumen dan calon konsumen. Bayangkan
                    apabila Anda seorang pengusaha yang memiliki produk bagus namun dalam praktek digital marketing
                    hanya menggunakan blog gratisan seperti blogspot, apa kata dunia? Bahkan seorang blogger pemula
                    sekarang ini sudah menggunakan website dengan domain yang berbayar. Nah, maka dari itu sangat
                    penting bagi Anda yang bahkan seorang penguasaha pemula memulai bisnis dengan menggunakan domain
                    premium yang akan jasa pembuatan website Purwokerto urus semuanya.</p>
                <p>Website dapat menyampaikan informasi dalam waktu cepat, serta mempresentasikan jenis usaha Anda
                    kepada calon konsumen secara mendalam dan lebih detail. Anda dapat memberikan informasi melalui
                    dokumen, gambar dan video yang bebas anda taruh dalam halaman website. Sehingga calon konsumen cepat
                    untuk mendapatkan informasi apa yang mereka butuhkan hanya dengan mengunjungi website Anda.</p>
                <ol>
                    <li>Menyampaikan Informasi Dalam Waktu Cepat</li>
                    <li>Mempresentasikan Usaha Secara Mendalam dan Detail</li>
                    <li>Mempromosikan Usaha Yang Dijalankan</li>
                    <li>Mempermudah Transaksi dan Otomatisasi Bisnis</li>
                    <li>Membangun Komunikasi dan Interaksi</li>
                </ol> -->
            </article>
        </div>
        <div class="col-md-4 p-3">
            <div class="container">
                <div class="p-md-4 p-3 form-talk"
                                            style="background-color: #f8f8f8;border-color: #dddddd;border-style: solid;border-width: 1px;border-radius: 2px;">

                                            <div id="contact">
                                                <div class="container">
                                                  <h3>Pesan melalui:</h3>
                                                    <div class="col contact-info">
                                                        <div>
                                                            @foreach ($contact as $con)
                                                            <div class="icon" style="margin-top: 10px;">
                                                                <img src={{$con->icon}} style="width: 40px;" /><br />
                                                                <b style="margin-top: 10px;">{{$con->name}}</b>
                                                                {{$con->deskripsi}}
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
              <a href="/services" class="btn btn-secondary mt-3">Kembali ke Layanan</a>
            </div>
        </div>
    </div>
</div>

@stop
