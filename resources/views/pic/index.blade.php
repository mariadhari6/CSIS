@extends('layouts.v_main')
@section('title','PIC Company')

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
                <th scope="col">Company</th>
                <th scope="col">Pic Name</th>
                <th scope="col">Email</th>
                <th scope="col">Position</th>
                <th scope="col">Phone</th>
                <th scope="col">Date of birth</th>
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
      $.get("{{ url('item_data_pic') }}", {}, function(data, status) {
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
        $.get("{{ url('add_form_pic') }}", {}, function(data, status) {
          $('#table_id tbody').prepend(data);
        });
      });

    // ----- Proses Tambah data ------
    function store() {
        var company_id = $("#company_id").val();
        var pic_name = $("#pic_name").val();
        var email = $("#email").val();
        var position = $("#position").val();
        var phone = $("#phone").val();
        var date_of_birth = $("#date_of_birth").val();
        $.ajax({
            type: "get",
            url: "{{ url('store_pic') }}",
            data: {
              company_id: company_id,
              pic_name: pic_name,
              email: email,
              position: position,
              phone: phone,
              date_of_birth:date_of_birth
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
            url: "{{ url('destroy_pic') }}/" + id,
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
        $("#item-company_id-"+id).slideUp("fast");
        $("#item-pic_name-"+id).slideUp("fast");
        $("#item-email-"+id).slideUp("fast");
        $("#item-position-"+id).slideUp("fast");
        $("#item-phone-"+id).slideUp("fast");
        $("#item-date_of_birth-"+id).slideUp("fast");
        $.get("{{ url('show_pic') }}/" + id, {}, function(data, status) {
            $("#edit-form-"+id).prepend(data)
        });
    }

    // ------ Proses Update Data ------
    function update(id) {
        var company_id = $("#company_id").val();
        var pic_name = $("#pic_name").val();
        var email = $("#email").val();
        var position = $("#position").val();
        var phone = $("#phone").val();
        var date_of_birth = $("#date_of_birth").val();
        var id = id;
        // console.log('test');
        $.ajax({
            type: "get",
            url: "{{ url('update_pic') }}/"+id,
            data: {
             company_id: company_id,
              pic_name: pic_name,
              email: email,
              position: position,
              phone: phone,
             date_of_birth:date_of_birth
            },
            success: function(data) {
              read()
            // console.log('test');
            }
        })
    }


  </script>

   @endsection
