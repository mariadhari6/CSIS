
@extends('layouts.v_main')
@section('title','Customer Service')
@section('title-table','Home')
@section('customer_service','active')


@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="card card-stats card-success d_company company">
                <i class="fas fa-building fa-7x d_company-icon"></i>
                <p class=" d_company-teks">Company</p>
                <p class="d_company-number">{{ $company->count() }}</p>
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
                <p class="d_RequstComp-teks">Request Complaint</p>
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
<script>
    $('.company').click(function() {
        // $("#table-company").slideUp("fast");
        $("#table-vehicle").slideUp("fast");
        $("#table-gps").slideUp("fast");
        $("#table-sensor").slideUp("fast");
        $("#table-gsm").slideUp("fast");
        $("#table-request").slideUp("fast");
        $("#table-visit").slideUp("fast");


        $.get("{{ url('/item_data_Homecompany') }}", {}, function(data, status) {
            $('.table_company').html(data)

        });
    });

     $('.gps').click(function() {
        $("#table-company").slideUp("fast");
        $("#table-vehicle").slideUp("fast");
        $("#table-sensor").slideUp("fast");
        $("#table-gsm").slideUp("fast");
        $("#table-request").slideUp("fast");
        $("#table-visit").slideUp("fast");


        $.get("{{ url('/item_data_Homegps') }}", {}, function(data, status) {
            $('.table_gps').html(data)

        });
    });

     $('.sensor').click(function() {
        $("#table-company").slideUp("fast");
        $("#table-gps").slideUp("fast");
        $("#table-vehicle").slideUp("fast");
        $("#table-gsm").slideUp("fast");
        $("#table-request").slideUp("fast");
        $("#table-visit").slideUp("fast");


        $.get("{{ url('/item_data_HomeSensor') }}", {}, function(data, status) {
            $('.table_sensor').html(data)

        });
    });

    $('.gsm').click(function() {
        $("#table-company").slideUp("fast");
        $("#table-gps").slideUp("fast");
        $("#table-sensor").slideUp("fast");
        $("#table-vehicle").slideUp("fast");
        $("#table-request").slideUp("fast");
        $("#table-visit").slideUp("fast");



        $.get("{{ url('/item_data_HomeGsm') }}", {}, function(data, status) {
            $('.table_gsm').html(data)

        });
    });

     $('.request').click(function() {
        $("#table-company").slideUp("fast");
        $("#table-gps").slideUp("fast");
        $("#table-sensor").slideUp("fast");
        $("#table-gsm").slideUp("fast");
        $("#table-vehicle").slideUp("fast");
        $("#table-visit").slideUp("fast");




        $.get("{{ url('/item_data_HomeRequest') }}", {}, function(data, status) {
            $('.table_request').html(data)

        });
    });

    $('.vehicle').click(function() {
        $("#table-company").slideUp("fast");
        $("#table-gps").slideUp("fast");
        $("#table-sensor").slideUp("fast");
        $("#table-gsm").slideUp("fast");
        $("#table-request").slideUp("fast");
        $("#table-visit").slideUp("fast");


        $.get("{{ url('/item_data_HomeVehicle') }}", {}, function(data, status) {
            $('.table_vehicle').html(data)

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
            $('.table_visit').html(data)

        });
    });
</script>

@endsection
