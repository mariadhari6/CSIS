@extends('layouts.v_main')
@section('title','Customer Service')
@section('title-table','Welcome to Customer service')


@section('content')

<div class="container-fluid">
    {{-- <h4 class="page-title">Wellcome to Custommer service </h4> --}}
    <div class="row">
        <div class="col-md-2">
            <div class="card card-stats card-warning company">
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
        <div class="col-md-2">
            <div class="card card-stats card-success gps">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="fas fa-map-marker-alt"></i>
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
        <div class="col-md-2">
            <div class="card card-stats card-danger sensor">
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

        <div class="col-md-2">
            <div class="card card-stats card-info vehicle">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                            <i class="fas fa-truck"></i>

                            </div>
                        </div>
                        <div class="col-7 d-flex align-items-center">
                            <div class="numbers">
                                <p class="card-category">Vehicle</p>
                                <h4 class="card-title">{{ $vehicle->count() }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <div class="col-md-2">
            <div class="card card-stats card-ungu gsm ">
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
        </div>

         <div class="col-md-2">
            <div class="card card-stats card-pink_ungu request">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="fas fa-comments"></i>

                            </div>
                        </div>
                        <div class="col-7 d-flex align-items-center">
                            <div class="numbers">
                                <p class="card-category-request">Request <br> Compalin</p>


                                <h4 class="card-title">{{ $request->count() }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

          <div class="col-md-2">
            <div class="card card-stats card-lemon visit">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="fas fa-users-cog"></i>

                            </div>
                        </div>
                        <div class="col-7 d-flex align-items-center">
                            <div class="numbers">
                                <p class="card-category-request">Visit <br> Assignment</p>


                                <h4 class="card-title">{{ $visit->count() }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       <div class="table_id">

        </div>
        <br>
    </div>
</div>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
