@extends('layouts.layout')
@section('content')
<section id="works" class="page-section">
    <div class="image-bg content-in fixed" data-background="{{asset('img/sections/bg/background.jpg')}}">
        <div class="overlay"></div>
    </div>
    <div class="container work-section">
        <div class="section-title white" data-animation="fadeInUp">
            <!-- Heading -->
            <h2 class="title">Versenyzők</h2>
        </div>
        <div id="options" class="filter-menu" data-animation="fadeInDown">
            <ul class="option-set nav nav-pills">
                <li class="filter active" data-filter="all">Összes</li>
                <li class="filter" data-filter=".nok">Nők</li>
                <li class="filter" data-filter=".ferfiak">Férfiak</li>
                <li class="filter" data-filter=".k1">K1</li>
                <li class="filter" data-filter=".kickbox">Kick-box</li>
                <li class="filter" data-filter=".muaythai">Muay Thai</li>
                <li class="filter" data-filter=".gyerek">Gyerek</li>
                <li class="filter" data-filter=".felnott">Felnőtt</li>
            </ul>
        </div>
    </div>
    <!-- filter -->
    <div id="mix-container" class="portfolio-grid text-center" data-animation="fadeInUp">
        @foreach ($fighters as $fighter)
            <div class="col-sm-4 col-md-3 icons-hover-color bottom-xs-pad-20 mix all
            @if($fighter->gender == '1') nok @else ferfiak @endif
            @if($fighter->fighting_style == 'K1') k1 @endif
            @if($fighter->fighting_style == 'Kick-box') kickbox @endif
            @if($fighter->fighting_style == 'Muay Thai') muaythai @endif
            @if($fighter->agegroup == 'Gyerek') gyerek @endif
            @if($fighter->agegroup == 'Felnőtt') felnott @endif
            ">
                <div class="image">
                    <!-- Image -->
                    <img src="{{asset('/storage/' . $fighter->photo)}}" test="{{asset('storage/' . $fighter->photo)}}"
                        alt="" title="" width="270" height="270" />
                </div>
                <div class="description">
                    <!-- Name -->
                    <h4 class="name text-color"><a href="{{route('fighters.show', $fighter->id)}}">{{ $fighter->name }}</a> <span
                            style="color: white;"> - {{ \Carbon\Carbon::parse($fighter->date_of_birth)->age }}</span>
                        <br>
                        <img width="25px"
                            src="{{ asset('/storage/flags/4x3/' . \App\Models\Fighter::getFlag($fighter->id))}}">
                    </h4>
                    <!-- Designation -->
                    <div class="role">{{$fighter->fighting_style}} - <b>{{$fighter->weight}} kg</b></div>
                    <!-- Text -->
                    <p><b>Edző: </b>{{$fighter->trainer}}</br>
                        <b>Klub: </b> {{$fighter->club}}</br>
                        <b>Lakhely: </b> {{$fighter->city}}
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
    <!-- Mix Container -->
</section>
<!-- page-section -->
@endsection