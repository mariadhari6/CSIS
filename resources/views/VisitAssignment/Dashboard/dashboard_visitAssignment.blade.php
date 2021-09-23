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
                <div id="chart-div" style="width: 900px; height: 300px;">
                </div>
            </div>
        </div>
        <br>
    </div>
</div>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js">
</script>
    <script type="text/javascript">
                google.load("visualization", "1", {packages:["corechart"]});

            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Week Ending');
            data.addColumn('number', 'Total');
            data.addColumn('number', 'Passed');
            data.addColumn('number', 'Failed');
            data.addColumn('number', 'Incomplete');
        var options = {
            series: {
            0: { color: '#253646' },
            1: { color: '#009bde' },
            2: { color: '#8dc8ea' },
            3: { color: '#a7bbc4' }
            },
            vAxis: { viewWindow: {max: 100,min:0 }, gridlines: { color: '#f3f3f3', count: 7}},
            chartArea: {left:"5%", width:"90%"},
            vAxis :{ textStyle: {fontName: 'Aileron-Light',fontSize: 12 }},
            hAxis :{ textStyle: {fontName: 'Aileron-Light',fontSize: 12 }},
            tooltip: {textStyle:  {fontName: 'Aileron-Light',fontSize: 12}},
            legend: {textStyle:  {fontName: 'Aileron-Light',fontSize: 12,bold: false}, position: 'top', alignment: 'end' },
            pointSize: 5,
            is3D:true
        };
        var chart = new google.visualization.ColumnChart(document.getElementById('chart-div'));
        chart.draw(data, options);
    </script>

@endsection

