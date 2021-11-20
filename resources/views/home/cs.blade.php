
@extends('layouts.v_main')
@section('title','Customer Service')
@section('title-table','Wellcome to Custommer service')


@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="card card-stats card-success d_company company">
                <i class="fas fa-building fa-7x d_company-icon"></i>
                <p class="card-category d_company-teks">Company</p>
                <p class="d_company-number">{{ $company->count() }}</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-stats card-danger d_gps gps">
                <i class="fas fa-map-marker-alt fa-3x d_gps-icon"></i>
                <p class="card-category d_gps-teks">GPS</p>
                <p class="d_gps-number">{{ $gps->count() }}</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-stats card-warning d_sensor sensor">
                <i class="fas fa-rss fa-3x d_sensor-icon"></i>
                <p class="card-category d_sensor-teks">Sensor</p>
                <p class="d_sensor-number">{{ $sensor->count() }}</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-stats card-success d_vehicle vehicle">
                <i class="fas fa-truck fa-5x d_vehicle-icon"></i>
                <p class="card-category d_vehicle-teks">Vehicle</p>
                <p class="d_vehicle-number">{{ $vehicle->count() }}</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-stats card-success d_gsm gsm">
                <i class="fas fa-sim-card fa-3x d_gsm-icon"></i>
                <p class="card-category d_gsm-teks">GSM</p>
                <p class="d_gsm-number">{{ $gsm->count() }}</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-stats card-success d_RequstComp request">
                <i class="fas fa-comments fa-5x d_RequstComp-icon"></i>
                <p class="card-category d_RequstComp-teks">Request Complaint</p>
                <p class="d_RequstComp-number">{{ $request->count() }}</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-stats card-success d_visitAs visit">
                <i class="fas fa-users-cog fa-5x d_visitAs-icon"></i>
                <p class="card-category d_visitAs-teks">Visit Assignment</p>
                <p class="d_visitAs-number">{{ $visit->count() }}</p>
            </div>
        </div>

        <div class="table-home table_id">

        </div>
        <br>
    </div>
</div>
<script>
    $('.company').click(function() {
        // $("#table-company").slideUp("fast");
        $("#table-vehicle").slideUp("fast");
        $("#table-gps").slideUp("fast");
        $("#table-sensor").slideUp("fast");
        $("#table-gsm").slideUp("fast");
        $("#table-request").slideUp("fast");

        $.get("{{ url('/item_data_Homecompany') }}", {}, function(data, status) {
            $('.table_id').html(data)

        });
    });

     $('.gps').click(function() {
        $("#table-company").slideUp("fast");
        $("#table-vehicle").slideUp("fast");
        $("#table-sensor").slideUp("fast");
        $("#table-gsm").slideUp("fast");
        $("#table-request").slideUp("fast");

        $.get("{{ url('/item_data_Homegps') }}", {}, function(data, status) {
            $('.table_id').html(data)

        });
    });

     $('.sensor').click(function() {
        $("#table-company").slideUp("fast");
        $("#table-gps").slideUp("fast");
        $("#table-vehicle").slideUp("fast");
        $("#table-gsm").slideUp("fast");
        $("#table-request").slideUp("fast");

        $.get("{{ url('/item_data_HomeSensor') }}", {}, function(data, status) {
            $('.table_id').html(data)

        });
    });

    $('.gsm').click(function() {
        $("#table-company").slideUp("fast");
        $("#table-gps").slideUp("fast");
        $("#table-sensor").slideUp("fast");
        $("#table-vehicle").slideUp("fast");
        $("#table-request").slideUp("fast");


        $.get("{{ url('/item_data_HomeGsm') }}", {}, function(data, status) {
            $('.table_id').html(data)

        });
    });

     $('.request').click(function() {
        $("#table-company").slideUp("fast");
        $("#table-gps").slideUp("fast");
        $("#table-sensor").slideUp("fast");
        $("#table-gsm").slideUp("fast");
        $("#table-vehicle").slideUp("fast");




        $.get("{{ url('/item_data_HomeRequest') }}", {}, function(data, status) {
            $('.table_id').html(data)

        });
    });

    $('.vehicle').click(function() {
        $("#table-company").slideUp("fast");
        $("#table-gps").slideUp("fast");
        $("#table-sensor").slideUp("fast");
        $("#table-gsm").slideUp("fast");
        $("#table-request").slideUp("fast");

        $.get("{{ url('/item_data_HomeVehicle') }}", {}, function(data, status) {
            $('.table_id').html(data)

        });
    });

    $('.visit').click(function() {
        $("#table-company").slideUp("fast");
        $("#table-gps").slideUp("fast");
        $("#table-sensor").slideUp("fast");
        $("#table-gsm").slideUp("fast");
        $("#table-request").slideUp("fast");
        $("#table-vehicle").slideUp("fast");


        $.get("{{ url('/item_data_HomeVisit') }}", {}, function(data, status) {
            $('.table_id').html(data)

        });
    });
</script>

@endsection
