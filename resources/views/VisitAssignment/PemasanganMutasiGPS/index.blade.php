@extends('layouts.v_main')
@section('title','CSIS | Pemasangan dan Mutasi GPS')
@section('title-table','Pemasangan dan Mutasi GPS')


@section('content')

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
            <div class="text-right" id="selected">
                <div class="float-left mr-2">
                  <select class="form-control input-fixed" id="filter">
                    <option value="{{ url('item_data_all_pemasangan') }}">All</option>
                    <option value="{{ url('item_data_onProgress_pemasangan') }}">On Progress</option>
                    <option value="{{ url('item_data_done_pemasangan') }}">Done</option>
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
                <button class="btn btn-success  mr-2 edit_all">
                    <i class="fas fa-pen"></i>
                </button>
                <button class="btn btn-danger  delete_all">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
            <form>
          <table class="table table-responsive data " class="table_id" id="table_id" >
            <thead>
              <tr>
                <th rowspan="2">
                    <div>
                        <label class="form-check-label">
                            <input class="form-check-input  select-all-checkbox" type="checkbox" id="master">
                            <span class="form-check-sign"></span>
                        </label>
                    </div>
                </th>
                <th rowspan="2" scope="col" class="action-no">No.</th>
                <th rowspan="2" scope="col" class="list">Company</th>
                <th rowspan="2" scope="col" class="list">Jenis Pekerjaan</th>
                <th rowspan="2" scope="col" class="list">Tanggal</th>
                <th rowspan="2" scope="col" class="list">Kendaraan Awal*</th>
                <th rowspan="2" scope="col" class="list">Kendaraan Pasang*</th>
                <th rowspan="2" scope="col" class="list">IMEI*</th>
                <th rowspan="2" scope="col" class="list">GSM*</th>
                <th colspan="2" scope="col" class="list">Equipment</th>
                <th rowspan="2" scope="col" class="list">Teknisi*</th>
                <th rowspan="2" scope="col" class="list">Uang Transportasi*</th>
                <th rowspan="2" scope="col" class="list">Type Visit*</th>
                <th rowspan="2" scope="col" class="list">Note</th>
                <th rowspan="2" scope="col" class="list">Status*</th>
                <th rowspan="2" scope="col" class="action sticky-col first-col">Action</th>

              </tr>
              <tr>
                <th scope="col" class="list">Sensor </th>
                <th scope="col" class="list">GPS</th>
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
        // filter bulan dan tahun
    $('#check-btn').click(function() {
      var date = new Date($('#filter-date').val());
      var month = date.getMonth() + 1;
      var year = date.getFullYear();
    //   var task = val();
        $.ajax({
            type: "get",
            url: "{{ url('item_data_MY_PemasanganMutasi') }}",
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

    // ---- stop dropdown -----
    $(document).on('click', '.dropdown-menu', function (e) {
      e.stopPropagation();
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

              "dom": '<"top"f>rt<"bottom"lp><"clear">'
              });
          $('#table_id').DataTable().draw();
        });
      }
    // ---- Tombol Cancel -----
    function cancel() {
      read()
    }
    //  // ------ Tambah Form Input ------
    //  $('.add').click(function() {
    //     $.get("{{ url('add_form_PemasanganMutasi') }}", {}, function(data, status) {
    //       $('#table_id tbody').prepend(data);
    //     });
    //   });
    // ----- Proses Tambah data ------
    // function store() {
    //     var company_id = $("#company_id").val();
    //     var tanggal = $("#tanggal").val();
    //     var kendaraan_awal = $("#kendaraan_awal").val();
    //     var imei = $("#imei").val();
    //     var gsm_pemasangan = $("#gsm_pemasangan").val();
    //     var kendaraan_pasang = $("#kendaraan_pasang").val();
    //     var jenis_pekerjaan = $("#jenis_pekerjaan").val();
    //     var equipment_terpakai_gps = $("#equipment_terpakai_gps").val();
    //     var equipment_terpakai_sensor = $("#equipment_terpakai_sensor").val();
    //     var teknisi = $("#teknisi").val();
    //     var uang_transportasi = $("#uang_transportasi").val();
    //     var type_visit = $("#type_visit").val();
    //     var note = $("#note").val();
    //     $.ajax({
    //         type: "get",
    //         url: "{{ url('store_PemasanganMutasi') }}",
    //         data: {
    //           company_id: company_id,
    //           tanggal:tanggal,
    //           kendaraan_awal: kendaraan_awal,
    //           imei: imei,
    //           gsm_pemasangan: gsm_pemasangan,
    //           kendaraan_pasang:kendaraan_pasang,
    //           jenis_pekerjaan:jenis_pekerjaan,
    //           equipment_terpakai_gps:equipment_terpakai_gps,
    //           equipment_terpakai_sensor:equipment_terpakai_sensor,
    //           teknisi:teknisi,
    //           uang_transportasi:uang_transportasi,
    //           type_visit:type_visit,
    //           note:note
    //         },
    //         success: function(data) {
    //          swal({
    //             type: 'success',
    //             title: 'Data Saved',
    //             showConfirmButton: false,
    //             timer: 1500
    //         }).catch(function(timeout) { });
    //           read();
    //         }
    //     })
    // }
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
        $("#item-no-"+id).hide("fast");
        $("#item-company_id-"+id).hide("fast");
        $("#item-task-"+id).hide("fast");
        $("#item-waktu_kesepakatan-"+id).hide("fast");
        $("#item-vehicle-"+id).hide("fast");
        $("#item-imei-"+id).hide("fast");
        $("#item-gsm_pemasangan-"+id).hide("fast");
        $("#item-equipment_terpakai_gps-"+id).hide("fast");
        $("#item-equipment_terpakai_sensor-"+id).hide("fast");
        $("#item-teknisi_pemasangan-"+id).hide("fast");
        $("#item-uang_transportasi-"+id).hide("fast");
        $("#item-type_visit-"+id).hide("fast");
        $("#item-note_pemasangan-"+id).hide("fast");
        $("#item-kendaraan_pasang-"+id).hide("fast");
        $("#item-status-"+id).hide("fast");
        $.get("{{ url('show_PemasanganMutasi') }}/" + id, {}, function(data, status) {
            $("#edit-form-"+id).prepend(data)
        });
    }
    // ------ Proses Update Data ------
        function update(id) {
            var company_id = $("#company_id").val();
            var task = $("#task").val();
            var waktu_kesepakatan = $("#waktu_kesepakatan").val();
            var vehicle = $("#vehicle").val();
            var imei = $("#imei").val();
            var gsm_pemasangan = $("#gsm_pemasangan").val();
            var equipment_terpakai_gps = $("#equipment_terpakai_gps").val();
            var equipment_terpakai_sensor = $("#equipment_terpakai_sensor").val();
            var teknisi_pemasangan = $("#teknisi_pemasangan").val();
            var uang_transportasi = $("#uang_transportasi").val();
            var type_visit = $("#type_visit").val();
            var note_pemasangan = $("#note_pemasangan").val();
            var kendaraan_pasang = $("#kendaraan_pasang").val();
            var status = $("#status").val();
            var id = id;
            $.ajax({
                type: "get",
                url: "{{ url('update_PemasanganMutasi') }}/"+id,
                data: {
                company_id: company_id,
                task:task,
                waktu_kesepakatan: waktu_kesepakatan,
                vehicle: vehicle,
                imei: imei,
                gsm_pemasangan: gsm_pemasangan,
                equipment_terpakai_gps:equipment_terpakai_gps,
                equipment_terpakai_sensor:equipment_terpakai_sensor,
                teknisi_pemasangan:teknisi_pemasangan,
                uang_transportasi:uang_transportasi,
                type_visit:type_visit,
                note_pemasangan:note_pemasangan,
                kendaraan_pasang:kendaraan_pasang,
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
                $.get("{{ url('/selected_PemasanganMutasi') }}", {}, function(data, status) {
                    $("#selected").prepend(data)
                });
                $.each(allVals, function(index, value){
                    $("#td-checkbox-"+value).hide("fast");
                    $("#td-button-"+value).hide("fast");
                    $("#item-no-"+value).hide("fast");
                    $("#item-company_id-"+value).hide("fast");
                    $("#item-task-"+value).hide("fast");
                    $("#item-waktu_kesepakatan-"+value).hide("fast");
                    $("#item-vehicle-"+value).hide("fast");
                    $("#item-imei-"+value).hide("fast");
                    $("#item-gsm_pemasangan-"+value).hide("fast");
                    $("#item-equipment_terpakai_gps-"+value).hide("fast");
                    $("#item-equipment_terpakai_sensor-"+value).hide("fast");
                    $("#item-teknisi_pemasangan-"+value).hide("fast");
                    $("#item-uang_transportasi-"+value).hide("fast");
                    $("#item-type_visit-"+value).hide("fast");
                    $("#item-note_pemasangan-"+value).hide("fast");
                    $("#item-kendaraan_pasang-"+value).hide("fast");
                    $("#item-status-"+value).hide("fast");
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
                    var task = $(".task-"+value).val();
                    var waktu_kesepakatan = $(".waktu_kesepakatan-"+value).val();
                    var vehicle = $(".vehicle-"+value).val();
                    var imei = $(".imei-"+value).val();
                    var gsm_pemasangan = $(".gsm_pemasangan-"+value).val();
                    var equipment_terpakai_gps = $(".equipment_terpakai_gps-"+value).val();
                    var equipment_terpakai_sensor = $(".equipment_terpakai_sensor-"+value).val();
                    var teknisi_pemasangan = $(".teknisi_pemasangan-"+value).val();
                    var uang_transportasi = $(".uang_transportasi-"+value).val();
                    var type_visit = $(".type_visit-"+value).val();
                    var note_pemasangan = $(".note_pemasangan-"+value).val();
                    var kendaraan_pasang = $(".kendaraan_pasang-"+value).val();
                    var status = $(".status-"+value).val();

                    $.ajax({
                    type: "get",
                    url: "{{ url('update_PemasanganMutasi') }}/"+value,
                    data: {
                        company_id: company_id,
                        task:task,
                        waktu_kesepakatan: waktu_kesepakatan,
                        vehicle: vehicle,
                        imei: imei,
                        gsm_pemasangan: gsm_pemasangan,
                        equipment_terpakai_gps:equipment_terpakai_gps,
                        equipment_terpakai_sensor:equipment_terpakai_sensor,
                        teknisi_pemasangan:teknisi_pemasangan,
                        uang_transportasi:uang_transportasi,
                        type_visit:type_visit,
                        note_pemasangan:note_pemasangan,
                        kendaraan_pasang:kendaraan_pasang,
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
