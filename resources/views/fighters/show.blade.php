@extends('layouts.layout')
@section('content')
<!-- Sticky Navbar -->
<div class="page-header">
    <div class="container">
        <h1 class="title">{{$fighter->name}}</h1>
    </div>
</div>
<!-- page-header -->
<section id="works" class="page-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img src="{{asset('/storage/' . $fighter->photo)}}" width="550" height="740" alt=""
                                title="" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 project-details">
                <p>
                    <b>Kor: </b> {{ \Carbon\Carbon::parse($fighter->date_of_birth)->age }}
                    <span></span>
                </p>
                <p>
                    <b>Ország:</b>
                    <span> <img width="25px"
                            src="{{ asset('/storage/flags/4x3/' . \App\Models\Fighter::getFlag($fighter->id))}}">
                        {{$fighter->country}}</span>
                </p>
                <p>
                    <b>Nem:</b>
                    <span>
                        @if($fighter->gender == 0)
                            <i class="fa fa-mars"></i> Férfi
                        @else
                            <i class="fa fa-venus"></i> Nő
                        @endif</span>
                </p>
                <p>
                    <b>Szabályrendszer: </b>
                    <span>{{$fighter->fighting_style}}</span>
                </p>
                <p>
                    <b>Korcsoport: </b>
                    <span>{{$fighter->agegroup}}</span>
                </p>
                <p>
                    <b>Edző: </b>
                    <span>{{$fighter->trainer}}</span>
                </p>
                <p>
                    <b>Klub: </b>
                    <span>{{$fighter->club}}</span>
                </p>
                <p>
                    <b>Lakhely: </b>
                    <span>{{$fighter->city}}</span>
                </p>
                <p>
                    <b>Súlycsoport: </b>
                    <span>{{$fighter->weight}} kg</span>
                </p>
                <p>
                    <b>Győzelem: </b>
                    <span>{{$fighter->wins}}</span>
                </p>
                <p>
                    <b>Vereség: </b>
                    <span>{{$fighter->losses}}</span>
                </p>
                <p>
                    <b>Döntetlen: </b>
                    <span>{{$fighter->draws}}</span>
                </p>
            </div>
        </div>
    </div>
</section>
<!-- works -->
<section id="related-post" class="page-section" style="display: none;">
    <div class="image-bg content-in fixed" data-background="{{asset('img/sections/bg/background.jpg')}}">
        <div class="overlay-strips"></div>
    </div>
    <div class="container white">
        <div class="section-title">
            <!-- Heading -->
            <h2 class="title">Médiamegjelenések</h2>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="owl-carousel pagination-1 light-switch" data-pagination="true" data-items="4"
                    data-autoplay="true" data-navigation="false">
                    <a href="#">
                        <img src="img/sections/portfolio/1.jpg" width="270" height="235" alt="" />
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection