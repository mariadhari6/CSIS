@extends('layouts.v_main')
@section('title','CSIS | Dashboard Request Complaint')
@section('title-table','Dashboard Request Complaint')
<<<<<<< HEAD
=======
@section('requestComplain','show')
@section('RequestComplainDashboard','active')
>>>>>>> 04cd19d523e323d8c4d773a502e480197c26384a


@section('content')

<div class="container-fluid">
    Bulan :
    <select class="ml-2">
        <option>Pilih</option>
    </select>
    Tahun :
    <select class="ml-2">
        <option>Pilih</option>
    </select>
    <button class="ml-2 btn btn-success btn-xs">Search</button>
    <div class="mt-3 row">
        <div class="col-md-3 ">
            <div class="card card-stats card-primary-tua reqcomp">
                <div class="card-body ">
                    <div class="row">

                        <div class="col-12 d-flex align-items-left">
                            <div class="numbers">
                                <p class="card-category" >Request Complaint Company</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-stats card-success detail">
                <div class="card-body ">
                    <div class="row">

                        <div class="col-12 d-flex align-items-center">
                            <div class="numbers">
                                <p class="card-category">Detail Request</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-stats card-pink typeGps">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 d-flex align-items-center">
                            <div class="numbers">
                                <p class="card-category">Detail Complaint</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div>
                    <canvas id="reqComp"></canvas>
                </div>
            </div>
<<<<<<< HEAD
        </div> 
=======
        </div>
>>>>>>> 04cd19d523e323d8c4d773a502e480197c26384a

        <div class="col-md-6">
            <div class="card">
                <div>
                    <canvas id="request"></canvas>
                </div>
            </div>
<<<<<<< HEAD
        </div> 
=======
        </div>
>>>>>>> 04cd19d523e323d8c4d773a502e480197c26384a

        <div class="col-md-6">
            <div class="card">
                <div>
                    <canvas id="complaint"></canvas>
                </div>
            </div>
        </div>

    </div>
</div>

<br>
<div class="table_id">

</div>

<script>

    // Request & Complaint
    const company = [ 'Sisi', 'Dipta Permana', 'Linc Express' ];
    const dataReqComp = {
    labels: company,
    datasets: [
        {
        label: ' ',
        data: [3,4,2],
        borderColor: '#3456ed',
        backgroundColor: '#3456ed',
        }
    ]

    };

    const configReqComp = {
    type: 'bar',
    data: dataReqComp,
    options: {
        responsive: true,
        plugins: {
        legend: {
            position: 'top',
        },
        title: {
            display: true,
            text: 'Request & Complaint Per Company'
        }
        }
    },
    };

    var ReqComp = new Chart(
        document.getElementById('reqComp'),
        configReqComp
    );


    // Request
    const request = [ 'Edit/Add/Delete Master Data', 'Pemasangan/Maintenance/Mutasi/Pelepasan GPS', 'Reporting' ];
    const dataRequest = {
    labels: request,
    datasets: [
        {
        label: ' ',
        data: [2,3,4],
        borderColor: '#19911d',
        backgroundColor: '#19911d',
        }
    ]

    };

    const configRequest = {
    type: 'bar',
    data: dataRequest,
    options: {
        responsive: true,
        plugins: {
        legend: {
            position: 'top',
        },
        title: {
            display: true,
            text: 'Request'
        }
        }
    },
    };

    var Request = new Chart(
        document.getElementById('request'),
        configRequest
    );

     // Complaint
    const complaint = [ 'Permasalahan GPS', 'Integrasi TMS', 'Tampilan Oslog' ];
    const dataComplaint = {
    labels: complaint,
    datasets: [
        {
        label: ' ',
        data: [2,3,4],
        borderColor: '#19911d',
        backgroundColor: '#19911d',
        }
    ]

    };

    const configComplaint = {
    type: 'bar',
    data: dataComplaint,
    options: {
        responsive: true,
        plugins: {
        legend: {
            position: 'top',
        },
        title: {
            display: true,
            text: 'Complaint'
        }
        }
    },
    };

    var Complaint = new Chart(
        document.getElementById('complaint'),
        configComplaint
    );

    // Table Click
    $('.reqcomp').click(function() {
        $('.table_id').html(`
            <div class="col-md-6">
                <table class="table table-responsive" style="background-color:white;">
                    <thead>
                    <tr>
                        <th scope="col" class="list-company">Company</th>
                        <th scope="col" class="list">Total Complaint Request</th>
                        <th scope="col" class="list">Total %</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td>12</td>
                            <td>12</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        `)
    });

</script>

@endsection
