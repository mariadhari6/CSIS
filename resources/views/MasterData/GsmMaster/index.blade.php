@extends('layouts.v_main')
<<<<<<< HEAD
@section('title','CSIS | Gsm Pre Active')
@section('title-table','Gsm Master')
@section('master','show')
=======
@section('title','CSIS | Master GSM')
@section('title-table',' Master GSM')


>>>>>>> 0293daf947a64c7bb2c3c3f1585c4b26e5483f54
@section('content')
<form onsubmit="return false">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
            <div class="text-right" id="selected">
<<<<<<< HEAD
                <button type="button" class="btn btn-primary float-left mr-2 add add-button"><b>Add</b><i class="fas fa-plus ml-2" id="add"></i></button>

=======
                <button type="button" class="btn btn-primary btn-sm float-left mr-2 add add-button">
                  <b>Add</b>
                  <i class="fas fa-plus ml-2" id="add"></i>
                </button>
>>>>>>> 0293daf947a64c7bb2c3c3f1585c4b26e5483f54
                <div class="float-left mr-2">
                  <select class="form-control input-fixed" id="filter">
                    <option value="{{ url('item_data_all_GsmMaster') }}">All</option>
                    <option value="{{ url('item_data_ready_GsmMaster') }}">Ready</option>
                    <option value="{{ url('item_data_active_GsmMaster') }}">Active</option>
                    <option value="{{ url('item_data_terminate_GsmMaster') }}">Terminate</option>
                  </select>
                </div>
<<<<<<< HEAD
                <button type="button" class="btn btn-success float-left mr-2" data-toggle="modal" data-target="#importData">
                  <b> Import</b>
                  <i class="fas fa-file-excel ml-2"></i>
                </button>
              <button class="btn btn-success edit_all">
                <i class="fas fa-edit"></i>
              </button>
              <button class="btn btn-danger  delete_all"><i class="fas fa-trash"></i></button>
=======
                <button type="button" class="btn btn-success float-left mr-2 import" data-toggle="modal" data-target="#importData" onclick="dataLengthAll()">
                  <b> Import</b>
                  <i class="fas fa-file-excel ml-2"></i>
                </button>
                <a href="/export_gsm_master" class="btn btn-success  mr-2 export" data-toggle="tooltip" title="Export">
                <i class="fas fa-file-export"></i>
                </a>
              <button class="btn btn-success edit_all"  data-toggle="tooltip" title="Edit Selected">
                <i class="fas fa-edit"></i>
              </button>
              <button class="btn btn-danger  delete_all" data-toggle="tooltip" title="Delete Selected"><i class="fas fa-trash"></i></button>
>>>>>>> 0293daf947a64c7bb2c3c3f1585c4b26e5483f54
            </div>
          <table class="table table-responsive data" class="table_id" id="table_id">
            <thead>
              <tr>
                <th class="freeze-header">
                    <div>
                        <label class="form-check-label">
                            <input class="form-check-input  select-all-checkbox" type="checkbox" id="master">
                            <span class="form-check-sign"></span>
                        </label>
                    </div>
                </th>
                <th scope="col" class="action-no">No.</th>
                <th scope="col" class="list">Status GSM*</th>
                <th scope="col" class="list-gsmNumber">GSM Number*</th>
                <th scope="col" class="list-company">Company*</th>
                <th scope="col" class="list">Serial Number*</th>
                <th scope="col" class="list">ICC ID</th>
                <th scope="col" class="list">IMSI</th>
                <th scope="col" class="list">RES ID</th>
                <th scope="col" class="list">Request Date</th>
                <th scope="col" class="list">Expired Date</th>
                <th scope="col" class="list">Active Date</th>
                <th scope="col" class="list">Terminate Date</th>
                <th scope="col" class="list">Note</th>
                <th scope="col" class="list">Provider</th>
                <th scope="col" class="sticky-col first-col">Action</th>
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
</form>

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
          <div class="card">
            <div class="card-header">
              <b>Select Excel File</b>
              <br>
              <input type="file" id="excel_file" />
              <button type="button" class="btn btn-success btn-xs" id="send" onclick="save_data()" >Save</button>
              <a  class="btn btn-secondary btn-xs" href="/download_template_gsm" style="color:white">Download Template</a>
            </div>
            <div class="card-body">
              <div id="excel_data" ></div>
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
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      read()
    });

     // -- excel export to html tabel --
    const excel_file = document.getElementById("excel_file");

    excel_file.addEventListener("change", (event) => {
      if (
        ![
          "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
          "application/vnd.ms-excel",
        ].includes(event.target.files[0].type)
      ) {
        document.getElementById("excel_data").innerHTML =
          '<div class="alert alert-danger">Only .xlsx or .xls file format are allowed</div>';

        excel_file.value = "";

        return false;
      }

      var reader = new FileReader();

      reader.readAsArrayBuffer(event.target.files[0]);

      reader.onload = function (event) {
        var data = new Uint8Array(reader.result);

        var work_book = XLSX.read(data, { type: "array" });

        var sheet_name = work_book.SheetNames;

        var sheet_data = XLSX.utils.sheet_to_json(
          work_book.Sheets[sheet_name[0]],
          { header: 1 }
        );

        if (sheet_data.length > 0) {
          var table_output = '<table class="table table-bordered" id="importTable">';

          for (var row = 0; row < sheet_data.length; row++) {
            table_output += "<tr>";

            for (var cell = 0; cell < sheet_data[row].length; cell++) {
              if (row == 0) {
                table_output += "<th>" + sheet_data[row][cell] + "</th>";
              } else {
                table_output += '<td contenteditable id="table-data-' + cell + '" >' + sheet_data[row][cell] + "</td>";
              }
            }

            table_output += "</tr>";
          }

          table_output += "</table>";

          document.getElementById("excel_data").innerHTML = table_output;

           // check duplicate data
          gsmNumberID = document.querySelectorAll("#table-data-1");
          serialNumberID = document.querySelectorAll("#table-data-3");
          for (indexA = 0; indexA < gsmNumberID.length; indexA++) {
            var gsmNumberValue = gsmNumberID[indexA].innerText; //0
            var serialNumberValue = serialNumberID[indexA].innerText;
            $rowCount = $("#table_id tr").length;
            if ($rowCount == 1) {
              // alert('table empty')
            } else {
              $rowResult = $rowCount - 1;
              var allGsmNum = [];
              var allSerNum = [];
              for($i = 0; $i < $rowResult; $i++)
                  {
                    // $numArr = $i-1;
                    $gsmNum = $("#table_id").find("tbody>tr:eq("+ $i +")>td:eq(3)").attr("name");
                    $serNum = $("#table_id").find("tbody>tr:eq("+ $i +")>td:eq(5)").attr("name");
                    allGsmNum[$i] = $gsmNum;
                    allSerNum[$i] = $serNum;
                  }
                  // alert(allGsmNum[0]);
              for (let index = 0; index < allGsmNum.length; index++) {
                if( gsmNumberValue == allGsmNum[index] ){
                    gsmNumberID[indexA].style.backgroundColor = "#e8837d";
                    if( serialNumberValue == allSerNum[index] ){
                      serialNumberID[indexA].style.backgroundColor = "#e8837d";
                    }
                } else if( serialNumberValue == allSerNum[index]){
                    serialNumberID[indexA].style.backgroundColor = "#e8837d";
                } else if( index == allGsmNum.length) {

                }
              }
            }
            // alert( typeof serialNumberValue );
          }

          // change format RequestDate
          requestDate = document.querySelectorAll("#table-data-7");
          for (i = 0; i < requestDate.length; i++) {
            var excelDate = requestDate[i].innerText;
            var date = new Date(Math.round((excelDate - (25567 + 2)) * 86400 * 1000));
            try {
                  var converted_requestDate = date.toISOString().split('T')[0];
                }
                catch(err) {
                  // var converted_date = 'wrong date format';
                  requestDate[i].style.backgroundColor = "#e8837d";
                }
            if(converted_requestDate === undefined) {
              requestDate[i].innerHTML = "";
            } else {
              requestDate[i].innerHTML = converted_requestDate;
            }
          }

        // change format expiredDate
        expiredDate = document.querySelectorAll("#table-data-8");
        for (i = 0; i < expiredDate.length; i++) {
          var excelDate = expiredDate[i].innerText;
          var date = new Date(Math.round((excelDate - (25567 + 2)) * 86400 * 1000));
          try {
                var converted_expiredDate = date.toISOString().split('T')[0];
              }
              catch(err) {
                // var converted_date = 'wrong date format';
                expiredDate[i].style.backgroundColor = "#e8837d";
              }
            if(converted_expiredDate === undefined) {
              expiredDate[i].innerHTML = "";
              expiredDate[i].style.backgroundColor = "#fff";
            } else {
              expiredDate[i].innerHTML = converted_expiredDate;
            }
        }

        // change format activeDate
        activeDate = document.querySelectorAll("#table-data-9");
        for (i = 0; i < activeDate.length; i++) {
          var excelDate = activeDate[i].innerText;
          var date = new Date(Math.round((excelDate - (25567 + 2)) * 86400 * 1000));
          try {
                var converted_activeDate = date.toISOString().split('T')[0];
              }
              catch(err) {
                // var converted_date = 'wrong date format';
                activeDate[i].style.backgroundColor = "#e8837d";
              }
            if(converted_activeDate === undefined) {
              activeDate[i].innerHTML = "";
              activeDate[i].style.backgroundColor = "#fff";
            } else {
              activeDate[i].innerHTML = converted_activeDate;
            }
        }

        // change format terminatedDate
        terminatedDate = document.querySelectorAll("#table-data-10");
        for (i = 0; i < terminatedDate.length; i++) {
          var excelDate = terminatedDate[i].innerText;
          var date = new Date(Math.round((excelDate - (25567 + 2)) * 86400 * 1000));
          try {
                var converted_terminatedDate = date.toISOString().split('T')[0];
              }
              catch(err) {
                // var converted_date = 'wrong date format';
                terminatedDate[i].style.backgroundColor = "#e8837d";
              }
            if(converted_terminatedDate === undefined) {
              terminatedDate[i].innerHTML = "";
              terminatedDate[i].style.backgroundColor = "#fff";
            } else {
              terminatedDate[i].innerHTML = converted_terminatedDate;
            }
        }

        }
        excel_file.value = "";
      };
    });

    // ------- save data import -----
    function save_data() {
      var total = 0;
      var jsonTable = $('#importTable tbody tr:has(td)').map(function () {
          var $td = $('td', this);
          total += parseFloat($td.eq(2).text());
          return {
              status_gsm    : $td.eq(0).text(),
              gsm_number    : $td.eq(1).text(),
              company_id    : $td.eq(2).text(),
              serial_number : $td.eq(3).text(),
              icc_id        : $td.eq(4).text(),
              imsi          : $td.eq(5).text(),
              res_id        : $td.eq(6).text(),
              request_date  : $td.eq(7).text(),
              expired_date  : $td.eq(8).text(),
              active_date   : $td.eq(9).text(),
              terminate_date: $td.eq(10).text(),
              note          : $td.eq(11).text(),
              provider      : $td.eq(12).text()
          }
      }).get();

      $('#importTable > tfoot > tr > td:nth-child(3)').html(total);
      data = {};
      data = jsonTable;

      // console.log(data[0]['status_gsm'])
      var thLength = $('#importTable th').length;
      var trLength = $("#importTable td").closest("tr").length;
      var item = document.querySelectorAll("#table-data-8");
      var tes = $("#importTable").find("tbody>tr:eq(1)>td:eq(1)").attr("style");
      var success;

      $.ajax({
        type: 'POST',
        dataType: 'JSON',
        url: "{{ url('save_import_GsmMaster') }}",
        data: {
           data   : JSON.stringify(data) ,
          _token  : '{!! csrf_token() !!}'
        } ,
        error: function(er) {
          if(er.responseText === 'fail' ){
            // alert("save failed");
            swal({
                type: 'warning',
                text: 'Duplicate data or error format',
                showCloseButton: true,
                showConfirmButton: false
              }).catch(function(timeout) { });
          } else {
            try {
            swal({
                type: 'success',
                title: 'Data Saved',
                showConfirmButton: false,
                timer: 1500
            }).catch(function(timeout) { });
            read();
            $('#importData').modal('hide');
            } catch (error) {
              swal({
                type: 'warning',
                text: 'Duplicate data or error format',
                showCloseButton: true,
                showConfirmButton: false
              }).catch(function(timeout) { });

            }
          }
          }
      });

    }

    // ---- Close Modal -------
    $('#close-modal').click(function() {
        // deleteTemporary();
        read()
        $('#importData').modal('hide');
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
<<<<<<< HEAD

=======
            "lengthMenu": [[50, 100, 1000, -1], [50, 100, 1000, "All"]],
>>>>>>> 0293daf947a64c7bb2c3c3f1585c4b26e5483f54
              "dom": '<"top"f>rt<"bottom"lp><"clear">'
              });
          $('#table_id').DataTable().draw();
        });
      }

    // ------ Tampil Data ------
    function read(){
        enableButton();
      $.get("{{ url('item_data_GsmMaster') }}", {}, function(data, status) {
        $('#table_id').DataTable().destroy();
        $('#table_id').find("#item_data").html(data);
         $('#table_id').dataTable( {
<<<<<<< HEAD
            "pageLength": 50,
=======
            "lengthMenu": [[50, 100, 1000, -1], [50, 100, 1000, "All"]],

>>>>>>> 0293daf947a64c7bb2c3c3f1585c4b26e5483f54
            "dom": '<"top"f>rt<"bottom"lp><"clear">'
            // "dom": '<lf<t>ip>'
            });
        $('#table_id').DataTable().draw();
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
         disableButton();
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

      // $.ajax({
      //       type: "get",
      //       url: "{{ url('store_GsmMaster') }}",
      //       data: {
      //         status_gsm: status_gsm,
      //         gsm_number: gsm_number,
      //         company_id: company_id,
      //         serial_number: serial_number,
      //         icc_id: icc_id,
      //         imsi: imsi,
      //         res_id: res_id,
      //         request_date: request_date,
      //         expired_date: expired_date,
      //         active_date: active_date,
      //         terminate_date: terminate_date,
      //         note: note,
      //         provider: provider
      //       },
      //       success: function(data) {
      //       swal({
      //           type: 'success',
      //           title: 'Data Saved',
      //           showConfirmButton: false,
      //           timer: 1500
      //       }).catch(function(timeout) { });
      //         read();
      //         // break;
      //       }
      //   });

      $rowCount = $("#table_id tr").length;
      if ($rowCount == 2) {
        // alert('table empty')
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
          } else {
              $success = true;
          }
        }
      }

      if($success === true) {
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
              // break;
            }
        });
      }
<<<<<<< HEAD
=======

>>>>>>> 0293daf947a64c7bb2c3c3f1585c4b26e5483f54
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
        disableButton();
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
            disableButton();
            $('[data-toggle="tooltip"]').tooltip("hide");

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
                        $(".add").hide();
                        $(".cancel").hide();
                        $(".import").hide();
                        $(".export").hide();


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
                    $(".import").show("fast");
                    $(".export").show("fast");
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
            $(".import").show("fast");
            $(".export").show("fast");
            read();
        }

         // destro datatable
         function dataLengthAll() {
          $('#table_id').DataTable().destroy();
        }
<<<<<<< HEAD
=======

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


>>>>>>> 0293daf947a64c7bb2c3c3f1585c4b26e5483f54

  </script>
  {{-- <iframe name="dummyframe" id="dummyframe" onload="read_temporary()" style="display: none;"></iframe> --}}

   @endsection