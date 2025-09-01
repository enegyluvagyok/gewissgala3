@extends('layouts.layout')
@section('content')

<section id="sponsorship" class="page-section sponsorship-section">
  <div class="container">
    <div class="section-title" data-animation="fadeInUp">
      <h2 class="title">Szponzoráció – kölcsönös előnyök</h2>
      <p class="text-center">Egyesületünk és versenyzőink támogatása mindkét fél számára értéket teremt.</p>
      <br>
    </div>

    <div class="row benefits-grid">
      <!-- Egyesület előnyei -->
      <div class="col-md-6">
        <div class="benefit-card">
          <div class="benefit-head">
            <i class="fa fa-users"></i>
            <h3>Egyesületünknek</h3>
          </div>
          <ul class="checklist">
            <li>Versenyzői fejlődés biztosítása minőségi edzőtermi környezettel, külföldi edzési lehetőségekkel és a versenyköltségek átvállalásával.</li>
            <li>Biztos anyagi forrás a célkitűzések és tervek megvalósításához.</li>
            <li>Tervezhető gazdálkodás.</li>
            <li>A támogató cég neve presztízst ad rendezvényeinknek.</li>
          </ul>
        </div>
      </div>

      <!-- Szponzor előnyei -->
      <div class="col-md-6">
        <div class="benefit-card">
          <div class="benefit-head">
            <i class="fa fa-star"></i>
            <h3>A szponzornak</h3>
          </div>
          <ul class="checklist">
            <li>Egy elismert, komoly szakmai munkát végző egyesület állandó támogatójává válik.</li>
            <li>Rendezvényeinken folyamatos, igény szerinti reklámmegjelenés.</li>
            <li>Sportolóink edzésein, versenyein és közösségi médiájában támogatóként való megjelenés.</li>
            <li>Előnyös megjelenési lehetőségek az írott és elektronikus sajtóban.</li>
            <li>Megjelenés a videós összefoglalókban és riportokban.</li>
            <li>Elérés több ezer fős közösségi média felületeinken (Facebook, Instagram, TikTok).</li>
            <li>A sportág utánpótlásának támogatása, hozzájárulás az új generáció kineveléséhez.</li>
          </ul>
        </div>
      </div>
    </div>

    <div class="cta-wrap">
      <a href="mailto:gewisstraining2017@gmail.com" class="btn-ghost">gewisstraining2017@gmail.com</a>
    </div>
  </div>
</section>

<section id="onepercent" class="page-section onepercent-section">
    <div class="container">
        <div class="section-title" data-animation="fadeInUp">
            <h2 class="title">Hogyan ajánlhatom fel adóm 1%-át?</h2>
        </div>

        <!-- Adószám sáv -->
        <div class="tax-line">
            <span class="label">Kedvezményezett adószáma:</span>
            <span class="tax-id" id="taxId">18910008-1-09</span>
            <button class="copy-btn" type="button" aria-label="Adószám másolása" data-copy="#taxId">
                <i class="fa fa-copy"></i> Másolás
            </button>
        </div>

        <div class="row donate-cards">
            <!-- INTERNETEN -->
            <div class="col-md-4">
                <div class="donate-card">
                    <div class="icon"><i class="fa fa-globe"></i></div>
                    <h4>INTERNETEN</h4>
                    <ol>
                        <li>Jelentkezz be az eSZJA felületre Ügyfélkapun keresztül.</li>
                        <li>Kattints az „1+1%-os nyilatkozomra”.</li>
                        <li>Pipáld ki az adatmegadás jelölőnégyzetét és töltsd ki a mezőket (név, e-mail, <b>adószám</b>).</li>
                        <li>Kattints a „Tovább beadáshoz”, majd a „Rendben” gombra.</li>
                        <li>A következő ablakban kattints a „Beadás” gombra.</li>
                    </ol>
                    <div class="card-actions">
                        <a class="btn-gold" target="_blank" href="https://eszja.nav.gov.hu/">eSZJA megnyitása</a>
                    </div>
                </div>
            </div>

            <!-- LEVÉLBEN -->
            <div class="col-md-4">
                <div class="donate-card">
                    <div class="icon"><i class="fa fa-envelope"></i></div>
                    <h4>LEVÉLBEN</h4>
                    <ol>
                        <li>Töltsd le és nyomtasd ki az adó 1% nyilatkozatot.</li>
                        <li>Tedd a nyilatkozatot borítékba.</li>
                        <li>Címezd a <b>lakcímed szerinti NAV-fiókhoz</b>, a feladónál tüntesd fel neved, címed és adóazonosító jeled.</li>
                        <li>Zárd le, írd alá a ragasztáson keresztbe.</li>
                        <li>Add fel postán.</li>
                    </ol>
                    <div class="card-actions">
                        <a class="btn-ghost" target="_blank" href="{{ asset('docs/1szazalek-nyilatkozat.pdf') }}">Nyilatkozat letöltése</a>
                    </div>
                </div>
            </div>

            <!-- SZEMÉLYESEN -->
            <div class="col-md-4">
                <div class="donate-card">
                    <div class="icon"><i class="fa fa-user"></i></div>
                    <h4>SZEMÉLYESEN</h4>
                    <ol>
                        <li>Töltsd le és nyomtasd ki az adó 1% nyilatkozatot.</li>
                        <li>Tedd borítékba, írd rá neved, lakcímed és adóazonosító jeled.</li>
                        <li>Zárd le, írd alá a ragasztáson keresztbe.</li>
                        <li>Add le a <b>lakcímed szerinti NAV-fiókban</b>.</li>
                    </ol>
                    <div class="card-actions">
                        <a class="btn-ghost" target="_blank" href="https://nav.gov.hu/">NAV ügyfélszolgálatok</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* --- 1% szekció (paletta-kompatibilis) --- */
    .onepercent-section {
        color: #e7e7e7;
    }

    .onepercent-section .title {
        color: #e7e7e7;
        text-transform: uppercase;
        letter-spacing: .04em;
    }

    .tax-line {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: center;
        gap: 10px;
        margin: 10px auto 24px;
        padding: 10px 14px;
        border: 2px solid #c0974a;
        border-radius: 10px;
        background: #0f1a1f;
        max-width: 680px;
    }

    .tax-line .label {
        opacity: .9;
    }

    .tax-line .tax-id {
        font-weight: 800;
        letter-spacing: .06em;
        background: #c0974a;
        color: #0f1a1f;
        padding: 4px 10px;
        border-radius: 8px;
    }

    .tax-line .copy-btn {
        background: #0f1a1f;
        color: #e7e7e7;
        border: 2px solid #c0974a;
        border-radius: 8px;
        padding: 4px 10px;
        cursor: pointer;
    }

    .tax-line .copy-btn:hover {
        filter: brightness(1.1);
    }

    ..donate-cards {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .donate-cards>[class*="col-"] {
        display: flex;
    }

    .donate-card {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        min-height: 400px;
        background: #0f1a1f;
        border: 2px solid #c0974a;
        border-radius: 12px;
        margin-bottom: 10px;
        padding: 18px 16px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, .25);
        transition: transform .2s ease;
    }

    .donate-card:hover {
        transform: translateY(-4px);
    }

    .donate-card .icon {
        width: 48px;
        height: 48px;
        display: grid;
        place-items: center;
        border: 2px solid #c0974a;
        border-radius: 10px;
        margin-bottom: 10px;
        font-size: 20px;
        color: #e7e7e7;
    }

    .donate-card h4 {
        color: #c0974a;
        margin: 6px 0 10px;
        text-transform: uppercase;
        letter-spacing: .04em;
    }

    .donate-card ol {
        padding-left: 18px;
        margin: 0 0 12px;
    }

    .donate-card li {
        margin: 0 0 6px;
        line-height: 1.55;
    }

    .card-actions {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        margin-top: auto;
        /* mindig alulra tolja */
    }

    /* Gombok és linkek */
    .btn-gold,
    .btn-ghost {
        display: inline-block;
        padding: 8px 12px;
        border-radius: 8px;
        border: 2px solid #c0974a;
        font-weight: 700;
        text-decoration: none;
        color: white;
        transition: all .2s ease;
    }

    .btn-gold {
        background: #c0974a;
        color: white;
    }

    .btn-ghost {
        background: transparent;
        color: white;
    }

    /* Hover, visited fix */
    .btn-gold:hover,
    .btn-gold:visited {
        background: #d3aa55;
        color: white;
    }

    .btn-ghost:hover,
    .btn-ghost:visited {
        background: #c0974a;
        color: white;
    }

</style>

<style>
  /* ---- Szponzoráció szekció ---- */
  .sponsorship-section{ color:#e7e7e7; }
  .sponsorship-section .title{ color:#e7e7e7; text-transform:uppercase; letter-spacing:.04em; }
  .sponsorship-section .subtitle{ opacity:.9; margin-top:6px; }

  .benefits-grid{ row-gap:20px; }
  .benefit-card{
    background:#0f1a1f; border:2px solid #c0974a; border-radius:12px;
    padding:18px; min-height:310px; box-shadow:0 8px 24px rgba(0,0,0,.25); margin-bottom: 10px;
  }
  .benefit-head{ display:flex; align-items:center; gap:10px; margin-bottom:10px; }
  .benefit-head i{ width:44px; height:44px; display:grid; place-items:center;
    border:2px solid #c0974a; border-radius:10px; font-size:18px; }
  .benefit-head h3{ margin:0; color:#c0974a; text-transform:uppercase; letter-spacing:.04em; font-size:1.05rem; }

  .checklist{ list-style:none; padding-left:0; margin:0; display:grid; gap:8px; }
  .checklist li{
    position:relative; padding-left:26px; line-height:1.55;
  }
  .checklist li::before{
    content:"\f00c"; font-family:"FontAwesome"; position:absolute; left:0; top:2px;
    width:18px; height:18px; display:inline-grid; place-items:center;
    border:2px solid #c0974a; border-radius:6px; font-size:11px;
  }

  .cta-wrap{ display:flex; gap:12px; justify-content:center; margin-top:18px; flex-wrap:wrap; }
  .btn-gold, .btn-ghost{
    display:inline-block; padding:10px 14px; border-radius:10px; border:2px solid #c0974a;
    font-weight:700; text-decoration:none; transition:all .2s ease;
  }
  .btn-gold{ background:#c0974a; color:#0f1a1f; }
  .btn-ghost{ background:transparent; color:white; }
  .btn-gold:hover, .btn-gold:visited{ background:#d3aa55; color:white; }
  .btn-ghost:hover, .btn-ghost:visited{ background:#c0974a; color:white; }

  @media (max-width: 767px){
    .benefit-head h3{ font-size:1rem; }
  }
</style>


@endsection
