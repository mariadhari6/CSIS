@extends('layouts.v_main')
@section('title','CSIS | Gsm Pre Active')


@section('content')

<h4 class="page-title">GSM Master</h4>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
            <div class="text-right mt-3" id="selected">
                <button type="button" class="btn btn-primary float-left mr-2 add add-button">
                  <b>Add</b>
                  <i class="fas fa-plus ml-2" id="add"></i>
                </button>
                <div class="float-left mr-2">
                  <select class="form-control input-fixed" id="filter">
                    <option value="{{ url('item_data_all_GsmMaster') }}">All</option>
                    <option value="{{ url('item_data_ready_GsmMaster') }}">Ready</option>
                    <option value="{{ url('item_data_active_GsmMaster') }}">Active</option>
                    <option value="{{ url('item_data_terminate_GsmMaster') }}">Terminate</option>
                  </select>
                </div>
                <button type="button" class="btn btn-success float-left mr-2" data-toggle="modal" data-target="#importData">
                  <b> Import</b>
                  <i class="fas fa-file-excel ml-2"></i>
                </button>
                <button class="btn btn-success  mr-2 edit_all"> 
                  <i class="fas fa-pen"></i>
                </button>
                <button class="btn btn-danger delete_all">
                  <i class="fas fa-trash"></i>
                </button>
            </div>
          <table class="table table-responsive data" class="table_id" id="table_id" >
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
                <th scope="col" class="action">No.</th>
                <th scope="col" class="list">Status GSM</th>
                <th scope="col" class="list">GSM Number</th>
                <th scope="col" class="list">Company</th>
                <th scope="col" class="list">Serial Number</th>
                <th scope="col" class="list">ICC ID</th>
                <th scope="col" class="list">IMSI</th>
                <th scope="col" class="list">Res ID</th>
                <th scope="col" class="list">Request Date</th>
                <th scope="col" class="list">Expired Date</th>
                <th scope="col" class="list">Active Date</th>
                <th scope="col" class="list">Terminated Date</th>
                <th scope="col" class="list">Note</th>
                <th scope="col" class="list">Provider</th>
                <th scope="col" class="action sticky-col first-col">Action</th>
              </tr>
            </thead>
            <tbody id="item_data">
              {{-- {{ csrf_field() }} --}}
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Import -->
  <div class="modal fade" id="importData" tabindex="-1" role="dialog" aria-labelledby="importData" aria-hidden="true">
		<div class="modal-dialog-full-width modal-dialog" style="width: 1000px; height: 1000px;"" role="document">
			<div class="modal-content-full-width modal-content">
				<div class="modal-header-full-width modal-header bg-primary">
					<h6 class="modal-title">Import data</h6>
					<button type="button" class="close" id="close-modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

        <form action="{{ route('importExcel_GsmMaster') }}" method="POST" id="temporary_form" enctype="multipart/form-data" target="dummyframe">
          {{ csrf_field() }}
          <div class="mb-2">
            <input type="file" name="file" id="file_import" required="required">
            <button type="submit" class="btn btn-primary btn-xs" id="check" ></button>
            <button class="btn btn-primary btn-xs" onclick="submitClick()">Check</button>
        </form>									
            <button type="button" class="btn btn-success btn-xs" id="send" onclick="send_data()" >Send</button>
            <a  class="btn btn-secondary btn-xs" href="/download_template_gsm" style="color:white">Download Template</a>
          </div>
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="table_temporary_id">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Status GSM</th>
                      <th>GSM Number</th>
                      <th>Company</th>
                      <th>Serial Number</th>
                      <th>ICC ID</th>
                      <th>IMSI</th>
                      <th>Res ID</th>
                      <th>Request Date</th>
                      <th>Expired Date</th>
                      <th>Active Date</th>
                      <th>Terminated Date</th>
                      <th>Note</th>
                      <th>Provider</th>
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
      // --- hide submit button ----
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
        var status_gsm = $(".temporary-status_gsm-"+value).attr("id");
        var gsm_number = $(".temporary-gsm_number-"+value).attr("id");
        var company_id = $(".temporary-company_id-"+value).attr("id");
        var serial_number = $(".temporary-serial_number-"+value).attr("id");
        var icc_id = $(".temporary-icc_id-"+value).attr("id");
        var imsi = $(".temporary-imsi-"+value).attr("id");
        var res_id = $(".temporary-res_id-"+value).attr("id");
        var request_date = $(".temporary-request_date-"+value).attr("id");
        var expired_date = $(".temporary-expired_date-"+value).attr("id");
        var active_date = $(".temporary-active_date-"+value).attr("id");
        var terminate_date = $(".temporary-terminate_date-"+value).attr("id");
        var note = $(".temporary-note-"+value).attr("id");
        var provider = $(".temporary-provider-"+value).attr("id");
    
          if ( 
              request_date == '' ||
              gsm_number == '' ||
              company_id == '' ||
              serial_number == '' ||
              icc_id == '' ||
              imsi == '' ||
              res_id == '' ||
              request_date == '' ||
              expired_date == '' ||
              active_date == '' ||
              note == '' ||
              terminate_date == '' ||
              terminate_date == ''
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
            url: "{{ url('store_GsmMaster') }}",
            data: {
              status_gsm: status_gsm,
              gsm_number: gsm_number,
              company_id: company_id,
              serial_number: serial_number,
              icc_id: icc_id,
              imsi: imsi,
              res_id: res_id,
              request_date: request_date,
              expired_date: expired_date,
              active_date: active_date,
              terminate_date: terminate_date,
              note: note,
              provider: provider
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
          url: "{{ url('delete_temporary') }}",
          success: function(data) {
              
          }
      });
    }

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

    // ------ Tampil Data ------
    function read(){
      $.get("{{ url('item_data_GsmMaster') }}", {}, function(data, status) {
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
      $.get("{{ url('item_data_temporary_GsmMaster') }}", {}, function(data, status) {
        $('#table_temporary_id').find("#item_data_temporary").html(data);
      });
    }

     // ------ Tambah Form Input ------
     $('.check').click(function() {
        $.get("{{ url('item_data_temporary_GsmMaster') }}", {}, function(data, status) {
          $('#table_temporary_id').find("#item_data_temporary").html(data);
        });
      });


    // ---- Tombol Cancel -----
    function cancel() {
      read()
    }

     // ------ Tambah Form Input ------
     $('.add').click(function() {
        $.get("{{ url('add_form_GsmMaster') }}", {}, function(data, status) {
          $('#table_id tbody').prepend(data);
        });
      });
      
    // ----- Proses Tambah data ------
    function store() {
      var status_gsm = $("#status_gsm").val();
      var gsm_number = $("#gsm_number").val();
      var company_id = $("#company_id").val();
      var serial_number = $("#serial_number").val();
      var icc_id = $("#icc_id").val();
      var imsi = $("#imsi").val();
      var res_id = $("#res_id").val();
      var request_date = $("#request_date").val();
      var expired_date = $("#expired_date").val();
      var active_date = $("#active_date").val();
      var terminate_date = $("#terminate_date").val();
      var note = $("#note").val();
      var provider = $("#provider").val();
      
      $rowCount = $("#table_id tr").length;
      if ($rowCount == 2) {
        alert('table empty')
      } else {
        $rowResult = $rowCount - 2;
        var allGsmNum = [];
        var allSerNum = [];
        for($i = 1; $i <= $rowResult; $i++)
            { 
              $numArr = $i-1;
              $gsmNum = $("#table_id").find("tbody>tr:eq("+ $i +")>td:eq(3)").attr("name");
              $serNum = $("#table_id").find("tbody>tr:eq("+ $i +")>td:eq(5)").attr("name");
              allGsmNum[$numArr] = $gsmNum;
              allSerNum[$numArr] = $serNum;
            }
            // alert(allGsmNum[0]);
        for (let index = 0; index < allGsmNum.length; index++) {
          if( gsm_number == allGsmNum[index] ){
            // alert('already exists');
              swal({
                type: 'warning',
                text: 'GSM Number already exists',
                showConfirmButton: false,
                timer: 1500
              }).catch(function(timeout) { });
              // alert('GSM Number already exists');
              break;
          } else if( serial_number == allSerNum[index]){

              swal({
                  type: 'warning',
                  text: 'Serial Number already exists',
                  showConfirmButton: false,
                  timer: 1500
                }).catch(function(timeout) { });

           
              break;
          } else if( index == allGsmNum.length) {
            // alert('success');
            // break;
            // $.ajax({
            //     type: "get",
            //     url: "{{ url('store_GsmMaster') }}",
            //     data: {
            //       status_gsm: status_gsm,
            //       gsm_number: gsm_number,
            //       company_id: company_id,
            //       serial_number: serial_number,
            //       icc_id: icc_id,
            //       imsi: imsi,
            //       res_id: res_id,
            //       request_date: request_date,
            //       expired_date: expired_date,
            //       active_date: active_date,
            //       terminate_date: terminate_date,
            //       note: note,
            //       provider: provider
            //     },
            //     success: function(data) {
            //     swal({
            //         type: 'success',
            //         title: 'Data Saved',
            //         showConfirmButton: false,
            //         timer: 1500
            //     }).catch(function(timeout) { });
            //       read();
            //       // break;
            //     }
            // });
            break;
          }    
        }
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
                    url: "{{ url('destroy_GsmMaster') }}/" + id,
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
        $("#item-status_gsm-"+id).hide("fast");
        $("#item-gsm_number-"+id).hide("fast");
        $("#item-company_id-"+id).hide("fast");
        $("#item-serial_number-"+id).hide("fast");
        $("#item-icc_id-"+id).hide("fast");
        $("#item-imsi-"+id).hide("fast");
        $("#item-res_id-"+id).hide("fast");
        $("#item-request_date-"+id).hide("fast");
        $("#item-expired_date-"+id).hide("fast");
        $("#item-active_date-"+id).hide("fast");
        $("#item-terminate_date-"+id).hide("fast");
        $("#item-note-"+id).hide("fast");
        $("#item-provider-"+id).hide("fast");
        $.get("{{ url('show_GsmMaster') }}/" + id, {}, function(data, status) {
            $("#edit-form-"+id).prepend(data)
        });
    }
    // ------ Proses Update Data ------
        function update(id) {
          var status_gsm = $("#status_gsm").val();
          var gsm_number = $("#gsm_number").val();
          var company_id = $("#company_id").val();
          var serial_number = $("#serial_number").val();
          var icc_id = $("#icc_id").val();
          var imsi = $("#imsi").val();
          var res_id = $("#res_id").val();
          var request_date = $("#request_date").val();
          var expired_date = $("#expired_date").val();
          var active_date = $("#active_date").val();
          var terminate_date = $("#terminate_date").val();
          var note = $("#note").val();
          var provider = $("#provider").val();
          var id = id;
            $.ajax({
                type: "get",
                url: "{{ url('update_GsmMaster') }}/"+id,
                data: {
                  status_gsm: status_gsm,
                  gsm_number: gsm_number,
                  company_id: company_id,
                  serial_number: serial_number,
                  icc_id: icc_id,
                  imsi: imsi,
                  res_id: res_id,
                  request_date: request_date,
                  expired_date: expired_date,
                  active_date: active_date,
                  terminate_date: terminate_date,
                  note: note,
                  provider: provider
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
                            url: "{{ url('/selectedDelete_GsmMaster') }}",
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
                $(".edit_all").hide("fast");
                $(".delete_all").hide("fast");
                $.get("{{ url('selected_GsmMaster') }}", {}, function(data, status) {
                    $("#selected").prepend(data)
                });
                $.each(allVals, function(index, value){
                    $("#td-checkbox-"+value).hide("fast");
                    $("#td-button-"+value).hide("fast");
                    $("#item-no-"+value).hide("fast");
                    $("#item-status_gsm-"+value).hide("fast");
                    $("#item-gsm_number-"+value).hide("fast");
                    $("#item-company_id-"+value).hide("fast");
                    $("#item-serial_number-"+value).hide("fast");
                    $("#item-icc_id-"+value).hide("fast");
                    $("#item-imsi-"+value).hide("fast");
                    $("#item-res_id-"+value).hide("fast");
                    $("#item-request_date-"+value).hide("fast");
                    $("#item-expired_date-"+value).hide("fast");
                    $("#item-active_date-"+value).hide("fast");
                    $("#item-terminate_date-"+value).hide("fast");
                    $("#item-note-"+value).hide("fast");
                    $("#item-provider-"+value).hide("fast");
                    $(".add").hide("fast");
                    $.get("{{ url('show_GsmMaster') }}/" + value, {}, function(data, status) {
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
                    var status_gsm = $(".status_gsm-"+value).val();
                    var gsm_number = $(".gsm_number-"+value).val();
                    var company_id = $(".company_id-"+value).val();
                    var serial_number = $(".serial_number-"+value).val();
                    var icc_id = $(".icc_id-"+value).val();
                    var imsi = $(".imsi-"+value).val();
                    var res_id = $(".res_id-"+value).val();
                    var request_date = $(".request_date-"+value).val();
                    var expired_date = $(".expired_date-"+value).val();
                    var active_date = $(".active_date-"+value).val();
                    var terminate_date = $(".terminate_date-"+value).val();
                    var note = $(".note-"+value).val();
                    var provider = $(".provider-"+value).val();
                    $.ajax({
                    type: "get",
                    url: "{{ url('update_GsmMaster') }}/"+value,
                    data: {
                      status_gsm: status_gsm,
                      gsm_number: gsm_number,
                      company_id: company_id,
                      serial_number: serial_number,
                      icc_id: icc_id,
                      imsi: imsi,
                      res_id: res_id,
                      request_date: request_date,
                      expired_date: expired_date,
                      active_date: active_date,
                      terminate_date: terminate_date,
                      note: note,
                      provider: provider
                    },
                    success: function(data) {
                     swal({
                          type: 'success',
                          title: 'The selected data has been updated',
                          showConfirmButton: false,
                          timer: 1500
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

