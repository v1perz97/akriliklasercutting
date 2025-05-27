@extends('layouts.template')
@section('content')
<style>
  .portfolio-hero {
    background: linear-gradient(to right, #f8f9fa, #e9ecef);
    padding: 4rem 1rem;
  }
  .portfolio-img-wrapper {
    max-height: 450px;
    overflow: hidden;
    border-radius: .75rem;
  }
  .portfolio-img-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
</style>

<div class="portfolio-hero">
  <div class="container">
    <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
      <div class="row g-0 flex-column flex-md-row">
        {{-- Gambar --}}
        <div class="col-md-6 portfolio-img-wrapper">
          <img src="{{ $product->gambar }}" alt="{{ $product->nama_produk }}">
        </div>

        {{-- Deskripsi --}}
        <div class="col-md-6 d-flex flex-column justify-content-between p-4 bg-white">
          <div>
            <h2 class="fw-bold mb-3">{{ $product->nama_produk }}</h2>
            <div class="text-muted small mb-3">{!! $product->deskripsi !!}</div>
          </div>
        </div>
      </div>
    </div>

    {{-- Komentar --}}
    <div class="card card-body mt-4 border-0 shadow-sm comment-section" style="display:none;">
      <ul class="list-group comment-list mb-3" style="max-height: 200px; overflow-y:auto;"></ul>
      <div class="input-group input-group-sm">
        <input type="text" class="form-control comment-input" placeholder="Tulis komentar...">
        <button class="btn btn-primary comment-submit-btn" type="button">Kirim</button>
      </div>
    </div>
  </div>
</div>

{{-- Script --}}
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const likeBtn = document.querySelector('.like-btn');
    const likeCountEl = document.querySelector('.like-count');
    const commentToggleBtn = document.querySelector('.comment-toggle-btn');
    const commentSection = document.querySelector('.comment-section');
    const commentSubmitBtn = document.querySelector('.comment-submit-btn');
    const commentInput = document.querySelector('.comment-input');
    const commentList = document.querySelector('.comment-list');
    const commentCountEl = document.querySelector('.comment-count');
    const shareBtn = document.querySelector('.share-btn');

    likeBtn?.addEventListener('click', () => {
      const liked = likeBtn.classList.contains('btn-primary');
      likeBtn.classList.toggle('btn-primary', !liked);
      likeBtn.classList.toggle('btn-outline-primary', liked);
      likeCountEl.textContent = liked ? parseInt(likeCountEl.textContent) - 1 : parseInt(likeCountEl.textContent) + 1;
    });

    commentToggleBtn?.addEventListener('click', () => {
      commentSection.style.display = commentSection.style.display === 'block' ? 'none' : 'block';
    });

    commentSubmitBtn?.addEventListener('click', () => {
      const text = commentInput.value.trim();
      if (!text) return;
      const li = document.createElement('li');
      li.className = 'list-group-item bg-light text-dark';
      li.textContent = text;
      commentList.appendChild(li);
      commentInput.value = '';
      commentCountEl.textContent = parseInt(commentCountEl.textContent) + 1;
    });

    shareBtn?.addEventListener('click', () => {
      alert('Tombol Share diklik! Tambahkan fungsi share di sini.');
    });
  });
</script>
@stop
