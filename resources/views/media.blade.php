@extends('layouts.layout')

<style>
    /* a teljes szekció ne tapadjon a szélekhez */
    #links {
        padding: 80px 0;
        /* felül–alul nagy térköz */
    }


    /* konténer, hogy ne legyen teljes szélesség */
    /* rács – marad középre húzva */
    .linkcards-grid {
        display: grid;
        gap: 28px;
        grid-template-columns: repeat(auto-fit, minmax(340px, 1fr));
        max-width: 1100px;
        margin: 0 auto;
        padding: 0 20px;
    }

    /* alap kártya */
    .linkcard {
        display: flex;
        flex-direction: row;
        gap: 16px;
        background: linear-gradient(145deg, #0f1a1f, #151f25);
        color: #e7e7e7;
        text-decoration: none;
        border: 2px solid #c0974a;
        border-radius: 14px;
        overflow: hidden;
        min-height: 180px;
        transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease;
        padding: 14px;
        /* belső margó */
    }

    .linkcard:hover {
        transform: translateY(-6px) scale(1.02);
        box-shadow: 0 10px 25px rgba(0, 0, 0, .4), 0 0 20px rgba(192, 151, 74, .25);
        border-color: #d8b55d;
    }

    /* kép */
    .linkcard__media {
        flex: 0 0 160px;
        background: #000;
        display: grid;
        place-items: center;
        overflow: hidden;
        border-radius: 10px;
    }

    .linkcard__media img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        transition: transform .35s ease;
    }

    .linkcard:hover .linkcard__media img {
        transform: scale(1.08);
    }

    /* szöveg */
    .linkcard__body {
        padding: 6px;
        display: flex;
        flex-direction: column;
        gap: 10px;
        overflow: hidden;
    }

    .linkcard__title {
        margin: 0;
        font-size: 1.2rem;
        font-weight: 700;
        color: #c0974a;
        text-transform: uppercase;
        letter-spacing: .04em;
        line-height: 1.3;
    }

    .linkcard__title::after {
        content: '';
        display: block;
        width: 40px;
        height: 2px;
        background: #c0974a;
        margin-top: 6px;
        border-radius: 2px;
        opacity: .6;
    }

    .linkcard__excerpt {
        margin: 0;
        font-size: .95rem;
        line-height: 1.5;
        opacity: .9;
        flex-grow: 1;
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
    }

    .linkcard__domain {
        margin-top: auto;
        font-size: 0.95rem;
        /* nagyobb */
        font-weight: 700;
        color: #e7e7e7;
        background: #19252b;
        border: 0;
        border-radius: 8px;
        padding: 6px 10px 6px 28px;
        position: relative;
        display: inline-block;
    }

    .linkcard__domain::before {
        content: '🌐';
        position: absolute;
        left: 8px;
        top: 5px;
        opacity: .9;
        left: 0;
        top: 0;
        font-size: 2em;
        opacity: .7;
    }

</style>

@section('content')
<section id="media" class="page-section sponsorship-section">
    <div class="container">
        <div class="section-title" data-animation="fadeInUp">
            <h2 class="title">Médiamegjelenések</h2>
            <p class="text-center">Minden, az egyesülettel kapcsolatos információk.</p>
            <br>
        </div>
        <div class="row" style="padding: 10px;">
            <div class="linkcards-grid">
                @foreach($widgets as $w)
                @php
                $title = $w->title ?: parse_url($w->url, PHP_URL_HOST);
                $excerpt = $w->excerpt ?: 'Kattints a részletekért: '.$w->url;
                $img = $w->image ? asset('storage/'.$w->image) : null;
                $domain = parse_url($w->url, PHP_URL_HOST);
                $fallback= 'https://www.google.com/s2/favicons?domain='.$domain.'&sz=128';
                @endphp
                <a class="linkcard" href="{{ $w->url }}" target="_blank" rel="noopener">
                    <div class="linkcard__media">
                        <img src="{{ $img ?: $fallback }}" alt="{{ $title }}">
                    </div>
                    <div class="linkcard__body">
                        <h4 class="linkcard__title">{{ $title }}</h4>
                        @if($excerpt)
                        <p class="linkcard__excerpt">{{ \Illuminate\Support\Str::limit($excerpt, 240) }}</p>
                        @endif
                        <span class="linkcard__domain">{{ parse_url($w->url, PHP_URL_HOST) }}</span>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
