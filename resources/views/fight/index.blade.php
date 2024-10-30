@extends('layouts.layout')
@section('content')
@php 
                                             use App\Models\Fight;
    use App\Models\Fighter;
@endphp
<style>
    /* Egyedi stílusok Bootstrap 3.3.5-höz */
    .fight-image {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
   
    .title-fight {
    background: linear-gradient(135deg, #0f1a1f, #19292f, #223740) !important; /* Sötét, elegáns átmenet */
    color: white  !important; /* Sötét szöveg a kontrasztért */
    border-radius: 6px;
    padding: 20px;
    margin: 14px 0;
    font-weight: 500;
    font-size: 0.9em;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    box-shadow: 2px 0px 8px #000;
}

.title-fight:hover {
    transform: scale(1.03) rotate(1deg); /* Enyhe forgatás hover-re */
    box-shadow: #000;
}

.felnott {
    background-color: #2e2e2e !important; /* Sötétebb, visszafogott háttér */
    color: #e6e6e6 !important; /* Világos szöveg */
    border-left: 5px solid #c0974a; /* Vastagabb, modern bal oldali kiemelés */
    padding: 18px;
    margin: 10px 0;
    font-weight: 500;
    font-size: 0.9em;
    transition: background-color 0.3s ease, border-left-color 0.3s ease;
}

.felnott:hover {
    background-color: #393939 !important;
    border-left-color: #d4a65d;
}

.gyerek {
    background-color: #212121 !important; /* Sötét, mély háttér */
    color: #cccccc !important;
    border-bottom: 4px rgba(192, 151, 74, 0.7); /* Modern, pontozott alsó keret */
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
<section id="fights" class="page-section">
    <div class="section-title white" data-animation="fadeInUp">
        <!-- Heading -->
        <h2 class="title">Meccsek</h2>
    </div>
    <div class="container">
        <div class="section-padding section-margin center col-md-12 col-sm-12">
            <div class="panel-group" id="fightsAccordion">
                @php $i = count($fights)+1 @endphp
                @foreach($fights as $fight)
                                @php
                                    $red = Fighter::find($fight->fighter1_id);
                                    $blue = Fighter::find($fight->fighter2_id);
                                    $winner = Fighter::find($fight->winner_id);
                                    $i--
                                @endphp
                                <div class="panel panel-default">
                                    <div class="@if($fight->title_fight == 1) title-fight @endif @if($fight->agegroup == 'Felnőtt' && $fight->title_fight == 0) felnott @endif @if($fight->agegroup == 'Gyerek') gyerek @endif" >
                                        <div class="row">
                                            <div class="col-md-3">
                                                <a data-toggle="collapse" data-parent="#fightsAccordion" href="#collapse{{$fight->id}}">
                                                    <img src="{{asset('/storage/' . $fight->photo)}}" alt="Fight Image" class="avatar">
                                                </a>
                                            </div>
                                            <div class="col-md-3">
                                                <p><h5 style="margin-bottom: 0px;"><strong>{{$i}}. mérkőzés</h5></p>
                                                <p><strong><span class="text-color">Kezdés: </span></strong>{{date('H:i', strtotime($fight->date))}}</span></p>
                                                <p><strong><span class="text-color">Időtartam:
                                                        </span></strong>{{$fight->duration}}</span></p>
                                                <p><strong><span class="text-color">Szabályrendszer:
                                                        </span></strong>{{$fight->fighting_style}}</span></p>
                                                <p><strong><span class="text-color">Korcsoport:
                                                        </span></strong>{{$fight->agegroup}}</span></p>
                                                <p><strong><span class="text-color">Súlykategória: </span></strong>{{$fight->weight}}
                                                    kg</span></p>
                                                @if(isset($winner))
                                                    <p><strong><span class="text-color">Győztes: </span></strong> {{$winner->name}}
                                                        @if($fight->ko == 1) - KO @endif @if($fight->tko == 1) - TKO @endif</span></p>
                                                @endif
                                            </div>
                                            <div class="col-md-3">
                                                <p>
                                                <h5>{{$red->name}} - {{ \Carbon\Carbon::parse($red->date_of_birth)->age }} <img
                                                        width="25px"
                                                        src="{{ asset('/storage/flags/4x3/' . \App\Models\Fighter::getFlag($red->id))}}">
                                                </h5>
                                                </p>
                                                <p><strong><span class="text-color">Klub:</strong> {{$red->club}}</p>
                                                <p><strong><span class="text-color">Edző:</strong> {{$red->trainer}}</p>
                                                <p><strong><span class="text-color">Lakhely:</strong> {{$red->city}}</p>
                                                <p><strong><span class="text-color">Győzelem:</strong> {{$red->wins}}</p>
                                                <p><strong><span class="text-color">Vereség:</strong> {{$red->losses}}</p>
                                            </div>
                                            <div class="col-md-3">
                                            <p>
                                                <h5>{{$blue->name}} - {{ \Carbon\Carbon::parse($blue->date_of_birth)->age }} <img
                                                        width="25px"
                                                        src="{{ asset('/storage/flags/4x3/' . \App\Models\Fighter::getFlag($blue->id))}}">
                                                </h5>
                                                </p>
                                                <p><strong><span class="text-color">Klub:</strong> {{$blue->club}}</p>
                                                <p><strong><span class="text-color">Edző:</strong> {{$blue->trainer}}</p>
                                                <p><strong><span class="text-color">Lakhely:</strong> {{$blue->city}}</p>
                                                <p><strong><span class="text-color">Győzelem:</strong> {{$blue->wins}}</p>
                                                <p><strong><span class="text-color">Vereség:</strong> {{$blue->losses}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection