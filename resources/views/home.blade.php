@extends('layouts.app')

@section('css')
<style>
    .card-subtitle{
        color: orange;
    }

    @media screen and (min-width: 414px) {   
    #map {
        position:fixed;
        width: 80%;
        height: 400px;
        display: block;
        margin-left: 123px;
        margin-top: 10px;
    }
    }
    @media screen and (min-width:1335px max-width: 2292px) {   
    #map {
        position:absolute;
        width: 50%;
        height: 400px;
        display: block;
        margin-left: 120px;
        margin-top: 10px;
    }
    }
    .card
    {
        padding: 2px;
        margin: 3px;
        width: 11rem;
        background-color: black;
    }
</style>
@endsection

@section('content')
<div class="container mt-5">
    <div class="col-12 col-xs-6 justify-content-center">
        <div class="header-text mb-3" style="color: #9197B0;">
            <h5>Current Statistics Dashboard: COVID-19 in Malaysia</h5>
        </div>
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title" style="color: #9197B0;">Tested Positive</h5>
                    <h6 class="card-subtitle mb-2">{{ $current_data->testedPositive}}</h6>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title" style="color: #9197B0;">Recovered</h5>
                    <h6 class="card-subtitle mb-2">{{ $current_data->recovered}}</h6>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title" style="color: #9197B0;">Active Cases</h5>
                    <h6 class="card-subtitle mb-2">{{ $current_data->activeCases}}</h6>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title" style="color: #9197B0;">in ICU</h5>
                    <h6 class="card-subtitle mb-2">{{ $current_data->inICU}}</h6>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title" style="color: #9197B0;">Respiratory Aid</h5>
                    <h6 class="card-subtitle mb-2">{{ $current_data->respiratoryAid}}</h6>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title" style="color: #9197B0;">Death</h5>
                    <h6 class="card-subtitle mb-2">{{ $current_data->deceased}}</h6>
                </div>
            </div>
            <div class="date mt-1 ml-2" style="color: #9197B0;">
                <h6>Last Update On</h6>
                <small>{{ $current_data->lastUpdatedAtSource}}</small>
            </div>
        </div>
    </div>
</div>
@endsection
@section('map')
<div class="row">
    <div id="map"></div>
</div>     
@endsection

@section('scripts')
<script >
 mapboxgl.accessToken = 'pk.eyJ1Ijoicm9oYWl6aW1vaGFtZWQiLCJhIjoiY2swcWU3Ym1vMDduajNtcnBkN3owZXhhcSJ9.iSYAlauLQH0MrnHDgvkhug';
 var map = new mapboxgl.Map({
    container: 'map', // container id
    style: 'mapbox://styles/rohaizimohamed/ckjpw2rjf473y19oah1h1fccg?fresh=true', // stylesheet location
    center: [110.625363,2.466065], // starting position [lng, lat]
    zoom: 2 // starting zoom
    // attributionControl: false,
});
 
</script>
@endsection
