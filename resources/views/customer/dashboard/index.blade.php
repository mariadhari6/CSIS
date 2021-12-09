@extends('layouts.v_main')
@section('title','Dashboard Customer')
@section('title-table', 'Dashboard Customer')
@section('content')
<div class="row ">
    <div class="col-md-12">
        <div class="card card-dashboard_customer">
            <div class="card-body">
                    <a class="btn btn-success export-dashboard" style="color: white"><i class="fas fa-file-excel"></i> Export</a>
                    <table class="table table-responsive" id="table_dashboard_customer">
                        <thead>
                            <tr style="text-align: center" class="sticky-col company-col"" id="title-header">
                                <td colspan="1" class="sticky-col company-col"" style="background-color: rgb(80, 103, 233); color: black; font-weight: bold">Company</td>
                                <td colspan="4" style="background-color: rgb(236, 130, 130); color: black; font-weight: bold">PIC Company</td>
                                <td colspan="2" style="background-color: rgb(55, 211, 238); color: black; font-weight: bold">Total Device</td>
                                <td colspan="2" style="background-color: rgb(230, 233, 81); color: black; font-weight: bold">Sensor</td>
                                <td colspan="2" style="background-color: rgb(89, 160, 240); color: black; font-weight: bold">Vehicle Type</td>
                                <td colspan="4" style="background-color: rgb(102, 247, 162); color:black; font-weight: bold">Pool</td>
                                <td colspan="6" style="background-color: rgb(34, 187, 174); color: rgb(0, 0, 0); font-weight: bold">Note</td>
                                <td colspan="6" style="background-color: rgb(233, 101, 13); color: rgb(0, 0, 0); font-weight: bold" class="sticky-col action-col">Action</td>
                            </tr>
                            <tr style="text-align: center">
                                <th class="sticky-col company-col"" style="min-width:200px; border-right: 3px solid black; border-left: 3px solid black"">Company Name</th>
                                <th style="min-width:100px;">PIC Name</th>
                                <th style="min-width:250px;" >Email</th>
                                <th style="min-width:150px;" >Position</th>
                                <th style="min-width:100px;border-right: 3px solid black" >Date Of Birth</th>
                                <th style="min-width:70px;" >Total GPS Installed</th>
                                <th style="min-width:80px;border-right: 3px solid black" >Total Sensor installed</th>
                                <th style="min-width:80px;" >Name Sensor</th>
                                <th style="min-width:100px; border-right: 3px solid black"" >Jumlah Sensor (satuan)</th>
                                <th style="min-width:100px;" >Vehicle Type</th>
                                <th style="min-width:100px; border-right: 3px solid black"" >Jumlah Vehicle Type (satuan)</th>
                                <th style="min-width:100px;" >Pool Name</th>
                                <th style="min-width:200px;" >Pool Location</th>
                                <th style="min-width:50px;" >Coordinate</th>
                                <th style="min-width:80px; border-right: 3px solid black"" >Jumlah Unit Per Pool </th>
                                <th style="min-width:250px;" >Fitur yang Digunakan   </th>
                                <th style="min-width:100px;" >Business Type</th>
                                <th style="min-width:200px;" >Description Business Type</th>
                                <th style="min-width:250px;" >Address</th>
                                <th style="min-width:150px;" >Coordinate Address</th>
                                <th style="min-width:150px; border-right: 3px solid black"" >Customer</th>
                                <th class=" sticky-col action-col"></th>
                            </tr>
                        </thead>
                        <tbody id="item_data">

                        </tbody>
                    </table>

            </div>
        </div>
    </div>
</div>
<script>

    $(document).ready(function() {
        read();
    })

    function read(){
      $.get("{{ url('item_data_dashboard_customer') }}", {}, function(data, status) {
        $('#table_dashboard_customer').DataTable().destroy();
        $('#table_dashboard_customer').find("#item_data").html(data);
        $('#table_dashboard_customer').dataTable({
                "lengthChange": false,
                "paging":   false,
                "dom": '<"cari"f>rt<"bottom"lp><"clear">'
            });
        $('#table_dashboard_customer').DataTable().draw();
      });
    }

    function edit(company) {

        var company_id = company;

        $.ajax({
            url: "{{ url('edit_dashboard_customer') }}/"+ company_id,
            method: "GET",
            success:function(data) {

                $("#item-fitur-"+data.id).empty();
                $("#item-fitur-"+data.id).append(
                    '<textarea class="form-control" id="fitur" rows="3">'+ ( data.fitur_yang_digunakan != null ? data.fitur_yang_digunakan : " ")+'</textarea>'
                    // data.fitur_yang_digunakan
                );

                $("#item-business-"+data.id).empty();
                $("#item-business-"+data.id).append(
                     '<textarea class="form-control" id="business" rows="3">'+ ( data.business_type != null ? data.business_type : " ")+'</textarea>'
                );

                $("#item-description-"+data.id).empty();
                $("#item-description-"+data.id).append(
                    '<textarea class="form-control" id="description" rows="3">'+ ( data.description_business_type != null ? data.description_business_type : " ") +'</textarea>'
                );

                $("#item-address-"+data.id).empty();
                $("#item-address-"+data.id).append(
                    '<textarea class="form-control" id="address" rows="3">'+ ( data.address != null ? data.address : " ")+'</textarea>'
                );

                $("#item-coordinate-"+data.id).empty();
                $("#item-coordinate-"+data.id).append(
                    '<textarea class="form-control" id="coordinate" rows="3">'+ ( data.coordinate_address != null ? data.coordinate_address : " ") +'</textarea>'
                );

                $("#item-customer-"+data.id).empty();
                $("#item-customer-"+data.id).append(
                    '<textarea class="form-control" id="customer_name" rows="3">'+ ( data.customer != null ? data.customer : " ") +'</textarea>'
                );

                $("#item-update-"+data.id).empty();
                $("#item-update-"+data.id).append(
                    '<i class="fas fa-check add" onclick="update('+ data.id +')"></i>'+'<i class="fas fa-times cancel" onclick="cancel()"></i>'
                );
            }
        });
    }

    function cancel(){
        read();
    }

    function update(id) {

        var fitur       = $("#fitur").val();
        var business    = $("#business").val();
        var description = $("#description").val();
        var address     = $("#address").val();
        var coordinate  = $("#coordinate").val();
        var customer    = $("#customer_name").val();

        $.ajax({

            type: "get",
            url: "{{ url('update_dashboard_customer') }}/"+id,
            data: {
                fitur       : fitur,
                business    : business,
                description : description,
                address     : address,
                coordinate  : coordinate,
                customer    : customer
            },
            success: function(data) {
                swal({
                    type: 'success',
                    title: ' Data Updated',
                    showConfirmButton: false,
                    timer: 1500
                }).catch(function(timeout) { })
                    read();
            }
        })
    }

    $('.export-dashboard').click(function(){
         var table = $("#title-header").remove();
            $('#table_dashboard_customer').table2excel({
            exclude: ".excludeThisClass",
            name: "Worksheet Name",
            filename: "Dashboard_Customer.xls",
            preserveColors: true
        });
        location.reload();
    })





</script>
@endsection
