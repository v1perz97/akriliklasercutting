@extends('layouts.template')
@section('content')

<div style="border-top: 10px solid black;"></div>

<section class="py-5 bg-light">
    <div class="container">
        <div class="mb-5 text-center">
            <h1 class="fw-bold">Kontak</h1>
            <p class="text-muted">Hubungi kami melalui informasi berikut</p>
        </div>

        <div class="row g-4">
            @foreach ($contact as $con)
                <div class="col-12 col-md-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body d-flex align-items-start gap-3">
                            <div class="flex-shrink-0">
                                <div class="icon-wrapper d-flex align-items-center justify-content-center rounded-circle bg-primary bg-opacity-10" style="width: 60px; height: 60px;">
                                    <img src="{{ $con->icon }}" alt="icon" class="img-fluid" style="width: 30px; height: 30px; object-fit: contain;">
                                </div>
                            </div>
                            <div>
                                <h5 class="card-title mb-1">{{ $con->name }}</h5>
                                <p class="card-text text-muted small">{!! $con->deskripsi !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@stop
