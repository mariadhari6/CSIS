@extends('layouts.v_main')
@section('title','CSIS | GSM Terminate')
@section('title-table', 'GSM Terminate')
@section('master','show')
@section('GsmTerminate','active')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="text-right" id="selected">
              <button class="btn btn-default float-left mr-2 dropdown-toggle filter" id="dropdownMenu" data-toggle="dropdown" ><i class="fas fa-filter"></i></button>
              <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                <div class="form-group">
                    <input class="form-control" id="filter-date" type="month">
                    <button class="mt-1 btn btn-primary float-right" id="check-btn">check</button>
                  </select>
                </div>
              </ul>
            <button class="btn btn-success edit_all" data-toggle="tooltip" title="Edit Selected">
                <i class="fas fa-edit"></i>
            </button>
            <button class="btn btn-danger  delete_all" data-toggle="tooltip" title="Delete Selected">
              <i class="fas fa-trash"></i>
            </button>
          </div>
          <div>
        <form>
          <table class="table table-responsive data" class="table_id" id="table_id" >
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
                <th scope="col" class="list">Status GSM*</th>
                <th scope="col" class="list">GSM Number*</th>
                <th scope="col" class="list-company">Company*</th>
                <th scope="col" class="list">Request Date*</th>
                <th scope="col" class="list">Terminate Date*</th>
                <th scope="col" class="list">Note</th>
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
  </div>

  <script>
    $(document).ready(function() {

      read();

    });

     // filter bulan dan tahun
     $('#check-btn').click(function() {
    var date = new Date($('#filter-date').val());
    var month = date.getMonth() + 1;
    var year = date.getFullYear();
      $.ajax({
          type: "get",
          url: "{{ url('item_data_MY_GsmTerminate') }}",
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


    // ------ Tampil Data ------
    function read(){
        enableButton();
      $.get("{{ url('item_data_GsmTerminate') }}", {}, function(data, status) {
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
                    url: "{{ url('destroy_GsmTerminate') }}/" + id,
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
        disableButton();
        var id = id;
        $("#td-button-"+id).slideUp("fast");
        $("#td-checkbox-"+id).hide("fast");
        $("#item-no-"+id).hide("fast");
        $("#item-status_gsm-"+id).hide("fast");
        $("#item-gsm_number-"+id).hide("fast");
        $("#item-company_id-"+id).hide("fast");
        $("#item-request_date-"+id).slideUp("fast");
        $("#item-terminate_date-"+id).slideUp("fast");
        $("#item-note-"+id).slideUp("fast");
        $.get("{{ url('show_GsmTerminate') }}/" + id, {}, function(data, status) {
            $("#edit-form-"+id).prepend(data)
        });
    }

    // ------ Proses Update Data ------
    function update(id) {
        var status_gsm = $("#status_gsm").val();
        var gsm_number = $("#gsm_number").val();
        var company_id = $("#company_id").val();
        var request_date = $("#request_date").val();
        var terminate_date = $("#terminate_date").val();
        var note = $("#note").val();
        var id = id;
        $.ajax({
            type: "get",
            url: "{{ url('update_GsmTerminate') }}/"+id,
            data: {
              status_gsm: status_gsm,
              gsm_number: gsm_number,
              company_id: company_id,
              request_date: request_date,
              terminate_date: terminate_date,
              note:note
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
        })
    }

    // Check all
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
                            url: "{{ url('/selectedDelete_GsmTerminate') }}",
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

        // Edit All
        $('.edit_all').on('click', function(e){
            disableButton();
            $('[data-toggle="tooltip"]').tooltip("hide");
            var allVals = [];
            var _token = $('input[name="_token"]').val();
            $(".task-select:checked").each(function() {
                allVals.push($(this).attr("id"));
            });
            if (allVals.length > 0){
                // alert(allVals);
                $(".edit_all").hide("fast");
                $(".delete_all").hide("fast");
                $.get("{{ url('selected_GsmTerminate') }}", {}, function(data, status) {
                    $("#selected").prepend(data)
                });
                $.each(allVals, function(index, value){
                    $("#td-checkbox-"+value).hide("fast");
                    $("#td-button-"+value).hide("fast");
                    $("#item-no-"+value).hide("fast");
                    $("#item-status_gsm-"+value).hide("fast");
                    $("#item-gsm_number-"+value).hide("fast");
                    $("#item-company_id-"+value).hide("fast");
                    $("#item-request_date-"+value).slideUp("fast");
                    $("#item-terminate_date-"+value).slideUp("fast");
                    $("#item-note-"+value).slideUp("fast");
                    $(".add").hide("fast");
                    $.get("{{ url('show_GsmTerminate') }}/" + value, {}, function(data, status) {
                        $("#edit-form-"+value).prepend(data)
                        $("#master").prop('checked', false);
                         $(".add").hide();
                        $(".cancel").hide();
                    });
                });
            }else{
                alert('Select the row you want to edit')
            }
        });

        // Proses Edit All
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
                    var status_gsm = $(".status_gsm-"+value).val();
                    var gsm_number = $(".gsm_number-"+value).val();
                    var company_id = $(".company_id-"+value).val();
                    var request_date = $(".request_date-"+value).val();
                    var terminate_date = $(".terminate_date-"+value).val();
                    var note = $(".note-"+value).val();
                    $.ajax({
                    type: "get",
                    url: "{{ url('update_GsmTerminate') }}/"+value,
                    data: {
                        status_gsm: status_gsm,
                        gsm_number: gsm_number,
                        company_id: company_id,
                        request_date: request_date,
                        terminate_date: terminate_date,
                        note:note
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
          function cancelUpdateSelected(){
            $("#save-selected").hide("fast");
            $("#cancel-selected").hide("fast");
            $(".add").show("fast");
            $(".edit_all").show("fast");
            $(".delete_all").show("fast");
            read();
        }
           function disableButton() {

          $('.add').prop('disabled', true);
          $('.edit_all').prop('disabled', true);
          $('.delete_all').prop('disabled', true);
          $('.export').addClass('disabled');
          $('.edit').addClass('disable');
          $('.delete').addClass('disable');
          $("[data-toggle= modal]").prop('disabled', true);

        }
function enableButton(){

          $('.add').prop('disabled', false);
          $('.edit_all').prop('disabled', false);
          $('.delete_all').prop('disabled', false);
          $('.edit').removeClass('disable');
          $('.export').removeClass('disabled');
          $('.delete').removeClass('disable');
          $("[data-toggle= modal]").prop('disabled', false);

        }




  </script>
   @endsection
