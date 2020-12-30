@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="col-12 justify-content-center">
        <div class="row">
            <div class="card ml-2" style="width: 11rem;">
                <div class="card-body">
                    <h5 class="card-title">Tested Positive</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $current_data->testedPositive}}</h6>
                </div>
            </div>
            <div class="card ml-2" style="width: 11rem;">
                <div class="card-body">
                    <h5 class="card-title">Recovered</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $current_data->recovered}}</h6>
                </div>
            </div>
            <div class="card ml-2" style="width: 11rem;">
                <div class="card-body">
                    <h5 class="card-title">Active Cases</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $current_data->activeCases}}</h6>
                </div>
            </div>
            <div class="card ml-2" style="width: 11rem;">
                <div class="card-body">
                    <h5 class="card-title">in ICU</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $current_data->inICU}}</h6>
                </div>
            </div>
            <div class="card ml-2" style="width: 11rem;">
                <div class="card-body">
                    <h5 class="card-title">Respiratory Aid</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $current_data->respiratoryAid}}</h6>
                </div>
            </div>
            <div class="card ml-2" style="width: 11rem;">
                <div class="card-body">
                    <h5 class="card-title">Death</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $current_data->deceased}}</h6>
                </div>
            </div>
            <div class="date">
                    <h6>Last Update On</h6>
                    <small>{{ $current_data->lastUpdatedAtSource}}</small>
            </div>
        </div>
    </div>
    <div class="col-12 justify-content-center mt-5">
        <div class="card ">
            <div class="card-header ">
                <h5 class="card-title" style="font-size: 15px;">
                    Covid Statistic Cases
                </h5>
            </div>
            <div class="card-body ">
                <div id="chart"></div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script >
  var options = {
      series: [],
      chart: {
          height: 350,
          type: 'line',
          zoom: {
            enabled: false
        }
    },
    dataLabels: {
      enabled: false
  },
  stroke: {
      curve: 'straight'
  },
  title: {
      text: 'Active Cases Malaysia',
      align: 'left'
  },
  noData: {
    text: 'Loading...'
},
grid: {
  row: {
            colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
            opacity: 0.5
        },
         xaxis: {
          categories: [],
        },
    }
};

var chart = new ApexCharts(document.querySelector("#chart"), options);
chart.render();

var url = 'https://api.covid19api.com/total/country/malaysia';

$.getJSON(url, function(response) {
  chart.updateSeries([{
    name: 'Active Cases',
    data: response
}]),
  chart.updateXaxis([{
    categories: response,
}])
});


</script>
@endsection
