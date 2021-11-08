@extends('layouts.v_main')
@section('title','CSIS | Dashboard Visit Assignment')
@section('title-table','Dashboard Visit Assignment')


@section('content')

<div class="container-fluid">
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

        <div class="col-md-6">
            <div class="card">
                <div>
                    <canvas id="costPercompany"></canvas>
                </div>
            </div>
        </div> 
        <br>

        <div class="col-md-6">
            <div class="card">
                <div>
                    <canvas id="detailCostPercompany"></canvas>
                </div>
            </div>
        </div> 

        <div class="col-md-6">
            <div class="card">
                <div>
                    <canvas id="perbaikanTipeGps"></canvas>
                </div>
            </div>
        </div> 

        <div class="col-md-6">
            <div class="card">
                <div>
                    <canvas id="tugasPerTeknisi"></canvas>
                </div>
            </div>
        </div> 
        
        <div class="col-md-6">
            <div class="card">
                <div>
                    <canvas id="equipmentTerpakai"></canvas>
                </div>
            </div>
        </div> 

        <div class="col-md-6">
            <div class="card">
                <div>
                    <canvas id="visitSla"></canvas>
                </div>
            </div>
        </div> 

        <div class="col-md-6">
            <div class="card">
                <div>
                    <canvas id="visitBerbayar"></canvas>
                </div>
            </div>
        </div> 

    </div>
</div>


<div class="table_id">

</div>

<script>
    // Cost Percompany
    const companyCostPercompany = [ 'Linc', 'Dipta', 'Primajaya Logistic', 'Adib', 'Wira' ];
    const dataCostPercompany = {
    labels: companyCostPercompany,
    datasets: [
        {
        label: 'Vehicle',
        data: [10,2,3,4,2],
        borderColor: '#3366cc',
        backgroundColor: '#3366cc',
        },

        {
        label: 'Times',
        data: [3,6,7,8,3],
        borderColor: '#b35900',
        backgroundColor: '#b35900',
        },

        {
        label: 'Cost',
        data: [2,10,12,11,12],
        borderColor: '#737373',
        backgroundColor: '#737373',
        }
    ]

    };

    const configCostPercompany = {
    type: 'bar',
    data: dataCostPercompany,
    options: {
        responsive: true,
        plugins: {
        legend: {
            position: 'top',
        },
        title: {
            display: true,
            text: 'Cost Per-Company'
        }
        }
    },
    };

    var costPercompany = new Chart(
        document.getElementById('costPercompany'),
        configCostPercompany
    );

    // Detail Cost Percompany
    const companyDetailCostPercompany = [ 'Linc', 'Dipta', 'Primajaya Logistic', 'Adib', 'Wira' ];
    const dataDetailCostPercompany = {
    labels: companyDetailCostPercompany,
    datasets: [
        {
        label: 'Pemasangan GPS',
        data: [10,2,3,4,2],
        borderColor: '#3456ed',
        backgroundColor: '#3456ed',
        },

        {
        label: 'Maintenance GPS',
        data: [3,6,7,8,3],
        borderColor: '#ff5500',
        backgroundColor: '#ff5500',
        },

        {
        label: 'Maintenance Sensor dan Suhu',
        data: [2,10,12,11,12],
        borderColor: '#737373',
        backgroundColor: '#737373',
        },

        {
        label: 'Mutasi Pemasangan GPS',
        data: [2,10,12,11,12],
        borderColor: '#f6ff00',
        backgroundColor: '#f6ff00',
        },

        {
        label: 'Pelepasan GPS',
        data: [2,10,12,11,12],
        borderColor: '#3456ed',
        backgroundColor: '#3456ed',
        }
    ]

    };

    const configDetailCostPercompany = {
    type: 'bar',
    data: dataDetailCostPercompany,
    options: {
        responsive: true,
        plugins: {
        legend: {
            position: 'top',
        },
        title: {
            display: true,
            text: 'Detail Cost Per-Company'
        }
        }
    },
    };

    var detailCostPercompany = new Chart(
        document.getElementById('detailCostPercompany'),
        configDetailCostPercompany
    );

    // Perbaikan Tipe GPS
    const typeGps = [ 'Ruptela Pro 3', 'Ruptela Pro 3', 'Ruptela Eco 4+' ];
    const dataPerbaikanTypeGps = {
    labels: typeGps,
    datasets: [
        {
        label: ' ',
        data: [10,2,3,4,2],
        borderColor: '#3456ed',
        backgroundColor: '#3456ed',
        }
    ]

    };

    const configPerbaikanTypeGps = {
    type: 'bar',
    data: dataPerbaikanTypeGps,
    options: {
        responsive: true,
        plugins: {
        legend: {
            position: 'top',
        },
        title: {
            display: true,
            text: 'Perbaikan Per Tipe GPS'
        }
        }
    },
    };

    var PerbaikanTypeGps = new Chart(
        document.getElementById('perbaikanTipeGps'),
        configPerbaikanTypeGps
    );

    // Tugas Perteknisi
    const teknisi = [ 'Rifai', 'Syarif', 'Edi', 'Katamsi', 'Mukti', 'Gede Cakra' ];
    const dataTugasPerTeknisi = {
    labels: teknisi,
    datasets: [
        {
        label: ' ',
        data: [6,2,3,4,2,0],
        borderColor: '#2bff00',
        backgroundColor: '#2bff00',
        }
    ]

    };

    const configTugasPerTeknisi = {
    type: 'bar',
    data: dataTugasPerTeknisi,
    options: {
        responsive: true,
        plugins: {
        legend: {
            position: 'top',
        },
        title: {
            display: true,
            text: 'Tugas Per-Teknisi'
        }
        }
    },
    };

    var TugasPerTeknisi = new Chart(
        document.getElementById('tugasPerTeknisi'),
        configTugasPerTeknisi
    );

    // Equipment Terpakai
    const equipment = [ 'GPS', 'GSM', 'Immobilizer' ];
    const dataEquipmentTerpakai = {
    labels: equipment,
    datasets: [
        {
        label: ' ',
        data: [5,6,3],
        borderColor: '#2b00ff',
        backgroundColor: '#2b00ff',
        }
    ]

    };

    const configEquipmentTerpakai = {
    type: 'bar',
    data: dataEquipmentTerpakai,
    options: {
        responsive: true,
        plugins: {
        legend: {
            position: 'top',
        },
        title: {
            display: true,
            text: 'Equipment Terpakai'
        }
        }
    },
    };

    var equipmentTerpakai = new Chart(
        document.getElementById('equipmentTerpakai'),
        configEquipmentTerpakai
    );

    // Visit Berbayar
    const visit = [ 'Pemasangan Gps', 'Mutasi Pemasangan Gps' ];
    const dataVisitBerbayar = {
    labels: visit,
    datasets: [
        {
        label: ' ',
        data: [5,6,3],
        borderColor: '#ff0011',
        backgroundColor: '#ff0011',
        }
    ]
    };

    const configVisitBerbayar = {
    type: 'bar',
    data: dataVisitBerbayar,
    options: {
        responsive: true,
        plugins: {
        legend: {
            position: 'top',
        },
        title: {
            display: true,
            text: 'Visit (Berbayar)'
        }
        }
    },
    };

    var VisitBerbayar = new Chart(
        document.getElementById('visitBerbayar'),
        configVisitBerbayar
    );

    // Visit SLA
    const dataVisitSla = {
    labels: [
        'Maintenancae GPS',
        'Maintenance Sensor Suhu',
        'Pelepasan GPS'
    ],

    datasets: [{
    label: 'My First Dataset',
    data: [300, 80, 20],
    backgroundColor: [
        '#004cff',
        '#ff8000',
        '#7a7168'
    ],
        hoverOffset: 4
    }]
    };

    const configVisitSla = {
        type: 'pie',
        data: dataVisitSla,
    };

    var VisitSla = new Chart(
        document.getElementById('visitSla'),
        configVisitSla
    );

</script>

@endsection
