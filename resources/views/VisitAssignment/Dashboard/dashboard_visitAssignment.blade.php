@extends('layouts.v_main')
@section('title','CSIS | Dashboard Visit Assignment')

@section('content')

<div class="container-fluid">
    <h4 class="page-title">Dashboard Visit Assignment</h4>
    <div class="row">
        <div class="col-md-3">
            <div class="card card-stats card-grey">
                <div class="card-body ">
                    <div class="row">

                        <div class="col-12 d-flex align-items-left">
                            <div class="numbers">
                                <p class="card-category">Cost per Company</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-stats card-primary-soft">
                <div class="card-body ">
                    <div class="row">

                        <div class="col-12 d-flex align-items-center">
                            <div class="numbers">
                                <p class="card-category">Detail cost Percompany</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-stats card-primary-tua">
                <div class="card-body">
                    <div class="row">

                        <div class="col-12 d-flex align-items-center">
                            <div class="numbers">
                                <p class="card-category">Perbaikan Pertipe GPS</p>
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

                        <div class="col-12 d-flex align-items-center">
                            <div class="numbers">
                                <p class="card-category">Tugas Per-Teknisi</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-stats card-warning">
                <div class="card-body ">
                    <div class="row">

                        <div class="col-12 d-flex align-items-center">
                            <div class="numbers">
                                <p class="card-category">Equipment Terpakai</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-stats card-grey-soft">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-3">

                        </div>
                        <div class="col-9">
                            <div class="numbers">
                                <p class="card-category">Visit SLA</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-stats card-pink">
                <div class="card-body ">
                    <div class="row">

                        <div class="col-12 d-flex align-items-center">
                            <div class="numbers">
                                <p class="card-category">Visit Berbayar</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div id="columnchart_values" style="width: 900px; height: 300px;">
                </div>
            </div>
        </div>
        <br>
    </div>
</div>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" } ],
        ["oslog", {{ $pemasangan_mutasi_GPS }}, "#b87333"],
    ]);

    var view = new google.visualization.DataView(data);
    view.setColumns([0, 1,
                        { calc: "stringify",
                        sourceColumn: 1,
                        type: "string",
                        role: "annotation" },
                        2]);

    var options = {
        title: "Company",
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


@endsection
