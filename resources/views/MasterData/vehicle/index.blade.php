@extends('layouts.v_main')
@section('title','Master Vehicle')
@section('title-table','Master Vehicle')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
             <div class="text-right mt-3" id="selected">
                <button type="button" class="btn btn-primary float-left mr-2 add add-button"><b>Add</b><i class="fas fa-plus ml-2" id="add"></i></button>
<<<<<<< HEAD
                <button class="btn btn-success  mr-2 edit_all"> <i class="fas fa-pen"></i></button>
                <button class="btn btn-danger  delete_all"><i class="fas fa-trash"></i></button>
            </div>

          <table class="table table-hover data" class="table_id" id="table_id" >
=======
                <button type="button" class="btn btn-success float-left mr-2 import" data-toggle="modal" data-target="#importData">
                  <b> Import</b>
                  <i class="fas fa-file-excel ml-2"></i>
                </button>
                <a href="/export_vehicle" class="btn btn-success  mr-2 export" data-toggle="tooltip" title="Export Data">
                <i class="fas fa-file-export"></i>
                </a>
                <button class="btn btn-success  mr-2 edit_all" data-toggle="tooltip" title="Edit Selected"> <i class="fas fa-edit"></i></button>
                <button class="btn btn-danger  delete_all" data-toggle="tooltip" title="Delete Selected"><i class="fas fa-trash"></i></button>
            </div>
        <form onsubmit="return false">
          <table class="table table-responsive data" class="table_id" id="table_id" >
>>>>>>> 0293daf947a64c7bb2c3c3f1585c4b26e5483f54
            <thead>
              <tr>
                    <th>
                        <label class="form-check-label">
                            <input class="form-check-input  select-all-checkbox" type="checkbox" id="master">
                            <span class="form-check-sign"></span>
                        </label>
                    </th>
<<<<<<< HEAD
                    <th scope="col">No</th>
                    <th scope="col">Company Name</th>
                    <th scope="col">License Plate</th>
                    <th scope="col">Vihecle Type</th>
                    <th scope="col">Pool Name</th>
                    <th scope="col">Pool Location</th>
                    <th scope="col">Action</th>
                </tr>
=======
                    <th scope="col" class="action">No.</th>
                    <th scope="col" class="list-company">Company Name*</th>
                    <th scope="col" class="list">License Plate*</th>
                    <th scope="col" class="list">Vehicle Type*</th>
                    <th scope="col" class="list">Pool Name*</th>
                    <th scope="col" class="list">Pool Location*</th>
                    <th scope="col" class="action sticky-col first-col">Action</th>

                    </tr>
>>>>>>> 0293daf947a64c7bb2c3c3f1585c4b26e5483f54
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
        read();
    });

     // ------ Tampil Data ------
    function read(){
        enableButton();

      $.get("{{ url('item_data_vehicle') }}", {}, function(data, status) {
         $('#table_id').DataTable().destroy();
        $('#table_id').find("#item_data").html(data);
         $('#table_id').dataTable({
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
         disableButton();

        $.get("{{ url('add_form_vehicle') }}", {}, function(data, status) {
          $('#table_id tbody').prepend(data);
        });
    });
<<<<<<< HEAD

    function store() {
        
=======
    function store() {
        $success = false;
>>>>>>> 0293daf947a64c7bb2c3c3f1585c4b26e5483f54
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
<<<<<<< HEAD
=======
    function edit(id){
        disableButton();
>>>>>>> 0293daf947a64c7bb2c3c3f1585c4b26e5483f54

    function edit(id){
        
        var id = id;
        $("#td-checkbox-"+id).hide("fast");
<<<<<<< HEAD
        $("#td-button-"+id).hide("fast");
        $("#item-no-"+id).hide("fast");
        $("#item-company_id-"+id).hide("fast");
        $("#item-license_plate-"+id).hide("fast");
        $("#item-vehicle_id-"+id).hide("fast");
        $("#item-pool_name-"+id).hide("fast");
        $("#item-pool_location-"+id).hide("fast");
=======
        $("#td-button-"+id).slideUp("fast");
        $("#item-no-"+id).slideUp("fast");
        $("#item-company_id-"+id).slideUp("fast");
        $("#item-license_plate-"+id).slideUp("fast");
        $("#item-vehicle_id-"+id).slideUp("fast");
        $("#item-pool_name-"+id).slideUp("fast");
        $("#item-pool_location-"+id).slideUp("fast");
>>>>>>> 0293daf947a64c7bb2c3c3f1585c4b26e5483f54
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
<<<<<<< HEAD

    $('.edit_all').on('click', function(e){

=======
    //form edit all
    $('.edit_all').on('click', function(e){
        disableButton();
        $('[data-toggle="tooltip"]').tooltip("hide");
>>>>>>> 0293daf947a64c7bb2c3c3f1585c4b26e5483f54
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
                $("#item-no-"+value).hide("fast");
<<<<<<< HEAD
                $("#item-company_id-"+value).hide("fast");
                $("#item-license_plate-"+value).hide("fast");
                $("#item-vehicle_id-"+value).hide("fast");
                $("#item-pool_name-"+value).hide("fast");
                $("#item-pool_location-"+value).hide("fast");

=======
                $("#item-company_id-"+value).slideUp("fast");
                $("#item-license_plate-"+value).slideUp("fast");
                $("#item-vehicle_id-"+value).slideUp("fast");
                $("#item-pool_name-"+value).slideUp("fast");
                $("#item-pool_location-"+value).slideUp("fast");
>>>>>>> 0293daf947a64c7bb2c3c3f1585c4b26e5483f54
                $(".add").hide("fast");
                $.get("{{ url('show_vehicle') }}/" + value, {}, function(data, status) {
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

                    // $(".save").hide();
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
<<<<<<< HEAD

    function batal(){

        $(".save").hide("fast");
        $(".cancel").hide("fast");
        $(".add").show("fast");
        $(".edit_all").show("fast");
        $(".delete_all").show("fast");
        read();
    }
=======
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
>>>>>>> 0293daf947a64c7bb2c3c3f1585c4b26e5483f54

</script>
@endsection
