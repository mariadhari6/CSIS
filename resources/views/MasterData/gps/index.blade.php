@extends('layouts.v_main')
@section('title','CSIS | Gps')
@section('title-table','Gps')
@section('master','show')
@section('gps','active')


@section('content')

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">


          <div class="text-right" id="selected">
              <button type="button" class="btn btn-primary float-left mr-2 add add-button"><b>Add</b><i class="fas fa-plus ml-2" id="add"></i></button>
                <button type="button" class="btn btn-success float-left mr-2" data-toggle="modal" data-target="#importData">
                  <b> Import</b>
                  <i class="fas fa-file-excel ml-2"></i>
                </button>
              <button class="btn btn-success  mr-2 edit_all"> <i class="fas fa-pen"></i></button>
              <button class="btn btn-danger  delete_all"><i class="fas fa-trash"></i></button>
          </div>
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
                <th scope="col" class="list" >Merk*</th>
                <th scope="col" class="list" >Type*</th>
                <th scope="col" class="list" >IMEI*</th>
                <th scope="col" class="list" >Waranty</th>
                <th scope="col" class="list" >Po Date*</th>
                <th scope="col" class="list" >Status*</th>
                <th scope="col" class="list" >Status Ownership*</th>
                <th scope="col" class="action sticky-col first-col">Action</th>

              </tr>
            </thead>
            <tbody  id="item_data">
              {{-- {{ csrf_field() }} --}}
            </tbody>
          </table>
          </form>
        {{-- </div> --}}
        </div>
      </div>
    </div>
  </div>

 <div class="modal fade" id="importData" tabindex="-1" role="dialog" aria-labelledby="importData" aria-hidden="true">
		<div class="modal-dialog-full-width modal-dialog" style="width: 1000px; height: 1000px;"" role="document">
			<div class="modal-content-full-width modal-content">
				<div class="modal-header-full-width modal-header bg-primary">
					<h6 class="modal-title">Import data</h6>
                     <button type="button" class="close" id="close-modal" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

      {{-- <iframe name="dummyframe" id="dummyframe" onload="read_temporary()" style="display: none;"></iframe> --}}
       <form  method="POST" action="{{ route('importExcel_gps') }}" id="temporary_form" enctype="multipart/form-data" target="dummyframe">

            @csrf
          <div class="mb-2">
            <input type="file" name="file" id="file_import" required="required">
            <button type="submit" class="btn btn-primary btn-xs" id="check" >Check</button>
            <button class="btn btn-primary btn-xs" onclick="submitClick()">Check</button>

        </form>
            <button type="button" class="btn btn-success btn-xs" id="send" onclick="send_data()" >Send</button>
            <a  class="btn btn-secondary btn-xs" href="/download_template_gps" style="color:white">Download Template</a>

          </div>
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="table_temporary_id">
                  <thead>
                    <tr>
                        <th>No</th>
                        <th>Merk</th>
                        <th>Type</th>
                        <th>IMEI</th>
                        <th>Waranty</th>
                        <th>Po Date</th>
                        <th>Status</th>
                        <th>Status Ownership</th>

                    </tr>
                  </thead>
                  <tbody id="item_data_temporary">

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer-full-width  modal-footer">

        </div>
        </div>
			</div>
		</div>
	</div>

  <script>
    $(document).ready(function() {
      read()
      read_temporary()
      deleteTemporary();
      document.getElementById("check").style.visibility = "hidden";

    });
       // ---- Submit form temporary ----
    function submitClick() {
      deleteTemporary();
      $('#check').click();
    }
    // ------- send import -----
    function send_data() {
      $rowCount = $("#table_temporary_id tr").length;
      if ($rowCount == 1) {
        alert('table empty')
      } else {
      $rowResult = $rowCount - 1;
      var allVals = [];
      for($i = 0; $i < $rowResult; $i++)
          {
            var id = $("#table_temporary_id").find("tbody>tr:eq("+ $i +")>td:eq(0)").attr("id");
            allVals[$i] = id;
          }

      $.each(allVals, function(index, value){
        var merk = $(".temporary-merk-"+value).attr("id");
        var type = $(".temporary-type-"+value).attr("id");
        var imei = $(".temporary-imei-"+value).attr("id");
        var waranty = $(".temporary-waranty-"+value).attr("id");
        var po_date = $(".temporary-po_date-"+value).attr("id");
        var status = $(".temporary-status-"+value).attr("id");
        var status_ownership = $(".temporary-status_ownership-"+value).attr("id");

          if (
              merk == '' ||
              type == '' ||
              imei == '' ||
              waranty == '' ||
              po_date == '' ||
              status == '' ||
              status_ownership == ''

              ) {
              swal({
              type: 'warning',
              text: 'there is column empty or fail format',
              showConfirmButton: false,
              timer: 1500
            }).catch(function(timeout) { });
          } else {
            $.ajax({
            type: "get",
            url: "{{ url('store_gps') }}",
            data: {
              merk: merk,
              type: type,
              imei: imei,
              waranty: waranty,
              po_date: po_date,
              status: status,
              status_ownership: status_ownership
            },
            success: function(data) {
                swal({
                  type: 'success',
                  title: 'Data Saved',
                  showConfirmButton: false,
                  timer: 1500
              }).catch(function(timeout) { });
                read();
                deleteTemporary();
                read_temporary()
                $('#importData').modal('hide');
              }
          });
          }
      });

      }

    }

     // ---- Close Modal -------
    $('#close-modal').click(function() {
        deleteTemporary();
        read_temporary()
        $('#importData').modal('hide');
    });

     // ------- Delete Temporary -----
    function deleteTemporary() {
      $.ajax({
          type: "get",
          url: "{{ url('delete_temporary_gps') }}",
          success: function(data) {

          }
      });
    }
    // ------ Tampil Data ------
    function read(){
      $.get("{{ url('item_data_gps') }}", {}, function(data, status) {
        $('#table_id').DataTable().destroy();
        $('#table_id').find("#item_data").html(data);
        $('#table_id').dataTable( {

            "dom": '<"top"f>rt<"bottom"lp><"clear">'
            // "dom": '<lf<t>ip>'
            });
        $('#table_id').DataTable().draw();
      });
    }
     // ------ Tampil Data Temporary------
    function read_temporary(){
      $.get("{{ url('/item_data_temporary_GpsMaster') }}", {}, function(data, status) {
        $('#table_temporary_id').find("#item_data_temporary").html(data);
      });
    }
    // ------ Tambah Form Input ------
     $('.check').click(function() {
        $.get("{{ url('/item_data_temporary_GpsMaster') }}", {}, function(data, status) {
          $('#table_temporary_id').find("#item_data_temporary").html(data);
        });
      });


    // ---- Tombol Cancel -----
    function cancel() {
      read()
    }

     // ------ Tambah Form Input ------
     $('.add').click(function() {
        $.get("{{ url('add_form_gps') }}", {}, function(data, status) {
          $('#table_id tbody').prepend(data);
        });
      });
    // ----- Proses Tambah data ------
    function store() {
        var merk = $("#merk").val();
        var type = $("#type").val();
        var imei = $("#imei").val();
        var waranty = $("#waranty").val();
        var po_date = $("#po_date").val();
        var status = $("#status").val();
        var status_ownership = $("#status_ownership").val();

        $.ajax({
            type: "get",
            url: "{{ url('store_gps') }}",
            data: {
              merk: merk,
              type: type,
              imei: imei,
              waranty: waranty,
              po_date: po_date,
              status: status,
              status_ownership: status_ownership
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
                    url: "{{ url('destroy_gps') }}/" + id,
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
        $("#item-no-"+id).slideUp("fast");
        $("#item-merk-"+id).hide("fast");
        $("#item-no-"+id).hide("fast");
        $("#item-type-"+id).hide("fast");
        $("#item-imei-"+id).hide("fast");
        $("#item-waranty-"+id).hide("fast");
        $("#item-po_date-"+id).hide("fast");
        $("#item-status-"+id).hide("fast");
        $("#item-status_ownership-"+id).hide("fast");
        $.get("{{ url('show_gps') }}/" + id, {}, function(data, status) {
            $("#edit-form-"+id).prepend(data)
        });
    }
    // ------ Proses Update Data ------
        function update(id) {
            var merk = $("#merk").val();
            var type = $("#type").val();
            var imei = $("#imei").val();
            var waranty = $("#waranty").val();
            var po_date = $("#po_date").val();
            var status = $("#status").val();
            var status_ownership = $("#status_ownership").val();
            var id = id;
            $.ajax({
                type: "get",
                url: "{{ url('update_gps') }}/"+id,
                data: {
                merk: merk,
                type:type,
                imei: imei,
                waranty: waranty,
                po_date: po_date,
                status:status,
                status_ownership:status_ownership
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
                            url: "{{ url('/selectedDelete_gps') }}",
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
                $.get("{{ url('selected_gps') }}", {}, function(data, status) {
                    $("#selected").prepend(data)
                });
                $.each(allVals, function(index, value){
                    $("#td-checkbox-"+value).hide("fast");
                    $("#td-button-"+value).hide("fast");
                    $("#item-no-"+value).slideUp("fast");
                    $("#item-merk-"+value).hide("fast");
                    $("#item-no-"+value).hide("fast");
                    $("#item-type-"+value).hide("fast");
                    $("#item-imei-"+value).hide("fast");
                    $("#item-waranty-"+value).hide("fast");
                    $("#item-po_date-"+value).hide("fast");
                    $("#item-status-"+value).hide("fast");
                    $("#item-status_ownership-"+value).hide("fast");
                    $(".add").hide("fast");
                    $.get("{{ url('show_gps') }}/" + value, {}, function(data, status) {
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
                    var merk = $(".merk-"+value).val();
                    var type = $(".type-"+value).val();
                    var imei = $(".imei-"+value).val();
                    var waranty = $(".waranty-"+value).val();
                    var po_date = $(".po_date-"+value).val();
                    var status = $(".status-"+value).val();
                    var status_ownership = $(".status_ownership-"+value).val();
                    $.ajax({
                    type: "get",
                    url: "{{ url('update_gps') }}/"+value,
                    data: {
                     merk: merk,
                    type:type,
                    imei: imei,
                    waranty: waranty,
                    po_date: po_date,
                    status:status,
                    status_ownership:status_ownership
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




  </script>
  <iframe name="dummyframe" id="dummyframe" onload="read_temporary()" style="display: none;"></iframe>

   @endsection


