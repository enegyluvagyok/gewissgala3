@extends('layouts.layout')
@section('content')
<div class="page-header">
    <div class="container">
        <h1 class="title">Gewiss Training SE</h1>
    </div>
</div>
<br>
<div class="container">
    <p>
        A GEWISS TRAINING SE. 2017 óta meghatározó szereplője Debrecen és a régió sportéletének. Egyesületünk elnöke
        Zilai Sándor (Muay Thai világ-, és Európa bajnok, minden fegyvernemben jártas sportlövő) neve és szakmai munkája
        a garancia arra, hogy sportolóink a legjobb kezekben vannak.
    </p>
    <p>
        Debrecen zöld szívében a Nagyerdőn (Pallagi út 2.) található, minőségi sporteszközökkel felszerelt edzőtermében
        várja a sportolni vágyókat. Az egyesület fő célkitűzése, hogy a tagjai számára biztosítsa
    </p>
    <ul>
        <li>- a szabadidő egészséges és kulturált eltöltését,</li>
        <li>- a tehetséges fiatalok közösségbe szervezését,</li>
        <li>- az ifjúság fizikai teljesítőképességének, edzettségének fejlesztését,</li>
        <li>- az igazolt versenyzők bel és külföldi megmérettetéseire történő felkészítését.</li>
    </ul><br>
    <p>
        Az egyesület által tartott csoportos edzéseken szorgalmukkal, tehetségükkel kiemelkedő fiataloknak lehetőséget
        kívánunk biztosítani, hogy tudásukat magasabb szintre emelve versenyengedéllyel rendelkező utánpótlás
        sportolóként színvonalas versenyeken küzdhessenek. A tehetséges gyerekekkel külön edzések keretében
        foglalkozunk, és a szülőkkel közösen hozott felelős döntést követően lehetőségük nyílhat versenyezni.
    </p>

    <h2>Csapatunk</h2>
    <div class="row">
        <div class="col-md-4 team-member">
            <h4>Zilai Sándor</h4>
            <p>Egyesület elnöke, szakmai vezető, edző</p>
        </div>
        <div class="col-md-4 team-member">
            <h4>Asztalos Zoltán</h4>
            <p>Futóedzések, erőnléti edzések</p>
        </div>
        <div class="col-md-4 team-member">
            <h4>dr. Timár Virág</h4>
            <p>Jogi tanácsadó, egyesületi titkár</p>
        </div>
        <div class="col-md-4 team-member">
            <h4>Asztalos Zoltán</h4>
            <p>Erőnléti edző</p>
        </div>
        <div class="col-md-4 team-member">
            <h4>Szabó Sándor</h4>
            <p>Box szakosztály vezető, box edző</p>
        </div>
        <div class="col-md-4 team-member">
            <h4>Kertész Sándor</h4>
            <p>Edző</p>
        </div>
        <div class="col-md-4 team-member">
            <h4>Orosz Gyula</h4>
            <p>Utánpótlás edző</p>
        </div>
        <div class="col-md-4 team-member">
            <h4>Rissai Bence</h4>
            <p>Edző</p>
        </div>
    </div>

    <div class="section-title">
        <h2 class="title">Képek</h2>
    </div>
    <div class="container text-center white">
        <div class="row">
            <div class="owl-carousel navigation-1 light-switch white" data-pagination="false" data-items="4"
                data-autoplay="true" data-navigation="true" data-animation="fadeInUp">
                @for($i = 1; $i<=10; $i++)
                <div class="col-sm-4 col-md-3 icons-hover-color bottom-xs-pad-20">
                    <div class="image">
                        <!-- Image -->
                        <img src="{{asset('/storage/uploads/'.$i.'.jpg' )}}"
                            test="{{asset('storage/uploads/'.$i.'.jpg' )}}" alt="" title="" width="270" height="270" />
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </div>
    <br>
</div>
@endsection