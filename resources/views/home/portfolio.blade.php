@extends('layouts/template')
@section('content')
<div style="border-top: 10px solid black;"></div>
<div class="container">
    <div class="col-md-12 mt-4">
        <form class="d-flex" action="/portfolio" id="search" role="search">
            <input class="form-control me-2" name="search" type="search" value="{{ request('search') }}" placeholder="Search" aria-label="Search">
            <button class="btn btn-dark" type="submit"><i class="fa fa-search"></i></button>
            <a href="/portfolio" type="button" onClick="refreshPage()" class="btn btn-primary ms-2">
                <i class="fa-solid fa-rotate"></i>
            </a>
        </form>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4 mt-4">
        @forelse ($portfolio as $item)
            <div class="col">
                <div class="card bg-black text-white border-0 h-100" data-aos="fade-down" data-aos-duration="1000">
                    <a href="/portfolio/{{ $item->slug }}">
                        <img src={{ $item->gambar }}
     class="card-img-top"
     style="height: 250px; object-fit: cover; width: 100%;"
     alt="{{ $item->judul_portfolio }}">

                    </a>
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->judul_portfolio }}</h5>
                        {{-- <p class="card-text text-uppercase small text-muted">{{ $item->nama_kategori }}</p> --}}
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center text-white">
                <p>Hasil tidak ditemukan untuk pencarian "{{ request('search') }}".</p>
            </div>
        @endforelse
    </div>
</div>

<script>
    function refreshPage() {
        window.location.href = '/portfolio';
    }

    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.card').forEach(card => {
            const likeBtn = card.querySelector('.like-btn');
            const likeCountEl = card.querySelector('.like-count');
            const commentToggleBtn = card.querySelector('.comment-toggle-btn');
            const commentSection = card.querySelector('.comment-section');
            const commentSubmitBtn = card.querySelector('.comment-submit-btn');
            const commentInput = card.querySelector('.comment-input');
            const commentList = card.querySelector('.comment-list');
            const commentCountEl = card.querySelector('.comment-count');
            const shareBtn = card.querySelector('.share-btn');

            // Like toggle
            likeBtn?.addEventListener('click', (e) => {
                e.preventDefault();
                e.stopPropagation();
                let liked = likeBtn.classList.contains('btn-primary');
                likeBtn.classList.toggle('btn-primary', !liked);
                likeBtn.classList.toggle('btn-outline-primary', liked);
                let count = parseInt(likeCountEl.textContent);
                likeCountEl.textContent = liked ? count - 1 : count + 1;
            });

            // Comment toggle
            commentToggleBtn?.addEventListener('click', (e) => {
                e.preventDefault();
                e.stopPropagation();
                commentSection.style.display = commentSection.style.display === 'block' ? 'none' : 'block';
            });

            // Comment submit
            commentSubmitBtn?.addEventListener('click', () => {
                const text = commentInput.value.trim();
                if (!text) return;
                const newComment = document.createElement('li');
                newComment.className = 'list-group-item bg-secondary bg-opacity-25 text-white';
                newComment.textContent = text;
                commentList.appendChild(newComment);
                commentInput.value = '';
                commentCountEl.textContent = parseInt(commentCountEl.textContent) + 1;
            });

            // Share button
            shareBtn?.addEventListener('click', (e) => {
                e.preventDefault();
                e.stopPropagation();
                alert('Tombol Share diklik! Tambahkan fungsi share di sini.');
            });
        });
    });
</script>

@stop
