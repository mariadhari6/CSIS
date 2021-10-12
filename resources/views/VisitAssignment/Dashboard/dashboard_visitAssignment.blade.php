@extends('layouts.v_main')
@section('title','CSIS | Dashboard Visit Assignment')

@section('content')

<div class="container-fluid">
    <h4 class="page-title">Dashboard Visit Assignment</h4>
    <div class="row">
        <div class="col-md-3 ">
            <div class="card card-stats card-grey cost">
                <div class="card-body ">
                    <div class="row">

                        <div class="col-12 d-flex align-items-left">
                            <div class="numbers">
                                <p class="card-category" >Cost per Company</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-stats card-primary-soft detail">
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
            <div class="card card-stats card-primary-tua typeGps">
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
            <div class="card card-stats card-success teknisi">
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

        {{-- <div class="col-md-6">
            <div class="card">
                <div id="chart-div" style="width: 900px; height: 300px;">
                </div>
            </div>
        </div> --}}
        <br>
    </div>
</div>

<div class="table_id">

</div>
{{-- <div class="table_idMaintenance">

</div> --}}


<script>
    $('.cost').click(function() {
        $.get("{{ url('item_data_DashboardVisitAssignment') }}", {}, function(data, status) {
            $('.table_id').html(data)
            // $('.table_idMaintenance').html(data)


        });
    });

    $('.detail').click(function() {
        $("#table-cost").slideUp("fast");
        $.get("{{ url('/item_data_DetailCostPercompany') }}", {}, function(data, status) {
            $('.table_id').html(data)

        });
    });
    $('.typeGps').click(function() {
        $("#table-cost").slideUp("fast");
        $("#table-detail").slideUp("fast");
        $.get("{{ url('/item_data_TypeGps') }}", {}, function(data, status) {
            $('.table_id').html(data)

        });
    });

     $('.teknisi').click(function() {
        $("#table-cost").slideUp("fast");
        $("#table-detail").slideUp("fast");
        $("#table-typeGps").slideUp("fast");
        $.get("{{ url('/item_data_teknisi') }}", {}, function(data, status) {
            $('.table_id').html(data)

        });
    });
</script>


@endsection

