@extends('layouts/template')
@section('content')

<div class="jumbotron bg-cover text-white" style="background-image: linear-gradient(to bottom, rgba(0,0,0,0.6) 0%,rgba(0,0,0,0.6) 100%), url(/img/about/faq.png); padding: 120px; width: 100%;">
    <div class="container">
        <h1 class="display-7">Ruang Pertanyaan</h1>
        <!-- <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to
            featured content or information.</p> -->
    </div>
</div>
<div class="container">
    <div class="row profile-p">
        <div class="col-md-9">
            <article>
                <p>
                    {{-- <h3 class="fw-bold pt-1 judul-header2">Pertanyaan Seputar Digital Creative</h3> --}}
                    <div class="accordion accordion-flush" id="accordionCreative">
                        @foreach ($faqs as $index => $faq)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="creative-heading-{{ $index }}">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#creative-collapse-{{ $index }}"
                                        aria-expanded="false"
                                        aria-controls="creative-collapse-{{ $index }}">
                                        {{ $faq['pertanyaan'] }}
                                    </button>
                                </h2>
                                <div id="creative-collapse-{{ $index }}"
                                    class="accordion-collapse collapse"
                                    aria-labelledby="creative-heading-{{ $index }}"
                                    data-bs-parent="#accordionCreative">
                                    <div class="accordion-body">
                                        {!! $faq['jawaban'] !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

            </article>
        </div>
        <div class="col-md-3">
            <div class="container">
                <hr class="line1">
                <span class="text-uppercase judul-aside">social</span>
                <br>
                <div class="social pb-3">
                    <div class="row pt-4 icon-aside">
                        @foreach ($social as $s)
                        <a href={{$s->url}} class="nav-link"><img src={{$s->icon}} width="40" height="40" /></a>&nbsp;
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
