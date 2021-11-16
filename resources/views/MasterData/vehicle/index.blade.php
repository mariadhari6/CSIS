@extends('layouts.v_main')
@section('title','Master Vehicle')
@section('title-table','Master Vehicle')
@section('master','show')
@section('Vehicle','active')

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
                <a href="/export_vehicle" class="btn btn-success  mr-2">
                <i class="fas fa-file-export"></i>
                </a>
                <button class="btn btn-success  mr-2 edit_all"> <i class="fas fa-edit"></i></button>
                <button class="btn btn-danger  delete_all"><i class="fas fa-trash"></i></button>
            </div>
        <form onsubmit="return false">
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
                    <th scope="col" class="action">No.</th>
                    <th scope="col" class="list-company">Company Name*</th>
                    <th scope="col" class="list">License Plate*</th>
                    <th scope="col" class="list">Vihecle Type*</th>
                    <th scope="col" class="list">Pool Name*</th>
                    <th scope="col" class="list">Pool Location*</th>
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
              <a  class="btn btn-secondary btn-xs" href="/download_template_MasterVehicle" style="color:white">Download Template</a>
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
                            table_output += "<tr>";

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

                        //check duplicate data
                        lisencePlateNumber = document.querySelectorAll("#table-data-1");
                        for(indexA = 0; indexA < lisencePlateNumber.length; indexA++){
                        var licensePlateValue = lisencePlateNumber[indexA].innerText;
                        $rowCount = $("#table_id tr").length;

                        if ($rowCount==1){

                        } else {
                            $rowResult = $rowCount -1;
                            var allLicensePlate = [];
                            for($i = 0; $i < $rowResult; $i++)
                            {
                            $licensePlateNum = $("#table_id").find("tbody>tr:eq("+ $i +")>td:eq(4)").attr("name");
                            allLicensePlate[$i] = $licensePlateNum;
                            }
                    for (let index = 0; index < allLicensePlate.length; index++) {
                        if( licensePlateValue == allLicensePlate[index] ){
                            lisencePlateNumber[indexA].style.backgroundColor = "#e8837d";
                    } else if ( index == allLicensePlate.length){

                    }
                }
            }
         }


            excel_file.value = "";
            }
        };
    });

    function save_data() {
      var total = 0;
      var jsonTable = $('#importTable tbody tr:has(td)').map(function () {
          var $td = $('td', this);
          total += parseFloat($td.eq(2).text());
          return {
              company_id    : $td.eq(0).text(),
              license_plate : $td.eq(1).text(),
              vehicle_id    : $td.eq(2).text(),
              pool_name     : $td.eq(3).text(),
              pool_location : $td.eq(4).text(),

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
        url: "{{ url('save_import_MasterVehicle') }}",
        data: {
           data   : JSON.stringify(data) ,
          _token  : '{!! csrf_token() !!}'
        } ,
        error: function(er) {
          if(er.responseText === 'fail' ){
            // alert("save failed");
            swal({
                type: 'warning',
                text: 'No company or Vehicle type data',
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
      $.get("{{ url('item_data_vehicle') }}", {}, function(data, status) {
         $('#table_id').DataTable().destroy();
        $('#table_id').find("#item_data").html(data);
         $('#table_id').dataTable( {
            "lengthMenu": [[50, 100, 1000, -1], [50, 100, 1000, "All"]],

            "dom": '<"top"f>rt<"bottom"lp><"clear">'
            });
        $('#table_id').DataTable().draw();
      });
    }
    function cancel() {
      read();
    }
    $('.add').click(function() {
        $.get("{{ url('add_form_vehicle') }}", {}, function(data, status) {
          $('#table_id tbody').prepend(data);
        });
    });
    function store() {
        $success = false;
        var company_id      = $("#company_id").val();
        var license_plate   = $("#license_plate").val();
        var vehicle_id      = $("#vehicle_id").val();
        var pool_name       = $("#pool_name").val();
        var pool_location   = $("#pool_location").val();
        // var license_plateNum = $("#table_id").find("tbody>tr:eq(1)>td:eq(3)").attr("name");
        //  alert(license_plateNum);


    $rowCount = $("#table_id tr").length;
      if ($rowCount == 2) {
        // alert('table empty')
      } else {
        $rowResult = $rowCount - 2;
        var alllicense_plateNum = [];
        // var allSerNum = [];
        for($i = 1; $i <= $rowResult; $i++)
            {
              $numArr = $i-1;
                $license_plateNum = $("#table_id").find("tbody>tr:eq(1)>td:eq(3)").attr("name");

            //   $serNum = $("#table_id").find("tbody>tr:eq("+ $i +")>td:eq(5)").attr("name");
              alllicense_plateNum[$numArr] = $license_plateNum;
            //   allSerNum[$numArr] = $serNum;
            }
            // alert(alllicense_plateNum[0]);
        for (let index = 0; index < alllicense_plateNum.length; index++) {
          if( license_plate == alllicense_plateNum[index] ){
            // alert('already exists');
              swal({
                type: 'warning',
                text: 'license_plate Number already exists',
                showConfirmButton: false,
                timer: 1500
              }).catch(function(timeout) { });
              // alert('GSM Number already exists');
              break;

        // }else if(index == alllicense_plateNum.length ) {
         }else {
              $success = true;
        break;
        }
        }
      }

      if($success === true) {
        $.ajax({
            type: "get",
            url: "{{ url('store_vehicle') }}",
            data: {
              company_id    : company_id,
              license_plate : license_plate,
              vehicle_id    : vehicle_id,
              pool_name     : pool_name,
              pool_location : pool_location
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
        });
      }
    }
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
                    url: "{{ url('destroy_vehicle') }}/" + id,
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
    function edit(id){

        var id = id;
        $("#td-checkbox-"+id).hide("fast");
        $("#td-button-"+id).slideUp("fast");
        $("#td-no-"+id).slideUp("fast");
        $("#item-company_id-"+id).slideUp("fast");
        $("#item-license_plate-"+id).slideUp("fast");
        $("#item-vehicle_id-"+id).slideUp("fast");
        $("#item-pool_name-"+id).slideUp("fast");
        $("#item-pool_location-"+id).slideUp("fast");
        $.get("{{ url('show_vehicle') }}/" + id, {}, function(data, status) {
            $("#edit-form-"+id).prepend(data)
        });
    }
    function update(id) {
        var company_id      = $("#company_id").val();
        var license_plate   = $("#license_plate").val();
        var vehicle_id      = $("#vehicle_id").val();
        var pool_name       = $("#pool_name").val();
        var pool_location   = $("#pool_location").val();
        var id = id;
        $.ajax({
            type: "get",
            url: "{{ url('update_vehicle') }}/"+id,
            data: {
              company_id    :   company_id,
              license_plate :   license_plate,
              vehicle_id    :   vehicle_id,
              pool_name     :   pool_name,
              pool_location :   pool_location
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
    $('#master').on('click', function(e) {
          if($(this).is(':checked',true)){
              $(".task-select").prop('checked', true);
          } else {
              $(".task-select").prop('checked',false);
          }
    });

    $('.delete_all').on('click', function(){

          var allVals = [];
          $(".task-select:checked").each(function() {
              allVals.push($(this).attr("id"));
          });
              if (allVals.length > 0) {
                  var _token = $('input[name="_token"]').val();

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
                          url: "{{ url('/selectedDelete_vehicle') }}",
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
    $('.edit_all').on('click', function(e){
        var allVals = [];
        var _token = $('input[name="_token"]').val();
        $(".task-select:checked").each(function() {
            allVals.push($(this).attr("id"));
        });
        if (allVals.length > 0){

            $(".edit_all").hide("fast");
            $(".delete_all").hide("fast");
            $.get("{{ url('selected_vehicle') }}", {}, function(data, status) {
                $("#selected").prepend(data)
            });
            $.each(allVals, function(index, value){
                $("#td-checkbox-"+value).hide("fast");
                $("#td-button-"+value).hide("fast");
                $("#td-no-"+value).hide("fast");
                $("#item-company_id-"+value).slideUp("fast");
                $("#item-license_plate-"+value).slideUp("fast");
                $("#item-vehicle_id-"+value).slideUp("fast");
                $("#item-pool_name-"+value).slideUp("fast");
                $("#item-pool_location-"+value).slideUp("fast");
                $(".add").hide("fast");
                $.get("{{ url('show_vehicle') }}/" + value, {}, function(data, status) {
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
                var company_id      = $(".company_id-"+value).val();
                var license_plate   = $(".license_plate-"+value).val();
                var vehicle_id      = $(".vehicle_id-"+value).val();
                var pool_name       = $(".pool_name-"+value).val();
                var pool_location   = $(".pool_location-"+value).val();
                $.ajax({
                type: "get",
                url: "{{ url('update_vehicle') }}/"+value,
                data: {
                    company_id      : company_id,
                    license_plate   : license_plate,
                    vehicle_id      : vehicle_id,
                    pool_name       : pool_name ,
                    pool_location   : pool_location
                },
                success: function(data) {
                swal({
                    type: 'success',
                    title: 'The selected data has been updated',
                    showConfirmButton: false,
                    timer: 1500
                    }).catch(function(timeout) { });
                        $(".save").hide("fast");
                        $(".cancel").hide("fast");
                        $(".add").show("fast");
                        $(".edit_all").show("fast");
                        $(".delete_all").show("fast");
                        read();
                }
            });
            });
        });
    }
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
