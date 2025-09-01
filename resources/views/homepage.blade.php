@extends('layouts.layout')
@section('content')

<style>
    /* Swiper fix */
.schedule-board.swiper {
  width: 100%;
  padding: 20px 0;
}
.schedule-day {
  background: rgba(15,26,31,0.85);
  border: 2px solid #c0974a;
  border-radius: 12px;
  padding: 16px;
  min-height: 280px;
  display: flex;
  flex-direction: column;
  justify-content: flex-start;
}

.schedule-header {
  font-weight: bold;
  font-size: 1.2rem;
  margin-bottom: 12px;
  color: #c0974a;
  text-align: center;
}

.schedule-cell {
  margin-bottom: 10px;
}

.schedule-cell .time {
  font-size: .9rem;
  font-weight: 600;
  color: #e7e7e7;
}

.schedule-cell .label {
  font-size: .95rem;
  color: #e7e7e7;
}

</style>

<!-- about -->
<section id="about" class="page-section">
    <div class="container">
        <div class="row align-items-center">
            <!-- Kép helye -->
            <div class="col-md-6 text-center">
                <img src="{{ asset('img/sections/grid/team.jpg') }}" alt="Edzőterem" class="img-fluid" style="aspect-ratio: 16/9; border-radius: 10px;" /> <br> <br>
                <img src="{{ asset('img/sections/grid/team2.jpg') }}" alt="Edzőterem" class="img-fluid" style="aspect-ratio: 16/9; border-radius: 10px;" />
            </div>
            <!-- Szöveg -->
            <div class="col-md-6">
                <div class="section-title" data-animation="fadeInUp">
                    <h2 class="title">Rólunk</h2>
                </div>
                <p>
                    Debrecen zöld szívében, a Nagyerdőn (Pallagi út 2.) található, minőségi sporteszközökkel
                    felszerelt edzőtermében várja a sportolni vágyókat. Megközelítés autóval és
                    tömegközlekedéssel lehetséges, az 1-es villamos megállója a terem előtt található.
                    Parkolásra van lehetőség az edzőterem előtti fizetős felszíni parkolókban és a Nagyerdei
                    Ködszínház alatt található mélygarázsban.
                </p>
                <h4 class="mt-3">Tevékenységünk</h4>
                <p>
                    A <b>GEWISS TRAINING SE.</b> 2017 óta meghatározó szereplője Debrecen és a régió sportéletének.
                    Egyesületünk elnöke <b>Zilai Sándor</b> (Muay Thai világ-, és Európa bajnok, minden fegyvernemben
                    jártas sportlövő) neve és szakmai munkája a garancia arra, hogy sportolóink a legjobb
                    kezekben vannak.
                </p>
                <p>Az egyesület fő célkitűzése, hogy a tagjai számára biztosítsa:</p>
                <ul class="text-left">
                    <li>- a szabadidő egészséges és kulturált eltöltését,</li>
                    <li>- a tehetséges fiatalok közösségbe szervezését,</li>
                    <li>- az ifjúság fizikai teljesítőképességének, edzettségének fejlesztését,</li>
                    <li>- az igazolt versenyzők bel- és külföldi megmérettetéseire történő felkészítését.</li>
                </ul>
                <br>
                <p>
                    Az egyesület által tartott csoportos edzéseken szorgalmukkal, tehetségükkel kiemelkedő
                    fiataloknak lehetőséget kívánunk biztosítani, hogy tudásukat magasabb szintre emelve
                    versenyengedéllyel rendelkező utánpótlás sportolóként színvonalas versenyeken küzdhessenek.
                    A tehetséges gyerekekkel külön edzések keretében foglalkozunk, és a szülőkkel közösen hozott
                    felelős döntést követően lehetőségük nyílhat versenyezni.
                </p>
                <p><b>Két szakosztályunk van:</b> muay thai és ökölvívás.</p>
            </div>
        </div>
    </div>
</section>
<section id="schedule" class="page-section schedule-section">
    @php
    use App\Models\ScheduleItem;
    $days = ScheduleItem::dayLabels();
    $itemsByDay = \App\Models\ScheduleItem::query()
    ->orderBy('day')->orderBy('start_time')->orderBy('sort')
    ->get()
    ->groupBy('day');
    @endphp

    <div class="container">
        <div class="section-title" data-animation="fadeInUp">
            <h2 class="title">Órarend/Schedule</h2>
        </div>
        <div class="lang-switch">
            <button class="lang-btn" data-lang="hu" aria-label="Magyar">
                <img src="{{ asset('/storage/flags/4x3/hu.svg') }}" width="28" height="21" alt="Magyar zászló">
            </button>
            <button class="lang-btn" data-lang="en" aria-label="English">
                <img src="{{ asset('/storage/flags/4x3/gb.svg') }}" width="28" height="21" alt="English flag">
            </button>
        </div>
        <div class="schedule-board swiper">
            <div class="swiper-wrapper">
                @foreach($days as $dKey => $dLabel)
                <div class="swiper-slide">
                    <div class="schedule-day">
                        <div class="schedule-header" data-i18n="{{ $dLabel }}">{{ $dLabel }}</div>

                        @for($row = 0; $row < 3; $row++) @php $item=optional($itemsByDay->get($dKey))->values()->get($row);
                            @endphp
                            <div class="schedule-cell">
                                @if($item)
                                <div class="time">{{ $item->start_time->format('H:i') }}–{{ $item->end_time->format('H:i') }}</div>
                                <div class="label" data-i18n="{{ $item->title }}">
                                    {{ mb_strtoupper($item->title) }}
                                    @if($item->subtitle)
                                    <br><small data-i18n="{{ $item->subtitle }}">{{ $item->subtitle }}</small>
                                    @endif
                                </div>
                                @endif
                            </div>
                            @endfor
                    </div>
                </div>
                @endforeach
            </div>
            <!-- Swiper nav -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-pagination"></div>
        </div>
        <br>
        <div>
            <p class="text-muted text-center">Az első edzésre hozz magaddal egy rövidnadrágot
                és pólót! Ha úgy döntesz, járnál rendszeresen,
                hamar be kell szerezned egy
                10 vagy 12-es méretű kesztyűt,
                fogvédőt és bandázst (fiúknak 4,5 méterest, lányoknak 3,5 méterest). </p>
        </div>
</section>
<section id="contact" class="page-section contact-section">
    <div class="container">
        <div class="section-title" data-animation="fadeInUp">
            <h2 class="title">Kapcsolat</h2>
        </div>

        <div class="row align-items-stretch">
            <!-- Elérhetőségek -->
            <div class="col-md-5">
                <div class="contact-card">
                    <h4 class="mb-3">Lépj velünk kapcsolatba</h4>
                    <p class="mb-2">
                        <i class="fa fa-phone"></i>
                        <a href="tel:+36301234567">+36 30 703 8827</a>
                    </p>
                    <p class="mb-2">
                        <i class="fa fa-envelope"></i>
                        <a href="mailto:gewisstraining2017@gmail.com">gewisstraining2017@gmail.com</a>
                    </p>
                    <p class="mb-0">
                        <i class="fa fa-map-marker"></i>
                        Pallagi út 2., Debrecen (Nagyerdő)
                    </p>
                    <hr>
                    <a class="btn btn-outline-light btn-sm" target="_blank" href="https://maps.google.com/?q=Pallagi%20%C3%BAt%202,%20Debrecen">
                        Megnyitás Google Térképen
                    </a>
                </div>
            </div>

            <!-- Térkép -->
            <div class="col-md-7">
                <div class="map-wrap">
                    <!-- Cseréld a q/center paramétert a pontos koordinátára/névre -->
                    <iframe title="Helyszín térkép" width="600" height="450" style="border:0;" loading="lazy" allowfullscreen referrerpolicy="no-referrer-when-downgrade" src="https://www.google.com/maps?q=Pallagi%20%C3%BAt%202,%20Debrecen&output=embed">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>


<style>
    .live-now {
        font-size: 18px;
        font-weight: bold;
        color: #fff;
        /* White text */
        background-color: #FF0000;
        /* YouTube Red background */
        border: none;
        border-radius: 30px;
        cursor: pointer;
        outline: none;
        box-shadow: 0 0 0px rgba(255, 0, 0, 0.5);
        position: relative;
        overflow: hidden;
        animation: glow 1.5s ease-in-out infinite, pulse 1.5s ease-in-out infinite;
    }

    .live-now::after {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border-radius: 5px;
        opacity: 0;
        animation: pulse-bg 1.5s ease-in-out infinite;
    }

    @keyframes glow {

        0%,
        100% {
            box-shadow: 0 0 15px rgba(255, 0, 0, 0.5);
        }

        50% {
            box-shadow: 0 0 25px rgba(255, 0, 0, 5);
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

</style>

@endsection
