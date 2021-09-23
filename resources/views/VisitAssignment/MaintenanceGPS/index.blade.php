@extends('layouts.v_main')
@section('title','Maintenance GPS')

@section('content')
<h4 class="page-title">Maintenance GPS</h4>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
            <div class="text-right mt-3" id="selected">
              <button type="button" class="btn btn-primary float-left mr-2 add add-button" id="add">
                <b>Add</b>
                <i class="fas fa-plus ml-2" ></i>
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
                <th rowspan="2" width="10px">
                  <div class="form-check">
                      <label class="form-check-label">
                          <input class="form-check-input  select-all-checkbox" type="checkbox" id="master">
                          <span class="form-check-sign"></span>
                      </label>
                  </div>
                </th>
                <th rowspan="2" scope="col" class="action">No.</th>
                <th rowspan="2" scope="col" class="action">Action</th>
                <th rowspan="2" scope="col" class="list">Company</th>
                <th rowspan="2" scope="col" class="list">Vehicle</th>
                <th rowspan="2" scope="col" class="list">Tanggal</th>
                <th rowspan="2" scope="col" class="list">Type GPS</th>
                <th colspan="3" scope="col" class="list">Equipment</th>
                <th rowspan="2" scope="col" class="list">Permasalahan</th>
                <th rowspan="2" scope="col" class="list">Ketersediaan Kendaraan</th>
                <th rowspan="2" scope="col" class="list">Keterangan</th>
                <th rowspan="2" scope="col" class="list">Hasil</th>
                <th rowspan="2" scope="col" class="list">Biaya Transportasi</th>
                <th rowspan="2" scope="col" class="list">Teknisi</th>
                <th rowspan="2" scope="col" class="list">Req By</th>
                <th rowspan="2" scope="col" class="list">Note</th>
              </tr>
              <tr>
                <th scope="col" class="list">GPS</th>
                <th scope="col" class="list">Sensor</th>
                <th scope="col" class="list">GSM</th>
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
      $.get("{{ url('item_data_maintenanace_gps') }}", {}, function(data, status) {
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
    $.get("{{ url('add_form_maintenanace_gps') }}", {}, function(data, status) {
        $('#table_id tbody').prepend(data); 
    });
    });

    // ----- Proses Tambah data ------
    function store() {
        var company = $("#company").val();
        var vehicle = $("#vehicle").val();
        var tanggal = $("#tanggal").val();
        var type_gps = $("#type_gps").val();
        var equipment_gps = $("#equipment_gps").val();
        var equipment_sensor = $("#equipment_sensor").val();
        var equipment_gsm = $("#equipment_gsm").val();
        var permasalahan = $("#permasalahan").val();
        var ketersediaan_kendaraan = $("#ketersediaan_kendaraan").val();
        var keterangan = $("#keterangan").val();
        var hasil = $("#hasil").val();
        var biaya_transportasi = $("#biaya_transportasi").val();
        var teknisi = $("#teknisi").val();
        var req_by = $("#req_by").val();
        var note = $("#note").val();

        $.ajax({
            type: "get",
            url: "{{ url('store_maintenanceGps') }}",
            data: {
              company: company,
              vehicle: vehicle,
              tanggal: tanggal,
              type_gps: type_gps,
              equipment_gps: equipment_gps,
              equipment_sensor: equipment_sensor,
              equipment_gsm: equipment_gsm,
              permasalahan: permasalahan,
              ketersediaan_kendaraan: ketersediaan_kendaraan,
              keterangan: keterangan,
              hasil: hasil,
              biaya_transportasi: biaya_transportasi,
              teknisi: teknisi,
              req_by: req_by,
              note: note,

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
        var id = id;
        $("#td-checkbox-"+id).hide("fast");
        $("#td-button-"+id).slideUp("fast");
        $("#item-no-"+id).slideUp("fast");
        $("#item-company-"+id).slideUp("fast");
        $("#item-vehicle-"+id).slideUp("fast");
        $("#item-tanggal-"+id).slideUp("fast");
        $("#item-type_gps-"+id).slideUp("fast");
        $("#item-equipment_gps-"+id).slideUp("fast");
        $("#item-equipment_sensor-"+id).slideUp("fast");
        $("#item-equipment_gsm-"+id).slideUp("fast");
        $("#item-permasalahan-"+id).slideUp("fast");
        $("#item-ketersediaan_kendaraan-"+id).slideUp("fast");
        $("#item-keterangan-"+id).slideUp("fast");
        $("#item-hasil-"+id).slideUp("fast");
        $("#item-biaya_transportasi-"+id).slideUp("fast");
        $("#item-teknisi-"+id).slideUp("fast");
        $("#item-req_by-"+id).slideUp("fast");
        $("#item-note-"+id).slideUp("fast");
        $.get("{{ url('edit_form_maintenanceGps') }}/" + id, {}, function(data, status) {
            $("#edit-form-"+id).prepend(data)
        });
    }

    // ------ Proses Update Data ------
    function update(id) {
        var company = $('select[name="company"]').val();
        var vehicle = $("#vehicle").val();
        var tanggal = $("#tanggal").val();
        var type_gps = $("#type_gps").val();
        var equipment_gps = $("#equipment_gps").val();
        var equipment_sensor = $("#equipment_sensor").val();
        var equipment_gsm = $("#equipment_gsm").val();
        var permasalahan = $("#permasalahan").val();
        var ketersediaan_kendaraan = $("#ketersediaan_kendaraan").val();
        var keterangan = $("#keterangan").val();
        var hasil = $("#hasil").val();
        var biaya_transportasi = $("#biaya_transportasi").val();
        var teknisi = $("#teknisi").val();
        var req_by = $("#req_by").val();
        var note = $("#note").val();
        var id = id;

        $.ajax({
            type: "get",
            url: "{{ url('update_maintenanceGps') }}/"+id,
            data: {
              company: company,
              vehicle: vehicle,
              tanggal: tanggal,
              type_gps: type_gps,
              equipment_gps: equipment_gps,
              equipment_sensor:equipment_sensor,
              equipment_gsm: equipment_gsm,
              permasalahan: permasalahan,
              ketersediaan_kendaraan: ketersediaan_kendaraan,
              keterangan: keterangan,
              hasil: hasil,
              biaya_transportasi: biaya_transportasi,
              teknisi: teknisi,
              req_by: req_by,
              note: note
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

      var allVals = [];
      var _token = $('input[name="_token"]').val();

      $(".task-select:checked").each(function() {
          allVals.push($(this).attr("id"));
      });
      if (allVals.length > 0){
          $(".edit_all").hide("fast");
          $(".delete_all").hide("fast");
          $.get("{{ url('selected_company') }}", {}, function(data, status) {
              $("#selected").prepend(data)
          });
          $.each(allVals, function(index, value){
              $("#td-checkbox-"+value).hide("fast");
              $("#item-no-"+value).hide("fast");
              $("#td-button-"+value).hide("fast");
              $("#item-company-"+value).slideUp("fast");
              $("#item-vehicle-"+value).slideUp("fast");
              $("#item-tanggal-"+value).slideUp("fast");
              $("#item-type_gps-"+value).slideUp("fast");
              $("#item-equipment_gps-"+value).slideUp("fast");
              $("#item-equipment_sensor-"+value).slideUp("fast");
              $("#item-equipment_gsm-"+value).slideUp("fast");
              $("#item-permasalahan-"+value).slideUp("fast");
              $("#item-ketersediaan_kendaraan-"+value).slideUp("fast");
              $("#item-keterangan-"+value).slideUp("fast");
              $("#item-hasil-"+value).slideUp("fast");
              $("#item-biaya_transportasi-"+value).slideUp("fast");
              $("#item-teknisi-"+value).slideUp("fast");
              $("#item-req_by-"+value).slideUp("fast");
              $("#item-note-"+value).slideUp("fast");

              $(".add").hide("fast");
              $.get("{{ url('edit_form_maintenanceGps') }}/" + value, {}, function(data, status) {
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
            var company = $(".company-"+value).val();
            var vehicle = $(".vehicle-"+value).val();
            var tanggal = $(".tanggal-"+value).val();
            var type_gps = $(".type_gps-"+value).val();
            var equipment_gps = $(".equipment_gps-"+value).val();
            var equipment_sensor = $(".equipment_sensor-"+value).val();
            var equipment_gsm = $(".equipment_gsm-"+value).val();
            var permasalahan = $(".permasalahan-"+value).val();
            var ketersediaan_kendaraan = $(".ketersediaan_kendaraan-"+value).val();
            var keterangan = $(".keterangan-"+value).val();
            var hasil = $(".hasil-"+value).val();
            var biaya_transportasi = $(".biaya_transportasi-"+value).val();
            var teknisi = $(".teknisi-"+value).val();
            var req_by = $(".req_by-"+value).val();
            var note = $(".note-"+value).val();

            $.ajax({
            type: "get",
            url: "{{ url('update_maintenanceGps') }}/"+value,
            data: {
                company: company,
                vehicle: vehicle,
                tanggal: tanggal,
                type_gps: type_gps,
                equipment_gps: equipment_gps,
                equipment_sensor:equipment_sensor,
                equipment_gsm: equipment_gsm,
                permasalahan: permasalahan,
                ketersediaan_kendaraan: ketersediaan_kendaraan,
                keterangan: keterangan,
                hasil: hasil,
                biaya_transportasi: biaya_transportasi,
                teknisi: teknisi,
                req_by: req_by,
                note: note
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
