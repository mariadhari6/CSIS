@extends('layouts.v_main')
@section('title','Tes')

@section('content')

<div class="title">
    <strong>Detail Customer</strong>
</div>
<br>
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
            <div class="text-right mt-3" id="selected">
                <button type="button" class="btn btn-primary float-left mr-2 add add-button"><b>Add</b><i class="fas fa-plus ml-2" id="add"></i></button>
                <button class="btn btn-success  mr-2 edit_all"> <i class="fas fa-pen"></i></button>
                <button class="btn btn-danger  delete_all"><i class="fas fa-trash"></i></button>
            </div>
          <table class="table table-responsive" class="detailcustomer" id="detailcustomer">
              <div class="table-responsive">
            <thead>
              <tr>
                <th width="10px">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input  select-all-checkbox" type="checkbox" id="master">
                            <span class="form-check-sign"></span>
                        </label>
                    </div>
                </th>
                <th scope="col" class="action">Action</th>
                <th scope="col" class="list">Company</th>
                <th scope="col" class="list">License Plate</th>
                <th scope="col" class="list">Vehicle Type</th>
                <th scope="col" class="list">PO Number</th>
                <th scope="col" class="list">PO Date</th>
                <th scope="col" class="list">Status PO</th>
                <th scope="col" class="list">IMEI</th>
                <th scope="col" class="list">Merk</th>
                <th scope="col" class="list">Type</th>
                <th scope="col" class="list">GSM</th>
                <th scope="col" class="list">Provider</th>
                <th scope="col" class="list">Serial Number Sensor</th>
                <th scope="col" class="list">Sensor Name</th>
                <th scope="col" class="list">Merk Sensor</th>
                <th scope="col" class="list">Pool Name</th>
                <th scope="col" class="list">Pool Location</th>
                <th scope="col" class="list">Waranty </th>
                <th scope="col" class="list">Status Layanan</th>
                <th scope="col" class="list">Tanggal Pasang</th>
                <th scope="col" class="list">Tanggal Non Active</th>
              </tr>
            </thead>
            <tbody  id="item_data">
              {{-- {{ csrf_field() }} --}}
            </tbody>
            </div>
          </table>
      </div>
    </div>
  </div>
</div>

<script>

    $(document).ready(function() {

        read();
        // $('#detailcustomer').dataTable();

    });

    function read(){

      $.get("{{ route('item_detail')}}", {}, function(data, status) {
        $('#detailcustomer').DataTable().destroy();
        $('#detailcustomer').find("#item_data").html(data);
        $('#detailcustomer').dataTable( {
            "dom": '<"top"f>rt<"bottom"lp><"clear">'
            } );
        $('#detailcustomer').DataTable().draw();
      });
    }

    $('.add').click(function() {
        $.get("{{ route('add_detail')}}", {}, function(data, status) {
          $('#detailcustomer tbody').prepend(data);

        });
      });

      function cancel() {
      read()
    }

    function store() {
        var CompanyId           = $("#CompanyId").val();
        var LicencePlate        = $("#LicencePlate").val();
        var VihecleType         = $("#VihecleType").val();
        var PoNumber            = $("#PoNumber").val();
        var PoDate              = $("#PoDate").val();
        var StatusPo            = $("#StatusPo").val();
        var Imei                = $("#Imei").val();
        var Merk                = $("#Merk").val();
        var Type                = $("#Type").val();
        var GSM                 = $("#GSM").val();
        var Provider            = $("#Provider").val();
        var SerialNumberSensor  = $("#SerialNumberSensor").val();
        var NameSensor          = $("#NameSensor").val();
        var MerkSensor          = $("#MerkSensor").val();
        var PoolName            = $("#PoolName").val();
        var PoolLocation        = $("#PoolLocation").val();
        var Waranty             = $("#Waranty").val();
        var StatusLayanan       = $("#StatusLayanan").val();
        var TanggalPasang       = $("#TanggalPasang").val();
        var TanggalNonAktif     = $("#TanggalNonAktif").val();

        $.ajax({
            type: "get",
            url: "{{ route('save_detail')}}",
            data: {
                CompanyId           : CompanyId,
                LicencePlate        : LicencePlate,
                VihecleType         : VihecleType,
                PoNumber            : PoNumber,
                PoDate              : PoDate,
                StatusPo            : StatusPo,
                Imei                : Imei,
                Merk                : Merk,
                Type                : Type,
                GSM                 : GSM,
                Provider            : Provider,
                SerialNumberSensor  : SerialNumberSensor,
                NameSensor          : NameSensor,
                MerkSensor          : MerkSensor,
                PoolName            : PoolName,
                PoolLocation        : PoolLocation,
                Waranty             : Waranty,
                StatusLayanan       : StatusLayanan,
                TanggalPasang       : TanggalPasang,
                TanggalNonAktif     : TanggalNonAktif
            },
            success: function(data) {
            swal({
                type: 'success',
                title: 'Data Saved',
                showConfirmButton: false,
                timer: 1500
            }).catch(function(timeout) { })
              read();

            }
        })
    }


    // -----Proses Delete Data ------
    function destroy(id) {
        var id = id;

        swal({
            title: 'Are you sure?',
            text: "You want delete to this data!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes Delete',
            showLoaderOnConfirm: true,
            preConfirm: function() {
              return new Promise(function(resolve) {
                $.ajax({
                    type: "get",
                    url: "{{ url('delete_detail') }}/" + id,
                    data: "id=" + id,
                    success: function(data) {
                        // swal("Done!","It was succesfully deleted!","success");
                        swal({
                            type: 'success',
                            title: 'Data Deleted',
                            showConfirmButton: false,
                            timer: 1500
                        }).catch(function(timeout) { })
                        read();
                    }
                });

              });
            },
            allowOutsideClick: false
      });

    }

    function edit(id){
        var id = id;
        $("#td-checkbox-"+id).hide("fast");
        $("#td-button-"+id).hide("fast");
        $("#item-CompanyId-"+id).hide("fast");
        $("#item-LicencePlate-"+id).hide("fast");
        $("#item-VihecleType-"+id).hide("fast");
        $("#item-PoNumber-"+id).hide("fast");
        $("#item-PoDate-"+id).hide("fast");
        $("#item-StatusPo-"+id).hide("fast");
        $("#item-Imei-"+id).hide("fast");
        $("#item-Merk-"+id).hide("fast");
        $("#item-Type-"+id).hide("fast");
        $("#item-GSM-"+id).hide("fast");
        $("#item-Provider-"+id).hide("fast");
        $("#item-SerialNumberSensor-"+id).hide("fast");
        $("#item-NameSensor-"+id).hide("fast");
        $("#item-MerkSensor-"+id).hide("fast");
        $("#item-PoolName-"+id).hide("fast");
        $("#item-PoolLocation-"+id).hide("fast");
        $("#item-Waranty-"+id).hide("fast");
        $("#item-StatusLayanan-"+id).hide("fast");
        $("#item-TanggalPasang-"+id).hide("fast");
        $("#item-TanggalNonAktif-"+id).hide("fast");

        $.get("{{ url('show_detail') }}/" + id, {}, function(data, status) {
            $("#edit-form-"+id).prepend(data)
        });
    }

     function update(id) {

            var FirstName = $("#FirstName").val();
            var LastName = $("#LastName").val();
            var id = id;
            $.ajax({
                type: "get",
                url: "{{ url('update') }}/"+id,
                data: {
                FirstName: FirstName,
                LastName: LastName
                },
                success: function(data) {
                swal({
                    type: 'success',
                    title: ' Data Updated',
                    showConfirmButton: false,
                    timer: 1500
                }).catch(function(timeout) { })
                read()

                }


            });
        }

        function update(id) {
            var CompanyId           = $("#CompanyId").val();
            var LicencePlate        = $("#LicencePlate").val();
            var VihecleType         = $("#VihecleType").val();
            var PoNumber            = $("#PoNumber").val();
            var PoDate              = $("#PoDate").val();
            var StatusPo            = $("#StatusPo").val();
            var Imei                = $("#Imei").val();
            var Merk                = $("#Merk").val();
            var Type                = $("#Type").val();
            var GSM                 = $("#GSM").val();
            var Provider            = $("#Provider").val();
            var SerialNumberSensor  = $("#SerialNumberSensor").val();
            var NameSensor          = $("#NameSensor").val();
            var MerkSensor          = $("#MerkSensor").val();
            var PoolName            = $("#PoolName").val();
            var PoolLocation        = $("#PoolLocation").val();
            var Waranty             = $("#Waranty").val();
            var StatusLayanan       = $("#StatusLayanan").val();
            var TanggalPasang       = $("#TanggalPasang").val();
            var TanggalNonAktif     = $("#TanggalNonAktif").val();
            var id = id;
            $.ajax({
                type: "get",
                url: "{{ url('update_detail') }}/"+id,
                data: {
                    CompanyId           : CompanyId,
                    LicencePlate        : LicencePlate,
                    VihecleType         : VihecleType,
                    PoNumber            : PoNumber,
                    PoDate              : PoDate,
                    StatusPo            : StatusPo,
                    Imei                : Imei,
                    Merk                : Merk,
                    Type                : Type,
                    GSM                 : GSM,
                    Provider            : Provider,
                    SerialNumberSensor  : SerialNumberSensor,
                    NameSensor          : NameSensor,
                    MerkSensor          : MerkSensor,
                    PoolName            : PoolName,
                    PoolLocation        : PoolLocation,
                    Waranty             : Waranty,
                    StatusLayanan       : StatusLayanan,
                    TanggalPasang       : TanggalPasang,
                    TanggalNonAktif     : TanggalNonAktif
                },
                success: function(data) {
                swal({
                    type: 'success',
                    title: ' Data Updated',
                    showConfirmButton: false,
                    timer: 1500
                }).catch(function(timeout) { })
                read()

                }


            });
        }

        $('#master').on('click', function(e) {
          if($(this).is(':checked',true) ){
                $(".task-select").prop('checked', true)
          } else {
              $(".task-select").prop('checked',false);
          }

        });

        $('.delete_all').on('click', function(){
        //   event.preventDefault();

            var allVals = [];

            $(".task-select:checked").each(function() {
                allVals.push($(this).attr("id"));

            });

                if (allVals.length > 0) {

                    var _token = $('input[name="_token"]').val();

                    // alert(allVals);

                    swal({
                    title: 'Are you sure?',
                    text: "You want delete Selected data !",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes Delete',
                    showLoaderOnConfirm: true,
                    preConfirm: function() {
                    return new Promise(function(resolve) {
                        $.ajax({
                            url: "{{ route('deleteAll_detail') }}",
                            method: "GET",
                            data: {
                                id: allVals,
                                _token: _token
                            },
                            success: function(data) {
                                // swal("Done!","It was succesfully deleted!","success");
                                swal({
                                    type: 'success',
                                    title: 'The selected data has been deleted',
                                    showConfirmButton: false,
                                    timer: 1500
                                }).catch(function(timeout) { })
                                $("#master").prop('checked', false);
                                read();

                                }
                            });
                    });
                    },
                    allowOutsideClick: false
                });

            }else{
                alert('Select the row you want to delete')
            }

        });


        $('.edit_all').on('click', function(e){

            var allVals = [];
            var _token = $('input[name="_token"]').val();


            $(".task-select:checked").each(function() {
                allVals.push($(this).attr("id"));

            });

            if (allVals.length > 0){

                // alert(allVals);
                $(".edit_all").hide("fast");
                $(".delete_all").hide("fast");
                $.get("{{ url('selected_detail') }}", {}, function(data, status) {
                    $("#selected").prepend(data)

                });

                $.each(allVals, function(index, value){

                    $("#td-checkbox-"+value).hide("fast");
                    $("#td-button-"+value).hide("fast");
                    $("#item-CompanyId-"+value).hide("fast");
                    $("#item-LicencePlate-"+value).hide("fast");
                    $("#item-VihecleType-"+value).hide("fast");
                    $("#item-PoNumber-"+value).hide("fast");
                    $("#item-PoDate-"+value).hide("fast");
                    $("#item-StatusPo-"+value).hide("fast");
                    $("#item-Imei-"+value).hide("fast");
                    $("#item-Merk-"+value).hide("fast");
                    $("#item-Type-"+value).hide("fast");
                    $("#item-GSM-"+value).hide("fast");
                    $("#item-Provider-"+value).hide("fast");
                    $("#item-SerialNumberSensor-"+value).hide("fast");
                    $("#item-NameSensor-"+value).hide("fast");
                    $("#item-MerkSensor-"+value).hide("fast");
                    $("#item-PoolName-"+value).hide("fast");
                    $("#item-PoolLocation-"+value).hide("fast");
                    $("#item-Waranty-"+value).hide("fast");
                    $("#item-StatusLayanan-"+value).hide("fast");
                    $("#item-TanggalPasang-"+value).hide("fast");
                    $("#item-TanggalNonAktif-"+value).hide("fast");
                    $(".add").hide("fast");
                    $.get("{{ url('show_detail') }}/" + value, {}, function(data, status) {
                        $("#edit-form-"+value).prepend(data)
                        $("#master").prop('checked', false);
                    });
                });


            }else{
                alert('Select the row you want to edit')
            }
        });


        // function updateSelected() {

        //     var allVals = [];
        //     $(".task-select:checked").each(function() {
        //         allVals.push($(this).attr("id"));
        //     });

        //     swal({
        //         title: "Are you sure?",
        //         text: "Do you want to do an update?",
        //         type: "info",
        //         showCancelButton: true,
        //         confirmButtonColor: '#00FF00',
        //         cancelButtonColor: '#d33',
        //         confirmButtonText: 'Yes Update',
        //         showLoaderOnConfirm: true,
        //     }).then((willDelete) => {
        //         $.each(allVals, function(index, value){
        //             var CompanyId           = $(".CompanyId-"+ value).val();
        //             var LicencePlate        = $(".LicencePlate-"+ value).val();
        //             var VihecleType         = $(".VihecleType-"+ value).val();
        //             var PoNumber            = $(".PoNumber-"+ value).val();
        //             var PoDate              = $(".PoDate-"+ value).val();
        //             var StatusPo            = $(".StatusPo-"+ value).val();
        //             var Imei                = $(".Imei-"+ value).val();
        //             var Merk                = $(".Merk-"+ value).val();
        //             var Type                = $(".Type-"+ value).val();
        //             var GSM                 = $(".GSM-"+ value).val();
        //             var Provider            = $(".Provider-"+ value).val();
        //             var SerialNumberSensor  = $(".SerialNumberSensor-"+ value).val();
        //             var NameSensor          = $(".NameSensor-"+ value).val();
        //             var MerkSensor          = $(".MerkSensor-"+ value).val();
        //             var PoolName            = $(".PoolName-"+ value).val();
        //             var PoolLocation        = $(".PoolLocation-"+ value).val();
        //             var Waranty             = $(".Waranty-"+ value).val();
        //             var StatusLayanan       = $(".StatusLayanan-"+ value).val();
        //             var TanggalPasang       = $(".TanggalPasang-"+ value).val();
        //             var TanggalNonAktif     = $(".TanggalNonAktif-"+ value).val();
        //             $.ajax({
        //                 type: "get",
        //                 url: "{{ url('update_detail') }}/"+value,
        //                 data: {
        //                     CompanyId           : CompanyId,
        //                     LicencePlate        : LicencePlate,
        //                     VihecleType         : VihecleType,
        //                     PoNumber            : PoNumber,
        //                     PoDate              : PoDate,
        //                     StatusPo            : StatusPo,
        //                     Imei                : Imei,
        //                     Merk                : Merk,
        //                     Type                : Type,
        //                     GSM                 : GSM,
        //                     Provider            : Provider,
        //                     SerialNumberSensor  : SerialNumberSensor,
        //                     NameSensor          : NameSensor,
        //                     MerkSensor          : MerkSensor,
        //                     PoolName            : PoolName,
        //                     PoolLocation        : PoolLocation,
        //                     Waranty             : Waranty,
        //                     StatusLayanan       : StatusLayanan,
        //                     TanggalPasang       : TanggalPasang,
        //                     TanggalNonAktif     : TanggalNonAktif
        //                 },
        //                 success: function(data) {
        //                         // swal("Done!","It was succesfully Update","success");
        //                         swal({
        //                             type: 'success',
        //                             title: 'The selected data has been updated',
        //                             showConfirmButton: false,
        //                             timer: 1500
        //                         }).catch(function(timeout) { })
        //                         $(".save").hide("fast");
        //                         $(".cancel").hide("fast");
        //                         $(".add").show("fast");
        //                         $(".edit_all").show("fast");
        //                         $(".delete_all").show("fast");
        //                         read();

        //                     }
        //             });
        //         });

        //     });

        // }






</script>

@endsection