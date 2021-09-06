@extends('layouts.v_main')
@section('title','Sensor')

@section('content')

<div align="right">
  </div>
  <br>
  <div id="message"></div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
            <div class="text-right">
                <button type="button" name="add" id="add" class="btn btn-primary btn-round btn-xs   "><i class="fas fa-plus"></i> Add</button>
            </div>
            <br>

          <table class="table table-hover data" class="table_id" id="table_id" >
            <thead>
              <tr>
                <th scope="col">Action</th>
                <th scope="col">Sensor_Name</th>
                <th scope="col">Merk_Sensor</th>
                <th scope="col">Serial_Number</th>
                <th scope="col">RAB_Number</th>
                <th scope="col">Waranty</th>
                <th scope="col">Status</th>
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
      $.get("{{ url('item_data_sensor') }}", {}, function(data, status) {
        $("#item_data").html(data);
        $('#table_id').DataTable();

      });

    }

    // ---- Tombol Cancel -----
    function cancel() {
      read()
    }

     // ------ Tambah Form Input ------
     $('#add').click(function() {
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
              merk_sensor: merk_sensor,
              serial_number: serial_number,
              rab_number: rab_number,
              waranty: waranty,
              status: status,
            },
            success: function(data) {
              read()
            }
        })
    }



    // -----Proses Delete Data ------
    function destroy(id) {
        var id = id;
        confirm("Delete ?");
        $.ajax({
            type: "get",
            url: "{{ url('destroy_sensor') }}/" + id,
            data: "id=" + id,
            success: function(data) {
              read()
            }
        })
    }

    // ------ Edit Form Data ------
    function edit(id){
        var id = id;
        $("#td-button-"+id).slideUp("fast");
        $("#item-sensor_name-"+id).slideUp("fast");
        $("#item-merk_sensor-"+id).slideUp("fast");
        $("#item-serial_number-"+id).slideUp("fast");
        $("#item-rab_number-"+id).slideUp("fast");
        $("#item-waranty-"+id).slideUp("fast");
        $("#item-status-"+id).slideUp("fast");
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
              merk_sensor: merk_sensor,
              serial_number: serial_number,
              rab_number: rab_number,
              waranty: waranty,
              status: status
            },
            success: function(data) {
              read()
            }
        })
    }


  </script>

   @endsection