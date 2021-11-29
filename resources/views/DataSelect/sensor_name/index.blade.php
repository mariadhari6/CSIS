@extends('layouts.v_main')
@section('title','CSIS | Sensor')
@section('title-table', 'Sensor')
@section('master','show')
@section('sensor','active')

@section('content')
<form onsubmit="return false">
    <div class="row">
    <div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="text-right" id="selected">
                <button type="button" class="btn btn-primary float-left mr-2 add" id="add" >
                  <b>Add</b>
                  <i class="fas fa-plus ml-2" ></i>
                </button>
            </div>
          <table class="table table-responsive data" class="table_select" id="table_select" >
            <thead>
              <tr>
                <th scope="col" class="list-sellerName" style="text-align: center">Sensor Name*</th>
                <th scope="col" class="action sticky-col first-col">Action</th>
              </tr>
            </thead>
            <tbody  id="item_data">
              {{-- {{ csrf_field() }} --}}
            </tbody>

          </table>
        </div>
      </div>
    </form>

  <script>

    $(document).ready(function() {

      read()

      //  ----- freeze table -------
       jQuery(".main-table").clone(true).appendTo('#table-scroll').addClass('clone');


    });


    function read(){
      $.get("{{ url('item_data_sensor_name') }}", {}, function(data, status) {
        $('#table_select').DataTable().destroy();
        $('#table_select').find("#item_data").html(data);
        $('#table_select').dataTable( {
            "lengthMenu": [[50, 100, 1000, -1], [50, 100, 1000, "All"]],

            "dom": '<"top"f>rt<"bottom"lp><"clear">'
        });
        $('#table_select').DataTable().draw();
      });
    }

     // ---- Tombol Cancel -----
     function cancel() {
      read()
    }

     // ------ Tambah Form Input ------
     $('.add').click(function() {
        $.get("{{ url('add_form_sensor_name') }}", {}, function(data, status) {
          $('#table_select tbody').prepend(data);
        });
      });
    // Tambah Data
      function store() {
        var sensor_name = $("#sensor_name").val();


          $.ajax({
            type: "get",
            url: "{{ url('store_sensor_name') }}",
            data: {
              sensor_name: sensor_name,

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
                    url: "{{ url('destroy_sensor_name') }}/" + id,
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
        $("#td-button-"+id).hide("fast");
        $("#item-sensor_name-"+id).hide("fast");
        $.get("{{ url('edit_form_sensor_name') }}/" + id, {}, function(data, status) {
            $("#edit-form-"+id).prepend(data)
        });
    }

     // ------ Proses Update Data ------
     function update(id) {
      var sensor_name = $("#sensor_name").val();

          $.ajax({
              type: "get",
              url: "{{ url('update_sensor_name') }}/"+id,
              data: {
               sensor_name: sensor_name,
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



  </script>

@endsection
