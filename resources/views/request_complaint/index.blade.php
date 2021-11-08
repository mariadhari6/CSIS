@extends('layouts.v_main')
@section('title','CSIS | Request and Complain')
@section('title-table','Request and Complain')
@section('requestComplain','show')
@section('RequestComplain','active')


@section('content')

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
            <div class="text-right" id="selected">
                <button type="button" class="btn btn-primary float-left mr-2 add add-button"><b>Add</b><i class="fas fa-plus ml-2" id="add"></i></button>
                <button class="btn btn-default float-left mr-2 dropdown-toggle filter" id="dropdownMenu" data-toggle="dropdown" ><i class="fas fa-filter"></i></button>
                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                  <div class="form-group">
                      <input class="form-control" id="filter-date" type="month">
                      <button class="mt-1 btn btn-primary float-right" id="check-btn">check</button>
                    </select>
                  </div>
                </ul>
                <div class="float-left mr-2">
                    <select class="form-control input-fixed" id="filter">
                        <option value="{{ url('item_data_all_RequestComplain') }}">All</option>
                        <option value="{{ url('item_data_Request_Internal_RequestComplain') }}">Request Internal</option>
                        <option value="{{ url('item_data_Request_Eksternal_RequestComplain') }}">Request Eksternal</option>
                        <option value="{{ url('item_data_Complain_Internal_RequestComplain') }}">Complain Internal</option>
                        <option value="{{ url('item_data_Complain_Eksternal_RequestComplain') }}">Complain Eksternal</option>
                    </select>
                </div>
                <button class="btn btn-success  mr-2 edit_all"> <i class="fas fa-edit"></i></button>
                <button class="btn btn-danger  delete_all"><i class="fas fa-trash"></i></button>
            </div>
        <form >
          <table class="table table-responsive data " class="table_id" id="table_id" >
            <thead>
              <tr>
                <th>
                    <div>
                        <label class="form-check-label">
                            <input class="form-check-input  select-all-checkbox" type="checkbox" id="master">
                            <span class="form-check-sign"></span>
                        </label>
                    </div>
                </th>
                <th scope="col" class="action-no">No.</th>
                <th scope="col" class="list-company">Company*</th>
                <th scope="col" class="list">Internal/External*</th>
                <th scope="col" class="list">PIC*</th>
                <th scope="col" class="list">Vehicle*</th>
                <th scope="col" class="list">Waktu Info</th>
                <th scope="col" class="list">Waktu Respond*</th>
                <th scope="col" class="list">Task*</th>
                <th scope="col" class="list">Platform*</th>
                <th scope="col" class="list">Detail Taks*</th>
                <th scope="col" class="list">Divisi*</th>
                <th scope="col" class="list">Respond*</th>
                <th scope="col" class="list">Waktu Kesepakatan*</th>
                <th scope="col" class="list">Status*</th>
                <th scope="col" class="list">waktu Solve*</th>
                <th scope="col" class="list">Status Akhir</th>
                 <th scope="col" class="action sticky-col first-col">Action</th>


              </tr>
            </thead>
            <tbody  id="item_data">
              {{-- {{ csrf_field() }} --}}
            </tbody>
          </table>
          </form>

        </div>
      </div>
    </div>
  </div>



  <script>
    $(document).ready(function() {
      read()
    });

    // filter bulan dan tahun
    $('#check-btn').click(function() {
      var date = new Date($('#filter-date').val());
      var month = date.getMonth() + 1;
      var year = date.getFullYear();
        $.ajax({
            type: "get",
            url: "{{ url('item_data_MY_RequestComplain') }}",
            data: {
              month: month,
              year: year,
            },
            success: function(data) {
              $('#table_id').DataTable().destroy();
              $('#table_id').find("#item_data").html(data);
              $('#table_id').dataTable( {
                  "dom": '<"top"f>rt<"bottom"lp><"clear">'
                  // "dom": '<lf<t>ip>'
                  });
              $('#table_id').DataTable().draw();
            }
        })
    });

  // ------- filter change ------
  $("#filter").change(function(){
    var value = $(this).val();
    filter(value);
});
  // ------- filter --------
  function filter(value){
  var value = value;
  $.get(value, {}, function(data, status) {
      $('#table_id').DataTable().destroy();
      $('#table_id').find("#item_data").html(data);
        $('#table_id').dataTable( {
          "dom": '<"top"f>rt<"bottom"lp><"clear">'
          });
      $('#table_id').DataTable().draw();
    });
  }
    // ---- stop dropdown -----
    $(document).on('click', '.dropdown-menu', function (e) {
      e.stopPropagation();
    });
    // ------ Tampil Data ------
    function read(){

      $.get("{{ url('item_data_RequestComplain') }}", {}, function(data, status) {
         $('#table_id').DataTable().destroy();
         $('#table_id').find("#item_data").html(data);
         $('#table_id').dataTable( {
            "lengthMenu": [[50, 100, 1000, -1], [50, 100, 1000, "All"]],

            "dom": '<"top"f>rt<"bottom"lp><"clear">'
            // "dom": '<lf<t>ip>'
            });
        $('#table_id').DataTable().draw();

      });
    }
    // ---- Tombol Cancel -----
    function cancel() {
      read()
    }

     // ------ Tambah Form Input ------
     $('.add').click(function() {
        $.get("{{ url('add_form_RequestComplain') }}", {}, function(data, status) {
          $('#table_id tbody').prepend(data);
        });
      });

    // ----- Proses Tambah data ------
    function store() {
        var company_id = $("#company_id").val();
        var internal_eksternal = $("#internal_eksternal").val();
        var pic_id = $("#pic_id").val();
        var vehicle = $("#vehicle").val();
        var waktu_info = $("#waktu_info").val();
        var waktu_respond = $("#waktu_respond").val();
        var task = $("#task").val();
        var platform = $("#platform").val();
        var detail_task = $("#detail_task").val();
        var divisi = $("#divisi").val();
        var respond = $("#respond").val();
        var waktu_kesepakatan = $("#waktu_kesepakatan").val();
        var waktu_solve = $("#waktu_solve").val();
        var status = $("#status").val();
        var status_akhir = $("#status_akhir").val();

        if(company_id =="" || internal_eksternal=="" || pic_id=="" || task=="" || platform=="" || detail_task=="" || divisi=="" || waktu_respond=="" || waktu_kesepakatan=="" || status==""){

        }else {
            $.ajax({
            type: "get",
            url: "{{ url('store_RequestComplain') }}",
            data: {
              company_id: company_id,
              internal_eksternal:internal_eksternal,
              pic_id: pic_id,
              vehicle: vehicle,
              waktu_info: waktu_info,
             waktu_respond:waktu_respond,
              task:task,
              platform:platform,
              detail_task:detail_task,
              divisi:divisi,
              respond:respond,
              waktu_kesepakatan:waktu_kesepakatan,
              waktu_solve:waktu_solve,
              status:status,
              status_akhir:status_akhir
            },
            success: function(data) {
             swal({
                type: 'success',
                title: 'Data Saved',
                showConfirmButton: false,
                timer: 1500
            }).catch(function(timeout) { });
              read();
            }
        })

        }


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
                    url: "{{ url('destroy_RequestComplain') }}/" + id,
                    data: "id=" + id,
                    success: function(data) {
                        swal({
                            type: 'success',
                            title: 'Data Deleted',
                            showConfirmButton: false,
                            timer: 1500
                        }).catch(function(timeout) { });
                        read();
                    }
                });

              });
            },
            allowOutsideClick: false
      });
    }
    // ------ Edit Form Data ------
    function edit(id){
        var id = id;
        $("#td-checkbox-"+id).hide("fast");
        $("#td-button-"+id).hide("fast");
        $("#item-no-"+id).hide("fast");
        $("#item-company_id-"+id).hide("fast");
        $("#item-internal_eksternal-"+id).hide("fast");
        $("#item-pic_id-"+id).hide("fast");
        $("#item-vehicle-"+id).hide("fast");
        $("#item-waktu_info-"+id).hide("fast");
        $("#item-waktu_respond-"+id).hide("fast");
        $("#item-task-"+id).hide("fast");
        $("#item-platform-"+id).hide("fast");
        $("#item-detail_task-"+id).hide("fast");
        $("#item-divisi-"+id).hide("fast");
        $("#item-respond-"+id).hide("fast");
        $("#item-waktu_kesepakatan-"+id).hide("fast");
        $("#item-waktu_solve-"+id).hide("fast");
        $("#item-status-"+id).hide("fast");
        $("#item-status_akhir-"+id).hide("fast");
        $.get("{{ url('show_RequestComplain') }}/" + id, {}, function(data, status) {
            $("#edit-form-"+id).prepend(data)
        });
    }
    // ------ Proses Update Data ------
        function update(id) {
            var company_id = $("#company_id").val();
            var internal_eksternal = $("#internal_eksternal").val();
            var pic_id = $("#pic_id").val();
            var vehicle = $("#vehicle").val();
            var waktu_info = $("#waktu_info").val();
            var waktu_respond = $("#waktu_respond").val();
            var task = $("#task").val();
            var platform = $("#platform").val();
            var detail_task = $("#detail_task").val();
            var divisi = $("#divisi").val();
            var respond = $("#respond").val();
            var waktu_kesepakatan = $("#waktu_kesepakatan").val();
            var waktu_solve = $("#waktu_solve").val();
            var status = $("#status").val();
            var status_akhir = $("#status_akhir").val();
            var id = id;
            $.ajax({
                type: "get",
                url: "{{ url('update_RequestComplain') }}/"+id,
                data: {
                company_id: company_id,
                internal_eksternal:internal_eksternal,
                pic_id: pic_id,
                vehicle: vehicle,
                waktu_info: waktu_info,
                waktu_respond: waktu_respond,
                task:task,
                platform:platform,
                detail_task:detail_task,
                divisi:divisi,
                respond:respond,
                waktu_kesepakatan:waktu_kesepakatan,
                waktu_solve:waktu_solve,
                status:status,
                status_akhir:status_akhir
                },
                success: function(data) {
                swal({
                    type: 'success',
                    title: ' Data Updated',
                    showConfirmButton: false,
                    timer: 1500
                }).catch(function(timeout) { });
                read();
                }
            });
        }
        // checkbox all
        $('#master').on('click', function(e) {
          if($(this).is(':checked',true)){
              $(".task-select").prop('checked', true);
          } else {
              $(".task-select").prop('checked',false);
          }
        });
         // Delete All
        $('.delete_all').on('click', function(){
          event.preventDefault();
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
                            url: "{{ url('/selectedDelete_RequestComplain') }}",
                            method: "get",
                            data: {
                                id: allVals,
                                _token: _token
                            },
                            success: function(data) {
                                swal({
                                    type: 'success',
                                    title: 'The selected data has been deleted',
                                    showConfirmButton: false,
                                    timer: 1500
                                }).catch(function(timeout) { });
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

        // Form Edit All
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
                $.get("{{ url('/selected') }}", {}, function(data, status) {
                    $("#selected").prepend(data)
                });
                $.each(allVals, function(index, value){
                    $("#td-checkbox-"+value).hide("fast");
                    $("#td-button-"+value).hide("fast");
                    $("#item-no-"+value).hide("fast");
                    $("#item-company_id-"+value).hide("fast");
                    $("#item-internal_eksternal-"+value).hide("fast");
                    $("#item-pic_id-"+value).hide("fast");
                    $("#item-vehicle-"+value).hide("fast");
                    $("#item-waktu_info-"+value).hide("fast");
                    $("#item-waktu_respond-"+value).hide("fast");
                    $("#item-task-"+value).hide("fast");
                    $("#item-platform-"+value).hide("fast");
                    $("#item-detail_task-"+value).hide("fast");
                    $("#item-divisi-"+value).hide("fast");
                    $("#item-respond-"+value).hide("fast");
                    $("#item-waktu_kesepakatan-"+value).hide("fast");
                    $("#item-waktu_solve-"+value).hide("fast");
                    $("#item-status-"+value).hide("fast");
                    $("#item-status_akhir-"+value).hide("fast");
                    $(".add").hide("fast");
                    $.get("{{ url('show_RequestComplain') }}/" + value, {}, function(data, status) {
                        $("#edit-form-"+value).prepend(data)
                        $("#master").prop('checked', false);

                    });
                });
            }else{
                alert('Select the row you want to edit')
            }
        });

        // ------ Proses Update Data ------
        function updateSelected() {
            var allVals = [];

            $(".task-select:checked").each(function() {
                allVals.push($(this).attr("id"));
            });
            swal({
                title: "Are you sure?",
                text: "Do you want to do an update?",
                type: "info",
                showCancelButton: true,
                confirmButtonColor: '#00FF00',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes Update',
                showLoaderOnConfirm: true,
            }).then((willDelete) => {
                $.each(allVals, function(index, value){

                    var company_id = $(".company_id-"+value).val();
                    var internal_eksternal = $(".internal_eksternal-"+value).val();
                    var pic_id = $(".pic_id-"+value).val();
                    var vehicle = $(".vehicle-"+value).val();
                    var waktu_info = $(".waktu_info-"+value).val();
                    var waktu_respond = $(".waktu_respond-"+value).val();
                    var task = $(".task-"+value).val();
                    var platform = $(".platform-"+value).val();
                    var detail_task = $(".detail_task-"+value).val();
                    var divisi = $(".divisi-"+value).val();
                    var respond = $(".respond-"+value).val();
                    var waktu_kesepakatan = $(".waktu_kesepakatan-"+value).val();
                    var waktu_solve = $(".waktu_solve-"+value).val();
                    var status = $(".status-"+value).val();
                    var status_akhir = $(".status_akhir-"+value).val();
                    $.ajax({
                    type: "get",
                    url: "{{ url('update_RequestComplain') }}/"+value,
                    data: {
                       company_id: company_id,
                        internal_eksternal:internal_eksternal,
                        pic_id: pic_id,
                        vehicle: vehicle,
                        waktu_info: waktu_info,
                        waktu_respond:waktu_respond,
                        task:task,
                        platform:platform,
                        detail_task:detail_task,
                        divisi:divisi,
                        respond:respond,
                        waktu_kesepakatan:waktu_kesepakatan,
                        waktu_solve:waktu_solve,
                        status:status,
                        status_akhir:status_akhir
                    },
                    success: function(data) {
                     swal({
                                    type: 'success',
                                    title: 'The selected data has been updated',
                                    showConfirmButton: false,
                                    timer: 1500

                                // $(".save").hide();
                                });
                                read();

                                $(".add").show("fast");
                                $(".edit_all").show("fast");
                                $(".delete_all").show("fast");
                                $(".btn-round").hide("fast");
                                $(".btn-round").hide("fast");
                    }
                });
            });
        });


        }

        //--------Proses Batal--------
         function batal(){
            $(".save").hide("fast");
            $(".cancel").hide("fast");
            $(".add").show("fast");
            $(".edit_all").show("fast");
            $(".delete_all").show("fast");
            read();
            }




  </script>

   @endsection
