@extends('layouts.v_main')
@section('title','Gsm Pre Active')

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
                <th scope="col">GSM Number</th>
                <th scope="col">Serial Number</th>
                <th scope="col">ICC ID</th>
                <th scope="col">IMSI</th>
                <th scope="col">Res ID</th>
                <th scope="col">Expired Date</th>
                <th scope="col">Note</th>
              </tr>
            </thead>
            <tbody  id="item_data">
             {{ csrf_field() }}
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
      $.get("{{ url('item_data_gsm_pre_active') }}", {}, function(data, status) {
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
        $.get("{{ url('add_form_gsm_pre_active') }}", {}, function(data, status) {
          $('#table_id tbody').prepend(data);
        });
      });

    // ----- Proses Tambah data ------
    function store() {
        var gsm_number = $("#gsm_number").val();
        var serial_number = $("#serial_number").val();
        var icc_id = $("#icc_id").val();
        var imsi = $("#imsi").val();
        var res_id = $("#res_id").val();
        var expired_date = $("#expired_date").val();
        var note = $("#note").val();
        $.ajax({
            type: "get",
            url: "{{ url('store_gsm_pre_active') }}",
            data: {
              gsm_number: gsm_number,
              serial_number: serial_number,
              icc_id: icc_id,
              imsi: imsi,
              res_id: res_id,
              expired_date: expired_date,
              note: note
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
            url: "{{ url('destroy_gsm_pre_active') }}/" + id,
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
        $("#item-gsm_number-"+id).slideUp("fast");
        $("#item-serial_number-"+id).slideUp("fast");
        $("#item-icc_id-"+id).slideUp("fast");
        $("#item-imsi-"+id).slideUp("fast");
        $("#item-res_id-"+id).slideUp("fast");
        $("#item-expired_date-"+id).slideUp("fast");
        $("#item-note-"+id).slideUp("fast");
        $.get("{{ url('show_gsm_pre_active') }}/" + id, {}, function(data, status) {
            $("#edit-form-"+id).prepend(data)
        });
    }

    // ------ Proses Update Data ------
    function update(id) {
        var gsm_number = $("#gsm_number").val();
        var serial_number = $("#serial_number").val();
        var icc_id = $("#icc_id").val();
        var imsi = $("#imsi").val();
        var res_id = $("#res_id").val();
        var expired_date = $("#expired_date").val();
        var note = $("#note").val();
        var id = id;
        $.ajax({
            type: "get",
            url: "{{ url('update_gsm_pre_active') }}/"+id,
            data: {
              gsm_number: gsm_number,
              serial_number: serial_number,
              icc_id: icc_id,
              imsi: imsi,
              res_id: res_id,
              expired_date: expired_date,
              note: note
            },
            success: function(data) {
              read()
            }
        })
    }


  </script>

   @endsection