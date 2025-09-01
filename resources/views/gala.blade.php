@extends('layouts.layout')
@section('content')
@php
use App\Models\Fight;
use App\Models\Fighter;
@endphp
<style>
    .fight-row {
        align-items: center;
    }

    .avatar {
        width: 100%;
        max-width: 220px;
        height: auto;
        border-radius: 12px;
        border: 2px solid #c0974a;
        background: #0f1a1f;
    }

    .owl-carousel.fights-carousel .owl-nav [class*=owl-] {
        background: #0f1a1f;
        border: 2px solid #c0974a;
        color: #e7e7e7;
        border-radius: 10px;
        padding: 4px 10px;
        margin: 0 6px;
    }

    .owl-carousel.fights-carousel .owl-dots .owl-dot span {
        background: #c0974a;
        opacity: .5;
    }

    .owl-carousel.fights-carousel .owl-dots .owl-dot.active span {
        opacity: 1;
    }

    .gallery-section {
        color: #e7e7e7;
    }

    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 14px;
    }

    @media (max-width: 1199px) {
        .gallery-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    @media (max-width: 767px) {
        .gallery-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 480px) {
        .gallery-grid {
            grid-template-columns: 1fr;
        }
    }

    .gallery-item {
        position: relative;
        display: block;
        overflow: hidden;
        border-radius: 10px;
        border: 2px solid #c0974a;
        background: #0f1a1f;
    }

    .gallery-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform .35s ease;
        aspect-ratio: 4 / 3;
    }

    .gallery-item:hover img {
        transform: scale(1.04);
    }

    .gallery-item .caption {
        position: absolute;
        left: 8px;
        bottom: 8px;
        right: 8px;
        background: rgba(15, 26, 31, .65);
        color: #e7e7e7;
        border: 1px solid rgba(192, 151, 74, .5);
        font-size: .9rem;
        padding: 6px 8px;
        border-radius: 8px;
        backdrop-filter: blur(2px);
    }

    /* === Minimal Vanilla Lightbox ========================================== */
    .glightbox {
        position: fixed;
        inset: 0;
        display: none;
        z-index: 9999;
        align-items: center;
        justify-content: center;
    }

    .glightbox.active {
        display: flex;
    }

    .glightbox .glb-backdrop {
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, .7);
        backdrop-filter: blur(2px);
    }

    .glightbox .glb-figure {
        position: relative;
        z-index: 1;
        max-width: min(92vw, 1200px);
        max-height: 80vh;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 10px;
    }

    .glightbox .glb-image {
        max-width: 100%;
        max-height: 70vh;
        object-fit: contain;
        border-radius: 12px;
        border: 2px solid #c0974a;
        background: #000;
    }

    .glightbox .glb-caption {
        color: #e7e7e7;
        text-align: center;
        font-size: .95rem;
        background: rgba(15, 26, 31, .8);
        padding: 6px 10px;
        border-radius: 10px;
        border: 1px solid rgba(192, 151, 74, .5);
        max-width: 100%;
    }

    .glightbox .glb-close,
    .glightbox .glb-prev,
    .glightbox .glb-next {
        position: absolute;
        z-index: 2;
        background: #0f1a1f;
        color: #e7e7e7;
        border: 2px solid #c0974a;
        border-radius: 10px;
        cursor: pointer;
        padding: 6px 10px;
        line-height: 1;
        font-size: 20px;
    }

    .glightbox .glb-close {
        top: 16px;
        right: 16px;
    }

    .glightbox .glb-prev {
        left: 16px;
        top: 50%;
        transform: translateY(-50%);
    }

    .glightbox .glb-next {
        right: 16px;
        top: 50%;
        transform: translateY(-50%);
    }

    .glightbox .glb-prev:hover,
    .glightbox .glb-next:hover,
    .glightbox .glb-close:hover {
        filter: brightness(1.1);
    }

</style>
<style>
    .fight-image {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .title-fight {
        /* A címmeccs kártyájának árnyéka aranyozott legyen és pulzáljon*/
        background: linear-gradient(135deg, #0f1a1f, #19292f, #223740) !important;
        /* Sötét, elegáns átmenet */
        color: white !important;
        /* Sötét szöveg a kontrasztért */
        border-radius: 6px;
        padding: 20px;
        margin: 14px 0;
        font-weight: 500;
        font-size: 0.9em;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        transition: transform 0.1s ease, box-shadow 0.1s ease;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        cursor: pointer;
        outline: none;
        box-shadow: 0 0 0px rgba(255, 0, 0, 0.5);
        position: relative;
        overflow: hidden;
        animation: glow 1.5s ease-in-out infinite;
    }

    .title-fight:after {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border-radius: 5px;
        opacity: 0;
        animation: pulse-bg 1.5s ease-in-out;
        transform: scale(1.02);
    }

    @keyframes glow {

        0%,
        100% {
            box-shadow: 0 0 15px #c0974a55;
        }

        50% {
            box-shadow: 0 0 25px #c0974a55;
        }
    }


    @keyframes pulse-bg {

        0%,
        100% {
            opacity: 0;
        }

        50% {
            opacity: 1;
        }
    }

    .title-fight:hover {
        transform: scale(1.03) rotate(1deg);
        /* Enyhe forgatás hover-re */
        box-shadow: #000;
    }

    .felnott {
        background-color: #2e2e2e !important;
        /* Sötétebb, visszafogott háttér */
        color: #e6e6e6 !important;
        /* Világos szöveg */
        border-left: 5px solid #c0974a;
        /* Vastagabb, modern bal oldali kiemelés */
        padding: 18px;
        margin: 10px 0;
        font-weight: 500;
        font-size: 0.9em;
        transition: background-color 0.3s ease, border-left-color 0.3s ease;
    }

    .pirossarok {
        /* A nyertes sarok színe a meccs után piros színátmenetet kap */
        background: linear-gradient(135deg, #ff000055, #212121, #212121) !important;
        color: white !important;
        border-left-color: #ff0000;
    }

    .keksarok {
        /* A győztes sarok színe a meccs után kék színátmenetet kap */
        background: linear-gradient(135deg, #0000ff55, #212121, #212121) !important;
        color: white !important;
        border-left-color: #0000ff;
    }

    .felnott:hover {
        background-color: #393939 !important;
        border-left-color: #d4a65d;
    }

    .gyerek {
        background-color: #212121 !important;
        /* Sötét, mély háttér */
        color: #cccccc !important;
        border-bottom: 4px rgba(192, 151, 74, 0.7);
        /* Modern, pontozott alsó keret */
        padding: 16px;
        margin: 8px 0;
        font-weight: 400;
        font-size: 0.9em;
        transition: background-color 0.3s ease, border-bottom-color 0.3s ease;
    }

    .gyerek:hover {
        background-color: #2a2a2a !important;
        border-bottom-color: rgba(192, 151, 74, 1);
    }

    .avatar {
        width: 100%;
        height: 100%;
        border-radius: 0%;
        margin-right: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .panel-title>a {
        display: flex;
        align-items: center;
        background-color: #f9f9f9 !important;
        color: white !important;
        text-decoration: none;
        font-weight: 600;
    }

    .panel-title>a:hover {
        color: #0056b3;
    }

    .panel {
        border: none;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        margin-bottom: 10px !important;
    }

    .fighters-container {
        display: flex;
        justify-content: space-between;
    }

    .fighter-info {
        flex: 1;
        margin-right: 10px;
        /* Add space between fighters */
    }

    .panel-heading {
        background-color: #171717 !important;
        color: white !important;
    }

    .fighter-info:last-child {
        margin-right: 0;
        /* Remove margin for the last item */
    }

</style>

<section id="history" class="page-section history-section">
    <div class="container">
        <div class="section-title" data-animation="fadeInUp">
            <h2 class="title">Története</h2>
        </div>

        <div class="history-content">
            <p>
                A Gewiss Gála rendezvénysorozatunk eddig három sikeres eseményt ölel fel,
                amelyek mindegyike kiemelkedő pillanatokat hozott a küzdősportok világában.
            </p>

            <div class="history-item">
                <h4>Első gála – 2023. augusztus 19.</h4>
                <p>
                    Zajos sikerrel és teltház előtt rendeztük meg az 1. Gewiss Gálát, ahol 12 – külföldi és magyar –
                    páros mérte össze erejét és tudását Thai Box és K1 szabályrendszerben. Angol sportszervezetekkel
                    együttműködve színesítettük a rendezvényt olyan felajánlásokkal, hogy a győztes sportoló
                    meccslehetőséget kap a <b>Roar Championship</b> rendezvénysorozaton Londonban, ezzel is
                    tapasztalatot és versenyrutint szerezve.
                </p>
            </div>

            <div class="history-item">
                <h4>Második gála – 2024. április 20.</h4>
                <p>
                    A rendezvénysorozat következő állomásaként ismét a debreceni Lovarda adott otthont a 2. Gewiss
                    Gálának, ahol fantasztikus hangulatban szurkolhatta végig a sportszerető közönség a 10 mérkőzést,
                    K1 és Muay Thai szabályrendszerben. Ezen a gálánkon indult útjára a <b>Gewiss Champion</b>
                    bajnoki öv, amely az angol <b>The Knowlesy Academy</b> klub versenyzője derekára került. Ez a
                    kezdete volt egy olyan gyümölcsöző együttműködésnek, amely utat nyithat a nemzetközi karrier felé,
                    az angol klub ugyanis több bajnokot adott már a sportágnak, köztük a One Championship
                    versenysorozat világbajnokát, <b>Jonathan Haggerty</b>-t.
                </p>
            </div>

            <div class="history-item">
                <h4>Harmadik gála – 2024. november 02.</h4>
                <p>
                    A 3. Gewiss Gálát az eddigieknél még több mérkőzéssel (összesen 18 összecsapással) rendeztük meg,
                    Muay Thai, K1 és Kick-box szabályrendszerben. A versenyzők összetételét még színesebben állítottuk
                    össze, hogy a közönség az eddigieknél is magasabb színvonalú rendezvényen vehessen részt. A hazai
                    élvonal mellett francia, szerb, román, olasz harcosok is ringbe léptek. Látványos hang- és
                    fénytechnikai megoldásokkal fokoztuk az élményt a helyszíni közönség számára, élő online
                    közvetítéssel biztosítottuk a megtekintést azoknak, akik nem tudtak a helyszínre utazni vagy
                    jegyet venni, hiszen a rendezvény teltházas volt.
                </p>
                <p>
                    Ezek a rendezvények nemcsak a sportág népszerűsítését szolgálták, hanem lehetőséget adtak a
                    szponzorok számára is, hogy elérjék a dinamikusan bővülő közönséget és támogassák a sport fejlődését.
                </p>
            </div>
        </div>
    </div>
</section>
<!--<section id="pricing" class="page-section">
    <div class="container">
        <div class="section-title" data-animation="fadeInUp">
            <h2 class="title">Jegyárak</h2>
        </div>
        <div class="row text-center">
            <div class="owl-carousel navigation-1 light-switch white" data-pagination="true" data-items="4"
                data-autoplay="true" data-navigation="true" data-animation="fadeInUp">
                <div class="col-sm-4 col-md-3 icons-hover-color bottom-xs-pad-20" style="width: 100%;"
                    data-animation="fadeInLeft">
                    <div class="pricing light-bg">
                        <div class="title">
                            <a href="#">Karzat Lounge</a>
                        </div>
                        <div class="price-box">
                            <div class="starting">ára</div>
                            <div class="price">22 990 Ft
                                <span>/fő</span>
                            </div>
                        </div>
                        <ul class="options">
                            <li>
                                TÁMOGATÓI JEGY<br>
                                Karzat lounge 22.990.-/fő<br>
                                Összesen 137.940.- / 6 fő<br>
                                (emeleten két oldalt a nézőtérre rálátó galéria rész)
                                <br>
                                A jegy tartalmazza: egységenként maximum 6 fő fogadására alkalmas lounge, bárszék és
                                bárasztal a korlátnál, kanapé a két mérkőzés közötti lazításhoz.
                                <br>
                                Welcome drink (soft v. pezsgő) könyöklő asztalra 1 üveg pezsgő, víz és sós/édes
                                bekészítés.
                                <br>
                                Emeleti kávézó részen elkülönített svédasztalos catering, alkoholmentes és alkoholos
                                italok.
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4 col-md-3 icons-hover-color bottom-xs-pad-20" style="width: 100%;"
                    data-animation="fadeInLeft">
                    <div class="pricing light-bg">
                        <div class="title">
                            <a href="#">Sky Lounge</a>
                        </div>
                        <div class="price-box">
                            <div class="starting">ára</div>
                            <div class="price">24 990 Ft
                                <span>/fő</span>
                            </div>
                        </div>
                        <ul class="options">
                            <li>
                                TÁMOGATÓI JEGY<br>
                                Sky Lounge 22.990,-/fő<br>
                                (az emeleti kávézó területe, az üvegfal mögött)<br>
                                (itt idén: 14 év alatti gyerekek ingyen jöhetnek a családdal)<br>
                                A jegy tartalmazza: Welcome drink (soft v. pezsgő) asztalra 1 üveg pezsgő, víz és
                                sós/édes bekészítés.<br>
                                Emeleti kávézó részen elkülönített svédasztalos catering, alkoholmentes és alkoholos
                                italok, minden fő 1 ingyen
                                edzés a Gewiss Training SE-nél Zilai Sándorral, regisztrációhoz kötött, 3 hónapig
                                felhasználható.
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4 col-md-3 icons-hover-color bottom-xs-pad-20" style="width: 100%;"
                    data-animation="fadeInLeft">
                    <div class="pricing light-bg">
                        <div class="ribbon-wrapper">
                            <div class="ribbon yellow">ELFOGYOTT</div>
                        </div>
                        <div class="title">
                            <a href="#">Early Bird Álló jegy</a>
                        </div>
                        <div class="price-box">
                            <div class="starting">ára</div>
                            <div class="price">5500 Ft
                                <span>/fő</span>
                            </div>
                        </div>
                        <ul class="options">
                            <li>
                                TÁMOGATÓI JEGY - ZÓNA 1, piros - A karzat alatti terület
                                A jegy tartalmazza: welcome drink (soft vagy pezsgő)
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4 col-md-3 icons-hover-color bottom-xs-pad-20" style="width: 100%;"
                    data-animation="fadeInLeft">
                    <div class="pricing light-bg">
                        <div class="title">
                            <a href="#">Álló jegy</a>
                        </div>
                        <div class="price-box">
                            <div class="starting">ára</div>
                            <div class="price">6000 Ft
                                <span>/fő</span>
                            </div>
                        </div>
                        <ul class="options">
                            <li>
                                TÁMOGATÓI JEGY - ZÓNA 1, piros - A karzat alatti terület
                                A jegy tartalmazza: welcome drink (soft vagy pezsgő)
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4 col-md-3 icons-hover-color bottom-xs-pad-20" style="width: 100%;"
                    data-animation="fadeInLeft">
                    <div class="pricing light-bg">
                        <div class="ribbon-wrapper">
                            <div class="ribbon yellow">ELFOGYOTT</div>
                        </div>
                        <div class="title">
                            <a href="#">Early Bird Ülő jegy</a>
                        </div>
                        <div class="price-box">
                            <div class="starting">ára</div>
                            <div class="price">7500 Ft
                                <span>/fő</span>
                            </div>
                        </div>
                        <ul class="options">
                            <li>
                                TÁMOGATÓI JEGY - ZÓNA 2, sárga - A nézőtért körbevevő fa ülőpadok
                                A jegy tartalmazza: welcome drink (soft vagy pezsgő)
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4 col-md-3 icons-hover-color bottom-xs-pad-20" style="width: 100%;"
                    data-animation="fadeInLeft">
                    <div class="pricing light-bg">
                        <div class="title">
                            <a href="#">Ülő jegy</a>
                        </div>
                        <div class="price-box">
                            <div class="starting">ára</div>
                            <div class="price">8000 Ft
                                <span>/fő</span>
                            </div>
                        </div>
                        <ul class="options">
                            <li>
                                TÁMOGATÓI JEGY - ZÓNA 2, sárga - A nézőtért körbevevő fa ülőpadok
                                A jegy tartalmazza: welcome drink (soft vagy pezsgő)
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4 col-md-3 icons-hover-color bottom-xs-pad-20" style="width: 100%;"
                    data-animation="fadeInLeft">
                    <div class="pricing light-bg">
                        <div class="ribbon-wrapper">
                            <div class="ribbon yellow">ELFOGYOTT</div>
                        </div>
                        <div class="title">
                            <a href="#">Küzdőtér asztal</a>
                        </div>
                        <div class="price-box">
                            <div class="starting">ára</div>
                            <div class="price">229 900 Ft
                                <span>/10 fő</span>
                            </div>
                        </div>
                        <ul class="options">
                            <li>
                                TÁMOGATÓI JEGY <br>
                                Küzdőtéri 10 fős asztal <br>
                                22.990.- /fő <br>
                                A jegy tartalmazza: A ringgel egy szinten elhelyezett asztalok, szinte testközelből
                                élvezheti a mérkőzéseket. <br>
                                10 fős asztaltársaság számára. <br>
                                Welcome drink (soft v. pezsgő) asztalra 1 üveg pezsgő, ásványvíz és sós/édes bekészítés.
                                <br>
                                Emeleti kávézó részen elkülönített svédasztalos catering, alkoholmentes és alkoholos
                                italok.
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4 col-md-3 icons-hover-color bottom-xs-pad-20" style="width: 100%;"
                    data-animation="fadeInLeft">
                    <div class="pricing light-bg">
                        <div class="ribbon-wrapper">
                            <div class="ribbon yellow">ELFOGYOTT</div>
                        </div>
                        <div class="title">
                            <a href="#">All Access Superhero - kiegészítő jegy</a>
                        </div>
                        <div class="price-box">
                            <div class="starting">ára</div>
                            <div class="price">10 000 Ft
                                <span>/fő</span>
                            </div>
                        </div>
                        <ul class="options">
                            <li>
                                KIEGÉSZÍTŐ TÁMOGATÓI JEGY<br>
                                Azok számára, akik Küzdőtér asztalt, Karzat Lounge vagy Sky Lounge jegyet
                                vásároltak.<br>
                                Figyelem: a beléptetésnél csak a fenti jegyek birtokában érvényes!<br>
                                Az alapjegyekben foglalt szolgáltatásokon felül ez a jegy tartalmaz a verseny után plusz
                                1 órán keresztül catering hozzáférést, fényképet a kedvenc versenyzővel<br>
                                MÉG KAPHATÓ!
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
</section>
<div id="get-quote" style="background-color:#0a1215; color: white;" class="get-a-quote black text-center">
    <div class="container">
        <div class="row" data-animation="pulse">
            <div class="section-title" data-animation="fadeInUp">
                <h2 class="title">Jegyek kaphatók</h2>
            </div>
            <a class="black" href="https://oneticket.hu/events/3-gewiss-gala?locale=hu">
                <svg width="278" height="37" viewBox="0 0 278 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M18.0904 36.55C14.6238 36.55 11.5738 35.8 8.94043 34.3C6.34043 32.7667 4.3071 30.6333 2.84043 27.9C1.4071 25.1667 0.69043 21.9833 0.69043 18.35C0.69043 15.5833 1.09043 13.1 1.89043 10.9C2.72376 8.66667 3.9071 6.76667 5.44043 5.2C6.97376 3.6 8.8071 2.36666 10.9404 1.5C13.1071 0.633332 15.4904 0.199999 18.0904 0.199999C21.6238 0.199999 24.6904 0.949999 27.2904 2.45C29.8904 3.95 31.9071 6.06666 33.3404 8.8C34.8071 11.5 35.5404 14.6667 35.5404 18.3C35.5404 21.0667 35.1238 23.5667 34.2904 25.8C33.4571 28.0333 32.2738 29.95 30.7404 31.55C29.2071 33.15 27.3738 34.3833 25.2404 35.25C23.1071 36.1167 20.7238 36.55 18.0904 36.55ZM18.0904 29.95C20.0571 29.95 21.7238 29.5 23.0904 28.6C24.4904 27.6667 25.5571 26.3333 26.2904 24.6C27.0571 22.8333 27.4404 20.75 27.4404 18.35C27.4404 14.6833 26.6238 11.85 24.9904 9.85C23.3571 7.81666 21.0571 6.8 18.0904 6.8C16.1571 6.8 14.4904 7.25 13.0904 8.15C11.6904 9.05 10.6238 10.3667 9.89043 12.1C9.1571 13.8333 8.79043 15.9167 8.79043 18.35C8.79043 21.9833 9.6071 24.8333 11.2404 26.9C12.8738 28.9333 15.1571 29.95 18.0904 29.95ZM44.3854 36.45C43.2187 36.45 42.3187 36.1333 41.6854 35.5C41.0854 34.8333 40.7854 33.9 40.7854 32.7V4.2C40.7854 2.93333 41.0854 1.96667 41.6854 1.3C42.3187 0.633332 43.152 0.299998 44.1854 0.299998C45.0854 0.299998 45.7687 0.483332 46.2354 0.85C46.7354 1.18333 47.302 1.75 47.9354 2.55L65.4854 24.9H64.1354V4C64.1354 2.83333 64.4354 1.93333 65.0354 1.3C65.6687 0.633332 66.5687 0.299998 67.7354 0.299998C68.902 0.299998 69.7854 0.633332 70.3854 1.3C71.0187 1.93333 71.3354 2.83333 71.3354 4V32.85C71.3354 33.95 71.052 34.8333 70.4854 35.5C69.9187 36.1333 69.152 36.45 68.1854 36.45C67.252 36.45 66.502 36.2667 65.9354 35.9C65.402 35.5333 64.8187 34.95 64.1854 34.15L46.6854 11.8H47.9854V32.7C47.9854 33.9 47.6854 34.8333 47.0854 35.5C46.4854 36.1333 45.5854 36.45 44.3854 36.45ZM81.7318 36C80.4318 36 79.4318 35.65 78.7318 34.95C78.0318 34.25 77.6818 33.25 77.6818 31.95V4.8C77.6818 3.5 78.0318 2.5 78.7318 1.8C79.4318 1.1 80.4318 0.749998 81.7318 0.749998H99.1818C100.182 0.749998 100.932 1.01667 101.432 1.55C101.965 2.05 102.232 2.78333 102.232 3.75C102.232 4.75 101.965 5.51667 101.432 6.05C100.932 6.55 100.182 6.8 99.1818 6.8H85.0818V15.05H98.0318C99.0652 15.05 99.8318 15.3167 100.332 15.85C100.865 16.35 101.132 17.1 101.132 18.1C101.132 19.1 100.865 19.8667 100.332 20.4C99.8318 20.9 99.0652 21.15 98.0318 21.15H85.0818V29.95H99.1818C100.182 29.95 100.932 30.2167 101.432 30.75C101.965 31.25 102.232 31.9833 102.232 32.95C102.232 33.95 101.965 34.7167 101.432 35.25C100.932 35.75 100.182 36 99.1818 36H81.7318ZM119.505 36.45C118.239 36.45 117.272 36.1 116.605 35.4C115.939 34.7 115.605 33.7167 115.605 32.45V7.15H106.755C105.722 7.15 104.922 6.86667 104.355 6.3C103.789 5.73333 103.505 4.95 103.505 3.95C103.505 2.91666 103.789 2.13333 104.355 1.6C104.922 1.03333 105.722 0.749998 106.755 0.749998H132.205C133.239 0.749998 134.039 1.03333 134.605 1.6C135.172 2.13333 135.455 2.91666 135.455 3.95C135.455 4.95 135.172 5.73333 134.605 6.3C134.039 6.86667 133.239 7.15 132.205 7.15H123.355V32.45C123.355 33.7167 123.022 34.7 122.355 35.4C121.722 36.1 120.772 36.45 119.505 36.45ZM141.947 36.45C140.68 36.45 139.714 36.1 139.047 35.4C138.38 34.7 138.047 33.7167 138.047 32.45V4.3C138.047 3.03333 138.38 2.05 139.047 1.35C139.714 0.649998 140.68 0.299998 141.947 0.299998C143.18 0.299998 144.13 0.649998 144.797 1.35C145.464 2.05 145.797 3.03333 145.797 4.3V32.45C145.797 33.7167 145.464 34.7 144.797 35.4C144.164 36.1 143.214 36.45 141.947 36.45ZM169.241 36.55C165.441 36.55 162.191 35.8 159.491 34.3C156.791 32.8 154.707 30.7 153.241 28C151.807 25.2667 151.091 22.05 151.091 18.35C151.091 15.5833 151.491 13.1 152.291 10.9C153.124 8.66667 154.324 6.76667 155.891 5.2C157.457 3.6 159.357 2.36666 161.591 1.5C163.857 0.633332 166.407 0.199999 169.241 0.199999C170.907 0.199999 172.591 0.416666 174.291 0.85C176.024 1.25 177.524 1.83333 178.791 2.6C179.624 3.06666 180.191 3.65 180.491 4.35C180.791 5.05 180.874 5.75 180.741 6.45C180.641 7.15 180.357 7.75 179.891 8.25C179.457 8.75 178.907 9.06667 178.241 9.2C177.574 9.33333 176.824 9.18333 175.991 8.75C174.991 8.15 173.941 7.71667 172.841 7.45C171.741 7.18333 170.624 7.05 169.491 7.05C167.257 7.05 165.374 7.5 163.841 8.4C162.341 9.26667 161.207 10.5333 160.441 12.2C159.674 13.8667 159.291 15.9167 159.291 18.35C159.291 20.75 159.674 22.8 160.441 24.5C161.207 26.2 162.341 27.5 163.841 28.4C165.374 29.2667 167.257 29.7 169.491 29.7C170.557 29.7 171.641 29.5667 172.741 29.3C173.874 29.0333 174.957 28.6167 175.991 28.05C176.857 27.6167 177.624 27.4667 178.291 27.6C178.991 27.7 179.557 28 179.991 28.5C180.457 28.9667 180.741 29.5333 180.841 30.2C180.974 30.8667 180.907 31.5333 180.641 32.2C180.374 32.8667 179.874 33.4333 179.141 33.9C177.907 34.7333 176.391 35.3833 174.591 35.85C172.791 36.3167 171.007 36.55 169.241 36.55ZM189.471 36.45C188.204 36.45 187.237 36.1 186.571 35.4C185.904 34.7 185.571 33.7167 185.571 32.45V4.25C185.571 2.98333 185.904 2.01667 186.571 1.35C187.237 0.649998 188.204 0.299998 189.471 0.299998C190.704 0.299998 191.654 0.649998 192.321 1.35C192.987 2.01667 193.321 2.98333 193.321 4.25V16.1H193.421L206.721 2.2C207.287 1.6 207.871 1.15 208.471 0.85C209.104 0.516665 209.821 0.349997 210.621 0.349997C211.787 0.349997 212.621 0.649997 213.121 1.25C213.654 1.85 213.887 2.55 213.821 3.35C213.754 4.15 213.387 4.9 212.721 5.6L199.371 19.25L199.421 15.9L213.421 30.85C214.187 31.6833 214.571 32.5333 214.571 33.4C214.604 34.2667 214.321 35 213.721 35.6C213.154 36.1667 212.304 36.45 211.171 36.45C210.204 36.45 209.421 36.25 208.821 35.85C208.254 35.45 207.621 34.8667 206.921 34.1L193.421 19.9H193.321V32.45C193.321 33.7167 192.987 34.7 192.321 35.4C191.687 36.1 190.737 36.45 189.471 36.45ZM223.294 36C221.994 36 220.994 35.65 220.294 34.95C219.594 34.25 219.244 33.25 219.244 31.95V4.8C219.244 3.5 219.594 2.5 220.294 1.8C220.994 1.1 221.994 0.749998 223.294 0.749998H240.744C241.744 0.749998 242.494 1.01667 242.994 1.55C243.528 2.05 243.794 2.78333 243.794 3.75C243.794 4.75 243.528 5.51667 242.994 6.05C242.494 6.55 241.744 6.8 240.744 6.8H226.644V15.05H239.594C240.628 15.05 241.394 15.3167 241.894 15.85C242.428 16.35 242.694 17.1 242.694 18.1C242.694 19.1 242.428 19.8667 241.894 20.4C241.394 20.9 240.628 21.15 239.594 21.15H226.644V29.95H240.744C241.744 29.95 242.494 30.2167 242.994 30.75C243.528 31.25 243.794 31.9833 243.794 32.95C243.794 33.95 243.528 34.7167 242.994 35.25C242.494 35.75 241.744 36 240.744 36H223.294ZM261.068 36.45C259.801 36.45 258.834 36.1 258.168 35.4C257.501 34.7 257.168 33.7167 257.168 32.45V7.15H248.318C247.284 7.15 246.484 6.86667 245.918 6.3C245.351 5.73333 245.068 4.95 245.068 3.95C245.068 2.91666 245.351 2.13333 245.918 1.6C246.484 1.03333 247.284 0.749998 248.318 0.749998H273.768C274.801 0.749998 275.601 1.03333 276.168 1.6C276.734 2.13333 277.018 2.91666 277.018 3.95C277.018 4.95 276.734 5.73333 276.168 6.3C275.601 6.86667 274.801 7.15 273.768 7.15H264.918V32.45C264.918 33.7167 264.584 34.7 263.918 35.4C263.284 36.1 262.334 36.45 261.068 36.45Z"
                        fill="url(#paint0_linear_186_352)" />
                    <defs>
                        <linearGradient id="paint0_linear_186_352" x1="73.5479" y1="54" x2="137.5" y2="54"
                            gradientUnits="userSpaceOnUse">
                            <stop stop-color="#0077B6" />
                            <stop offset="1" stop-color="#00B4D8" />
                        </linearGradient>
                    </defs>
                </svg></a>
        </div>
        <h5><i class="fa fa-map-marker"></i> Obsit Military Shop - Debrecen, Piac utca 45-47. <br> <i
                class="fa fa-calendar"></i> Nyitvatartás: Hétfő-Szerda 9:00-17:30. <i class="fa fa-phone"></i>
            Telefon: 06 1 615 0000.</h5>
    </div>
</div>
-->
<section id="fighters" class="page-section">
    <div class="image-bg content-in fixed" data-background="{{asset('img/sections/bg/background.jpg')}}"></div>
    <div class="container text-center white">
        <div class="section-title" data-animation="fadeInUp">
            <h2 class="title">3. Gewiss Gála Versenyzői</h2>
        </div>
        <div class="row">
            <div class="owl-carousel navigation-1 light-switch white" data-pagination="false" data-items="4" data-autoplay="true" data-navigation="true" data-animation="fadeInUp">
                @foreach ($fighters as $fighter)
                <div class="col-sm-4 col-md-3 icons-hover-color bottom-xs-pad-20">
                    <div class="image">
                        <!-- Image -->
                        <img src="{{asset('/storage/' . $fighter->photo)}}" test="{{asset('storage/' . $fighter->photo)}}" alt="" title="" width="270" height="270" />
                    </div>
                    <div class="description">
                        <!-- Name -->
                        <h4 class="name text-color"><a href="{{route('fighters.show', $fighter->id)}}">{{ $fighter->name }}</a> - <span style="color: #c0974a">{{ \Carbon\Carbon::parse($fighter->date_of_birth)->age }}</span>
                            <br>
                            <img width="25px" src="{{ asset('/storage/flags/4x3/' . \App\Models\Fighter::getFlag($fighter->id))}}">
                        </h4>
                        <!-- Designation -->
                        <div class="role">{{$fighter->fighting_style}} - <b>{{$fighter->weight}} kg</b> -
                            @if($fighter->gender == 0)
                            <i class="fa fa-mars"></i>
                            @else
                            <i class="fa fa-venus"></i>
                            @endif
                        </div>
                        <!-- Text -->
                        <p>
                            @if(isset($fighter->trainer))
                            <b>Edző: </b>{{$fighter->trainer}}</br>
                            @endif
                            @if(isset($fighter->club))
                            <b>Klub: </b> {{$fighter->club}}</br>
                            @endif
                            @if(isset($fighter->city))
                            <b>Lakhely: </b> {{$fighter->city}}</br>
                            @endif
                            @if(isset($fighter->agegroup))
                            <b>Korosztály: </b> {{$fighter->agegroup}}
                            @endif
                        </p>
                    </div>
                    <div class="social-icon i-3x">
                        <!-- Social Icons -->
                        <i class="fa fa-thumbs-up"></i> {{$fighter->wins}}
                        <i class="fa fa-thumbs-down"></i> {{$fighter->losses}}
                        <i class="fa fa-close"></i> {{$fighter->draws}}
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<section id="fights" class="page-section">
    <div class="section-title white" data-animation="fadeInUp">
        <h2 class="title">3. Gewiss Gála Eredményei</h2>
    </div>

    <div class="container">
        <div class="section-padding section-margin center col-md-12 col-sm-12">
            <div class="owl-carousel fights-carousel navigation-1 light-switch white" data-items="1" data-autoplay="false" data-navigation="true" data-dots="true">

                @php $i = count($fights)+1 @endphp
                @foreach($fights as $fight)
                @php
                $red = Fighter::find($fight->fighter1_id);
                $blue = Fighter::find($fight->fighter2_id);
                $winner = Fighter::find($fight->winner_id);
                $i--;
                @endphp

                <div class="fight-slide">
                    <div class="panel panel-default">
                        <div class="@if (isset($winner) && $red && $winner && $red->id == $winner->id) pirossarok @endif
                          @if (isset($winner) && $blue && $winner && $blue->id == $winner->id) keksarok @endif
                          @if($fight->title_fight == 1) title-fight @endif
                          @if($fight->agegroup == 'Felnőtt' && $fight->title_fight == 0) felnott @endif
                          @if($fight->agegroup == 'Gyerek') gyerek @endif">
                            <div class="row fight-row">
                                <div class="col-md-3 text-center">
                                    <img src="{{ asset('/storage/' . $fight->photo) }}" alt="Fight Image" class="avatar">
                                </div>

                                <div class="col-md-3">
                                    <h5 class="mb-5"><strong>{{ $i }}. mérkőzés</strong></h5>
                                    <p><strong><span class="text-color">Kezdés: </span></strong>{{ date('H:i', strtotime($fight->date)) }}</p>
                                    <p><strong><span class="text-color">Időtartam: </span></strong>{{ $fight->duration }}</p>
                                    <p><strong><span class="text-color">Szabályrendszer: </span></strong>{{ $fight->fighting_style }}</p>
                                    <p><strong><span class="text-color">Korcsoport: </span></strong>{{ $fight->agegroup }}</p>
                                    <p><strong><span class="text-color">Súlykategória: </span></strong>{{ $fight->weight }} kg</p>
                                    @if(isset($winner))
                                    <p><strong><span class="text-color">Győztes: </span></strong>
                                        {{ $winner->name }}
                                        @if($fight->ko == 1) - KO @endif
                                        @if($fight->tko == 1) - TKO @endif
                                    </p>
                                    @endif
                                </div>

                                <div class="col-md-3">
                                    <p style="color:#ff0000">Piros sarok:</p>
                                    @if($red)
                                    <h5>
                                        <a style="color:white;" href="{{ route('fighters.show', $red->id) }}">{{ $red->name }}</a>
                                        - {{ \Carbon\Carbon::parse($red->date_of_birth)->age }}
                                        <img width="25px" src="{{ asset('/storage/flags/4x3/' . \App\Models\Fighter::getFlag($red->id)) }}">
                                    </h5>
                                    <p><strong><span class="text-color">Klub: </span></strong>{{ $red->club }}</p>
                                    <p><strong><span class="text-color">Edző: </span></strong>{{ $red->trainer }}</p>
                                    <p><strong><span class="text-color">Lakhely: </span></strong>{{ $red->city }}</p>
                                    <p><strong><span class="text-color">Győzelem: </span></strong>{{ $red->wins }}</p>
                                    <p><strong><span class="text-color">Vereség: </span></strong>{{ $red->losses }}</p>
                                    @endif
                                </div>

                                <div class="col-md-3">
                                    <p style="color:#0000ff">Kék sarok:</p>
                                    @if($blue)
                                    <h5>
                                        <a style="color:white;" href="{{ route('fighters.show', $blue->id) }}">{{ $blue->name }}</a>
                                        - {{ \Carbon\Carbon::parse($blue->date_of_birth)->age }}
                                        <img width="25px" src="{{ asset('/storage/flags/4x3/' . \App\Models\Fighter::getFlag($blue->id)) }}">
                                    </h5>
                                    <p><strong><span class="text-color">Klub: </span></strong>{{ $blue->club }}</p>
                                    <p><strong><span class="text-color">Edző: </span></strong>{{ $blue->trainer }}</p>
                                    <p><strong><span class="text-color">Lakhely: </span></strong>{{ $blue->city }}</p>
                                    <p><strong><span class="text-color">Győzelem: </span></strong>{{ $blue->wins }}</p>
                                    <p><strong><span class="text-color">Vereség: </span></strong>{{ $blue->losses }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>
        </div>
    </div>
</section>
<section id="gallery" class="page-section gallery-section">
    @php
    $gallery = \App\Models\MainGallery::query()
    ->where('is_active', true)
    ->where('category', 'gala3')
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
<div id="sponsors" style="background-color:#0a1215; color: white;" class="get-a-quote black text-center">
    <div class="container text-center white">
        <div class="row" data-animation="pulse">
            <div class="section-title" data-animation="fadeInUp">
                <h2 class="title">Támogatóink</h2>
            </div>
        </div>
        <div class="row" style="padding: 10px;">
            <div class="owl-carousel navigation-1 light-switch white" style="autoplayTimeout: 1000 !important" data-pagination="false" data-items="5" data-autoplay="true" data-navigation="true" data-animation="fadeInUp">
                <div class="col-sm-2 text-center icons-hover-color bottom-xs-pad-20 level-1">
                    <div class="image">
                        <img src="{{asset('img/logos/bam.png')}}" alt="" title="" />
                    </div>
                    <div>
                        <p><small style="font-size: 65%;">Főtámogató</small></p>
                    </div>
                </div>
                <div class="col-sm-2 icons-hover-color bottom-xs-pad-20 level-2">
                    <div class="image">
                        <img src="{{asset('img/logos/outsys.png')}}" alt="" title="" />
                    </div>
                    <p><small style="font-size: 55%;">Kiemelt támogató</small></p>
                </div>
                <div class="col-sm-2 icons-hover-color bottom-xs-pad-20 level-2">
                    <div class="image">
                        <img src="{{asset('img/logos/tranzit.png')}}" alt="" title="" />
                    </div>
                    <p><small style="font-size: 55%;">Kiemelt támogató</small></p>
                </div>
                <div class="col-sm-2 icons-hover-color bottom-xs-pad-20 level-5">
                    <div class="image">
                        <img src="{{asset('img/logos/gewiss.png')}}" alt="" title="" />
                    </div>
                    <p><small style="font-size: 55%;">Kiemelt támogató</small></p>
                </div>
                <div class="col-sm-2 icons-hover-color bottom-xs-pad-20 level-3">
                    <div class="image">
                        <img src="{{asset('img/logos/dezso.png')}}" alt="" title="" />
                    </div>
                    <p><small style="font-size: 45%;">Arany támogató</small></p>
                </div>
                <div class="col-sm-2 icons-hover-color bottom-xs-pad-20 level-3">
                    <div class="image">
                        <img src="{{asset('img/logos/garden.png')}}" alt="" title="" />
                    </div>
                    <p><small style="font-size: 45%;">Arany támogató</small></p>
                </div>
                <div class="col-sm-2 icons-hover-color bottom-xs-pad-20 level-4">
                    <div class="image">
                        <img src="{{asset('img/logos/vizangyal.png')}}" alt="" title="" />
                        <p><small style="font-size: 45%;">Arany támogató</small></p>
                    </div>
                </div>
                <div class="col-sm-2 icons-hover-color bottom-xs-pad-20 level-4">
                    <div class="image">
                        <img src="{{asset('img/logos/ave.png')}}" alt="" title="" />
                        <p><small style="font-size: 45%;">Arany támogató</small></p>
                    </div>
                </div>
                <div class="col-sm-2 icons-hover-color bottom-xs-pad-20 level-5">
                    <div class="image">
                        <img src="{{asset('img/logos/panyolai.png')}}" alt="" title="" />
                        <p><small style="font-size: 45%;">Arany támogató</small></p>
                    </div>
                </div>
                <div class="col-sm-2 icons-hover-color bottom-xs-pad-20 level-5">
                    <div class="image">
                        <img src="{{asset('img/logos/leona.png')}}" alt="" title="" />
                    </div>
                    <p><small style="font-size: 45%;">Arany támogató</small></p>
                </div>
                <div class="col-sm-2 icons-hover-color bottom-xs-pad-20 level-5">
                    <div class="image">
                        <img src="{{asset('img/logos/krekk.png')}}" alt="" title="" />
                    </div>
                    <p><small style="font-size: 40%;">Ezüst támogató</small></p>
                </div>
                <div class="col-sm-2 icons-hover-color bottom-xs-pad-20 level-5">
                    <div class="image">
                        <img src="{{asset('img/logos/gerda.png')}}" alt="" title="" />
                    </div>
                    <p><small style="font-size: 40%;">Ezüst támogató</small></p>
                </div>
                <div class="col-sm-2 icons-hover-color bottom-xs-pad-20 level-5">
                    <div class="image">
                        <img src="{{asset('img/logos/grande.png')}}" alt="" title="" />
                    </div>
                    <p><small style="font-size: 40%;">Ezüst támogató</small></p>
                </div>
                <div class="col-sm-2 icons-hover-color bottom-xs-pad-20 level-5">
                    <div class="image">
                        <img src="{{asset('img/logos/vintage.png')}}" alt="" title="" />
                    </div>
                    <p><small style="font-size: 40%;">Ezüst támogató</small></p>
                </div>
                <div class="col-sm-2 icons-hover-color bottom-xs-pad-20 level-5">
                    <div class="image">
                        <img src="{{asset('img/logos/tbutor.png')}}" alt="" title="" />
                    </div>
                    <p><small style="font-size: 35%;">Bronz támogató</small></p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
