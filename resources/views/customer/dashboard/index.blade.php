@extends('layouts.v_main')
@section('title','Dashboard Customer')
@section('title-table', 'Dashboard Customer')
@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div align="right">
                    <a class="btn btn-secondary  mr-2 mb-3" href="{{ route('export') }}" title="Export"><i class="fas fa-file-excel mr-2"></i>Export</a>
                </div>
                <table class="table table-responsive" id="dashboardCustomer">
                    <thead>
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




@endsection
