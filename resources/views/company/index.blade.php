@extends('layouts.v_main')
@section('title','Company')

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
                <th scope="col">Seller Id</th>
                <th scope="col">Company Name</th>
                <th scope="col">Status</th>
                <th scope="col">Customer Code</th>
                <th scope="col">No PO</th>
                <th scope="col">Po Date</th>
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
      $.get("{{ url('item_data_company') }}", {}, function(data, status) {
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
        $.get("{{ url('add_form_company') }}", {}, function(data, status) {
          $('#table_id tbody').prepend(data);
        });
      });

    // ----- Proses Tambah data ------
    function store() {
        var seller_id = $("#seller_id").val();
        var company_name = $("#company_name").val();
        var status = $("#status").val();
        var customer_code = $("#customer_code").val();
        var no_po = $("#no_po").val();
        var po_date = $("#po_date").val();
        $.ajax({
            type: "get",
            url: "{{ url('store_company') }}",
            data: {
              seller_id: seller_id,
              company_name: company_name,
              status: status,
              customer_code: customer_code,
              no_po: no_po,
              po_date: po_date
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
            url: "{{ url('destroy_company') }}/" + id,
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
        $("#item-seller_id-"+id).slideUp("fast");
        $("#item-company_name-"+id).slideUp("fast");
        $("#item-status-"+id).slideUp("fast");
        $("#item-customer_code-"+id).slideUp("fast");
        $("#item-no_po-"+id).slideUp("fast");
        $("#item-po_date-"+id).slideUp("fast");
        $.get("{{ url('show_company') }}/" + id, {}, function(data, status) {
            $("#edit-form-"+id).prepend(data)
        });
    }

    // ------ Proses Update Data ------
    function update(id) {
        var seller_id = $("#seller_id").val();
        var company_name = $("#company_name").val();
        var status = $("#status").val();
        var customer_code = $("#customer_code").val();
        var no_po = $("#no_po").val();
        var po_date = $("#po_date").val();
        var id = id;
        $.ajax({
            type: "get",
            url: "{{ url('update_company') }}/"+id,
            data: {
              seller_id: seller_id,
              company_name: company_name,
              status: status,
              customer_code: customer_code,
              no_po: no_po,
              po_date: po_date
            },
            success: function(data) {
              read()
            }
        })
    }


  </script>

   @endsection
