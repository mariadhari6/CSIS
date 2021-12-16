@extends('layouts.v_main')
@section('title','Customer Service')
@section('title-table','Wellcome to Custommer service')


@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="card card-stats card-success d_company company">
                <i class="fas fa-building fa-7x d_company-icon"></i>
                <p class=" d_company-teks">Company</p>
                <p class="d_company-number">{{ $company->count()}}</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-stats card-danger d_gps gps">
                <i class="fas fa-map-marker-alt fa-3x d_gps-icon"></i>
                <p class="d_gps-teks">GPS</p>
                <p class="d_gps-number">{{ $gps->count() }}</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-stats card-warning d_sensor sensor">
                <i class="fas fa-rss fa-3x d_sensor-icon"></i>
                <p class="d_sensor-teks">Sensor</p>
                <p class="d_sensor-number">{{ $sensor->count() }}</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-stats card-success d_vehicle visit">
                <i class="fas fa-users-cog fa-5x d_vehicle-icon"></i>
                <p class="d_vehicle-teks">Visit Assignment</p>
                <p class="d_vehicle-number">{{ $visit->count() }}</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-stats card-success d_gsm gsm">
                <i class="fas fa-sim-card fa-5x d_gsm-icon"></i>
                <p class="d_gsm-teks">GSM</p>
                <p class="d_gsm-number">{{ $gsm->count() }}</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-stats card-success d_RequstComp request">
                <i class="fas fa-comments fa-5x d_RequstComp-icon"></i>
                <p class="d_RequstComp-teks">Request Complain</p>
                <p class="d_RequstComp-number">{{ $request->count() }}</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-stats card-success d_visitAs vehicle">
                <i class="fas fa-truck fa-4x d_visitAs-icon"></i>
                <p class="d_visitAs-teks">Vehicle</p>
                <p class="d_visitAs-number">{{ $vehicle->count() }}</p>
            </div>
        </div>

        <div class="table-home table_home">

        </div>

        <div class="table_company">

        </div>
        <div class="table_gps">

        </div>

        <div class="table_request">

        </div>

        <div class="table_visit">

        </div>
        <div class="table_gsm">

        </div>

        <div class="table_sensor">

        </div>

        <div class="table_vehicle">

        </div>
        <br>
    </div>
</div>


{{-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" } ],
        ["FirsName", {{ $username }}, "#b87333"],
    ]);

    var view = new google.visualization.DataView(data);
    view.setColumns([0, 1,
                        { calc: "stringify",
                        sourceColumn: 1,
                        type: "string",
                        role: "annotation" },
                        2]);

    var options = {
        title: "Username",
        width: 500,
        height: 300,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
        vAxis: {
            minValue: 0,
            maxValue: 100,
            format: '#\'%\''
        }
    };
    var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
    chart.draw(view, options);
}
</script>

<script>

    const labels = [
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
    ];
    const data = {
    labels: labels,
    datasets: [{
        label: 'My First dataset',
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
        data: [0, 10, 5, 2, 20, 30, 45],
    }]
    };

    const config = {
        type: 'line',
        data: data,
        options: {}
    };

    var myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
</script> --}}


@endsection
