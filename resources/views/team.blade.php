@extends('layouts.layout')
@section('content')

<!-- Csapatunk stabil grid -->
<div class="container my-4">
    <div class="section-title text-center" data-animation="fadeInUp">
        <h2 class="title">Csapatunk</h2>
    </div>

    <div class="team-grid">
        <!-- 1 -->
        <article class="team-card">
            <img class="team-avatar" src="/img/team/zilai-sandor.jpg" alt="Zilai Sándor" onerror="this.onerror=null;this.src='https://i.pravatar.cc/240?u=zilai-sandor';">
            <h3 class="team-name">Zilai Sándor</h3>
            <p class="team-role">Egyesület elnöke, szakmai vezető, edző</p>
        </article>

        <!-- 2 -->
        <article class="team-card">
            <img class="team-avatar" src="/img/team/asztalos-zoltan.jpg" alt="Asztalos Zoltán" onerror="this.onerror=null;this.src='https://i.pravatar.cc/240?u=asztalos-zoltan';">
            <h3 class="team-name">Asztalos Zoltán</h3>
            <p class="team-role">Muay thai szakosztály vezetője, erőnléti edző, muay thai edző</p>
        </article>

        <!-- 3 -->
        <article class="team-card">
            <img class="team-avatar" src="/img/team/szabo-sandor.jpg" alt="Szabó Sándor" onerror="this.onerror=null;this.src='https://i.pravatar.cc/240?u=szabo-sandor';">
            <h3 class="team-name">Szabó Sándor</h3>
            <p class="team-role">Boksz szakosztály vezetője, boksz edző</p>
        </article>

        <!-- 4 -->
        <article class="team-card">
            <img class="team-avatar" src="/img/team/orosz-gyula.jpg" alt="Orosz Gyula" onerror="this.onerror=null;this.src='https://i.pravatar.cc/240?u=orosz-gyula';">
            <h3 class="team-name">Orosz Gyula</h3>
            <p class="team-role">Utánpótlás edző</p>
        </article>

        <!-- 5 -->
        <article class="team-card">
            <img class="team-avatar" src="/img/team/kertesz-sandor.jpg" alt="Kertész Sándor" onerror="this.onerror=null;this.src='https://i.pravatar.cc/240?u=kertesz-sandor';">
            <h3 class="team-name">Kertész Sándor</h3>
            <p class="team-role">Muay thai edző</p>
        </article>

        <!-- 6 -->
        <article class="team-card">
            <img class="team-avatar" src="/img/team/rissai-bence.jpg" alt="Rissai Bence" onerror="this.onerror=null;this.src='/img/team/placeholder.jpg';">
            <h3 class="team-name">Rissai Bence</h3>
            <p class="team-role">Muay thai edző</p>
        </article>

        <!-- 7 -->
        <article class="team-card">
            <img class="team-avatar" src="/img/team/timar-virag.jpg" alt="Dr. Timár Virág" onerror="this.onerror=null;this.src='/img/team/placeholder.jpg';">
            <h3 class="team-name">Dr. Timár Virág</h3>
            <p class="team-role">Egyesületi titkár</p>
        </article>

        <!-- 8 -->
        <article class="team-card">
            <img class="team-avatar" src="/img/team/zilai-seron.jpg" alt="Zilai Seron" onerror="this.onerror=null;this.src='/img/team/placeholder.jpg';">
            <h3 class="team-name">Zilai Seron</h3>
            <p class="team-role">Marketing, általános információk</p>
        </article>
    </div>
</div>
<div class="container my-5">
    <div class="cta-box text-center">
        <h3 class="mb-3">Részletekért keress minket!</h3>
        <p class="mb-4">E-mail: <a href="mailto:gewisstraining2017@gmail.com">gewisstraining2017@gmail.com</a> &middot; Tel.: <a href="tel:+36707038827">+36 70 703 8827</a></p>
        <div class="d-flex justify-content-center gap-2 flex-wrap">
            <a class="btn btn-gt-primary" href="mailto:gewisstraining2017@gmail.com" aria-label="E-mail küldése a Gewiss Trainingnek">Írj e-mailt</a>
            <a class="btn btn-gt-outline" href="tel:+36707038827" aria-label="Telefonhívás indítása a Gewiss Training felé">Hívj most</a>
        </div>
    </div>
</div>

<style>
    .cta-box {
        background: #0f1a1f;
        color: #e7e7e7;
        border-radius: 16px;
        padding: 28px 20px;
        box-shadow: 0 10px 24px rgba(0, 0, 0, .18);
    }

    .cta-box a {
        color: #e7e7e7;
        text-decoration: underline;
    }

    .cta-box a:hover {
        text-decoration: none;
    }

    /* Gombok a palettához igazítva */
    .btn-gt-primary {
        background: #c0974a;
        color: #0f1a1f;
        border: none;
        border-radius: 999px;
        padding: .6rem 1.25rem;
        font-weight: 700;
    }

    .btn-gt-primary:hover {
        filter: brightness(0.95);
        color: #0f1a1f;
    }

    .btn-gt-outline {
        background: transparent;
        border: 2px solid #c0974a;
        color: #c0974a;
        border-radius: 999px;
        padding: .55rem 1.25rem;
        font-weight: 700;
    }

    .btn-gt-outline:hover {
        background: #c0974a;
        color: #0f1a1f;
    }

    /* kis rés a gombok között, ha nincs Bootstrap gap */
    .gap-2>* {
        margin: .25rem;
    }

</style>

<style>
    /* Stabil, reszponzív rács – egységes hézagok, nem “lépcsőzik” */
    .team-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        grid-gap: 28px;
        /* vízszintes + függőleges hézag */
        align-items: start;
        /* minden kártya tetejéhez igazít */
    }

    /* Kártya */
    .team-card {
        background: #0f1a1f;
        /* palettád: sötét teal */
        color: #e7e7e7;
        /* világos szöveg */
        border-radius: 16px;
        padding: 20px 18px 24px;
        box-shadow: 0 10px 24px rgba(0, 0, 0, .18);
        text-align: center;
        display: flex;
        flex-direction: column;
        min-height: 320px;
        /* hogy a sorok magassága egységes legyen */
    }

    /* Avatar – fix méret, kör, egységes keret */
    .team-avatar {
        width: 120px;
        height: 120px;
        object-fit: cover;
        border-radius: 50%;
        display: block;
        margin: 6px auto 14px;
        border: 4px solid #e7e7e7;
        background: #000;
    }

    /* Név + szerep */
    .team-name {
        font-size: 1.5rem;
        line-height: 1.2;
        margin: 4px 0 8px;
        font-weight: 800;
        color: #c0974a;
        /* arany */
    }

    .team-role {
        line-height: 1.45;
        margin: 0 auto;
        max-width: 28ch;
        /* szép tördelés, fix szélesség */
    }

    /* Finom hover – nem tol el semmit */
    .team-card:hover {
        transform: translateY(-3px);
        transition: .25s;
    }

    /* Opcionális: szekció cím középen */
    .section-title .title {
        color: #e7e7e7;
        margin-bottom: 22px;
    }

</style>


@endsection
