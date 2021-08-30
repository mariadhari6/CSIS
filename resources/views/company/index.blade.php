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
             <div class="text-right mt-3" id="selected">
                <button type="button" class="btn btn-primary btn-round mr-2 add"><i class="fas fa-plus" id="add"></i></button>
                <button class="btn btn-success btn-round mr-2 edit_all"> <i class="fas fa-pen"></i></button>
                <button class="btn btn-danger btn-round delete_all"><i class="fas fa-trash"></i></button>
            </div>
            <br>

          <table class="table table-hover data" class="table_id" id="table_id" >
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
                    url: "{{ url('destroy_company') }}/" + id,
                    data: "id=" + id,
                    success: function(data) {
                        swal("Done!","It was succesfully deleted!","success");
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
                            url: "{{ route('livetable.delete_all') }}",
                            method: "get",
                            data: {
                                id: allVals,
                                _token: _token
                            },
                            success: function(data) {
                                swal("Done!","It was succesfully deleted!","success");
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
                // alert(allVals);
                $(".edit_all").hide("fast");
                $(".delete_all").hide("fast");
                $.get("{{ url('selected') }}", {}, function(data, status) {
                    $("#selected").prepend(data)
                });
                $.each(allVals, function(index, value){
                    $("#td-checkbox-"+value).hide("fast");
                    $("#td-button-"+value).hide("fast");
                    $("#item-seller_id-"+value).slideUp("fast");
                    $("#item-company_name-"+value).slideUp("fast");
                    $("#item-status-"+value).slideUp("fast");
                    $("#item-customer_code-"+value).slideUp("fast");
                    $("#item-no_po-"+value).slideUp("fast");
                    $("#item-po_date-"+value).slideUp("fast");
                    $(".add").hide("fast");
                    $.get("{{ url('show_company') }}/" + value, {}, function(data, status) {
                        $("#edit-form-"+value).prepend(data)
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

                $.each(allVals, function(index, value){
                    var seller_id = $("#seller_id").val();
                    var company_name = $("#company_name").val();
                    var status = $("#status").val();
                    var customer_code = $("#customer_code").val();
                    var no_po = $("#no_po").val();
                    var po_date = $("#po_date").val();
                    $.ajax({
                    type: "get",
                    url: "{{ url('update_company') }}/"+value,
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
                });
            });


        }

  </script>

   @endsection
