@extends('layouts.layout')
@section('content')
<section id="gallery" class="page-section gallery-section">
    @php
    $gallery = \App\Models\MainGallery::query()
    ->where('is_active', true)
    ->orderBy('sort')
    ->orderByDesc('id')
    ->get();
    @endphp

    <div class="container">
        <div class="section-title" data-animation="fadeInUp">
            <h2 class="title">Galéria</h2>
        </div>

        <div class="gallery-grid">
            @foreach($gallery as $g)
            @php
            $src = asset('storage/'.$g->image);
            $alt = $g->title ?: 'Gallery image';
            // opcionális: ha akarsz kisebb thumbot generálni, cseréld $srcThumb-ra
            $srcThumb = $src;
            @endphp
            <a class="gallery-item" href="{{ $src }}" data-full="{{ $src }}" data-caption="{{ $g->title }}">
                <img src="{{ $srcThumb }}" alt="{{ $alt }}">
                @if($g->title)
                @endif
            </a>
            @endforeach
        </div>
    </div>

    <!-- Lightbox overlay -->
    <div class="glightbox" id="glightbox" aria-hidden="true">
        <button class="glb-close" aria-label="Bezárás">&times;</button>
        <button class="glb-prev" aria-label="Előző">&#10094;</button>
        <button class="glb-next" aria-label="Következő">&#10095;</button>
        <figure class="glb-figure">
            <img class="glb-image" src="" alt="">
            <figcaption class="glb-caption"></figcaption>
        </figure>
        <div class="glb-backdrop"></div>
    </div>
</section>

<style>

.gallery-section { color:#e7e7e7; }

.gallery-grid{
  display:grid;
  grid-template-columns: repeat(4, 1fr);
  gap:14px;
}
@media (max-width: 1199px){ .gallery-grid{ grid-template-columns: repeat(3, 1fr); } }
@media (max-width: 767px){ .gallery-grid{ grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 480px){ .gallery-grid{ grid-template-columns: 1fr; } }

.gallery-item{
  position:relative; display:block; overflow:hidden; border-radius:10px;
  border:2px solid #c0974a; background:#0f1a1f;
}
.gallery-item img{
  width:100%; height:100%; object-fit:cover; display:block;
  transition: transform .35s ease;
  aspect-ratio: 4 / 3;
}
.gallery-item:hover img{ transform: scale(1.04); }

.gallery-item .caption{
  position:absolute; left:8px; bottom:8px; right:8px;
  background:rgba(15,26,31,.65); color:#e7e7e7;
  border:1px solid rgba(192,151,74,.5);
  font-size:.9rem; padding:6px 8px; border-radius:8px;
  backdrop-filter: blur(2px);
}

/* === Minimal Vanilla Lightbox ========================================== */
.glightbox{
  position:fixed; inset:0; display:none; z-index:9999;
  align-items:center; justify-content:center;
}
.glightbox.active{ display:flex; }

.glightbox .glb-backdrop{
  position:absolute; inset:0; background:rgba(0,0,0,.7); backdrop-filter: blur(2px);
}

.glightbox .glb-figure{
  position:relative; z-index:1; max-width:min(92vw, 1200px); max-height:80vh;
  display:flex; flex-direction:column; align-items:center; gap:10px;
}
.glightbox .glb-image{
  max-width:100%; max-height:70vh; object-fit:contain; border-radius:12px;
  border:2px solid #c0974a; background:#000;
}
.glightbox .glb-caption{
  color:#e7e7e7; text-align:center; font-size:.95rem;
  background:rgba(15,26,31,.8); padding:6px 10px; border-radius:10px;
  border:1px solid rgba(192,151,74,.5); max-width:100%;
}

.glightbox .glb-close,
.glightbox .glb-prev,
.glightbox .glb-next{
  position:absolute; z-index:2; background:#0f1a1f; color:#e7e7e7;
  border:2px solid #c0974a; border-radius:10px; cursor:pointer;
  padding:6px 10px; line-height:1; font-size:20px;
}
.glightbox .glb-close{ top:16px; right:16px; }
.glightbox .glb-prev{ left:16px; top:50%; transform:translateY(-50%); }
.glightbox .glb-next{ right:16px; top:50%; transform:translateY(-50%); }
.glightbox .glb-prev:hover,
.glightbox .glb-next:hover,
.glightbox .glb-close:hover{ filter:brightness(1.1); }

</style>

@endsection
