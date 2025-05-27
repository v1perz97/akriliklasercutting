@extends('layouts/template')
@section('content')

<!-- <div class="jumbotron bg-cover text-white" style="background-image: linear-gradient(to bottom, rgba(0,0,0,0.6) 0%,rgba(0,0,0,0.6) 100%), url(/img/services/service.png); padding: 120px; width: 100%;">
    <div class="container">
        <h1 class="display-7">Layanan</h1>
    </div>
</div> -->

<!-- <div>
    <img src="/img/1.jpg" alt="" style="width: 100%; max-height: 300px;">
</div> -->
<div  style="border-top: 10px solid black;"></div>
<div class="container">
    <div class="my-5 text-center">
        <h1 class="fw-bold">Layanan</h1>
        <p class="text-muted">Layanan profesional hasil terbaik</p>
    </div>
    <div class="pt-3">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach ($services as $services)
                    <div class="col" data-aos="fade-down" data-aos-duration="1000">
                        <div class="h-100 border-0">
                            <img src={{$services->gambar}} class="card-img-top" id="gambar" alt="...">
                            <div class="card-body mt-3">
                                <h5 class="card-title">{{ $services->judul_service }}</h5>
                                <p class="card-text">{{ \Illuminate\Support\Str::limit($services->kutipan, 60, '...') }}</p>
                              	<a href="/services/{{ $services->slug }}" class="btn btn-dark" id="button">Lebih lanjut</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
          </div>
        </div>
</div>

@stop
