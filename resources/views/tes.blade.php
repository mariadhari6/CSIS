@extends('layouts.v_main')
@section('title','Customer Service')
@section('title-table','Wellcome to Custommer service')


@section('content')

<div class="container-fluid">
    {{-- <h4 class="page-title">Wellcome to Custommer service </h4> --}}



    <div class="row">
        <div class="col-md-3">
            <div class="card card-stats card-success d_company">
                <i class="fas fa-building fa-7x d_company-icon"></i>
                <p class="card-category d_company-teks">Company</p>
                <p class="d_company-number">100</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-stats card-danger d_gps">
                <i class="fas fa-building fa-3x d_gps-icon"></i>
                <p class="card-category d_gps-teks">GPS</p>
                <p class="d_gps-number">100</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-stats card-warning d_sensor">
                <i class="fas fa-building fa-3x d_sensor-icon"></i>
                <p class="card-category d_sensor-teks">Sensor</p>
                <p class="d_sensor-number">100</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-stats card-success d_vehicle">
                <i class="fas fa-building fa-5x d_vehicle-icon"></i>
                <p class="card-category d_vehicle-teks">Vehicle</p>
                <p class="d_vehicle-number">100</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-stats card-success d_gsm">
                <i class="fas fa-building fa-7x d_gsm-icon"></i>
                <p class="card-category d_gsm-teks">GSM</p>
                <p class="d_gsm-number">100</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-stats card-success d_RequstComp">
                <i class="fas fa-building fa-5x d_RequstComp-icon"></i>
                <p class="card-category d_RequstComp-teks">Request Complaint</p>
                <p class="d_RequstComp-number">100</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-stats card-success d_visitAs">
                <i class="fas fa-building fa-5x d_visitAs-icon"></i>
                <p class="card-category d_visitAs-teks">Visit Assignment</p>
                <p class="d_visitAs-number">100</p>
            </div>
        </div>



        {{-- <div class="container">
            <div class="card">
                <div class="imgBx">
                <img src="https://assets.codepen.io/4164355/shoes.png">
                </div>
                <div class="contentBx">
                <h2>Nike Shoes</h2>
                <div class="size">
                    <h3>Size :</h3>
                    <span>7</span>
                    <span>8</span>
                    <span>9</span>
                    <span>10</span>
                </div>
                <div class="color">
                    <h3>Color :</h3>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <a href="#">Buy Now</a>
                </div>
             </div>
        </div> --}}




        {{-- <div class="col-md-3">
            <div class="card card-stats card-warning">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="fas fa-building"></i>
                            </div>
                        </div>
                        <div class="col-7 d-flex align-items-center">
                            <div class="numbers">
                                <p class="card-category">Company</p>
                                <h4 class="card-title">{{ $company->count() }}</h4>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-stats card-success">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="fas fa-map"></i>
                            </div>
                        </div>
                        <div class="col-7 d-flex align-items-center">
                            <div class="numbers">
                                <p class="card-category">GPS</p>
                                <h4 class="card-title">{{ $gps->count() }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-stats card-danger">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="fas fa-rss"></i>
                            </div>
                        </div>
                        <div class="col-7 d-flex align-items-center">
                            <div class="numbers">
                                <p class="card-category">Sensor</p>
                                <h4 class="card-title">{{ $sensor->count() }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-stats card-info">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="fas fa-sim-card"></i>
                            </div>
                        </div>
                        <div class="col-7 d-flex align-items-center">
                            <div class="numbers">
                                <p class="card-category">GSM</p>
                                <h4 class="card-title">{{ $gsm->count() }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        {{-- <div class="col-md-3">
            <div class="card card-stats card-primary-soft">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="fas fa-rss"></i>
                            </div>
                        </div>
                        <div class="col-7 d-flex align-items-center">
                            <div class="numbers">
                                <p class="card-category">GSM</p>
                                <h4 class="card-title">{{ $gsm->count() }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        {{-- <div class="col-md-6">
            <div class="card">
                <div id="columnchart_values" style="width: 900px; height: 300px;">
                </div>
                <div>
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div> --}}
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
