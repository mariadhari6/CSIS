@extends('layouts.v_main')
@section('title','Pemasangan dan Mutasi GPS')


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
                <button type="button" class="btn btn-primary float-left mr-2 add add-button"><b>Add</b><i class="fas fa-plus ml-2" id="add"></i></button>
                <button class="btn btn-success  mr-2 edit_all"> <i class="fas fa-pen"></i></button>
                <button class="btn btn-danger  delete_all"><i class="fas fa-trash"></i></button>
            </div>


          <table class="table table-responsive data " class="table_id" id="table_id" >
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
                <th scope="col" class="action">Action</th>
                <th scope="col" class="list">Company</th>
                <th scope="col" class="list">Tanggal</th>
                <th scope="col" class="list">Kendaraan Awal</th>
                <th scope="col" class="list">IMEI</th>
                <th scope="col" class="list">GSM</th>
                <th scope="col" class="list">Kendaraan Pasang</th>
                <th scope="col" class="list">Jenis Pekerjaan</th>
                <th scope="col" class="list">Equipment Terpakai GPS</th>
                <th scope="col" class="list">Equipment Terpasang Sensor</th>
                <th scope="col" class="list">Teknisi</th>
                <th scope="col" class="list">Uang Transportasi</th>
                <th scope="col" class="list">Type Visit</th>
                <th scope="col" class="list">Note</th>
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
      read()
    });
    // ------ Tampil Data ------
    function read(){

      $.get("{{ url('item_data_PemasanganMutasi') }}", {}, function(data, status) {
         $('#table_id').DataTable().destroy();
         $('#table_id').find("#item_data").html(data);
         $('#table_id').dataTable( {

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

     // ------ Tambah Form Input ------
     $('.add').click(function() {
        $.get("{{ url('add_form_PemasanganMutasi') }}", {}, function(data, status) {
          $('#table_id tbody').prepend(data);
        });
      });
    // ----- Proses Tambah data ------
    function store() {
        var company_id = $("#company_id").val();
        var tanggal = $("#tanggal").val();
        var kendaraan_awal = $("#kendaraan_awal").val();
        var imei = $("#imei").val();
        var gsm = $("#gsm").val();
        var kendaraan_pasang = $("#kendaraan_pasang").val();
        var jenis_pekerjaan = $("#jenis_pekerjaan").val();
        var equipment_terpakai_gps = $("#equipment_terpakai_gps").val();
        var equipment_terpakai_sensor = $("#equipment_terpakai_sensor").val();
        var teknisi = $("#teknisi").val();
        var uang_transportasi = $("#uang_transportasi").val();
        var type_visit = $("#type_visit").val();
        var note = $("#note").val();
        $.ajax({
            type: "get",
            url: "{{ url('store_PemasanganMutasi') }}",
            data: {
              company_id: company_id,
              tanggal:tanggal,
              kendaraan_awal: kendaraan_awal,
              imei: imei,
              gsm: gsm,
              kendaraan_pasang:kendaraan_pasang,
              jenis_pekerjaan:jenis_pekerjaan,
              equipment_terpakai_gps:equipment_terpakai_gps,
              equipment_terpakai_sensor:equipment_terpakai_sensor,
              teknisi:teknisi,
              uang_transportasi:uang_transportasi,
              type_visit:type_visit,
              note:note
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
                    url: "{{ url('destroy_PemasanganMutasi') }}/" + id,
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
        $("#item-company_id-"+id).hide("fast");
        $("#item-tanggal-"+id).hide("fast");
        $("#item-kendaraan_awal-"+id).hide("fast");
        $("#item-imei-"+id).hide("fast");
        $("#item-gsm-"+id).hide("fast");
        $("#item-kendaraan_pasang-"+id).hide("fast");
        $("#item-jenis_pekerjaan-"+id).hide("fast");
        $("#item-equipment_terpakai_gps-"+id).hide("fast");
        $("#item-equipment_terpakai_sensor-"+id).hide("fast");
        $("#item-teknisi-"+id).hide("fast");
        $("#item-uang_transportasi-"+id).hide("fast");
        $("#item-type_visit-"+id).hide("fast");
        $("#item-note-"+id).hide("fast");
        $.get("{{ url('show_PemasanganMutasi') }}/" + id, {}, function(data, status) {
            $("#edit-form-"+id).prepend(data)
        });
    }
    // ------ Proses Update Data ------
        function update(id) {
            var company_id = $("#company_id").val();
            var tanggal = $("#tanggal").val();
            var kendaraan_awal = $("#kendaraan_awal").val();
            var imei = $("#imei").val();
            var gsm = $("#gsm").val();
            var kendaraan_pasang = $("#kendaraan_pasang").val();
            var jenis_pekerjaan = $("#jenis_pekerjaan").val();
            var equipment_terpakai_gps = $("#equipment_terpakai_gps").val();
            var equipment_terpakai_sensor = $("#equipment_terpakai_sensor").val();
            var teknisi = $("#teknisi").val();
            var uang_transportasi = $("#uang_transportasi").val();
            var type_visit = $("#type_visit").val();
            var note = $("#note").val();
            var id = id;
            $.ajax({
                type: "get",
                url: "{{ url('update_PemasanganMutasi') }}/"+id,
                data: {
                 company_id: company_id,
              tanggal:tanggal,
              kendaraan_awal: kendaraan_awal,
              imei: imei,
              gsm: gsm,
              kendaraan_pasang:kendaraan_pasang,
              jenis_pekerjaan:jenis_pekerjaan,
              equipment_terpakai_gps:equipment_terpakai_gps,
              equipment_terpakai_sensor:equipment_terpakai_sensor,
              teknisi:teknisi,
              uang_transportasi:uang_transportasi,
              type_visit:type_visit,
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
                            url: "{{ url('/selectedDelete_PemasanganMutasi') }}",
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
                $.get("{{ url('selected') }}", {}, function(data, status) {
                    $("#selected").prepend(data)
                });
                $.each(allVals, function(index, value){
                    $("#td-checkbox-"+value).hide("fast");
                    $("#td-button-"+value).hide("fast");
                    $("#item-company_id-"+value).hide("fast");
                    $("#item-tanggal-"+value).hide("fast");
                    $("#item-kendaraan_awal-"+value).hide("fast");
                    $("#item-imei-"+value).hide("fast");
                    $("#item-gsm-"+value).hide("fast");
                    $("#item-kendaraan_pasang-"+value).hide("fast");
                    $("#item-jenis_pekerjaan-"+value).hide("fast");
                    $("#item-equipment_terpakai_gps-"+value).hide("fast");
                    $("#item-equipment_terpakai_sensor-"+value).hide("fast");
                    $("#item-teknisi-"+value).hide("fast");
                    $("#item-uang_transportasi-"+value).hide("fast");
                    $("#item-type_visit-"+value).hide("fast");
                    $("#item-note-"+value).hide("fast");
                    $(".add").hide("fast");
                    $.get("{{ url('show_PemasanganMutasi') }}/" + value, {}, function(data, status) {
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

                    var company_id = $(".company_id-"+value).val();
                    var tanggal = $(".tanggal-"+value).val();
                    var kendaraan_awal = $(".kendaraan_awal-"+value).val();
                    var imei = $(".imei-"+value).val();
                    var gsm = $(".gsm-"+value).val();
                    var kendaraan_pasang = $(".kendaraan_pasang-"+value).val();
                    var jenis_pekerjaan = $(".jenis_pekerjaan-"+value).val();
                    var equipment_terpakai_gps = $(".equipment_terpakai_gps-"+value).val();
                    var equipment_terpakai_sensor = $(".equipment_terpakai_sensor-"+value).val();
                    var teknisi = $(".teknisi-"+value).val();
                    var uang_transportasi = $(".uang_transportasi-"+value).val();
                    var type_visit = $(".type_visit-"+value).val();
                    var note = $(".note-"+value).val();
                    $.ajax({
                    type: "get",
                    url: "{{ url('update_PemasanganMutasi') }}/"+value,
                    data: {
                        company_id: company_id,
                        tanggal:tanggal,
                        kendaraan_awal: kendaraan_awal,
                        imei: imei,
                        gsm: gsm,
                        kendaraan_pasang:kendaraan_pasang,
                        jenis_pekerjaan:jenis_pekerjaan,
                        equipment_terpakai_gps:equipment_terpakai_gps,
                        equipment_terpakai_sensor:equipment_terpakai_sensor,
                        teknisi:teknisi,
                        uang_transportasi:uang_transportasi,
                        type_visit:type_visit,
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

