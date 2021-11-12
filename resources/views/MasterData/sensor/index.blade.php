@extends('layouts.v_main')
@section('title','CSIS | Master Sensor')
@section('title-table','Master Sensor')
@section('master','show')
@section('sensor','active')


@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="text-right" id="selected">
              <button type="button" class="btn btn-primary float-left mr-2 add add-button" id="add">
                <b>Add</b>
                <i class="fas fa-plus ml-2" id="add"></i>
              </button>
              <button type="button" class="btn btn-success float-left mr-2" data-toggle="modal" data-target="#importData">
                  <b> Import</b>
                  <i class="fas fa-file-excel ml-2"></i>
                </button>
                <a href="/export_sensor" class="btn btn-success  mr-2">
                <i class="fas fa-file-export"></i>
              </a>
              <button class="btn btn-success  mr-2 edit_all">
                <i class="fas fa-edit"></i>
              </button>
              <button class="btn btn-danger  delete_all">
                <i class="fas fa-trash"></i>
              </button>
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
                <th scope="col" class="list">Sensor Name*</th>
                <th scope="col" class="list">Merk Sensor</th>
                <th scope="col" class="list">Serial Number*</th>
                <th scope="col" class="list">Rab Number*</th>
                <th scope="col" class="list">Waranty</th>
                <th scope="col" class="list">Status</th>
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

  {{-- modal import --}}
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
              <a  class="btn btn-secondary btn-xs" href="/download_template_sensor" style="color:white">Download Template</a>
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

    const excel_file = document.getElementById("excel_file");
    excel_file.addEventListener("change",(event)=>{
        if(
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
            var work_book = XLSX.read(data,{type: "array"});
            var sheet_name = work_book.SheetNames;
            var sheet_data = XLSX.utils.sheet_to_json(
                work_book.Sheets[sheet_name[0]],
                {header: 1}
            );
            if (sheet_data.length > 0){
                var table_output = '<table class="table table-bordered" id="importTable">';
                for(var row = 0; row < sheet_data.length; row++) {
                    for (var cell = 0; cell < sheet_data[row].length; cell++){
                                if (row == 0) {
                                    table_output += "<th>" + sheet_data[row][cell] + "</th>";

                                } else {
                                    table_output += '<td contenteditable id="table-data-' + cell +'" >' + sheet_data[row][cell] + "</td>";
                                }
                            }
                            table_output += "</tr>";
                }
                        table_output += "</table>";
                        document.getElementById("excel_data").innerHTML = table_output;
                        // check duplicate data
                        serialNumber = document.querySelectorAll("#table-data-2");
                        for(indexA = 0; indexA < serialNumber.length; indexA++){
                        var serialNumberValue = serialNumber[indexA].innerText;
                        $rowCount = $("#table_id tr").length;

                        if ($rowCount==1){

                        }else {
                            $rowResult = $rowCount -1;
                            var allSerialNumber = [];
                            for ($i = 0; $i < $rowResult; $i++)
                            {
                                $serialNumberNum = $("#table_id").find("tbody>tr:eq("+ $i +")>td:eq(4)").attr("name");
                                allSerialNumber[$i] = $serialNumberNum;

                            }
                            for(let index = 0; index < allSerialNumber.length; index++){
                                if(serialNumberValue == allSerialNumber[index]){
                                    serialNumber[indexA].style.backgroundColor = "#e8837d";
                                } else if (index == allSerialNumber.length){

                                }
                            }
                        }
                        }
                        warantyDate = document.querySelectorAll("#table-data-4");
                        for (i = 0; i < warantyDate.length; i++) {
                            var excelDate = warantyDate[i].innerText;
                            var date = new Date(Math.round((excelDate - (25567 + 2)) * 86400 * 1000));
                            try{
                                var converted_date = date.toISOString().split('T')[0];
                            }
                            catch(err) {
                                warantyDate[i].style.backgroundColor = "#e8837d";
                            }
                            warantyDate[i].innerHTML = converted_date;
                        }


            }
            excel_file.value = "";

        };

    });

      function save_data() {
        var total = 0;
        var jsonTable = $('#importTable tbody tr:has(td)').map(function () {
            var $td = $('td', this);
            total += parseFloat($td.eq(2).text());
            return{
                sensor_name         : $td.eq(0).text(),
                merk_sensor         : $td.eq(1).text(),
                serial_number       : $td.eq(2).text(),
                rab_number          : $td.eq(3).text(),
                waranty             : $td.eq(4).text(),
                status              : $td.eq(5).text(),

            }

        }).get();
      $('#importTable > tfoot > tr > td:nth-child(3)').html(total);
        data = {};
        data = jsonTable;
        //
        var thLength = $('#importTable th').length;
        var trLength = $("#importTable td").closest("tr").length;
        var item = document.querySelectorAll("#table-data-8");
        var tes = $("#importTable").find("tbody>tr:eq(1)>td:eq(1)").attr("style");
        var success;
        $.ajax({
        type: 'POST',
        dataType: 'JSON',
        url: "{{ url('/save_import_sensor') }}",
        data: {
           data   : JSON.stringify(data) ,
          _token  : '{!! csrf_token() !!}'
        } ,
        error: function(er) {
          if(er.responseText === 'fail' ){
            // alert("save failed");
            swal({
                type: 'warning',
                text: 'Duplicate data or error format, Imei must 15 character',
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
        // read_temporary()
        $('#importData').modal('hide');
    });
    // ------ Tampil Data ------
    function read(){
      $.get("{{ url('item_data_sensor') }}", {}, function(data, status) {
        $('#table_id').DataTable().destroy();
        $('#table_id').find("#item_data").html(data);
        $('#table_id').dataTable( {
            "lengthMenu": [[50, 100, 1000, -1], [50, 100, 1000, "All"]],

            "dom": '<"top"f>rt<"bottom"lp><"clear">'

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
        $.get("{{ url('add_form_sensor') }}", {}, function(data, status) {
          $('#table_id tbody').prepend(data);
        });
      });
    // ----- Proses Tambah data ------
    function store() {
        var sensor_name = $("#sensor_name").val();
        var merk_sensor = $("#merk_sensor").val();
        var serial_number = $("#serial_number").val();
        var rab_number = $("#rab_number").val();
        var waranty = $("#waranty").val();
        var status = $("#status").val();
        $.ajax({
            type: "get",
            url: "{{ url('store_sensor') }}",
            data: {
              sensor_name: sensor_name,
              merk_sensor:merk_sensor,
              serial_number: serial_number,
              rab_number: rab_number,
              waranty: waranty,
              status:status
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
                    url: "{{ url('destroy_sensor') }}/" + id,
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
        $("#item-sensor_name-"+id).hide("fast");
        $("#item-merk_sensor-"+id).hide("fast");
        $("#item-serial_number-"+id).hide("fast");
        $("#item-rab_number-"+id).hide("fast");
        $("#item-waranty-"+id).hide("fast");
        $("#item-status-"+id).hide("fast");
        $.get("{{ url('show_sensor') }}/" + id, {}, function(data, status) {
            $("#edit-form-"+id).prepend(data)
        });
    }
    // ------ Proses Update Data ------
        function update(id) {
            var sensor_name = $("#sensor_name").val();
            var merk_sensor = $("#merk_sensor").val();
            var serial_number = $("#serial_number").val();
            var rab_number = $("#rab_number").val();
            var waranty = $("#waranty").val();
            var status = $("#status").val();
            var id = id;
            $.ajax({
                type: "get",
                url: "{{ url('update_sensor') }}/"+id,
                data: {
                sensor_name: sensor_name,
                merk_sensor:merk_sensor,
                serial_number: serial_number,
                rab_number: rab_number,
                waranty: waranty,
                status:status
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
                            url: "{{ url('/selectedDelete_sensor') }}",
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
                $.get("{{ url('selected_sensor') }}", {}, function(data, status) {
                    $("#selected").prepend(data)
                });
                $.each(allVals, function(index, value){
                    $("#td-checkbox-"+value).hide("fast");
                    $("#td-button-"+value).hide("fast");
                    $("#item-no-"+value).hide("fast");
                    $("#item-sensor_name-"+value).hide("fast");
                    $("#item-merk_sensor-"+value).hide("fast");
                    $("#item-serial_number-"+value).hide("fast");
                    $("#item-rab_number-"+value).hide("fast");
                    $("#item-waranty-"+value).hide("fast");
                    $("#item-status-"+value).hide("fast");
                    $(".add").hide("fast");
                    $.get("{{ url('show_sensor') }}/" + value, {}, function(data, status) {
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
                    var sensor_name = $(".sensor_name-"+value).val();
                    var merk_sensor = $(".merk_sensor-"+value).val();
                    var serial_number = $(".serial_number-"+value).val();
                    var rab_number = $(".rab_number-"+value).val();
                    var waranty = $(".waranty-"+value).val();
                    var status = $(".status-"+value).val();
                    $.ajax({
                    type: "get",
                    url: "{{ url('update_sensor') }}/"+value,
                    data: {
                    sensor_name: sensor_name,
                    merk_sensor:merk_sensor,
                    serial_number: serial_number,
                    rab_number: rab_number,
                    waranty: waranty,
                    status:status
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
   @endsection

