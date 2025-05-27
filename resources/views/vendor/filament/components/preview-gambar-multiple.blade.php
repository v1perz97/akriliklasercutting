@if(is_array($record->gambar_multiple))
    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 8px;">
        @foreach($record->gambar_multiple as $url)
            <div style="overflow: hidden; border-radius: 6px; border: 1px solid #ddd;">
                <img src="{{ $url }}" alt="Preview"
                     style="width: 100%; height: 100px; object-fit: cover;">
            </div>
        @endforeach
    </div>
@else
    <p style="color: red;">Gambar tidak tersedia atau format salah.</p>
@endif
