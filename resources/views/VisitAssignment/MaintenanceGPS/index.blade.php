@extends('layouts.v_main')
<<<<<<< HEAD
@section('title','CSIC | Maintenance GPS')
@section('title-table','Maintenance GPS')
=======
@section('title','CSIC | Maintenance Device')
@section('title-table','Maintenance Device')

>>>>>>> 0293daf947a64c7bb2c3c3f1585c4b26e5483f54
@section('content')
    <form onsubmit="return false">

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
            <div class="text-right" id="selected">
                <div class="float-left mr-2">
                  <select class="form-control input-fixed" id="filter">
                    <option value="{{ url('item_data_all_maintenance') }}">All</option>
                    <option value="{{ url('item_data_onProgress_maintenance') }}">On Progress</option>
                    <option value="{{ url('item_data_done_maintenance') }}">Done</option>
                  </select>
                </div>

                <button class="btn btn-default float-left mr-2 dropdown-toggle filter" id="dropdownMenu" data-toggle="dropdown" ><i class="fas fa-filter"></i></button>
                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                  <div class="form-group">
                      <input class="form-control" id="filter-date" type="month">
                      <button class="mt-1 btn btn-primary float-right" id="check-btn">check</button>
                    </select>
                  </div>
                </ul>
                 <a href="/export_maintenance" class="btn btn-success  mr-2 export" data-toggle="tooltip" title="Export">
                <i class="fas fa-file-export"></i>
                </a>
              <button class="btn btn-success  mr-2 edit_all" data-toggle="tooltip" title="Edit Selected">
                <i class="fas fa-edit"></i>
              </button>
              <button class="btn btn-danger delete_all" data-toggle="tooltip" title="Edit Selected">
                <i class="fas fa-trash"></i>
              </button>
            </div>
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
                <th scope="col" class="list-company">Company</th>
                <th scope="col" class="list">Permasalahan</th>
                <th scope="col" class="list">Vehicle</th>
                <th scope="col" class="list">Tanggal</th>
                <th scope="col" class="list">Type GPS*</th>
<<<<<<< HEAD
                <th scope="col" class="list">GPS terpasang</th>
                <th scope="col" class="list">Sensor terpasang</th>
                <th scope="col" class="list">GSM</th>
=======
                <th scope="col" class="list">GPS Terpakai</th>
                <th scope="col" class="list">Sensor Terpakai</th>
                <th scope="col" class="list">GSM Terpakai</th>
>>>>>>> 0293daf947a64c7bb2c3c3f1585c4b26e5483f54
                <th scope="col" class="list">Ketersediaan Kendaraan</th>
                <th scope="col" class="list">Keterangan</th>
                <th scope="col" class="list">Hasil*</th>
                <th scope="col" class="list">Biaya Transportasi*</th>
                <th scope="col" class="list">Teknisi*</th>
                <th scope="col" class="list">Req By</th>
                <th scope="col" class="list">Note</th>
                <th scope="col" class="list">Status*</th>
                <th scope="col" class="action sticky-col first-col">Action</th>
              </tr>
            </thead>
            <tbody  id="item_data">
              {{-- {{ csrf_field() }} --}}
            </tbody>
          </table>
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
      $.get("{{ url('item_data_maintenanace_gps') }}", {}, function(data, status) {
        $('#table_id').DataTable().destroy();
        $('#table_id').find("#item_data").html(data);
        $('#table_id').dataTable( {
            "lengthMenu": [[50, 100, 1000, -1], [50, 100, 1000, "All"]],

            "dom": '<"top"f>rt<"bottom"lp><"clear">'
            });
        $('#table_id').DataTable().draw();
      });
    }
      // filter bulan dan tahun
    $('#check-btn').click(function() {
      var date = new Date($('#filter-date').val());
      var month = date.getMonth() + 1;
      var year = date.getFullYear();
    //   var task = val();
        $.ajax({
            type: "get",
            url: "{{ url('item_data_MY_Maintennace') }}",
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
         disableButton();
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
    // ---- Tombol Cancel -----
    function cancel() {
      read()
    }

    // ------ Tambah Form Input ------
    $('.add').click(function() {
         disableButton();

    $.get("{{ url('add_form_maintenanace_gps') }}", {}, function(data, status) {
        $('#table_id tbody').prepend(data);
    });
    });

    // ----- Proses Tambah data ------
    function store() {
        var company_id = $("#company_id").val();
        var vehicle = $("#vehicle").val();
        var waktu_kesepakatan = $("#waktu_kesepakatan").val();
        var type_gps_id = $("#type_gps_id").val();
        var equipment_gps_id = $("#equipment_gps_id").val();
        var equipment_sensor_id = $("#equipment_sensor_id").val();
        var equipment_gsm = $("#equipment_gsm").val();
        var task = $("#task").val();
        var ketersediaan_kendaraan = $("#ketersediaan_kendaraan").val();
        var keterangan = $("#keterangan").val();
        var hasil = $("#hasil").val();
        var biaya_transportasi = $("#biaya_transportasi").val();
        var teknisi_maintenance = $("#teknisi_maintenance").val();
        var req_by = $("#req_by").val();
        var note_maintenance = $("#note_maintenance").val();
        var status = $("#status").val();

        $.ajax({
            type: "get",
            url: "{{ url('store_maintenanceGps') }}",
            data: {
              company_id: company_id,
              vehicle: vehicle,
              waktu_kesepakatan: waktu_kesepakatan,
              type_gps_id: type_gps_id,
              equipment_gps_id: equipment_gps_id,
              equipment_sensor_id: equipment_sensor_id,
              equipment_gsm: equipment_gsm,
              task: task,
              ketersediaan_kendaraan: ketersediaan_kendaraan,
              keterangan: keterangan,
              hasil: hasil,
              biaya_transportasi: biaya_transportasi,
              teknisi_maintenance: teknisi_maintenance,
              req_by: req_by,
              note_maintenance: note_maintenance,
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
                    url: "{{ url('destroy_maintenanceGps') }}/" + id,
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
        $("#td-button-"+id).slideUp("fast");
        $("#item-no-"+id).slideUp("fast");
        $("#item-company_id-"+id).slideUp("fast");
        $("#item-vehicle-"+id).slideUp("fast");
        $("#item-waktu_kesepakatan-"+id).slideUp("fast");
        $("#item-type_gps_id-"+id).slideUp("fast");
        $("#item-equipment_gps_id-"+id).slideUp("fast");
        $("#item-equipment_sensor_id-"+id).slideUp("fast");
        $("#item-equipment_gsm-"+id).slideUp("fast");
        $("#item-task-"+id).slideUp("fast");
        $("#item-ketersediaan_kendaraan-"+id).slideUp("fast");
        $("#item-keterangan-"+id).slideUp("fast");
        $("#item-hasil-"+id).slideUp("fast");
        $("#item-biaya_transportasi-"+id).slideUp("fast");
        $("#item-teknisi_maintenance-"+id).slideUp("fast");
        $("#item-req_by-"+id).slideUp("fast");
        $("#item-note_maintenance-"+id).slideUp("fast");
        $("#item-status-"+id).slideUp("fast");
        $.get("{{ url('edit_form_maintenanceGps') }}/" + id, {}, function(data, status) {
            $("#edit-form-"+id).prepend(data)
        });
    }

    // ------ Proses Update Data ------
    function update(id) {
        var company_id = $('select[name="company_id"]').val();
        var vehicle = $("#vehicle").val();
        var waktu_kesepakatan = $("#waktu_kesepakatan").val();
        var type_gps_id = $("#type_gps_id").val();
        var equipment_gps_id = $("#equipment_gps_id").val();
        var equipment_sensor_id = $("#equipment_sensor_id").val();
        var equipment_gsm = $("#equipment_gsm").val();
        var task = $("#task").val();
        var ketersediaan_kendaraan = $("#ketersediaan_kendaraan").val();
        var keterangan = $("#keterangan").val();
        var hasil = $("#hasil").val();
        var biaya_transportasi = $("#biaya_transportasi").val();
        var teknisi_maintenance = $("#teknisi_maintenance").val();
        var req_by = $("#req_by").val();
        var note_maintenance = $("#note_maintenance").val();
        var status = $("#status").val();
        var hidden_gsm = $("#hidden_gsm").val();



        var id = id;
        if(type_gps_id == "" || hasil == "" || biaya_transportasi =="" || teknisi_maintenance =="" || status ==""  ){
        // alert('sama');

        }else{
            // alert('tidak sama');
            $.ajax({
            type: "get",
            url: "{{ url('update_maintenanceGps') }}/"+id,
            data: {
              company_id: company_id,
              vehicle: vehicle,
              waktu_kesepakatan: waktu_kesepakatan,
              type_gps_id: type_gps_id,
              equipment_gps_id: equipment_gps_id,
              equipment_sensor_id: equipment_sensor_id,
              equipment_gsm: equipment_gsm,
              task: task,
              ketersediaan_kendaraan: ketersediaan_kendaraan,
              keterangan: keterangan,
              hasil: hasil,
              biaya_transportasi: biaya_transportasi,
              teknisi_maintenance: teknisi_maintenance,
              req_by: req_by,
              note_maintenance: note_maintenance,
             status:status,
            hidden_gsm: hidden_gsm
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


    }

    // checkbox all
    $('#master').on('click', function(e) {
            if($(this).is(':checked',true)){
                $(".task-select").prop('checked', true);
            } else {
                $(".task-select").prop('checked',false);
            }
      });

    // delete all
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
                      url: "{{ url('/selectedDelete_maintenanceGps') }}",
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

    // form edit all
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
          $.get("{{ url('selected_maintenanceGps') }}", {}, function(data, status) {
              $("#selected").prepend(data)
          });
          $.each(allVals, function(index, value){
              $("#td-checkbox-"+value).hide("fast");
              $("#item-no-"+value).hide("fast");
              $("#td-button-"+value).hide("fast");
              $("#item-company_id-"+value).slideUp("fast");
              $("#item-vehicle-"+value).slideUp("fast");
              $("#item-waktu_kesepakatan-"+value).slideUp("fast");
              $("#item-type_gps_id-"+value).slideUp("fast");
              $("#item-equipment_gps_id-"+value).slideUp("fast");
              $("#item-equipment_sensor_id-"+value).slideUp("fast");
              $("#item-equipment_gsm-"+value).slideUp("fast");
              $("#item-task-"+value).slideUp("fast");
              $("#item-ketersediaan_kendaraan-"+value).slideUp("fast");
              $("#item-keterangan-"+value).slideUp("fast");
              $("#item-hasil-"+value).slideUp("fast");
              $("#item-biaya_transportasi-"+value).slideUp("fast");
              $("#item-teknisi_maintenance-"+value).slideUp("fast");
              $("#item-req_by-"+value).slideUp("fast");
              $("#item-note_maintenance-"+value).slideUp("fast");
              $("#item-status-"+value).slideUp("fast");

              $(".add").hide("fast");
              $.get("{{ url('edit_form_maintenanceGps') }}/" + value, {}, function(data, status) {
                  $("#edit-form-"+value).prepend(data)
                  $("#master").prop('checked', false);
                  $(".add").hide();
                $(".cancel").hide();
                $(".export").hide();
                $(".filter").hide();
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
            var vehicle = $(".vehicle-"+value).val();
            var waktu_kesepakatan = $(".waktu_kesepakatan-"+value).val();
            var type_gps_id = $(".type_gps_id-"+value).val();
            var equipment_gps_id = $(".equipment_gps_id-"+value).val();
            var equipment_sensor_id = $(".equipment_sensor_id-"+value).val();
            var equipment_gsm = $(".equipment_gsm-"+value).val();
            var task = $(".task-"+value).val();
            var ketersediaan_kendaraan = $(".ketersediaan_kendaraan-"+value).val();
            var keterangan = $(".keterangan-"+value).val();
            var hasil = $(".hasil-"+value).val();
            var biaya_transportasi = $(".biaya_transportasi-"+value).val();
            var teknisi_maintenance = $(".teknisi_maintenance-"+value).val();
            var req_by = $(".req_by-"+value).val();
            var note_maintenance = $(".note_maintenance-"+value).val();
            var status = $(".status-"+value).val();

            $.ajax({
            type: "get",
            url: "{{ url('update_maintenanceGps') }}/"+value,
            data: {
                company_id: company_id,
              vehicle: vehicle,
              waktu_kesepakatan: waktu_kesepakatan,
              type_gps_id: type_gps_id,
              equipment_gps_id: equipment_gps_id,
              equipment_sensor_id: equipment_sensor_id,
              equipment_gsm: equipment_gsm,
              task: task,
              ketersediaan_kendaraan: ketersediaan_kendaraan,
              keterangan: keterangan,
              hasil: hasil,
              biaya_transportasi: biaya_transportasi,
              teknisi_maintenance: teknisi_maintenance,
              req_by: req_by,
              note_maintenance: note_maintenance,
              status: status
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
              $(".export").show("fast");
              $(".filter").show("fast");
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
        $(".export").show("fast");
        $(".filter").show("fast");
        read();
    }

    function disableButton() {

          $('.add').prop('disabled', true);
          $('.filter').prop('disabled', true);
          $('.edit_all').prop('disabled', true);
          $('.delete_all').prop('disabled', true);
          $('.export').addClass('disabled');
          $('.edit').addClass('disable');
          $('.delete').addClass('disable');
          $("[data-toggle= modal]").prop('disabled', true);

        }

        function enableButton(){

          $('.add').prop('disabled', false);
          $('.filter').prop('disabled', false);
          $('.edit_all').prop('disabled', false);
          $('.delete_all').prop('disabled', false);
          $('.edit').removeClass('disable');
          $('.export').removeClass('disabled');
          $('.delete').removeClass('disable');
          $("[data-toggle= modal]").prop('disabled', false);

        }

</script>
</form>

  @endsection
