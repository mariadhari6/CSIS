@extends('layouts.v_main')
@section('title','Summary')

@section('content')

<div class="title">
    <strong>Dashboard Customer</strong>
</div>
<div align="right">
    <a class="btn btn-secondary  mr-2 mb-3" href="{{ route('export') }}" title="Export"><i class="fas fa-file-excel mr-2"></i>Export</a>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="text-right mt-3" id="selected">
                    <button type="button" class="btn btn-primary float-left mr-2 add add-button"><b>Add</b><i class="fas fa-plus ml-2" id="add"></i></button>
                    <button class="btn btn-success  mr-2 edit_all"> <i class="fas fa-pen"></i></button>
                    <button class="btn btn-danger  delete_all"><i class="fas fa-trash"></i></button>
                </div>
                <table class="table table-responsive" id="dashboardCustomer">
                    <thead>
                        <th width="10px">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input  select-all-checkbox" type="checkbox" id="master">
                                    <span class="form-check-sign"></span>
                                </label>
                            </div>
                        </th>
                        <th scope="col" class="action">Action</th>
                        <th scope="col" class="list">Company Name</th>
                        <th scope="col" class="list">PIC Name</th>
                        <th scope="col" class="list">Email</th>
                        <th scope="col" class="list">Position</th>
                        <th scope="col" class="list">Date Of Birth</th>
                        <th scope="col" class="list">Total GPS Installed</th>
                        <th scope="col" class="list">Total Sensor installed</th>
                        <th scope="col" class="list">Name Sensor</th>
                        <th scope="col" class="list">Jumlah</th>
                        <th scope="col" class="list">Vehicle Type</th>
                        <th scope="col" class="list">Jumlah</th>
                        <th scope="col" class="list">Pool Name</th>
                        <th scope="col" class="list">Pool Location</th>
                        <th scope="col" class="list">Coordinat</th>
                        <th scope="col" class="list">Jumlah Unit Per Pool</th>
                        <th scope="col" class="list">Fitur yang Digunakan   </th>
                        <th scope="col" class="list">Businnes Type</th>
                        <th scope="col" class="list">Description Business Type</th>
                        <th scope="col" class="list">Address</th>
                        <th scope="col" class="list">Coordinate Address</th>
                        <th scope="col" class="list">Customer</th>
                      </tr>
                    </thead>
                    <tbody>

                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>

<script>

    $(document).ready(function() {

        read();
    });

    function read(){

        $.get("{{ route('item_detail')}}", {}, function(data, status) {
            $('#dashboardCustomer').DataTable().destroy();
            $('#dashboardCustomer').find("#item_data").html(data);
            $('#dashboardCustomer').dataTable( {
                    "dom": '<"top"f>rt<"bottom"lp><"clear">'
                });
            $('#dashboardCustomer').DataTable().draw();
        });
    }
</script>


@endsection
