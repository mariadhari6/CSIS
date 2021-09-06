@extends('layouts.v_main')
@section('title','Gsm Pre Active')


@section('content')

<div align="right">
  </div>
  <br>
  <div id="message"></div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
            <div class="text-right mt-3" id="selected">
                <button type="button" class="btn btn-primary btn-round mr-2 add"><i class="fas fa-plus" id="add"></i></button>
                <button class="btn btn-success btn-round mr-2 edit_all"> <i class="fas fa-pen"></i></button>
                <button class="btn btn-danger btn-round delete_all"><i class="fas fa-trash"></i></button>
            </div>
            <br>

          <table class="table table-hover data" class="table_id" id="table_id" >
            <thead>
              <tr>
                <th>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input  select-all-checkbox" type="checkbox" id="master">
                            <span class="form-check-sign"></span>
                        </label>
                    </div>
                </th>
                <th scope="col">Action</th>
                <th scope="col">Gsm Number</th>
                <th scope="col">Serial Number</th>
                <th scope="col">ICC ID</th>
                <th scope="col">IMSI</th>
                <th scope="col">Res ID</th>
                <th scope="col">Expired Date</th>
                <th scope="col">Note</th>
              </tr>
            </thead>
            <tbody  id="item_data">
              {{-- {{ csrf_field() }} --}}
            </tbody>
          </table>

      </div>
    </div>
  </div>



  <script>
    $(document).ready(function() {
      read()
    });
    // ------ Tampil Data ------
    function read(){

      $.get("{{ url('item_data_GsmPreActive') }}", {}, function(data, status) {
        $("#item_data").html(data);
        $('#table_id').DataTable();
      });
    }
    // ---- Tombol Cancel -----
    function cancel() {
      read()
    }

     // ------ Tambah Form Input ------
     $('#add').click(function() {
        $.get("{{ url('add_form_GsmPreActive') }}", {}, function(data, status) {
          $('#table_id tbody').prepend(data);
        });
      });
    // ----- Proses Tambah data ------
    function store() {
        var gsm_number = $("#gsm_number").val();
        var serial_number = $("#serial_number").val();
        var icc_id = $("#icc_id").val();
        var imsi = $("#imsi").val();
        var res_id = $("#res_id").val();
        var expired_date = $("#expired_date").val();
        var note = $("#note").val();
        $.ajax({
            type: "get",
            url: "{{ url('store_GsmPreActive') }}",
            data: {
              gsm_number: gsm_number,
              serial_number:serial_number,
              icc_id: icc_id,
              imsi: imsi,
              res_id: res_id,
              expired_date:expired_date,
              note:note
            },
            success: function(data) {
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
                    url: "{{ url('destroy_GsmPreActive') }}/" + id,
                    data: "id=" + id,
                    success: function(data) {
                        swal("Done!","It was succesfully deleted!","success");
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
        $("#item-gsm_number-"+id).hide("fast");
        $("#item-serial_number-"+id).hide("fast");
        $("#item-icc_id-"+id).hide("fast");
        $("#item-imsi-"+id).hide("fast");
        $("#item-res_id-"+id).hide("fast");
        $("#item-expired_date-"+id).hide("fast");
        $("#item-note-"+id).hide("fast");
        $.get("{{ url('show_GsmPreActive') }}/" + id, {}, function(data, status) {
            $("#edit-form-"+id).prepend(data)
        });
    }
    // ------ Proses Update Data ------
        function update(id) {
            var gsm_number = $("#gsm_number").val();
            var serial_number = $("#serial_number").val();
            var icc_id = $("#icc_id").val();
            var imsi = $("#imsi").val();
            var res_id = $("#res_id").val();
            var expired_date = $("#expired_date").val();
            var note = $("#note").val();
            var id = id;
            $.ajax({
                type: "get",
                url: "{{ url('update_GsmPreActive') }}/"+id,
                data: {
                 gsm_number: gsm_number,
                serial_number:serial_number,
                icc_id: icc_id,
                imsi: imsi,
                res_id: res_id,
                expired_date:expired_date,
                note:note
                },
                success: function(data) {
                read()
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
                            url: "{{ url('/selectedDelete_GsmPreActive') }}",
                            method: "get",
                            data: {
                                id: allVals,
                                _token: _token
                            },
                            success: function(data) {
                                swal("Done!","It was succesfully deleted!","success");
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
                $.get("{{ url('selected') }}", {}, function(data, status) {
                    $("#selected").prepend(data)
                });
                $.each(allVals, function(index, value){
                    $("#td-checkbox-"+value).hide("fast");
                    $("#td-button-"+value).hide("fast");
                    $("#item-gsm_number-"+value).hide("fast");
                    $("#item-serial_number-"+value).hide("fast");
                    $("#item-icc_id-"+value).hide("fast");
                    $("#item-imsi-"+value).hide("fast");
                    $("#item-res_id-"+value).hide("fast");
                    $("#item-expired_date-"+value).hide("fast");
                    $("#item-note-"+value).hide("fast");
                    $(".add").hide("fast");
                    $.get("{{ url('show_GsmPreActive') }}/" + value, {}, function(data, status) {
                        $("#edit-form-"+value).prepend(data)
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

                $.each(allVals, function(index, value){
                    var gsm_number = $(".gsm_number-"+value).val();
                    var serial_number = $(".serial_number-"+value).val();
                    var icc_id = $(".icc_id-"+value).val();
                    var imsi = $(".imsi-"+value).val();
                    var res_id = $(".res_id-"+value).val();
                    var expired_date = $(".expired_date-"+value).val();
                    var note = $(".note-"+value).val();
                    $.ajax({
                    type: "get",
                    url: "{{ url('update_GsmPreActive') }}/"+value,
                    data: {
                     gsm_number: gsm_number,
                    serial_number:serial_number,
                    icc_id: icc_id,
                    imsi: imsi,
                    res_id: res_id,
                    expired_date:expired_date,
                    note:note
                    },
                    success: function(data) {
                    read()
                    }
                });
            });


        }

        //--------Proses Batal--------
        function cancel(){
            read();
        }




  </script>
   @endsection
